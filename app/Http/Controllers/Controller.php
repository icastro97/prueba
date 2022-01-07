<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function FunctionName()
    {
        $usuarios = array (
            "nombre" => "Alex",
            "apellido" => "Escobar",
            "telefono" => "123456789"
        );
        $usuarios[] = array (
            "nombre" => "Juan",
            "apellido" => "Gomez",
            "telefono" => "123456789"
        );
        $usuarios[] = array (
            "nombre" => "Andres",
            "apellido" => "Marin",
            "telefono" => "123456789"
        );
        $usuarios[] = array (
            "nombre" => "Angie",
            "apellido" => "Rivera",
            "telefono" => "123456789"
        );

        foreach ($usuarios as $usuario){
            echo $usuario['nombre'] + ' ' + $usuario['apellido'] + ' ' + $usuario['telefono'];
        }
        
    }

}
