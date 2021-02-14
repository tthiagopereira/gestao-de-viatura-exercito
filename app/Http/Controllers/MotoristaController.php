<?php

namespace App\Http\Controllers;

use App\Escalao;
use App\Motorista;
use App\User;
use Illuminate\Http\Request;

class MotoristaController extends Controller
{
    public function index(){

        $this->authorize('view',User::class);

        $registros = Motorista::with('usuarios')->get();

        return view('sistema.motorista.index',compact('registros'));

    }

    public function adicionar($id){

        $motorista = User::find($id);
        $nome = $motorista->name;
        $nome_guerra = $motorista->nome_guerra;

        $this->authorize('create',User::class);

        return view('sistema.motorista.form.adicionar',compact('id','motorista','nome','nome_guerra'));

    }

    public function salvar(Request $request){

        $this->authorize('create',User::class);

        $verificacao = Motorista::where('carteira_motorista',$request['carteira_motorista'])->get();

        if($verificacao->count() != 0 ){
            \Session::flash('mensagem',['msg'=>'Catereira de motorista já cadastrada!','cor'=>'#6E0500']);
            $registro = User::find($request['user_id']);
            $id = $request['user_id'];
            return redirect()->route('motorista.adicionar',compact('registro','id'));
        }

        $dados = $request->all();

        if(!isset($dados['categoria_a'])){
            $dados['categoria_a'] = 0;
        }else{
            $dados['categoria_a'] = 1;
        };

        if(!isset($dados['categoria_b'])){
            $dados['categoria_b'] = 0;
        }else{
            $dados['categoria_b'] = 1;
        };

        if(!isset($dados['categoria_c'])){
            $dados['categoria_c'] = 0;
        }else{
            $dados['categoria_c'] = 1;
        };

        if(!isset($dados['categoria_d'])){
            $dados['categoria_d'] = 0;
        }else{
            $dados['categoria_d'] = 1;
        };

        if(!isset($dados['categoria_e'])){
            $dados['categoria_e'] = 0;
        }else{
            $dados['categoria_e'] = 1;
        };

        $registro = new Motorista();
        $registro->user_id = $request['user_id'];
        $registro->categoria_a = $dados['categoria_a'];
        $registro->categoria_b = $dados['categoria_b'];
        $registro->categoria_c = $dados['categoria_c'];
        $registro->categoria_d = $dados['categoria_d'];
        $registro->categoria_e = $dados['categoria_e'];
        $registro->carteira_motorista = $request['carteira_motorista'];
        $registro->habilitacao = $request['habilitacao'];
        $registro->habilitacao_vencimento = $request['habilitacao_vencimento'];
        $registro->bi = $request['bi'];
        $registro->observacao = $request['observacao'];

        $registro->save();

        \Session::flash('mensagem',['msg'=>'Motorista criado com sucesso!','cor'=>'#0F6A18']);

        return redirect()->route('motorista');
    }

    public function escolherMotorista(){
        $registros = User::with('motoristas')->get();
        return view('sistema.motorista.form.escolha',compact('registros'));
    }

    public function excluir($id){

        $this->authorize('delete',User::class);

        Motorista::find($id)->delete();
        \Session::flash('mensagem',['msg'=>'Excluido com sucesso!','cor'=>'#6E0500']);
        return redirect()->route('motorista');

    }


    public function editar($id){

        $registro = Motorista::with('usuarios')->find($id);
        $nome = $registro->usuarios->name;
        $nome_guerra = $registro->usuarios->nome_guerra;
        if(!$registro) {

            \Session::flash('mensagem',['msg'=>'Motorista não existe não existe!','cor'=>'#6E0500']);
            return redirect()->route('motoristas');

        }

        return view('sistema.motorista.form.editar',compact('registro','id','nome_guerra','nome'));

    }

    public function atualizar(Request $request, $id){

        $dados = $request->all();

        if(!isset($dados['categoria_a'])){
            $dados['categoria_a'] = 0;
        }else{
            $dados['categoria_a'] = 1;
        };

        if(!isset($dados['categoria_b'])){
            $dados['categoria_b'] = 0;
        }else{
            $dados['categoria_b'] = 1;
        };

        if(!isset($dados['categoria_c'])){
            $dados['categoria_c'] = 0;
        }else{
            $dados['categoria_c'] = 1;
        };

        if(!isset($dados['categoria_d'])){
            $dados['categoria_d'] = 0;
        }else{
            $dados['categoria_d'] = 1;
        };

        if(!isset($dados['categoria_e'])){
            $dados['categoria_e'] = 0;
        }else{
            $dados['categoria_e'] = 1;
        };

        $registro = Motorista::find($id);

        $registro->categoria_a = $dados['categoria_a'];
        $registro->categoria_b = $dados['categoria_b'];
        $registro->categoria_c = $dados['categoria_c'];
        $registro->categoria_d = $dados['categoria_d'];
        $registro->categoria_e = $dados['categoria_e'];
        $registro->carteira_motorista = $request['carteira_motorista'];
        $registro->habilitacao = $request['habilitacao'];
        $registro->habilitacao_vencimento = $request['habilitacao_vencimento'];
        $registro->bi = $request['bi'];
        $registro->observacao = $request['observacao'];

        $registro->update();

        \Session::flash('mensagem',['msg'=>'atualizado com sucesso!','cor'=>'#0F6A18']);

        return redirect()->route('motorista');

    }
}
