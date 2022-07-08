<?php

class Curso{

    public $ID = null;
    public $Nome = null;
    public $Descricao = null;
    public $Tags = [];
    public $IDInstituicao = null;
    public $DataCriacao = null;

    public function __construct($ID = null){
        if(!is_null($ID))
            return $this->getCurso($ID);
    }

    public function getCurso($ID = null){
        if(is_null($ID))
            return null;

        $Sql = 'SELECT id, nome, descricao, tags, id_instituicao FROM cursos WHERE id = :id';
        $Con = new Database('icourse');
        $Statement = $Con->prepare($Sql);
        $Statement->bindValue(':id', $ID);
        $Resultado = $Statement->execute();
        if(!$Resultado)
            return null;

        $Row = $Statement->fetch();
        if(count($Row) > 0){
            $this->ID = $Row['id'];
            $this->Nome = $Row['nome'];
            $this->Descricao = $Row['descricao'];
            $this->Tags = $Row['tags'];
            $this->IDInstituicao = $Row['id_instituicao'];
            return $this;
        }

        return null;
    }

    public function getCursos($Filtro = []){
        $Retorno = [];

        if(count($Filtro) == 0){
            $Filtro['ativo'] = 1;
        }

        $Sql = 'SELECT id, nome, descricao, tags, id_instituicao FROM cursos WHERE';

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