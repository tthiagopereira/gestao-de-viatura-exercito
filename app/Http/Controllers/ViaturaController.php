<?php

namespace App\Http\Controllers;

use App\User;
use App\Viatura;
use Illuminate\Http\Request;

class ViaturaController extends Controller
{
    public function index(){
        $this->authorize('view',User::class);
        $registros = Viatura::all();
        return view('sistema.viatura.index',compact('registros'));
    }

    public function adicionar(){

        $this->authorize('create',User::class);
        $registro = Viatura::all();
        return view('sistema.viatura.form.adicionar',compact('registro'));
    }

    public function salvar(Request $request){

        $this->authorize('create',User::class);

        Viatura::create($request->all());

        \Session::flash('mensagem',['msg'=>'Viatura registrada com sucesso!','cor'=>'#0F6A18']);

        return redirect()->route('viaturas');

    }

    public function editar($id){
        $this->authorize('update',User::class);
        $registro = Viatura::find($id);
        return view('sistema.viatura.form.editar',compact('registro','id'));
    }

    public function detalhe($id){
        $registro = Viatura::find($id);
        return view('sistema.viatura.form.detalhe',compact('registro','id'));
    }

    public function atualizar(Request $request, $id){

        $this->authorize('update',User::class);

        $registro = Viatura::find($id);

        $registro->placa = $request['placa'];
        $registro->qtd_passageiro = $request['qtd_passageiro'];
        $registro->modelo = $request['modelo'];
        $registro->viatura = $request['viatura'];
        $registro->eb = $request['eb'];
        $registro->tipo = $request['tipo'];
        $registro->status = $request['status'];

        $registro->update();
        \Session::flash('mensagem',['msg'=>'Viatura atualizada com sucesso!','cor'=>'#0F6A18']);

        return redirect()->route('viaturas');
    }

    public function excluir($id){

        Viatura::find($id)->delete();
        \Session::flash('mensagem',['msg'=>'Viatura excluido com sucesso!','cor'=>'#0F6A18']);
        return redirect()->route('viaturas');

    }

}
