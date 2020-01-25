<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Marca;

class MarcaController extends Controller
{
    public function add(Request $request){
        try{
            $marca = new Marca();
            $marca->nome_marca = $request->nome;

            $marca->save();

            return ['retorno'=>'marca cadastrado'];
        }catch(\Exception $erro){
            return ['retorno'=>'Erro', 'Detalhe'=>$erro];
        }
    }

    public function list(){
        $marca = Marca::all();
        return $marca;
    }

    public function select($id){
        $marca = Marca::find($id);
        return $marca;
    }

    public function update(Request $request, $id){
        try{
            $marca = Marca::find($id);
            $marca->nome_marca = $request->nome;

            $marca->save();

            return ['retorno'=>'marca Atualizado', 'dados'=>$request->all()];
        }catch(\Exception $erro){
            return ['retorno'=>'Erro', 'Detalhe'=>$erro];
        }
    }

    public function delete(Request $request, $id){
        try{
            $marca = Marca::find($id);

            $marca->delete();

            return ['retorno'=>'marca Excluido'];
        }catch(\Exception $erro){
            return ['retorno'=>'Erro', 'Detalhe'=>$erro];
        }
    }
}
