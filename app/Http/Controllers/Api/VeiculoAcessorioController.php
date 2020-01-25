<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\VeiculoAcessorio;
use Illuminate\Support\Facades\DB;

class VeiculoAcessorioController extends Controller
{
    public function add(Request $request){
        try{
            $veicAces = new VeiculoAcessorio();
            $veicAces->veiculo_id = $request->veiculo;
            $veicAces->acessorio_id = $request->acessorio;

            $veicAces->save();

            return ['retorno'=>'veicAces cadastrado'];
        }catch(\Exception $erro){
            return ['retorno'=>'Erro', 'Detalhe'=>$erro];
        }
    }

    public function list(){
        $veicAces = VeiculoAcessorio::all();
        return $veicAces;
    }

    public function select($id){
        $veicAces = VeiculoAcessorio::find($id);
        return $veicAces;
    }

    public function update(Request $request, $id){
        try{
            $veicAces = VeiculoAcessorio::find($id);
            $veicAces->veiculo_id = $request->veiculo;
            $veicAces->acessorio_id = $request->acessorio;

            $veicAces->save();

            return ['retorno'=>'veicAces Atualizado', 'dados'=>$request->all()];
        }catch(\Exception $erro){
            return ['retorno'=>'Erro', 'Detalhe'=>$erro];
        }
    }

    public function delete(Request $request, $id){
        try{
            $veicAces = VeiculoAcessorio::find($id);

            $veicAces->delete();

            return ['retorno'=>'veicAces Excluido'];
        }catch(\Exception $erro){
            return ['retorno'=>'Erro', 'Detalhe'=>$erro];
        }
    }
}
