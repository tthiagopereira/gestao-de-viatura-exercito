<?php

namespace App\Http\Controllers;

use App\Escalao;
use App\Ficha;
use App\ServicoViatura;
use App\User;
use App\Viatura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function paginaInicial(){

        if(Auth::user()->tipo === "Usuario"){

            $registros = ServicoViatura::where('usuario_id',Auth::user()->id)->get();

            return view('sistema.servico_viatura.index',compact('registros'));

        }else{
            $escaloes = DB::table('servico_viaturas')
                ->join('users','servico_viaturas.usuario_id','=','users.id')
                ->select('users.escalao as nome',DB::raw('count(*) as total'))
                ->groupBy('escalao')->get();

            $total = 0;
            foreach ($escaloes as $escalao){
                $total+= $escalao->total;
            }

            return view('panel.blank',compact('escaloes','total'));
        }

    }

    public function carregaPedidos(){

        $analise = ServicoViatura::where('status','Analise')->count();
        $processando = ServicoViatura::where('status','Processando')->count();
        $aprovado = ServicoViatura::where('status','Aprovado')->count();

        return response()->json([$analise,$processando,$aprovado]);

    }

    public function carregarQuantidadeMotoristas() {
        $motorista = DB::table('fichas')
            ->select('users.nome_guerra',DB::raw('count(*) as quantidade'))
            ->join('motoristas','motoristas.id','=','fichas.motorista_id')
            ->join('users','users.id','=','motoristas.user_id')
            ->join('servico_viaturas','servico_viaturas.id','=','fichas.servico_viatura_id')
            ->where('servico_viaturas.status','Aprovado')
            ->groupBy('users.nome_guerra')
            ->get();
        return response()->json([$motorista]);
    }

    public function carregaViaturas() {
        $viaturaAtiva = Viatura::where('status','Ativa')->count();
        $viaturaBaixada = Viatura::where('status','Baixada')->count();

        return response()->json([$viaturaAtiva,$viaturaBaixada]);
    }

    public function carregarQuantidadeMissoes(){

        $janeiro =   DB::table('servico_viaturas')->where('status','Aprovado')->whereMonth('data_saida','1')->count();
        $fevereiro = DB::table('servico_viaturas')->where('status','Aprovado')->whereMonth('data_saida','2')->count();
        $marco =     DB::table('servico_viaturas')->where('status','Aprovado')->whereMonth('data_saida','3')->count();
        $abril =     DB::table('servico_viaturas')->where('status','Aprovado')->whereMonth('data_saida','4')->count();
        $maio =      DB::table('servico_viaturas')->where('status','Aprovado')->whereMonth('data_saida','5')->count();
        $junho =     DB::table('servico_viaturas')->where('status','Aprovado')->whereMonth('data_saida','6')->count();
        $julho =     DB::table('servico_viaturas')->where('status','Aprovado')->whereMonth('data_saida','7')->count();
        $agosto =    DB::table('servico_viaturas')->where('status','Aprovado')->whereMonth('data_saida','8')->count();
        $setembro =  DB::table('servico_viaturas')->where('status','Aprovado')->whereMonth('data_saida','9')->count();
        $outubro =   DB::table('servico_viaturas')->where('status','Aprovado')->whereMonth('data_saida','10')->count();
        $novembro =  DB::table('servico_viaturas')->where('status','Aprovado')->whereMonth('data_saida','11')->count();
        $dezembro =  DB::table('servico_viaturas')->where('status','Aprovado')->whereMonth('data_saida','12')->count();

        return response()->json([$janeiro,$fevereiro,$marco,$abril,$maio,$junho,$julho,$agosto,$setembro,$outubro,$novembro,$dezembro]);

    }

}
