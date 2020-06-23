var distrito =null;

$(document).ready(function(){
    $("#principal-one").css({"height":$(window).height() + "px"});
    var flag = false;
    var scroll;
    $(window).scroll(function(){
        scroll = $(window).scrollTop();
        if(scroll > 70){
            if(!flag){
                $("#main-header").css({"background-color": "#000",
                    "height":"7.4rem",
                    "transition": "0.2s"});
                $("#main-header").css({"height": ""});
                $("#main-header-h").css({"display": "none"});
                $("#main-menu").css({"transition": "0.6s",
                    "margin-top": "-2.2rem"});
                $("#main-header-first").css({"display": "none"});
                $("#line-first").css({"display": "none"});
                // $("#img-div").css({"transition": "0.6s",
                //     "margin-top": "-1.6rem"});
                //
                // $("#mobile-menu-button").css({"float": "rigth",
                //     "margin-top": "-.8rem",
                //     "font-size":"1.2rem"});
                flag = true;
            }
        }else{
            if(flag){
                $("#main-header").css({"background-color": "#000",
                    "background-size": "cover",
                    "transition": "0.1s"});
                $("#main-header-h").css({"display": "block"});

                $("#main-menu").css({"transition": "0.6s",
                    "padding-top": "1.6rem",
                    "margin-top": "0"  });
                $("#main-header-first").css({"display": "block"});
                $("#line-first").css({"display": "block"});
                // $("#img-div").css({"margin-top": "0"});
                //
                // $("#mobile-menu-button").css({"float": "rigth",
                //     "margin-top": "-4.4rem",
                //     "font-size":"1.2rem"});
                flag = false;
            }
        }
    });
});

$("#departamento").change(event => {
    $.get(`provincias/${event.target.value}`, function(res, sta){
        $("#provincia").empty();
        $("#provincia").append(`<option> Seleccione una opcion </option>`);
        res.forEach(element => {
            $("#provincia").append(`<option value=${element.id}> ${element.name} </option>`);
        });
    });

    $.get(`emisorabusprov/${event.target.value}`, function(res, sta){
        $("#myTable").empty();
        $("#myTable").append(`<thead><tr><th>Nombre Cadena</th>` +
            `                     <th>Representante Legal</th>` +
            `                     <th>Representante Comercial</th>` +
            `                     <th>Telefono</th><th></th></tr></thead>`);
        res.forEach(element => {
            $("#myTable").append(`<tr id="info"><td>${element.nombrecadena}</td>` +
                `                     <td>${element.representanteLegal}</td>` +
                `                     <td>${element.representanteComercial}</td>` +
                `                     <td>${element.telefono}</td>` +
                `                     <td><button  data-toggle="modal" data-target="#myModal" onClick="alert(${element.id})">Ver</button></td></tr>`);
        });
    });
});


$("#provincia").change(event => {
    $.get(`distritos/${event.target.value}`, function(res, sta){
        $("#distrito").empty();
        $("#distrito").append(`<option> Seleccione una opcion </option>`);
        res.forEach(element => {
            $("#distrito").append(`<option value=${element.id}> ${element.name} </option>`);
        });
    });
});

$("#distrito").change(event => {
        $("#emisora").empty();
        $distrito = null;
        $distrito = `${event.target.value}`;
        $("#emisora").append(`<option> Seleccione una opcion </option>`);
        $("#emisora").append(`<option value=RADIO> Radio </option>`);
        $("#emisora").append(`<option value=TELEVISION> Television </option>`);
});

$("#distritoPobl").change(event => {
    $("#emisoraPobl").empty();
    $distrito = null;
    $distrito = `${event.target.value}`;
    $("#emisoraPobl").append(`<option> Seleccione una opcion </option>`);
    $("#emisoraPobl").append(`<option value=RADIO> Radio </option>`);
    $("#emisoraPobl").append(`<option value=TELEVISION> Television </option>`);
});




$("#emisora").change(event => {
    $.get(`emisorasbus/${event.target.value}/${$distrito}`, function(res, sta){
        $("#myTable").empty();
        $("#myTable").append(`<thead><tr><th>Nombre Cadena</th>` +
            `                     <th>Representante Legal</th>` +
            `                     <th>Representante Comercial</th>` +
            `                     <th>Telefono</th><th></th></tr></thead>`);
        res.forEach(element => {
            $("#myTable").append(`<tr id="info"><td>${element.nombrecadena}</td>` +
                `                     <td>${element.representanteLegal}</td>` +
                `                     <td>${element.representanteComercial}</td>` +
                `                     <td>${element.telefono}</td>` +
                `                     <td><button  data-toggle="modal" data-target="#myModal" onClick="alert(${element.id})">Ver</button></td></tr>`);
        });
    });
});

$("#emisoraPobl").change(event => {
    console.log(`${event.target.value}`);
    $.get(`emisorasbus/${event.target.value}/${$distrito}`, function(res, sta){
        $("#myTable").empty();
        $("#myTable").append(`<thead><tr><th>Nombre Cadena</th>` +
            `                     <th>Representante Legal</th>` +
            `                     <th>Representante Comercial</th>` +
            `                     <th>Telefono</th><th></th></tr></thead>`);
        res.forEach(element => {
            $("#myTable").append(`<tr id="info"><td>${element.nombrecadena}</td>` +
                `                     <td>${element.representanteLegal}</td>` +
                `                     <td>${element.representanteComercial}</td>` +
                `                     <td>${element.telefono}</td>` +
                `                     <td><button  data-toggle="modal" data-target="#myModal" onClick="alert(${element.id})">Ver</button></td></tr>`);
        });
    });
});
function alert($id)
{
    var tabladatos = $("#datos")
    var nombre = $("#nombreCadena")
    var respLegal=$("#respLegal");
    var repComercial=$("#repComercial");
    var ruc=$("#ruc");
    var direccion=$("#direccion");
    var frencuencia=$("#frencuencia");
    var numeroRad=$("#numeroRad");
    var email=$("#email");
    var telefono=$("#telefono");
    var descripcion=$("#descripcion");
    $.get(`emisorabus/${$id}`, function(res){
        nombre.empty();
        respLegal.empty();
        repComercial.empty();
        ruc.empty();
        direccion.empty();
        frencuencia.empty();
        numeroRad.empty();
        email.empty();
        telefono.empty();
        descripcion.empty();
        nombre.append(res.nombrecadena);

        respLegal.append(res.representanteLegal);
        repComercial.append(res.representanteComercial);
        ruc.append(res.ruc);
        direccion.append(res.direccion);
        frencuencia.append(res.frecuencia);
        numeroRad.append(res.numeroRadio);
        email.append(res.email);
        telefono.append(res.telefono);
        descripcion.append(res.descripcion);
    });
}
$("#emisoraPobl").change(event => {
    var tabladatos = $("#datos")
    var nombre = $("#nombreCadena")
    var respLegal=$("#respLegal");
    var repComercial=$("#repComercial");
    var ruc=$("#ruc");
    var direccion=$("#direccion");
    var frencuencia=$("#frencuencia");
    var numeroRad=$("#numeroRad");
    var email=$("#email");
    var telefono=$("#telefono");
    var descripcion=$("#descripcion");

    $.get(`emisorabus/${event.target.value}`, function(res){
        nombre.empty();
        respLegal.empty();
        repComercial.empty();
        ruc.empty();
        direccion.empty();
        frencuencia.empty();
        numeroRad.empty();
        email.empty();
        telefono.empty();
        descripcion.empty();
        nombre.append(res.nombrecadena);

        respLegal.append(res.representanteLegal);
        repComercial.append(res.representanteComercial);
        ruc.append(res.ruc);
        direccion.append(res.direccion);
        frencuencia.append(res.frecuencia);
        numeroRad.append(res.numeroRadio);
        email.append(res.email);
        telefono.append(res.telefono);
        descripcion.append(res.descripcion);
    });
});

function cambio() {
    var x = document.getElementById("departamentoPobl");
    var y = document.getElementById("distritosPobl");
    if (x.style.display === "none") {
        x.style.display = "block";
        y.style.display = "none";
        document.getElementById('cambiarBusqueda').innerHTML= 'Busqueda por Habitantes';

    } else {
        x.style.display = "none";
        y.style.display = "block";
        document.getElementById('cambiarBusqueda').innerHTML= 'Busqueda por Departamento';
    }
}
