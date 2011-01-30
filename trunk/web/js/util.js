/* 
 * util.js
 *
 * Administra todas las operaciones que se requieren para formularios dinamicos
 *
 */

/**
 * Abre una ventana emergente
 * @param url
 * @param nombre
 * @param ancho
 * @param alto
 * @param x
 * @param y
 */
function abrirPopUp (url, nombre, ancho, alto, x, y)
{
    var caracteristicas_ventana = "";
    caracteristicas_ventana += "dependent";
    caracteristicas_ventana += ",directories=no";
    caracteristicas_ventana += ",height="+alto;
    caracteristicas_ventana += ",hotkeys=no";
    //caracteristicas_ventana += ",innerHeight";
    //caracteristicas_ventana += ",innerWidth";
    caracteristicas_ventana += ",location=no";
    caracteristicas_ventana += ",menubar=no";
    //caracteristicas_ventana += ",outerHeight";
    caracteristicas_ventana += ",personalbar=no";
    caracteristicas_ventana += ",resizable=yes";
    caracteristicas_ventana += ",screenX=0";
    caracteristicas_ventana += ",screenY=0";
    caracteristicas_ventana += ",scrollbars=yes";
    caracteristicas_ventana += ",status=no";
    caracteristicas_ventana += ",titlebar=no";
    caracteristicas_ventana += ",toolbar=no";
    caracteristicas_ventana += ",width="+ancho;
    caracteristicas_ventana += ",z-lock=yes";
    caracteristicas_ventana += ",left="+x;
    caracteristicas_ventana += ",top="+y;
    var ventana=window.open(url,nombre,caracteristicas_ventana);

// return ventana;
}

/**
 * Despliega una lista emergente
 *
 * @param url Url que se va a abrir
 * @param formulario
 * @param nombre_formulario
 */
function desplegarListaWincombo(url, formulario, nombre_formulario) {
    var width = screen.width * 0.6;
    var height = screen.height * 0.6;

    var x_pos = (screen.width / 2) - (width / 2);
    var y_pos = (screen.height / 2) - (height / 2);

    //var expr_busqueda = new RegExp(nombre_formulario, 'gi');

    /*for(var i=0; i < formulario.length; i ++) {
        if(formulario.elements[i].name.test(expr_busqueda)) {

        }
    }*/

    abrirPopUp(url, 'wincombo', width, height, x_pos, y_pos);
}

function cargarUrlExterno(url, ventana_padre) {
    ventana_padre.location.href = url;
    window.close();
}

function cargarUrlAjax(funcion_ajax, parametros) {
    funcion_ajax(parametros);
    window.close();
}

function actualizarInfoHotel(url_accion, id_hotel) {
    $.ajax({
        url: url_accion,
        dataType: "json",
        data: "hot_codigo=" + id_hotel,
        success: function(respuesta) {
            if(respuesta != null) {
                document.getElementById('reserva_direccion').value = respuesta.hot_direccion;
                document.getElementById('reserva_telefono').value = respuesta.hot_telefono;
                document.getElementById('reserva_web').value = respuesta.hot_web;
                document.getElementById('reserva_correo').value = respuesta.hot_email;
            }
            else {
                document.getElementById('reserva_direccion').value = '';
                document.getElementById('reserva_telefono').value = '';
                document.getElementById('reserva_web').value = '';
                document.getElementById('reserva_correo').value = '';
            }
        }
    });
}

function filtrarTratamientos(url_accion, id_tratamiento) {
    $.ajax({
        url: url_accion,
        data: "dtr_tit_codigo=" + id_tratamiento,
        success: function(respuesta) {
            //$("#td_procedimiento_pro_drt_codigo").innerHTML = respuesta;
            document.getElementById("td_procedimiento_pro_drt_codigo").innerHTML = respuesta;
        }
    });
}

function activarCampoProcedimientoOtro(nombre_campo, valor_campo) {
    var expr_regular = new RegExp(valor_campo, 'ig');
    if(expr_regular.test(nombre_campo)) {
        document.getElementById('procedimiento_pro_otro').disabled = false;
    }
    else {
        document.getElementById('procedimiento_pro_otro').disabled = true;
    }
}

function limpiarFormulario(nombre_grupo_formulario) {
    $("[name*='" + nombre_grupo_formulario + "[']").val("");
}

function agregarHTML(id_elemento, url_accion, parametros) {
    $.ajax({
        url: url_accion,
        data: parametros,
        success: function(respuesta) {
            var html_anterior = document.getElementById(id_elemento).innerHTML;
            //$(id_elemento).html(respuesta);
            document.getElementById(id_elemento).innerHTML = html_anterior + respuesta;
        }
    });
}

function agregarHiddensDinamicos(id_elemento, url_accion, selector, valor_contador) {
    var campos = $("[name*='" + selector + "[']");
    var cadena_parametros = "";
    for(var i = 0; i < campos.length; i ++) {
        var string_id = selector + "_";
        var parametro_id = campos[i].getAttribute('id')
        var parametro =  parametro_id.substr(string_id.length, parametro_id.length);
        cadena_parametros += parametro + "=" + campos[i].value + '&';
    }
    if(valor_contador != undefined)
        cadena_parametros += selector + '_id=' + valor_contador
    agregarHTML(id_elemento, url_accion, cadena_parametros);
    return cadena_parametros;
}
