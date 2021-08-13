<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Debug extends Model
{
  
    //ESTE NO ES UN MODELO, ES UNA CLASE PARA PRINTEAR MSJS BACANES EN LA CONSOLA
    
    public static function rellernarCerosIzq($numero, $nDigitos){
        return str_pad($numero, $nDigitos, "0", STR_PAD_LEFT);
 
    }


    
    public static function  stringInsert($str,$insertstr,$pos){
        $str = mb_substr($str, 0, $pos) . $insertstr . mb_substr($str, $pos);
        return $str;
    }  

    public static function mensajeError($claseDondeOcurrio, $mensajeDeError){
        error_log('********************************************
        
            HA OCURRIDO UN ERROR EN : '.$claseDondeOcurrio.'
        
            MENSAJE DE ERROR:

            '.$mensajeDeError.'


        ***************************************************************
        ');

    } 
    
    public static function mensajeSimple($msj){
        error_log('********************************************
            MENSAJE SIMPLE:

            '.$msj.'


        ***************************************************************
        ');

    } 

    public static function imprimir($msj){
        error_log($msj);

    }
    
    public static function imprimirVector($vector){
        $cadena ="";
        foreach ($vector as $value) {
            $cadena = $cadena.",".json_encode($value);
        }
        error_log($cadena);
    }

    //retorna una cadena tipo _DCAXCEXCBECBXXADAEEEDBADBCAACDDDDXDXAXXAEEDABCAECAXBECCECCEAEXXAXXXBCCCDCEBEDADXEEXBAEXDEADCBABBBCEA
    //EL _ inicial es para que cada pregunta  corresponda a su ubicacion en el vector [1] es la 1ra pregunta 
    public static function generarRespuestasAleatorias() {
        $length = 100;
        $characters = 'ABCDEX';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return "_".$randomString;
    } 

}
