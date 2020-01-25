<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Acessorio;

class AcessorioController extends Controller
{
    public function add(Request $request){
        try{
            $acessorio = new Acessorio();
            $acessorio->nome_acessorio = $request->nome;

            $acessorio->save();

            return ['retorno'=>'Acessorio cadastrado'];
        }catch(\Exception $erro){
            return ['retorno'=>'Erro', 'Detalhe'=>$erro];
        }
    }

    public function list(){
        $acessorio = Acessorio::all();
        return $acessorio;
    }

    public function select($id){
        $acessorio = Acessorio::find($id);
        return $acessorio;
    }

    public function update(Request $request, $id){
        try{
            $acessorio = Acessorio::find($id);
            $acessorio->nome_acessorio = $request->nome;

            $acessorio->save();

            return ['retorno'=>'Acessorio Atualizado', 'dados'=>$request->all()];
        }catch(\Exception $erro){
            return ['retorno'=>'Erro', 'Detalhe'=>$erro];
        }
    }

    public function delete(Request $request, $id){
        try{
            $acessorio = Acessorio::find($id);

            $acessorio->delete();

            return ['retorno'=>'Acessorio Excluido'];
        }catch(\Exception $erro){
            return ['retorno'=>'Erro', 'Detalhe'=>$erro];
        }
    }
}
