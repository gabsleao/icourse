<?php
class Usuario{
    public $ID;
    public $Nome;
    public $Email;
    public $Senha;
    public $Tipo;
    public $Ativo;

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
        if(!$Resultado){
            Log::doLog('SQL: ' . var_export($Sql, 1) . '<br>Resultado: ' . var_export($Resultado, 1), 'erro_registrarUsuario');
            throw new Exception("Whoops! Algo deu errado, tente novamente.");
        }
    }
}