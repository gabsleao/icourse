<?php
class Usuario{
    public $id;
    public $nome;
    public $email;
    public $senha;
    public $tipo;

    public function _construct($ID = null){
        if(!is_null($ID)){
            $Usuario = $this->getUsuario($ID);
            return $Usuario;
        }
    }

    public function registrarUsuario($Data = null){
        if(is_null($Data)){
            return;
        }

        if(!isset($Data['nome'])){
            throw new Exception("Nome nao setado!");
        }

        if(!isset($Data['email'])){
            throw new Exception("Email nao setado!");
        }

        if(!isset($Data['senha1'])){
            throw new Exception("Senha nao setado!");
        }

        

        $Sql = 'INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)';
        $Con = new Database('icourse');
        $Statement = $Con->prepare($Sql);
        $Statement->bindValue(':nome', $Data['nome']);
        $Statement->bindValue(':email', $Data['email']);
        $Statement->bindValue(':senha', $Data['senha']);
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
    }
}