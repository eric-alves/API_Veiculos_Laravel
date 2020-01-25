<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Categoria;

class CategoriaController extends Controller
{
    public function add(Request $request){
        try{
            $categoria = new Categoria();
            $categoria->nome_categoria = $request->categoria;

            $categoria->save();

            return ['retorno'=>'Categoria cadastrada'];
        }catch(\Exception $erro){
            return ['retorno'=>'Erro', 'Detalhe'=>$erro];
        }
    }

    public function list(){
        $categoria = Categoria::all();
        return $categoria;
    }

    public function select($id){
        $categoria = Categoria::find($id);
        return $categoria;
    }

    public function update(Request $request, $id){
        try{
            $categoria = Categoria::find($id);
            $categoria->nome_categoria = $request->categoria;

            $categoria->save();

            return ['retorno'=>'Categoria atualizada', 'dados'=>$request->all()];
        }catch(\Exception $erro){
            return ['retorno'=>'Erro', 'Detalhe'=>$erro];
        }
    }

    public function delete(Request $request, $id){
        try{
            $categoria = Categoria::find($id);

            $categoria->delete();

            return ['retorno'=>'Categoria excluida'];
        }catch(\Exception $erro){
            return ['retorno'=>'Erro', 'Detalhe'=>$erro];
        }
    }
}
