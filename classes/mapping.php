<?php
require_once __DIR__.'/../config/autoload.php';

if(!isset($_POST['operacao']))
    throw new Exception('Whoops! Operação não setada.');

switch($_POST['operacao']){
    case 'salvar_instituicao':
    case 'registrar_usuario':
    case 'logar_usuario':
    case 'logout_usuario':
        $Controller = new Controller();
        $Resposta = $Controller->operation($_POST);
        
        echo json_encode(['resposta' => $Resposta]);
    break;

    default:
        $Resposta = 'Operação não encontrada!';
        echo json_encode(['resposta' => $Resposta]);
    break;
}