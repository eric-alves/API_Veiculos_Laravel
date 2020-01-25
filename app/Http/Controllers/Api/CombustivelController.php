<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Combustivel;

class CombustivelController extends Controller
{
    public function add(Request $request){
        try{
            $combustivel = new Combustivel();
            $combustivel->nome_combustivel = $request->nome;

            $combustivel->save();

            return ['retorno'=>'Combustivel cadastrado'];
        }catch(\Exception $erro){
            return ['retorno'=>'Erro', 'Detalhe'=>$erro];
        }
    }

    public function list(){
        $combustivel = Combustivel::all();
        return $combustivel;
    }

    public function select($id){
        $combustivel = Combustivel::find($id);
        return $combustivel;
    }

    public function update(Request $request, $id){
        try{
            $combustivel = Combustivel::find($id);
            $combustivel->nome_combustivel = $request->nome;

            $combustivel->save();

            return ['retorno'=>'Combustivel Atualizado', 'dados'=>$request->all()];
        }catch(\Exception $erro){
            return ['retorno'=>'Erro', 'Detalhe'=>$erro];
        }
    }

    public function delete(Request $request, $id){
        try{
            $combustivel = Combustivel::find($id);

            $combustivel->delete();

            return ['retorno'=>'Combustivel Excluido'];
        }catch(\Exception $erro){
            return ['retorno'=>'Erro', 'Detalhe'=>$erro];
        }
    }
}
