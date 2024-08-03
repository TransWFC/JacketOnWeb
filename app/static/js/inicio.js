// alert("secondary", "Hola, Bienvenido a JavaScript");

var a = 1;
var b = 2;
/*
const suma = (par1, par2) => par1 + par2;

// Asociar un evento con una función JS
document.getElementById( 
    "btn-sumar", function(){
        console.log("Click botón: " + suma(a,b))
    }
);

console.log("Escribir un mensaje en consola");
console.log( "Suma"  + (a+b));
*/
// Evento LOAD en JQUERY

$( () => {
    // alert( "Esto es JQUERY" )
    /*alert( "primary", "Esto es un JQuery" )
    alert( "secundary", "Esto es un JQuery" )
    alert( "success", "Esto es un JQuery" )
    alert( "danger", "Esto es un JQuery" )*/
    carga_productos();
    carga_promocion();

    $( "#btn-agregar").click( e => {
        appData.idpromocion = 0;
    appData.accion = "alta";
        $("#modal-editar-accion")
                .html( "" )
                .append($( "<i>", {
                    "class" : "fa fa-solid fa-cart-plus fa-2x me-2"
                }))
                .append('Agregar');
        
        $("#modal-editar .modal-header")
            .removeClass("bg-primary")
            .addClass("bg-success");
      

        // limpiar formulario
        $("#idproducto").val(0);
        $("#precio").val("0.00");
        $("#existencia").val(0);
        $("#descuento").val("0.0");
        $("#fecinicio").val("");

    }); 

    $( "#btn-confirmar-baja" ).click( e => {
        alert("secondary", "Borrando...");
        $.ajax({
            "url" : appData.uri_ws + "back/borrapromocion",
            "dataType" : "json",
            "type" : "post",
            "data" : {
                "idpromocion" : appData.idpromocion
            }
        })
        .done(obj => {
            alert(obj.resultado ? "warning" : "danger", obj.mensaje);
                $( "#tr-" + appData.idpromocion).remove();

                if($("#tabla-promociones tbody tr").length == 0){
                    $("#tabla-promociones").hide();
                    alert("danger", "No hay promociones registradas");
                }
                $(".alert-secondary").fadeOut(300);
        })
        .fail(error.ajax);
        $(".alert-secondary").fadeOut(300);
    });

    // Click de GUARDAR (submit del formulario)
    $("#form-promocion").submit(e => {
        e.preventDefault();

        // VALIDACIONES
        // Si algo falla se regresa "false"
        if($("#idproducto").val() == 0){
            error_formulario("idproducto", "Debes seleccionar producto"

            );
            return false;
        }
        else if($("#precio").val() == 0){
            error_formulario("precio", "Debes escribir precio"

            );
            return false;
        }
        else if($("#fecinicio").val() == ""){
            error_formulario("fecinicio", "Debes seleccionar fecha"

            );
            return false;
        }

        $.ajax({
            "url" : appData.uri_ws + "back/actualizapromocion",
            "dataType" : "json",
            "type" : "post",
            "data" : {
                "accion" : appData.accion,
                "idpromocion" : appData.idpromocion,
                "idproducto" : $("#idproducto").val(),
                "precio" : $("#precio").val(),
                "existencia" : $("#existencia").val(),
                "descuento" : $("#descuento").val(),
                "fecinicio" : $("#fecinicio").val(),
            }
        })
        .done(obj => {
            alert(obj.resultado ? "info" : "warning", obj.mensaje);
            if(obj.resultado){
                carga_promociones();
            }

            // Cierra modal manualmente
            $("#modal-editar").modal("toggle");
            return true;
        })
        .fail(error_ajax);
        return true;
    });

    $("#btn-json").click(e => {
        $("#modal-formato-titulo").html("JSON");

        $.ajax({
            "url" : appData.uri_ws + "back/promociones",
            "dataType" : "json"
        })
        .done(obj => {
            if(obj.resultado){
                $("#modal-formato-body").html(JSON.stringify(obj.promociones));
            }
        })
        .fail(error_ajax);
    })

    $("#btn-xml").click(e => {
        $("#modal-formato-titulo").html("XML");

        $.ajax({
            "url" : appData.uri_ws + "back/promociones",
            "dataType" : "xml",
            "type" : "post",
            "data" : {
                "formato" : "xml"
            }
        })
        .done(response => {
                $("#modal-formato-body").text(new XMLSerializer().serializeToString(response));
        })
        .fail(error_ajax);
    })

    // Otros eventos
    $(".btn, input, select").click(borra_mensajes);
    

});

const carga_productos = () => {
    $.ajax({
        "url" : appData.uri_ws + "back/productos", 
        "dataType" : "json"
    })
    .done(obj => {
        if(obj.resultado){
            obj.productos.map(row => {
                $( "#idproducto").append( $("<option>", {
                    "value" : row.idproducto,
                    "text" : row.nomproducto
                }))
            });
        }
    })
    .fail(error_ajax);
}

const carga_promocion = () => {
    $.ajax({
        "url" : appData.uri_ws + "back/productos", 
        "dataType" : "json"
    })
    .done(obj => {
        if(obj.resultado){
            $(" #tabla-promociones ").hide();

    //carga promociones
    $.ajax({
        "url" : appData.uri_ws + "back/promociones", "dataType" : "json"
    })
    .done( obj => {
        if ( obj.resultado ){
            $(" #tabla-promociones ").show();           // Muestra objeto
            $(" #tabla-promociones tbody").html( "" );  // Borra contenido

            obj.promociones.map( row => {
                // Agrega elemento
                $("#tabla-promociones tbody").append( //agrega renglon
                '<tr id= "tr-' + row.idpromocion + '" class="'+
                (row.vigente==1 ? 'table-success':'') +'">'+
                    '<TD>'+ row.nomproducto + '</TD>'+
                    '<TD class="text-end">$'+
                    parseFloat( row.precio).toLocaleString("es-MX",{
                        minimumFractionDigits:2
                    })
                     +
                    '<TD class="text-end">'+ 
                    parseFloat(row.existencia).toLocaleString("es-MX",) + '</TD>'+
                    '<TD class="text-end">'
                    + parseFloat( row.descuento).toLocaleString("es-MX",{
                        minimumFractionDigits:1
                    }) +'%</TD>'+
                    '<TD class="text-center">'+ fecha_bonita(row.fecinicio) + '</TD>'+

                    '<TD class="ps-5"><div class="form-check form-switch"><input type="checkbox" class="form-check-input switch-vigencia" role=switch data-idpromocion="'+row.idpromocion+'"'+
                    (row.vigente == 1?'checked':'') +
                    '/></div></TD>'+
                    '<td class="text-center">'+
                    '<button class="me-2 btn btn-primary btn.sm btn-editar" data-bs-toggle="modal" data-bs-target="#modal-editar" data-idpromocion="'+row.idpromocion+'"><i class="fa fa-solid fa-edit" data-idpromocion="'+row.idpromocion+'"></i></button>'+
                    '<button class="me-2 btn btn-danger btn.sm btn-borrar" data-bs-toggle="modal" data-bs-target="#modal-baja" data-idpromocion="'+row.idpromocion+'"><i class="fa fa-solid fa-trash" data-idpromocio="'+row.idpromocion+'"></i></button>'+
                    '</tr>'
                    
                );
            });

            // Eventos de objetos del DOM que se crearon "al vuelo"
            // Evento click de los switches de vigencia
            $(".switch-vigencia").click( e => {
                // Obtiene el id del switch que generó el evento
                let idpromocion = $(e.target).attr("data-idpromocion");
                $(e.target).prop("disabled", true);
                alert("secondary", "Actualizando...");
                alert("info", "Cambio de vigencia del ID " + idpromocion);

                $.ajax({
                    "url" : appData.uri_ws + "back/cambiavigencia",
                    "dataType" : "json",
                    "type" : "post",
                    "data" : {
                        "idpromocion" : idpromocion
                    }
                })
                .done( obj =>  {
                    alert(obj.resultado ? "info" : "danger", obj.mensaje);
                    if(obj.resultado){
                        let objtr = $("#tr-" + idpromocion);
                        if(objtr.hasClass("table-success")){
                            objtr.removeClass("table-success");
                        }else{
                            objtr.addClass("table-success");
                        }
                    }
                    $(".alert-secondary").fadeOut(300);
                    $(e.target).prop("disabled", false);
                })
                .fail(error_ajax);
                $(e.target).prop("disabled", false);
            });

            // Evento click de los botones de EDITAR
            $(".btn-editar").click( e => {
                // Obtiene el id del botón que generó el evento
                let idpromocion = $(e.target).attr("data-idpromocion");
                appData.idpromocion = idpromocion;
                console.log(idpromocion);
                appData.accion = "cambio";

                $("#modal-editar-accion")
                .html( "" )
                .append($( "<i>", {
                    "class" : "fa fa-solid fa-edit fa-2x me-2"
                }))
                .append('Editar');

                $("#modal-editar .modal-header")
                .removeClass("bg-success")
                .addClass("bg-primary");

                $.ajax({
                    "url" : appData.uri_ws + "back/promocion",
                    "dataType" : "json",
                    "type" : "post",
                    "data" : {
                        "idpromocion" : appData.idpromocion
                    }
                })
                .done( obj => {
                    if(obj.resultado){
                        // Rellena formulario
                        $("#idproducto").val(obj.promocion.idproducto);
                        $("#precio").val(obj.promocion.precio);
                        $("#existencia").val(obj.promocion.existencia);
                        $("#descuento").val(obj.promocion.descuento);
                        $("#fecinicio").val(obj.promocion.fecinicio);
                    }else{
                        alert("danger", obj.mensaje);    
                    }
                })

                .fail(error_ajax);

            });

            


            // Evento click de los botones de BORRAR
            $(".btn-borrar").click( e => {
                // Obtiene el id del botón que generó el evento
                let idpromocion = $(e.target).attr("data-idpromocion");
                appData.idpromocion = idpromocion;
            });


            alert("primary", obj.mensaje);
        }else{
            alert("danger", obj.mensaje);
        }
    })
    .fail( error_ajax );
    //error ajax está en el archivo "mensajes" es una función predefinida
        }
    })
    .fail(error_ajax);
}




