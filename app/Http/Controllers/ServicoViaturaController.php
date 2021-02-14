<?php

namespace App\Http\Controllers;

use App\Ficha;
use App\ServicoViatura;
use App\User;
use App\Viatura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServicoViaturaController extends Controller
{

    public function index(){

        if(Auth::user()->tipo === "Usuario"){
            $registros = ServicoViatura::where('usuario_id',Auth::user()->id)->get();
            return view('sistema.servico_viatura.index',compact('registros'));
        }else{
            $registros = ServicoViatura::all();
            $viatura = Viatura::all();
            return view('sistema.servico_viatura.index',compact('registros','viatura'));
        }

    }

    public function adicionar(){

        return view('sistema.servico_viatura.form.adicionar');
    }

    public function salvar(Request $request){

        $date_saida = $request['data_saida'];
        if (!empty($date_saida)) {
            $timestamp = strtotime($date_saida);
            if ($timestamp === FALSE) {
                $timestamp = strtotime(str_replace('/', '-', $date_saida));
            }
            $request['data_saida'] = date('Y-m-d', $timestamp);
        }

        $date1=date_create($request['data_saida']);
        $date2=date_create(date('Y-m-d'));

        if($date1 >= $date2){
            $diff=date_diff($date1,$date2);
            $request['antecedencia'] = $diff->format("%a");
        }else{
            $request['antecedencia'] = 0;
        }

//        Converter srtring para date entrada
        $date_entrada = $request['data_entrada'];
        if (!empty($date_entrada)) {
            $timestamp = strtotime($date_entrada);
            if ($timestamp === FALSE) {
                $timestamp = strtotime(str_replace('/', '-', $date_entrada));
            }
            $request['data_entrada'] = $date_entrada = date('Y-m-d', $timestamp);
        }

//        Converter string para date de saida


        ServicoViatura::create($request->all());

        \Session::flash('mensagem',['msg'=>'Seu Pedido foi realizado com sucesso!','cor'=>'#0F6A18']);

        return redirect()->route('servico.viatura');
    }

    public function editar($id){

//        $this->authorize('update',User::class);
        $registro = ServicoViatura::find($id);

        if(!$registro){
            \Session::flash('mensagem',['msg'=>'Não existe esse pedido no SISTEMA','cor'=>'#6E0500']);
            return redirect()->route('servico.viatura');
        }

        if(Auth::user()->tipo === 'Administrador' || Auth::user()->tipo === 'Gerente'){
            return view('sistema.servico_viatura.form.editar',compact('registro','id'));
        }

        if($registro->status === 'Analise' ){
            return view('sistema.servico_viatura.form.editar',compact('registro','id'));
        }else{
            \Session::flash('mensagem', ['msg'=>'Para alterar entre em contato com a GARAGEM']);
//            return redirect()->back();
            return redirect()->route('servico.viatura');
        }


    }

    public function atualizar(Request $request, $id){

        $date_entrada = $request['data_entrada'];
        if (!empty($date_entrada)) {
            $timestamp = strtotime($date_entrada);
            if ($timestamp === FALSE) {
                $timestamp = strtotime(str_replace('/', '-', $date_entrada));
            }
            $request['data_entrada'] = $date_entrada = date('Y-m-d', $timestamp);
        }

//        Converter string para date de saida
        $date_saida = $request['data_saida'];
        if (!empty($date_saida)) {
            $timestamp = strtotime($date_saida);
            if ($timestamp === FALSE) {
                $timestamp = strtotime(str_replace('/', '-', $date_saida));
            }
            $request['data_saida'] = date('Y-m-d', $timestamp);
        }

        $date1=date_create($request['data_saida']);
        $date2=date_create(date('Y-m-d'));

        if($date1 >= $date2){
            $diff=date_diff($date1,$date2);
            $request['antecedencia'] = $diff->format("%a");
        }else{
            $request['antecedencia'] = 0;
        }

        $registro = ServicoViatura::find($id);

        $registro->data_saida = $request['data_saida'];
        $registro->data_entrada = $request['data_entrada'];
        $registro->hora_saida = $request['hora_saida'];
        $registro->hora_entrada = $request['hora_entrada'];
        $registro->local_saida = $request['local_saida'];
        $registro->destino = $request['destino'];
        $registro->missao = $request['missao'];
        $registro->viatura = $request['viatura'];
        $registro->transporte = $request['transporte'];
        $registro->quantidade_pessoa = $request['quantidade_pessoa'];
        $registro->status = $request['status'];
        $registro->chefe_viatura = $request['chefe_viatura'];
        $registro->observacao = $request['observacao'];
        $registro->antecedencia = $request['antecedencia'];

        if($request['negar'] != null){
            $registro->negar = $request['negar'];
            $registro->status = "Negado";
        }else{
            $registro->negar = $request['negar'];
            $registro->status = "Analise";
        }

        $registro->update();

        \Session::flash('mensagem',['msg'=>'Pedido atualizado com sucesso!','cor'=>'#024658']);
        return redirect()->route('servico.viatura');
    }

    public function excluir($id){

        $registro = ServicoViatura::find($id);
        if(!$registro){
            \Session::flash('mensagem',['msg'=>'Não existe esse pedido no SISTEMA','cor'=>'#6E0500']);
            return redirect()->route('servico.viatura');
        }

        $registro->delete();
        \Session::flash('mensagem',['msg'=>'Pedido excluido com sucesso','cor'=>'#6E0500']);
        return redirect()->route('servico.viatura');

    }

    public function pdf(Request $request){
        $registro = ServicoViatura::find($request->id);
        return view('sistema.servico_viatura.form.pdf',compact('registro'));

        return \PDF::loadView('sistema.servico_viatura.form.pdf', compact('registro'))
            // Se quiser que fique no formato a4 retrato: ->setPaper('a4', 'landscape')
            ->download('ficha-de-viastura.pdf');
//            ->stream('Ficha de viatura');
    }

    public function detalhe($id){
        $registro = ServicoViatura::with('fichas')->with('viaturas')->find($id);
//        dd($registro);
        if(!$registro){
            \Session::flash('mensagem',['msg'=>'Não existe','cor'=>'#6E0500']);
            return redirect()->back();
        }
        return view('detalhe',compact('registro','id'));
    }
}
