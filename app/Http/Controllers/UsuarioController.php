<?php

namespace App\Http\Controllers;

use App\Escalao;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{

    public function index(){

        if(Auth::user()->tipo == 'Usuario') {
            \Session::flash('mensagem',['msg'=>'Erro: Operação restrita apenas administrador tem acesso!','cor'=>'#6E0500']);
            return redirect()->route('servico.viatura');

        }

        $this->authorize('view',User::class);

        $usuario = User::with('motoristas')->get();
        return view('sistema.usuario.index',compact('usuario'));

    }

    public function adicionar(){

        $this->authorize('create',User::class);

        $registro = User::all();
        $escalao  = Escalao::all();

        return view('sistema.usuario.form.adicionar',compact('registro','escalao'));

    }

    public function salvar(Request $request){

        $this->authorize('create',User::class);

        $verificacao = User::where('identidade_militar',$request['identidade_militar']);

        if($verificacao->count() != 0 ){
            \Session::flash('mensagem',['msg'=>'Identidade Militar já cadastrada!','cor'=>'#6E0500']);
            $registro = $request->all();
            return redirect()->route('usuario.adicionar',compact('registro'));
        }

        $registro = new User();
        $registro->name = $request['name'];
        $registro->nome_guerra = $request['nome_guerra'];
        $registro->tipo = $request['tipo'];
        $registro->posto_graduacao = $request['posto_graduacao'];
        $registro->identidade_militar = $request['identidade_militar'];
        $registro->contato = $request['contato'];
        $registro->escalao = $request['escalao'];
        $registro->password = bcrypt($request['password']);

        $registro->save();

        \Session::flash('mensagem',['msg'=>'Usuário criado com sucesso!','cor'=>'#0F6A18']);

        return redirect()->route('usuarios');
    }

    public function editar($id){

        if(Auth::user()->tipo == 'Usuario'){

            if(Auth::user()->id != $id){

                return redirect()->route('usuarios');

            }

        }

        $registro = User::find($id);

        if(!$registro) {

            \Session::flash('mensagem',['msg'=>'Usuário não existe!','cor'=>'#6E0500']);
            return redirect()->route('usuarios');

        }
        $escalao  = Escalao::all();

        return view('sistema.usuario.form.editar',compact('registro','id','escalao'));

    }

    public function atualizar(Request $request, $id){

        $registro = User::find($id);

        if($request['password']){

            $request['password'] = bcrypt($request['password']);

        }else{

            $request['password'] = $registro->password;

        }

        $registro->update($request->all());

        \Session::flash('mensagem',['msg'=>'atualizado com sucesso!','cor'=>'#0F6A18']);

        if(Auth::user()->tipo == 'Usuario'){

            \Session::flash('mensagem',['msg'=>'atualizado com sucesso!','cor'=>'#0F6A18']);

            return redirect()->route('servico.viatura');

        }

        return redirect()->route('usuarios');

    }

    public function excluir($id){

        $this->authorize('delete',User::class);
        $registro = User::find($id);

        if($registro->id === 1){
            \Session::flash('mensagem',['msg'=>'Boa tentativa o adiministrador do sistema não pode ser excluido','cor'=>'#6E0500']);
            return redirect()->route('usuarios');
        }


        if($registro->tipo === 'Administrador'){
            \Session::flash('mensagem',['msg'=>'Somente o Administrador pode excluir!','cor'=>'#6E0500']);
            return redirect()->route('usuarios');
        }

        User::find($id)->delete();
        \Session::flash('mensagem',['msg'=>'Excluido com sucesso!','cor'=>'#6E0500']);
        return redirect()->route('usuarios');

    }

    public function esqueceuSenha(Request $request) {

        $registro = User::where('identidade_militar',$request['identidade_militar'])->first();

        if(!$registro) {
            \Session::flash('mensagem',['msg'=>'Usuário não existe!','cor'=>'#6E0500']);
            return redirect()->route('login');
        }


        $request['password'] = bcrypt($request['password']);

        $registro->update($request->all());

        \Session::flash('mensagem',['msg'=>'Senha alterada com sucesso','cor'=>'#0F6A18']);

        return redirect()->route('login');
    }

}
