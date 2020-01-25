<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Veiculo;
use Illuminate\Support\Facades\DB;

class VeiculoController extends Controller
{
    public function status(){
        return ['status' => 'ok'];
    }

    public function add(Request $request){
        try{
            $veiculo = new Veiculo();
            $veiculo->marca_veiculo = $request->marca;
            $veiculo->modelo_veiculo = $request->modelo;
            $veiculo->ano_veiculo = $request->ano;
            $veiculo->ano_modelo_veiculo = $request->ano_modelo;
            $veiculo->cor_veiculo = $request->cor;
            $veiculo->placa_veiculo = $request->placa;
            $veiculo->quilometragem_veiculo = $request->quilometragem;
            $veiculo->preco_veiculo = $request->preco;
            $veiculo->ipva_veiculo = $request->ipva;
            $veiculo->troca_veiculo = $request->troca;
            $veiculo->id_marca = $request->marca;
            $veiculo->id_categoria = $request->categoria;
            $veiculo->id_combustivel = $request->combustivel;

            $veiculo->save();

            return ['retorno'=>'cadastrado'];
        }catch(\Exception $erro){
            return ['retorno'=>'Erro', 'Detalhe'=>$erro];
        }
    }

    public function list(){
        $veiculos = DB::table('veiculos')
            ->join('marcas', 'marcas.id', '=', 'veiculos.marca_id')
            ->join('categorias', 'categorias.id', '=', 'veiculos.categoria_id')
            ->join('combustivels', 'combustivels.id', '=', 'veiculos.combustivel_id')
            ->select('veiculos.*', 'marcas.nome_marca', 'categorias.nome_categoria', 'combustivels.nome_combustivel')
            ->get();
        
        return $veiculos;
    }

    public function select($id){
        $veiculos = Veiculo::find($id);
        return $veiculos;
    }

    public function search(Request $request){
        $veiculos = Veiculo::all();

        if ($request->has('marca_veiculo')) {
            $veiculos = $veiculos->filter(function ($veiculos) use ($request) {
                return $veiculos->marca_veiculo == $request->marca_veiculo;
            });
        }
        if ($request->has('combustivel_veiculo')) {
            $veiculos = $veiculos->filter(function ($veiculos) use ($request) {
                return $veiculos->combustivel_veiculo == $request->combustivel_veiculo;
            });
        }
        if ($request->has('max_preco_veiculo')) {
            $veiculos = $veiculos->filter(function ($veiculos) use ($request) {
                return $veiculos->preco_veiculo > $request->max_preco_veiculo;
            });
        }
        if ($request->has('min_preco_veiculo')) {
            $veiculos = $veiculos->filter(function ($veiculos) use ($request) {
                return $veiculos->preco_veiculo < $request->min_preco_veiculo;
            });
        }
        
        return $veiculos;
        //return $request->all();
        //return $request->marca_veiculo;
    }

    public function update(Request $request, $id){
        try{
            $veiculo = Veiculo::find($id);
            $veiculo->marca_veiculo = $request->marca;
            $veiculo->modelo_veiculo = $request->modelo;
            $veiculo->ano_veiculo = $request->ano;
            $veiculo->ano_modelo_veiculo = $request->ano_modelo;
            $veiculo->cor_veiculo = $request->cor;
            $veiculo->placa_veiculo = $request->placa;
            $veiculo->quilometragem_veiculo = $request->quilometragem;
            $veiculo->preco_veiculo = $request->preco;
            $veiculo->ipva_veiculo = $request->ipva;
            $veiculo->troca_veiculo = $request->troca;
            $veiculo->id_marca = $request->marca;
            $veiculo->id_categoria = $request->categoria;
            $veiculo->id_combustivel = $request->combustivel;

            $veiculo->save();

            return ['retorno'=>'Atualizado', 'dados'=>$request->all()];
        }catch(\Exception $erro){
            return ['retorno'=>'Erro', 'Detalhe'=>$erro];
        }
    }

    public function delete(Request $request, $id){
        try{
            $veiculo = Veiculo::find($id);

            $veiculo->delete();

            return ['retorno'=>'Excluido'];
        }catch(\Exception $erro){
            return ['retorno'=>'Erro', 'Detalhe'=>$erro];
        }
    }
}
