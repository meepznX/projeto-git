<?php 
session_start();

spl_autoload_register(function($cLassName)
{
    $diretorios=["db","services"];

    foreach($diretorios as $pasta) {
        $classProcurada=__DIR__ . "/" . $pasta . "/" . $cLassName . "php";

        if (file_exists($classProcurada)) {

            require_once $classProcurada;
            return;
        }
    }
});