<?php

namespace App\Controller;
use Exception;

abstract class Controller 
{
/**
     * Grava a mensagem de erro de uma exceção em um arquivo de texto.
     */
    protected static function LogError(Exception $e)
    {
        $f = fopen("erros.txt", "w");
        fwrite($f, $e->getTraceAsString());
    }
}