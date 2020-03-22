<?php

namespace App\Rules;

use App\Categoria;
use Illuminate\Contracts\Validation\Rule;

class soloUnHijo implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return count(Categoria::ancestorsOf($value)) < 1;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'No se puede generar mas subcategorias';
    }
}
