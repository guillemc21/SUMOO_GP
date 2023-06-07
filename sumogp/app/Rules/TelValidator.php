<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class TelValidator implements Rule
{
    public function passes($attribute, $value)
    {
       
        // Eliminar posibles espacios en blanco al inicio o final del valor
        $tel = trim($value);
        
        // Verificar que el DNI tenga 8 dígitos
        if (strlen($tel) !== 9) {
            return false;
        }
        
        return true;
    }

    public function message()
    {
        return 'El campo :attribute no es un número de teléfono válido.';
    }
}
