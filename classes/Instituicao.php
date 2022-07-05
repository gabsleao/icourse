<?php

class Instituiçao{

    public $ID = null;
    public $Nome = null;
    public $Descricao = null;
    // public $ImgFolder = null;
    public $Distancia = 0;
    public $Endereço = null;
    public $Tags = null;

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

    public function getInstituicoes($Filtro = []){
        $Retorno = [];

        if(count($Filtro) == 0){
            $Filtro['ativo'] = 1;
        }

        $Sql = 'SELECT id, nome, descricao, tags, ativo, data_criado, data_deletado FROM instituicao WHERE';

        if(isset($Filtro['ativo'])){
            $Sql .= ' ativo = ' . $Filtro['ativo'];
        }

        $Con = new Database('icourse');
        $Statement = $Con->prepare($Sql);
        $Resultado = $Statement->execute();
        if(!$Resultado)
            return [];

        $Rows = $Statement->fetchAll();
        foreach($Rows as $Row){
            $Retorno[] = $Row;
        }

        return $Retorno;
    }

    public function salvarInstituicao(){
        $Sql = 'INSERT INTO instituicao (nome, descricao, endereco, tags, data_criado) VALUES (:nome, :descricao, :endereco, :tags, :data_criado)
                ON DUPLICATE KEY UPDATE
                nome = :nome,
                descricao = :descricao,
                endereco = :endereco,
                tags = :tags';
        $Con = new Database('icourse');
        $Statement = $Con->prepare($Sql);
        $Statement->bindValue(':nome', $this->Nome);
        $Statement->bindValue(':descricao', $this->Descricao);
        $Statement->bindValue(':endereco', $this->Endereço);
        $Statement->bindValue(':tags', $this->Tags);
        $Statement->bindValue(':data_criado', time());
        $Resultado = $Statement->execute();
        if(!$Resultado)
            return null;

        $Resposta = ['resposta' => 'YAY! Instituição salva com sucesso!'];
        return $Resposta;
    }
    
}