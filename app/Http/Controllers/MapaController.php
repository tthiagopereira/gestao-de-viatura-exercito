<?php

namespace App\Http\Controllers;

use App\Mapa;
use App\Viatura;
use Hamcrest\Text\MatchesPattern;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Monolog\Processor\GitProcessor;

class MapaController extends Controller
{

    public function index()
    {

        $registros = Mapa::where('fixo','=','0')->get();

        $fixos = Mapa::where('fixo','=','1')->get();

        return view('sistema.mapa_viatura.index',compact('registros','fixos'));

    }

    public function pesquisaData(Request $request){

        $data_inicial = $request['data_inicial'];
        $data_final = $request['data_final'];

        $fixos = Mapa::where('fixo','=','1')->get();
        $registros = Mapa::where('fixo','=','0')->whereBetween('data_inicial',[$data_inicial,$data_final])->get();

        return view('sistema.mapa_viatura.index',compact('registros','data_inicial','data_final','fixos'));

    }

    public function pdf(Request $request){

        if($request['data_final'] === null || $request['data_inicial'] === null){

            $data_inicial = $request['data_inicial'];
            $data_final   = $request['data_final'];

            $fixos = Mapa::where('fixo','=','1')->get();
            $registros = Mapa::where('fixo','=','0')->get();


//            return view('sistema.mapa_viatura.form.pdf',compact('registros'));
            return \PDF::loadView('sistema.mapa_viatura.form.pdf', compact('registros','data_final','data_inicial','fixos'))
                // Se quiser que fique no formato a4 retrato:
                ->setPaper('a4', 'landscape')
//                ->download('ficha-de-viastura.pdf');
                ->stream('ficha-de-viatura.pdf');

        }else{

            $data_inicial = $request['data_inicial'];
            $data_final = $request['data_final'];

            $fixos = Mapa::where('fixo','=','1')->orderBy('ficha', 'asc')->get();

            $registros = Mapa::where('fixo','=','0')->whereBetween('data_inicial',[$data_inicial,$data_final])->orderBy('ficha', 'asc')->get();

            return \PDF::loadView('sistema.mapa_viatura.form.pdf', compact('registros','data_inicial','data_final','fixos'))
                // Se quiser que fique no formato a4 retrato:
                ->setPaper('a4', 'landscape')
//                ->download('ficha-de-viastura.pdf');
                ->stream('ficha-de-viatura.pdf');

//            return view('sistema.mapa_viatura.form.pdf',compact('registros','data_inicial','data_final'));

        }

    }

    public function editar($id){

        $registro = Mapa::find($id);

        $viaturas = Viatura::all();

        return view('sistema.mapa_viatura.form.editar',compact('registro','viaturas','id'));

    }

    public function update(Request $request, $id){

        $verifica = Mapa::where('ficha',$request['ficha'])->count();
        $registro = Mapa::find($id);

        if($registro->ficha == $request['ficha']) {

            $registro->chefe_viatura = $request['chefe_viatura'];
            $registro->contato = $request['contato'];
            $registro->motorista = $request['motorista'];
            $registro->contato_motorista = $request['contato2'];
            $registro->fixo = $request['fixo'];
            $registro->data_inicial = $request['data_inicial'];
            $registro->data_final = $request['data_final'];
            $registro->ficha = $request['ficha'];

        }elseif ($verifica) {
            \Session::flash('mensagem',['msg'=>'Número da ficha já sendo utilizado!','cor'=>'#6E0500']);

            $registro = Mapa::find($id);

            $viaturas = Viatura::all();

            return view('sistema.mapa_viatura.form.editar',compact('registro','viaturas','id'));
        }

        $registro->chefe_viatura = $request['chefe_viatura'];
        $registro->contato = $request['contato'];
        $registro->motorista = $request['motorista'];
        $registro->contato_motorista = $request['contato2'];
        $registro->fixo = $request['fixo'];
        $registro->data_inicial = $request['data_inicial'];
        $registro->data_final = $request['data_final'];
        $registro->ficha = $request['ficha'];

        $viatura = Viatura::find($request['viatura_id']);

        $registro->modelo = $viatura->modelo;
        $registro->placa  = $viatura->placa;
        $registro->eb     = $viatura->eb;

        $registro->update();

        \Session::flash('mensagem',['msg'=>'Mapa alterado com sucesso!','cor'=>'#0F6A18']);

        return redirect()->route('mapas');

    }

}