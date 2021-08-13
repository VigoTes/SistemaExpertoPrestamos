

{{-- AQUI PONDRÉ EL CODIGO JAVASCRIPT PARA EL VALIDATOR
    LO MOVERÉ AQUÍ PARA QUE SOLO LAS PAGINAS QUE NECESITEN EL VALIDATOR LO CARGUEN.
    (antes lo tenia en un archivo javascript pero ocurren errores pq los navegadores no actualizan su cache (osea el archivo))
    
    --}}

<script>

/* FUNCIONES EN JS PARA VALIDAR INPUTS
les ingresa como parametro
    - msjError: el mensaje de error que se haya acumulado hasta ahora, si tiene contenido, se retorna este mismo. 
                La funcion solo se ejcuta realmente si el msjError es ""
    - id: id del elemento a validar (puede ser input o textarea)
    - nombreReferencial: nombre que aparecerá en el mensaje de retorno.

    OPCIONALES:
    - tamañoMax : tamaño maximo del elemento (en caso de validar tamaño)
    - indiceSeleccionNula : segun el caso puede ser 0 o 1, es el indice del elemento "-- Seleccione XXXXXX --" en el combo box
*/
/*
function deCompasAPuntos(amount) {
    var amount_parts = amount.split(',');
    if(amount_parts.length>1){
        return parseFloat(amount_parts.join('.'));
    }else{
        return parseFloat(amount);
    }
}*/

function validarPuntoDecimal(msjError,id,nombreReferencial){
    mensaje ="";
    
    cantidad = document.getElementById(id).value;
    var amount_parts = cantidad.split(',');
    console.log('enhorabuean');
    console.log(amount_parts);
    if(amount_parts.length>1){
        ponerEnRojo(id);   
        mensaje="En el campo '"+nombreReferencial+"' no se permiten comas, solo puntos para separar la parte decimal de la entera."
    }

    if(msjError!="") //significa que ya hay un error en el flujo de validaciones
        return msjError; 
    else //si no hay ningun error, retorna el mensaje generado en esta funcion (el cual será nulo si no hubo error)
        return mensaje;
}



var expRegNombres = new RegExp("^[A-Za-zÑñ À-ÿ]+$");//para apellidos y nombres ^[a-zA-Z ]+$ ^[A-Za-zÑñ À-ÿ]$
          
function limpiarEstilos(listaInputs){
    listaInputs.forEach(element => {

        
        quitarElRojo(element)
        
    });

}


function quitarElRojo(id){
    listaDeClases = document.getElementById(id).className;
    
    listaDeClases = listaDeClases.replace("form-control-undefined","form-control");

    document.getElementById(id).className = listaDeClases;
     
       
}


function ponerEnRojo(id){
    listaDeClases = document.getElementById(id).className
    
    if(!listaDeClases.includes('form-control-undefined')) //si no está ya en ROJO
        listaDeClases = listaDeClases.replace("form-control","form-control-undefined");

    document.getElementById(id).className = listaDeClases;
}

/* Valida para la cantidad de elementos agregados (DETALLES)*/
function validarCantidadMaximaYNulidadDetalles(msjError,id,cantidadMax){
    mensaje ="";

    
    cantidad = document.getElementById(id).value;
    //console.log(cantidad);
    if(cantidad==0 || cantidad==null) mensaje='Debe ingresar Items';
    else{
        cantidad=parseFloat(cantidad);
        if(cantidad > cantidadMax) mensaje='No se puede ingresar mas de '+cantidadMax+' Items. La cantidad actual es de '+cantidad+' Items';
    }

    if(msjError!="") //significa que ya hay un error en el flujo de validaciones
        return msjError; 
    else //si no hay ningun error, retorna el mensaje generado en esta funcion (el cual será nulo si no hubo error)
        return mensaje;
}
/* Validar numeros para gastos, importes, etc (DETALLES)*/
function validarPositividadYNulidad(msjError,id,nombreReferencial){
    
    msjError = validarPositividad(msjError,id,nombreReferencial);
    msjError = validarNulidad(msjError,id,nombreReferencial);

    return msjError;
}
function validarPositividad(msjError,id,nombreReferencial){
    mensaje ="";

    cantidad = document.getElementById(id).value;
    cantidad=parseFloat(cantidad);
    //console.log(cantidad);
    if(cantidad<0){
        ponerEnRojo(id);   
        mensaje="El valor del campo '"+nombreReferencial+"' debe ser positivo.";
    }
    if(cantidad==0){
        ponerEnRojo(id);
        mensaje= "El valor del campo '"+nombreReferencial+"' debe ser mayor a 0.";
    }

    if(msjError!="") //significa que ya hay un error en el flujo de validaciones
        return msjError; 
    else //si no hay ningun error, retorna el mensaje generado en esta funcion (el cual será nulo si no hubo error)
        return mensaje;
}

/* Valida si el contenido del id tiene nombres o apellidos validos */
function validarRegExpNombres(msjError,id){
    mensaje = "";

    contenido = document.getElementById(id).value;
    if (!expRegNombres.test(contenido)){
        ponerEnRojo(id);
        
        mensaje = "Ingrese nombres válidos";
        
    }

    if(msjError!="") //significa que ya hay un error en el flujo de validaciones
        return msjError; 
    else //si no hay ningun error, retorna el mensaje generado en esta funcion (el cual será nulo si no hubo error)
        return mensaje;
}

function validarRegExpApellidos(msjError,id){
    mensaje = "";
    contenido = document.getElementById(id).value;
    if (!expRegNombres.test(contenido)){
        ponerEnRojo(id);
         
        mensaje = "Ingrese apellidos válidos";
        
    }

    if(msjError!="") //significa que ya hay un error en el flujo de validaciones
        return msjError; 
    else //si no hay ningun error, retorna el mensaje generado en esta funcion (el cual será nulo si no hubo error)
        return mensaje;
}

function validarContenidosIguales(msjError,id1,id2,mensajeAMostrar){
    mensaje = "";
    contenido1 = document.getElementById(id1).value;
    contenido2 = document.getElementById(id2).value;
    
    if(contenido1 != contenido2){
        ponerEnRojo(id1);
        ponerEnRojo(id2);
        mensaje = mensajeAMostrar;
    }

    if(msjError!="") //significa que ya hay un error en el flujo de validaciones
        return msjError; 
    else //si no hay ningun error, retorna el mensaje generado en esta funcion (el cual será nulo si no hubo error)
        return mensaje;
}

function validarTamañoMaximoYNulidad(msjError,id,tamañoMax,nombreReferencial){
    
    msjError = validarTamañoMaximo(msjError,id,tamañoMax,nombreReferencial);
    msjError = validarNulidad(msjError,id,nombreReferencial);

    return msjError;
}

/* Validar tamaño   */
function validarTamañoMaximo(msjError,id,tamañoMax,nombreReferencial){

    mensaje ="";

    
    contenido = document.getElementById(id).value;
    tamañoActual = contenido.length;
    if(tamañoActual > tamañoMax){
        ponerEnRojo(id);
         
        mensaje = "La longitud máxima del campo '" + nombreReferencial + "' es de " 
                + tamañoMax + " caracteres. El tamaño actual es de " + tamañoActual + " caracteres.";
    }

    if(msjError!="") //significa que ya hay un error en el flujo de validaciones
        return msjError; 
    else //si no hay ningun error, retorna el mensaje generado en esta funcion (el cual será nulo si no hubo error)
        return mensaje;

}

function validarNulidad(msjError,id,nombreReferencial){
    mensaje ="";

    contenido = document.getElementById(id).value;
    if(contenido == ""){
        ponerEnRojo(id);
        mensaje = "Por favor ingrese el campo '" + nombreReferencial + "' . ";
    }

    if(msjError!="") //significa que ya hay un error en el flujo de validaciones
        return msjError; 
    else //si no hay ningun error, retorna el mensaje generado en esta funcion (el cual será nulo si no hubo error)
        return mensaje;
}


function validarTamañoExacto(msjError,id,tamañoExacto,nombreReferencial){
    mensaje = "";

    contenido = document.getElementById(id).value;
    tamañoActual = contenido.length;
    if(tamañoActual != tamañoExacto){
        ponerEnRojo(id);
        mensaje = "La longitud del campo '" + nombreReferencial + "' debe ser de " 
                + tamañoExacto + " caracteres. El tamaño actual es de " + tamañoActual + " caracteres.";
    }


    if(msjError!="") //significa que ya hay un error en el flujo de validaciones
        return msjError; 
    else //si no hay ningun error, retorna el mensaje generado en esta funcion (el cual será nulo si no hubo error)
        return mensaje;

}

function validarTamañoMinimo(msjError,id,tamañoMinimo,nombreReferencial){
    mensaje = "";

    contenido = document.getElementById(id).value;
    tamañoActual = contenido.length;
    if(tamañoActual < tamañoMinimo){
        ponerEnRojo(id);
        mensaje = "La longitud mínima del campo '" + nombreReferencial + "' es de " 
                + tamañoMax + " caracteres. El tamaño actual es de " + tamañoActual + " caracteres.";
    }

    if(msjError!="") //significa que ya hay un error en el flujo de validaciones
        return msjError; 
    else //si no hay ningun error, retorna el mensaje generado en esta funcion (el cual será nulo si no hubo error)
        return mensaje;
}


/* Validar combo box (select) para que se haya escogido uno  */
function validarSelect(msjError,id,indiceSeleccionNula,nombreReferencial){
    mensaje = "";

    indiceSeleccionado = document.getElementById(id).value;
    if(indiceSeleccionado == indiceSeleccionNula){
        ponerEnRojo(id);    
        mensaje = "El campo '" + nombreReferencial + "' debe ser seleccionado." ;
    }
        
    if(msjError!="") //significa que ya hay un error en el flujo de validaciones
        return msjError; 
    else //si no hay ningun error, retorna el mensaje generado en esta funcion (el cual será nulo si no hubo error)
        return mensaje;
}


/*  */
function validarCodigoPresupuestal(msjError,id, codPresupProyecto,nombreReferencial){
    mensaje = "";

    codigoPresupuestal = document.getElementById(id).value;
    if(  !codigoPresupuestal.startsWith(codPresupProyecto) ){
        ponerEnRojo(id);
        mensaje = "El "+nombreReferencial+" debe coincidir con el código presupuestal del proyecto [" + codPresupProyecto + "]. ";
    }
   
    if(msjError!="") //significa que ya hay un error en el flujo de validaciones
        return msjError; 
    else //si no hay ningun error, retorna el mensaje generado en esta funcion (el cual será nulo si no hubo error)
        return mensaje;

}



</script>