<?php

namespace App\Http\Controllers\api;

use App\Models\Manutencoes;
use App\Models\Veiculos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Services\PayUService\Exception;
use App\Http\Controllers\Controller;

class ManutencaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
       
        $manutencoes = Manutencoes::join('veiculos', 'veiculos.id', 'manutencoes.id_veiculo')->get();
            
        return $manutencoes;
       

    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $manutencao = Manutencoes::create($request->all());
        return $manutencao;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $manutencao = Manutencoes::where('id', $id)->get();
        return $manutencao;
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
        {
            $manutencao = Manutencoes::where('id', $id);
            $manutencao->update($request->all());
            
           return [
            'msg' => 'Atualizado com sucesso'
        ];
        }             
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $manutencao = Manutencoes::where('id', $id);
        $manutencao->delete();
        return [
            'msg' => 'Manutenção deletada com sucesso'
        ];
    }

    
    
}
