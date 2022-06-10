<?php

class Instituiçao{

    public $ID = null;
    public $Nome = null;
    public $Descricao = null;
    // public $ImgFolder = null;
    public $Distancia = 0;
    public $Endereço = null;

    public function __construct($ID = null){
        if(!is_null($ID))
            return $this->getInstituicao($ID);
    }

    public function getInstituicao($ID = null){
        if(is_null($ID))
            return null;

        $Sql = 'SELECT id, nome, descricao, endereco FROM instituicao WHERE id = :id';
        $Con = new Database('icourse');
        $Statement = $Con->prepare($Sql);
        $Statement->bindValue(':id', $ID);
        $Resultado = $Statement->execute();
        if(!$Resultado)
            return null;

        $Rows = $Statement->fetchAll();
        if(count($Rows) > 0){
            $this->ID = $Rows[0]['id'];
            $this->Nome = $Rows[0]['nome'];
            $this->Descricao = $Rows[0]['descricao'];
            $this->Endereço = $Rows[0]['endereco'];
            return $this;
        }

        return null;
    }
    
}