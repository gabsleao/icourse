<?php

class Controller{

    public function controller($Data){
        if(is_null($Data)){
            Log::doLog('1. ' . var_export($Data, 1), 'Exception_Controller', 1);
            throw new Exception("Whoops! Data não setada");
        }

        if(!isset($Data['operacao'])){
            Log::doLog('2. ' . var_export($Data, 1), 'Exception_Controller', 1);
            throw new Exception("Whoops! operacao não setada");
        }

        switch($Data['operacao']){
            case 'registrar_usuario':
                $ClasseUsuario = new Usuario();
                return $ClasseUsuario->registrarUsuario($Data);
                break;

            default:
                break;
        }
    }
}