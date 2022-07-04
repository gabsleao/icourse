<?php

class Log {
	
    //Onde os logs vão ser guadados
	static $Folder = __DIR__ . '/../logs/';

    static function doLog($Conteudo, $FolderName, $MostrarBacktrace = 0){
        $Conteudo = var_export($Conteudo ?? null, 1) . '<br>'. '<br>';
        if($MostrarBacktrace){
            $Conteudo .= '<b>1. REQUEST: </b>' . var_export($_REQUEST ?? null, 1) . '<br><br>';
            $Conteudo .= '<b>2. SESSION: </b>' . var_export($_SESSION ?? null, 1) . '<br><br>';
            $Conteudo .= '<b>3. POST: </b>' . var_export($_POST ?? null, 1) . '<br><br>';
            $Conteudo .= '<b>4. GET: </b>' . var_export($_GET ?? null, 1) . '<br><br>';
            $Conteudo .= '<b>SERVER_NAME: </b>' . var_export($_SERVER['SERVER_NAME'] ?? null, 1) . '<b> / HTTP_HOST: </b>' . var_export($_SERVER['HTTP_HOST'] ?? null, 1) .'<br><br>';
            $Conteudo .= '<b>HTTP_USER_AGENT: </b>' . var_export($_SERVER['HTTP_USER_AGENT'] ?? null, 1) . '<br><br>';
            $Conteudo .= '<b>REQUEST_TIME: </b>' . var_export(date('d M Y H:i:s', $_SERVER['REQUEST_TIME'] ?? null), 1) . ' UTC' .  '<br>';
        }
        $Conteudo .= '<br>_____________________________________________________________________________________________________________________________<br><br>';
        $Folder = Log::$Folder . date('d-m-Y') . '/' . $FolderName . '.html';

        if (!file_exists(Log::$Folder . date('d-m-Y')))
            mkdir(Log::$Folder . date('d-m-Y'), 0777, true);
        
        file_put_contents($Folder, $Conteudo, FILE_APPEND);
    }
	
}