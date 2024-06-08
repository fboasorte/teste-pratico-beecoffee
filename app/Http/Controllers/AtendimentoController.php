<?php

namespace App\Http\Controllers;

use App\Atendimento;
use App\Http\Requests\AtendimentoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AtendimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $atendimentos = Atendimento::all();
        return view('atendimentos.index', compact('atendimentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('atendimentos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AtendimentoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AtendimentoRequest $request)
    {
        $atendimento = new Atendimento([
            'data_atendimento' => $request->data_atendimento,
            'hora_inicio' => $request->hora_inicio,
            'hora_fim' => $request->hora_fim,
            'medico_id' => $request->medico_id,
            'paciente_id' => $request->paciente_id,
        ]);

        $atendimento->save();

        return redirect('atendimentos')->with('success', 'Cadastro realizado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $atendimento = Atendimento::findOrFail($id);
        return view('atendimentos.show', compact('atendimento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $atendimento = Atendimento::findOrFail($id);
        return view('atendimentos.edit', compact('atendimento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  AtendimentoRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AtendimentoRequest $request, $id)
    {
        dd($request);
        $atendimento = Atendimento::findOrFail($id);

        $atendimento->update([
            'data_atendimento' => $request->data_atendimento,
            'hora_inicio' => $request->hora_inicio,
            'hora_fim' => $request->hora_fim,
            'medico_id' => $request->medico_id,
            'paciente_id' => $request->paciente_id,
        ]);

        $atendimento->save();

        return redirect('atendimentos')->with('success', 'Cadastro realizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $atendimento = Atendimento::findOrFail($id);

        $atendimento->delete();

        return back()->with('success', 'Registro excluido com sucesso');
    }

    /**
     * Show the application dataAjax.
     *
     * @return \Illuminate\Http\Response
     */
    public function buscaMedico(Request $request)
    {
        $data = [];

        if ($request->has('q')) {
            $search = $request->q;
            $data = DB::table("medicos")
                ->select("id", "nome")
                ->where('nome', 'LIKE', "%$search%")
                ->get();
        }

        return response()->json($data);
    }

    /**
     * Show the application dataAjax.
     *
     * @return \Illuminate\Http\Response
     */
    public function buscaPaciente(Request $request)
    {
        $data = [];

        if ($request->has('q')) {
            $search = $request->q;
            $data = DB::table("pacientes")
                ->select("id", "nome")
                ->where('nome', 'LIKE', "%$search%")
                ->get();
        }

        return response()->json($data);
    }
}
