<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use League\CommonMark\Util\Configuration;

class Configuracion extends Model
{


    const estamosEnMantenimiento = false;
    
    
    const enProduccion = true;
    
    const mostrarInputsEscondidos = false;
    //define si se muestran o no algunos inputs que usamos como Hidden para almacenar variables
    


    const pesoMaximoArchivoMB = 10;

    const direccionDelMensaje = false; 
    /* Define a donde se enviará el mensaje de error generado SÉ
        TRUE : se envia al grupo de produccion 
        false: se envia al grupo de pruebas
    
    */
    
    //https://dniruc.apisperu.com/api/v1/ruc/
    const tokenParaAPISunat = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6Im1hcmFjc29mdEBnbWFpbC5jb20ifQ.n5ullrY3C430Q8IHYmxk38bidOi7sLDuB2n_ULc63F0";
  
    public static function inyectar(){
        return !Configuracion::enProduccion;
    }

    public static function estaEnProduccion(){

        return Configuracion::enProduccion ? "SI ": "NO";

    }
    public static function getInputTextOHidden(){
        if(!Configuracion::mostrarInputsEscondidos)
            return "hidden";
    
        return "text";

    } 

    public static function getDisplayNone(){
        if(!Configuracion::mostrarInputsEscondidos)
            return "display: none";

    }
    
 
    
    const mensajeErrorEstandar = "Ha ocurrido un error inesperado. Contacte con el administrador del sistema brindándole el Código de error ";
    public static function getMensajeError($codError){

        //pasamos el error a formato con 4 cifras
        $formateado = $codError;
        return Configuracion::mensajeErrorEstandar.$formateado." .";

    }


}
