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

    protected static function NumericCPF($texto)
    {
        // Usa uma expressão regular para substituir todos os caracteres não numéricos por uma string vazia
        return preg_replace('/[^0-9]/', '', $texto);
    }
    protected static function notNumber($texto) {
        // Use uma expressão regular para remover todos os caracteres não numéricos
        $textoLimpo = preg_replace('/[^0-9]/', '', $texto);
    
        return substr($textoLimpo, 0, 1);
    }
}
