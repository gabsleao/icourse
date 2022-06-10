<?php
$Dir = __DIR__ . '/../classes/';

//Load Classes padrão
//Pegar nome dos files dentro do folder classes/ e dar include
$Classes = array_diff(scandir($Dir), array('.', '..'));  
includeClasses($Classes, $Dir);


function existClass($Class, $Dir){
    //Only include .php classes (not folders)
    if(file_exists($Dir . $Class) && strpos($Class, '.php'))
        return true;

    return false;
}

function includeClasses($Classes, $Dir){
    foreach($Classes as $Class){
        if(existClass($Class, $Dir))
            include $Dir . $Class;
    }
}