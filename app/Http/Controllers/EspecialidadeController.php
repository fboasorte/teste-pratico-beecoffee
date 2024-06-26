<?php

namespace App\Http\Controllers;

use App\Especialidade;
use App\Http\Requests\EspecialidadeRequest;

class EspecialidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $especialidades = Especialidade::all();

        return view('especialidades.index', compact('especialidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('especialidades.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  EspecialidadeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EspecialidadeRequest $request)
    {
        $especialidade = new Especialidade([
            'nome' => $request->nome,
        ]);
        $especialidade->save();
        return redirect('/especialidades')->with('success', 'Cadastro realizado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $especialidade = Especialidade::findOrFail($id);
        return view('especialidades.show', compact('especialidade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $especialidade = Especialidade::findOrFail($id);
        return view('especialidades.edit', compact('especialidade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EspecialidadeRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EspecialidadeRequest $request, $id)
    {
        $especialidade = Especialidade::findOrFail($id);

        $especialidade->update([
            'nome' => $request->nome,
        ]);

        $especialidade->save();
        return redirect('/especialidades')->with('success', 'Atualização realizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $especialidade = Especialidade::findOrFail($id);

        $especialidade->delete();

        return back()->with('success', 'Registro excluido com sucesso');
    
    }
}
