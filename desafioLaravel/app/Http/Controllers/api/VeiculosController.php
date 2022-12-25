<?php

namespace App\Http\Controllers\api;

use App\Models\Veiculos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Services\PayUService\Exception;
use App\Http\Controllers\Controller;

class VeiculosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
       
        $veiculo = Veiculos::all();
            
        
       return $veiculo;
       

    }

    public function create()
    {
        dd('deu certo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //$telefone = ['(', ')', '-', ' '];
        //$telefones = ['', '', '', ''];
        //$x = str_replace($telefone, $telefones, $request->telefone);
        
        //dd($x);
        Veiculos::create($request->all());
        
        return [
            'msg' => 'Cadastrado com sucesso'
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        $veiculo = Veiculos::where('id', $id)->get();
        return $veiculo;
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $veiculo = Veiculos::where('id', $id);
        $veiculo->update($request->all());
        //print_r($request->all());
        
       // print_r($marca->getAttributes());
       return [
        'msg' => 'Atualizado com sucesso'
    ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $veiculo = Veiculos::where('id', $id);
        $veiculo->delete();
        return [
            'msg' => 'Veículo deletado com sucesso'
        ];
    }
    
    
}
