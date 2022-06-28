<?php

class Log {
	
    //Onde os logs vão ser guadados
	public $Folder = __DIR__ . '/../logs/';

    static function doLog($Conteudo, $FolderName, $MostrarBacktrace = 0){
        $Conteudo = /*'[' . date('d M Y H:i:s', time()) . ' UTC] - Content: <br>' .*/ var_export($Conteudo ?? null, 1) . PHP_EOL. PHP_EOL;
        if($MostrarBacktrace){
            $Conteudo .= '1. REQUEST:' . var_export($_REQUEST ?? null, 1) . PHP_EOL .PHP_EOL;
            $Conteudo .= '2. SESSION:' . var_export($_SESSION ?? null, 1) . PHP_EOL .PHP_EOL;
            $Conteudo .= '3. POST:' . var_export($_POST ?? null, 1) . PHP_EOL .PHP_EOL;
            $Conteudo .= '4. GET:' . var_export($_GET ?? null, 1) . PHP_EOL . PHP_EOL;
            $Conteudo .= 'SERVER_NAME:' . var_export($_SERVER['SERVER_NAME'] ?? null, 1) . ' / HTTP_HOST: ' . var_export($_SERVER['HTTP_HOST'] ?? null, 1) . PHP_EOL .PHP_EOL;
            $Conteudo .= 'HTTP_USER_AGENT:' . var_export($_SERVER['HTTP_USER_AGENT'] ?? null, 1) . PHP_EOL . PHP_EOL;
            $Conteudo .= 'REQUEST_TIME:' . var_export(date('d M Y H:i:s', $_SERVER['REQUEST_TIME'] ?? null), 1) . ' UTC' . PHP_EOL;
        }
        $Conteudo .= '<br>_____________________________________________________________________________________________________________________________<br><br>';
        $Folder = Log::$Folder . date('d-m-Y') . '/' . $FolderName . '.html';
        
        if (!file_exists(Log::$Folder . date('d-m-Y')))
            mkdir(Log::$Folder . date('d-m-Y'), 0777, true);
        
        file_put_contents($Folder, $Conteudo, FILE_APPEND);
    }
	
}