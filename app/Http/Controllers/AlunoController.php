<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Aluno;

class AlunoController extends Controller
{

    public function index()
    {
        $alunos = Aluno::all();
        $alunos = Aluno::withTrashed()->get();
        
        return view('alunos',['alunos' => $alunos]);
    }


    public function insereAluno(Request $request)
    {
        $aluno = new Aluno;
        $aluno->alteraAluno($request);
        return back();
    }


    public function atualizaAluno(Request $request, $id)
    {
        $aluno = Aluno::find($id);
        $aluno->alteraAluno($request);
        return back();
    }

    public function deletaAluno($id)
    {
        Aluno::destroy($id);
        //$ex_aluno = Aluno::find($id);
        //$ex_aluno->delete();
        return back();
    }


    //exemplo de como chamar uma função da model
    public function getAluno(Request $request){

        $aluno = new Aluno;
        $resposta = $aluno->exemplo($request->id);

        dd($resposta); // comentar essa linha na segunda parte dos exercicios.
        return back();

    }
}
