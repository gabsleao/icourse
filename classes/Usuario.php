<?php
class Usuario{
    public $ID = null;
    public $Nome = null;
    public $Email = null;
    public $Senha = null;
    public $Tipo = null;
    public $Ativo = null;

    public function _construct($ID = null){
        if(!is_null($ID)){
            $Usuario = $this->getUsuario($ID);
            return $Usuario;
        }
    }

    public function logarUsuario($Data = null){
        if(is_null($Data)){
            return "Whoops! Algo deu errado, tente novamente";
        }

        if(!isset($Data['email'])){
            throw new Exception("Email nao setado.");
        }

        if(!isset($Data['senha'])){
            throw new Exception("Senha nao setada.");
        }

        if(!$this->emailValido($Data['email'])){
            return "Email não é valido.";
        }

        if(!$this->emailJaCadastrado($Data['email'])){
            return "Esse email não está cadastrado.";
        }

        $Sql = 'SELECT id, nome, AES_DECRYPT(email, "' . Encrypt::$KEY . '") as email, tipo, ativo FROM usuarios WHERE email = AES_ENCRYPT(:email, "' . Encrypt::$KEY . '") AND senha = AES_ENCRYPT(:senha, "' . Encrypt::$KEY . '") AND ativo = 1';
        $Con = new Database('icourse');
        $Statement = $Con->prepare($Sql);
        $Statement->bindValue(':email', $Data['email']);
        $Statement->bindValue(':senha', $Data['senha']);
        $Resultado = $Statement->execute();
        if(!$Resultado){
            return "Whoops, algo deu errado. Tente novamente";
        }

        if($Statement->rowCount() == 0){
            return "Por favor, cheque o email ou a senha novamente.";
        }

        $Row = $Statement->fetch();
        Log::doLog(var_export($Row, 1), 'Row');
        if(isset($Row['id'])){
            $Session = new Session();
            $Session->setSession($Row);
        }
        return "Usuário logado com sucesso!";
    }

    function emailJaCadastrado($Email){
        if(!isset($Email)){
            return;
        }

        $Sql = 'SELECT email FROM usuarios WHERE email = AES_ENCRYPT(:email, "' . Encrypt::$KEY . '")';
        $Con = new Database('icourse');
        $Statement = $Con->prepare($Sql);
        $Statement->bindValue(':email', $Email);
        $Resultado = $Statement->execute();
        if(!$Resultado){
            return false;
        }

        if($Statement->rowCount() > 0){
            return true;
        }

        return false;

    }

    public function emailValido($Email){
        if(!isset($Email))
            return false;

        if(filter_var($Email, FILTER_VALIDATE_EMAIL)){
            return true;
        }

        return false;
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

        if($this->emailJaCadastrado($Data['email'])){
            return "Email já cadastrado.";
        }

        if(!$this->emailValido($Data['email'])){
            return "Email não é valido.";
        }
        

        $Sql = 'INSERT INTO usuarios (nome, email, senha) VALUES (:nome, AES_ENCRYPT(:email, "' . Encrypt::$KEY . '"), AES_ENCRYPT(:senha, "' . Encrypt::$KEY . '"))';
        $Con = new Database('icourse');
        $Statement = $Con->prepare($Sql);
        $Statement->bindValue(':nome', $Data['nome']);
        $Statement->bindValue(':email', $Data['email']);
        $Statement->bindValue(':senha', $Data['senha1']);
        $Resultado = $Statement->execute();
        if(!$Resultado){
            Log::doLog('SQL: ' . var_export($Sql, 1) . '<br>Resultado: ' . var_export($Resultado, 1), 'erro_registrarUsuario');
            throw new Exception("Whoops! Algo deu errado, tente novamente.");
        }
        return "Usuário criado com sucesso!";
    }
}