<?php

namespace App\Http\Controllers;

use App\Escalao;
use App\User;
use Illuminate\Http\Request;

class EscalaoController extends Controller
{
    public function index(){

        $this->authorize('view',User::class);

        $registros = Escalao::all();
        return view('sistema.escalao.index',compact('registros'));

    }

    public function adicionar(){

        $this->authorize('create',User::class);

        return view('sistema.escalao.form.adicionar');

    }

    public function salvar(Request $request){

        $this->authorize('create',User::class);

        $registro = new Escalao();
        $registro->nome = $request['nome'];

        $registro->save();

        \Session::flash('mensagem',['msg'=>'Registrado com sucesso!','cor'=>'#0F6A18']);

        return redirect()->route('escalao');
    }

    public function editar($id){

        $registro = Escalao::find($id);

        if(!$registro) {

            \Session::flash('mensagem',['msg'=>'Escalão não existe!','cor'=>'#6E0500']);
            return redirect()->route('escalao');

        }

        return view('sistema.escalao.form.editar',compact('registro','id'));

    }

    public function atualizar(Request $request, $id){

        $registro = Escalao::find($id);

        $registro->update($request->all());

        \Session::flash('mensagem',['msg'=>'Atualizado com sucesso!','cor'=>'#0F6A18']);

        return redirect()->route('escalao');

    }

    public function excluir($id){

        $this->authorize('delete',User::class);

        $registro = Escalao::find($id);

        if($registro->id === 1){
            \Session::flash('mensagem',['msg'=>'Boa tentativa o adiministrador do sistema não pode ser excluido','cor'=>'#6E0500']);
            return redirect()->route('escalao');
        }


        if($registro->tipo === 'Administrador'){
            \Session::flash('mensagem',['msg'=>'Somente o Administrador pode excluir!','cor'=>'#6E0500']);
            return redirect()->route('escalao');
        }

        Escalao::find($id)->delete();
        \Session::flash('mensagem',['msg'=>'Excluido com sucesso!','cor'=>'#6E0500']);
        return redirect()->route('escalao');

    }
}