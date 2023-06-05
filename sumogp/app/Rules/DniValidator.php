<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class DniValidator implements Rule
{
    public function passes($attribute, $value)
    {
       
        // Eliminar posibles espacios en blanco al inicio o final del valor
        $dni = trim($value);
        
        // Verificar que el DNI tenga 8 dígitos
        if (strlen($dni) !== 9) {
            dd(strlen($dni));
            return false;
        }
        
        // Verificar que el DNI contenga solo dígitos
        if (!ctype_digit(substr($dni, -9, 8))) {
            return false;
        }
        
        // Obtener la letra del DNI (último dígito)
        $letra = substr($dni, -1);
        
        // Obtener los 7 primeros dígitos del DNI
        $numeros = substr($dni, 0, 8);
        
        // Calcular la letra correspondiente a los números
        $letraCalculada = 'TRWAGMYFPDXBNJZSQVHLCKE'[$numeros % 23];
        
        // Verificar que la letra del DNI coincida con la letra calculada
        if (strtoupper($letra) !== $letraCalculada) {
            return false;
        }
        
        return true;
    }

    public function message()
    {
        return 'El campo :attribute no es un DNI válido.';
    }
}
