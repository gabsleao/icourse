<?php
require_once __DIR__.'/../config/autoload.php';

if(!isset($_POST['operacao']))
    throw new Exception('Whoops! Operação não setada.');

switch($_POST['operacao']){
    case 'salvar_instituicao':
    case 'registrar_usuario':
        $Resposta = new Controller($_POST);
        echo json_encode(['resposta' => $Resposta]);
    break;

    default:
        $Response = ['status' => 404, 'message' => 'Operação não encontrada!'];
        echo json_encode(['response' => $Response]);
    break;
}