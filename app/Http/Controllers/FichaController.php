<?php

namespace App\Http\Controllers;

use App\Ficha;
use App\Mapa;
use App\Motorista;
use App\ServicoViatura;
use App\Viatura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FichaController extends Controller
{

    public function index(){

        $registros = Ficha::with('viaturas')->with('servicos')->get();
        $servicos_analise = ServicoViatura::all();
        $servicos_processando = ServicoViatura::where('status','Processando')->get();
        $servicos_aprovado = ServicoViatura::where('status','Aprovado')->get();

        return view('sistema.ficha.index',compact('registros','servicos_analise','servicos_aprovado','servicos_processando'));

    }

    public function analise(){
        $registros = ServicoViatura::all();
        return view('sistema.ficha.form.analise',compact('registros'));
    }

    public function adicionar($id){

        $servico = ServicoViatura::find($id);
        $viaturas = Viatura::all();
        $motoristas = Motorista::with('usuarios')->get();
        return view('sistema.ficha.form.adicionar',compact('servico','viaturas','motoristas'));

    }

    public function salvar(Request $request){
        $servico = ServicoViatura::find($request['servico_viatura_id']);
        $servico->status = 'Processando';
        $servico->negar = '';
        $servico->save();

        Ficha::create($request->all());

        \Session::flash('mensagem',['msg'=>'Ficha criada com sucesso!','cor'=>'#0F6A18']);

        return redirect()->route('ficha');
    }

    public function editar($id){

        $registro = Ficha::find($id);
        $servico = ServicoViatura::find($registro->servico_viatura_id);
        $viaturas = Viatura::all();
        $motoristas = Motorista::with('usuarios')->get();

        if(!$registro){
            \Session::flash('mensagem',['msg'=>'Não existe esse pedido no SISTEMA!','cor'=>'#6E0500']);
            return redirect()->route('ficha');
        }

        if(Auth::user()->tipo === 'Administrador' || Auth::user()->tipo === 'Gerente'){
            return view('sistema.ficha.form.editar',compact('registro','id','servico','viaturas','motoristas'));
        }

        if($registro->status === 'Analise' ){
            return view('sistema.ficha.form.editar',compact('registro','id','servico','viaturas'));
        }else{

            \Session::flash('mensagem',['msg'=>'Para alterar entre em contato com a GARAGEM!','cor'=>'#0F6A18']);
//            return redirect()->back();
            return redirect()->route('ficha');
        }

    }

    public function atualizar(Request $request, $id){

        $registro = Ficha::find($id);
        $servico = ServicoViatura::find($registro->servico_viatura_id);
        $servico->status = "Processando";
        $servico->update();

        $mapa = Mapa::where('ficha_id','=',$registro->id);
        $mapa->delete();

        $registro->chefe_viatura = $request['chefe_viatura'];
        $registro->servico_viatura_id = $request['servico_viatura_id'];
        $registro->viatura_id = $request['viatura_id'];
        $registro->posto_chefe_de_viatura = $request['posto_chefe_de_viatura'];
        $registro->contato = $request['contato'];
        $registro->itinerario = $request['itinerario'];
        $registro->motorista_id = $request['motorista_id'];

        $registro->update();

        \Session::flash('mensagem',['msg'=>'Ficha atualizado com sucesso!','cor'=>'#0F6A18']);
        return redirect()->route('ficha');
    }

    public function excluir($id){

        $aux = Ficha::find($id);
        $servico = ServicoViatura::find($aux->servico_viatura_id);
        $registro = ficha::find($id);
        $mapa = Mapa::where('ficha_id','=',$registro->id);

        if(!$registro){
            \Session::flash('mensagem',['msg'=>'Não existe esse pedido no SISTEMA!','cor'=>'#0F6A18']);
            return redirect()->route('ficha');
        }
        $mapa->delete();
        $registro->delete();
        $servico->delete();
        \Session::flash('mensagem',['msg'=>'Essa ficha foi excluida com o pedido do usuario!','cor'=>'#0F6A18']);
        return redirect()->route('ficha');

    }

    public function pdf(Request $request){
        $registro = ServicoViatura::find($request->id);
        return view('sistema.mapa_viatura.form.pdf',compact('registro'));

        return \PDF::loadView('sistema.servico_viatura.form.pdf', compact('registro'))
            // Se quiser que fique no formato a4 retrato: ->setPaper('a4', 'landscape')
            ->download('ficha-de-viastura.pdf');
//            ->stream('Ficha de viatura');
    }

    public function detalhe($id){
        $ficha = Ficha::find($id);
        $servicos = ServicoViatura::all();
        $viaturas = Viatura::all();
        return view('sistema.ficha.form.detalhe',compact('ficha','servicos','viaturas','id'));
    }

    public function aprovar($id){

        $registro = Ficha::with('servicos')->with('viaturas')->with('motoristas')->find($id);

        $mapa = new Mapa();

        $mapa->chefe_viatura     = $registro->chefe_viatura;
        $mapa->motorista         = $registro->motoristas->usuarios->nome_guerra;
        $mapa->contato           = $registro->contato;
        $mapa->contato_motorista = $registro->motoristas->usuarios->contato;
        $mapa->itinerario        = $registro->itinerario;
        $mapa->data              = $registro->data;
        $mapa->data_inicial      = $registro->servicos->data_saida;
        $mapa->data_final        = $registro->servicos->data_entrada;
        $mapa->ficha_id          = $registro->id;
        $mapa->ficha             = $registro->id;


//        Tabela servico_viatura
        $mapa->missao = $registro->servicos->missao;
        $mapa->hora_saida = $registro->servicos->hora_saida;
        $mapa->hora_entrada = $registro->servicos->hora_entrada;

//        Tabela de viaturas
        $mapa->modelo = $registro->viaturas->modelo;
        $mapa->placa = $registro->viaturas->placa;
        $mapa->eb = $registro->viaturas->eb;
        $mapa->documento = $registro->viaturas->documento;
        $mapa->fixo = false;

        $mapa->save();
        $servico  = ServicoViatura::find($registro->servicos->id);
        $servico->status = 'Aprovado';
        $servico->negar = '';
        $servico->update();

        \Session::flash('mensagem',['msg'=>'Pedido aprovado!','cor'=>'#0F6A18']);

        return redirect()->route('ficha');

    }

}
