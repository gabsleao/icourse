<?php

class Controller{

    function __construct($Data = null){
        if(is_null($Data)){
            Log::doLog('[1]. ' . var_export($Data, 1), 'Exception_Controller', 1);
            throw new Exception("Whoops! Data não setada");
        }

        if(!isset($Data['operacao'])){
            Log::doLog('[2]. ' . var_export($Data, 1), 'Exception_Controller', 1);
            throw new Exception("Whoops! operacao não setada");
        }

        switch($Data['operacao']){
            case 'registrar_usuario':
                $ClasseUsuario = new Usuario();
                return $ClasseUsuario->registrarUsuario($Data);
            break;

            case 'salvar_instituicao':
                $ClasseInstituicao = new Instituiçao();

                if(!isset($Data['nome'])){
                    throw new Exception("Whoops! Nome não setado corretamente.");
                }

                if(!isset($Data['descricao'])){
                    throw new Exception("Whoops! Descricao não setada corretamente.");
                }

                if(!isset($Data['tags'])){
                    throw new Exception("Whoops! Tags não setadas corretamente.");
                }

                if(!isset($Data['endereco'])){
                    throw new Exception("Whoops! Endereco não setado corretamente.");
                }

                if(!isset($Data['cep'])){
                    throw new Exception("Whoops! CEP não setado corretamente.");
                }

                if(!isset($Data['estado'])){
                    throw new Exception("Whoops! Estado não setado corretamente.");
                }

                if(!isset($Data['cidade'])){
                    throw new Exception("Whoops! Cidade não setado corretamente.");
                }

                $ClasseInstituicao->Nome = $Data['nome'];
                $ClasseInstituicao->Descricao = $Data['descricao'];
                $ClasseInstituicao->Tags = $Data['tags'];

                $Endereco['endereco'] = $Data['endereco'];
                $Endereco['cidade'] = $Data['cidade'];
                $Endereco['estado'] = $Data['estado'];
                $Endereco['cep'] = $Data['cep'];
                $ClasseInstituicao->Endereço = json_encode($Endereco);

                return $ClasseInstituicao->salvarInstituicao();
            break;

            default:
                break;
        }
    }
}