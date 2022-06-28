<?php

class Email{
    private $email;

    public function __construct($email = null){
        if(!is_null($email)){
            $this->verificarSeEmailValido($email);
            $this->email = $email;
        }
    }

    public function verificarSeEmailValido($email){
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException(sprintf('"%s" não é um email válido ):', $email));
        }
        return true;
    }

    public function verificarSeEmailExisteNoBanco($email){
        if(!$this->verificarSeEmailValido($email)){
            return false;
        }

        //TO-DO: Fazer integração com o banco
        return true;
    }
}