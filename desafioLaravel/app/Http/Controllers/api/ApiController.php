<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\controller;
use App\Models\Veiculos;
class ApiController extends Controller
{
    public function searchByPlaca($placa)
    {
       
        $veiculo = Veiculos::where('placa', $placa)->get();
        return $veiculo;
    }

    
}
