<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
Use Illuminate\Database\Eloquent\SoftDeletes;

class Aluno extends Model
{
    // Configuração do softDeletes
    use softDeletes;
    protected $dates = ['deleted_at'];
    //-----------------------------------------------------------------

    protected $guarded = [];

    //-----------------------------------------------------------------
    //exemplo de função
    public function exemplo($id){
       $resposta = 'insira o seu codigo aqui';
        return $resposta;
    }


    public function createAluno($request){
        $aluno_novo = new Aluno; //instancia a model
        
        $aluno_novo->nome = $request->nome; //atribui o nome
        $aluno_novo->faltas = $request->faltas; // atribui faltas
        $aluno_novo->media = $request->media; // atribui media
        $aluno_novo->turma = $request->turma; //atribui turma
        $aluno_novo->serie = $request->serie; //atribui serie
        $aluno_noco->registro = $request->registro; //atribui registro
        
        $aluno_novo->save(); //salva o registro
    }

    public function updateAluno($request, $id){
        $aluno = App\Aluno::find(23);

        $aluno->media = 5.0;
        $aluno->status = "recuperacao";
        $aluno->save();
    }

    public function deleteAluno($id){
        //$ex_aluno = App\Aluno::find(1);
        $ex_aluno->delete();

    }

    // public function exemplo1($id){
    //     $alunos = Aluno::orderBy('nome', 'asc')->get();
    //     // $alunos = $alunos->getContent();
    //     $ordenados = [];
    //     foreach($alunos as $aluno){
    //         array_push($ordenados, $aluno->nome);
    //     }
    //     return $ordenados;
    // }
    
    public function alteraAluno($request){
        
        if(!$this->registro){
            $this->registro = $request->registro;
        }

        $this->nome = $request->nome;
        $this->turma = $request->turma;
        $this->serie = $request->serie;
        $this->media = $request->media;
        $this->faltas = $request->faltas;

        if ($request->media > 6.9){
            $this->status = "Aprovado";
        }

        if ($request->media < 5.0){
            $this->status = "Reprovado";
        }

        if (($request->media < 6.9) && ($request->media > 4.9)){
            $this->status = "Prova Final";
        }
        //$this->status = $this->status($request->nota);


        $this->save();
    }



}
