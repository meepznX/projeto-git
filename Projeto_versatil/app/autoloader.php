<?php 
session_start();

spl_autoload_register(function($className)
{
    $diretorios=["db","services"];

    foreach($diretorios as $pasta) {
        $classProcurada=__DIR__ . "/" . $pasta . "/" . $className . "php";

        if (file_exists($classProcurada)) {

            require_once $classProcurada;
            return;
        }
    }
});