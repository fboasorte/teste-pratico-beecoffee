<?php

namespace App\Http\Controllers;

use App\Http\Requests\MedicoRequest;
use App\Medico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicos = Medico::all();

        return view('medicos.index', compact('medicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medicos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MedicoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MedicoRequest $request)
    {
        $medico = new Medico([
            'nome' => $request->nome,
            'crm' => $request->crm
        ]);

        $medico->save();

        $medico->especialidades()->sync($request->especialidades);

        return redirect('medicos')->with('success', 'Cadastro realizado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $medico = Medico::findOrFail($id);
        $especialidades = $medico->especialidades()->get();
        return view('medicos.show', compact('medico', 'especialidades'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medico = Medico::findOrFail($id);
        $especialidades = $medico->especialidades()->get();
        return view('medicos.edit', compact('medico', 'especialidades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  MedicoRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MedicoRequest $request, $id)
    {
        $medico = Medico::findOrFail($id);

        $medico->update([
            'nome' => $request->nome,
            'crm' => $request->crm,
        ]);

        $medico->save();

        $medico->especialidades()->sync($request->especialidades);

        return redirect('medicos')->with('success', 'Cadastro realizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $medico = Medico::findOrFail($id);

        $medico->delete();

        return back()->with('success', 'Registro excluido com sucesso');
    }

    /**
     * Show the application dataAjax.
     *
     * @return \Illuminate\Http\Response
     */
    public function buscaEspecialidades(Request $request)
    {
        $data = [];

        if ($request->has('q')) {
            $search = $request->q;
            $data = DB::table("especialidades")
                ->select("id", "nome")
                ->where('nome', 'LIKE', "%$search%")
                ->get();
        }

        return response()->json($data);
    }
}
