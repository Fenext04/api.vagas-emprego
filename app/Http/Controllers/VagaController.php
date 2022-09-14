<?php

namespace App\Http\Controllers;

use App\Models\Vaga;
use Illuminate\Http\Request;

class VagaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vagas = Vaga::all();


        return response()->json(["vagas" => $vagas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regras = [
            "titulo" => "required|unique:vagas,titulo|min:8",
            "descricao" => "required|min:8",
            "salario" => "required",
            "tipo_id" => "required|exists:tipos,id",
            "modalidade_id" => "required|exists:modalidades,id",
        ];

        $feedback = [
            "titulo.required" => "Titulo não pode ser vazio",
            "descricao.required" => "Descrição não pode ser vazia",
            "salario.required" => "Salário não pode ser vazio",
            "tipo_id.required" => "Insira um tipo",
            "modalidade_id.required" => "Modalidade não pode ser vazio",
            "titulo.min" => "O titulo deve possuir no mínimo 8 caracteres",
            "descricao.min" => "O titulo deve possuir no mínimo 8 caracteres",
            "titulo.unique" => "Insira um título único",
            "tipo_id.exists" => "Insira um tipo de vaga existente.",
            "modalidade_id.exists" => "Insira uma modalidade existente"
        ];


        $request->validate($regras,$feedback);

        Vaga::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vaga  $vaga
     * @return \Illuminate\Http\Response
     */
    public function show(Vaga $vaga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vaga  $vaga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vaga $vaga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vaga  $vaga
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vaga $vaga)
    {
        //
    }

    public function mudarStatusFavorito(Vaga $vaga){

        $vaga->favorita = !$vaga->favorita;
        $vaga->save();
        return response()->json($vaga);
    }

    public function vagasFavoritas(){

        $vagas = Vaga::where("favorita", true)->get();

        return response()->json($vagas);
    }
}
