<?php

class Session{

    public function __construct(){
        if(!$this->sessionAtiva()){
            $this->iniciarSession();
        }
    }

    public function iniciarSession(){
        session_start();
    }

    public function destruirSession(){
        session_start();
        $_SESSION = array();

        // Se é preciso matar a sessão, então os cookies de sessão também devem ser apagados.
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
        }

        session_destroy();
    }

    public function sessionAtiva(){
        if(isset($_SESSION['iduser'])){
            return true;
        }

        if(session_status() !== PHP_SESSION_NONE){
            return true;
        }

        return false;
    }

    public function setSession($User = null){
        if(is_null($User)){
            $this->destruirSession();
            return;
        }

        if(isset($User['id'])){
            if(!$this->sessionAtiva()){
                $this->iniciarSession();
                $_SESSION['iduser'] = $User['id'];
                $_SESSION['nome'] = $User['nome'];
                $_SESSION['tipo'] = $User['tipo'];
                $_SESSION['email'] = $User['email'];
            }else{
                $this->destruirSession();
                $this->iniciarSession();
                $_SESSION['iduser'] = $User['id'];
                $_SESSION['nome'] = $User['nome'];
                $_SESSION['tipo'] = $User['tipo'];
                $_SESSION['email'] = $User['email'];
            }
        }
    }
}