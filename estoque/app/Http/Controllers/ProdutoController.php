<?php

namespace estoque\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use estoque\Model\Produto;
use estoque\Http\Requests;
use estoque\Http\Requests\ProdutoRequest;

class ProdutoController extends Controller{

    public function novo(){
        return view('produtos.formulario');
    }

    public function adiciona(ProdutoRequest $pRequest, Request $request){

        Produto::create($pRequest->all());

        return redirect()
            ->action('ProdutoController@lista')
            ->withInput($request->only('nome'));
    }

    public function lista(){
        $produtos = Produto::all();

        return view('produtos.listagem')->withProdutos($produtos);
    }


    public function mostra($id){

        $produto = Produto::find($id);
        if(empty($produto)){
            return "Esse produto não existe";
        }

        return view('produtos.detalhes')->with('p', $produto);
    }

    public function remove($id){
        $produto = Produto::find($id);
        $produto->delete();

        return redirect()
            ->action('ProdutoController@lista');
    }


    public function listaJson(){

        $produto = Produto::all();
        return response()->json($produto);
    }
    
    
    
    
}
