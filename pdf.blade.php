<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Ficha de pedido de viatura</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <style>
        .centro{
            padding: 0px 0px 0px 0px;
            text-align: center;
            margin: auto;
            /*border: 3px solid #73AD21;*/
        }
        img{
            position: absolute;
        }
        .sublinhado{
            text-decoration: underline;
        }
        .sublinhado-em-cima{
            text-decoration: overline;
        }
        .espacamento{
            line-height: 0;
        }
        .remover-espaco{
            padding: 0px;
            border: 0px;
            border-collapse:collapse
        }

        .dados td,
        .dados th{
            border: 2px solid black ;
        }
        .dados table{
            margin: 0;
            text-align: center;
            border-collapse: collapse;
        }

        table, td, th {
            border: 1px solid #ddd;
            text-align: left;
            font-size: 13px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: center;
        }
        .cabecalho {
            text-align: center;
            font-weight: bold;
            font-size: 13px;

        }
        .logo {
            position: relative;
            top: -55px;
            left: 40%;
        }
        .relative {
            height: 100px;
            width: 400px;
            position: relative;
            top: 0%;
            left: 30%;
        }

        .linha {
            border: 3px solid #ddd;
        }

        .preto {
            background-color: #0b0e0f;
        }

    </style>
</head>

<body>

<div class="espaco">
    <br><br>
    <div class="relative">

        <div class="cabecalho">

            MINISTÉRIO DA DEFESA <br>
            EXÉRCITO BRASILEIRO <br>
            COMANDO DA 12ª REGIÃO MILITAR <br>
            "REGIÃO MENDOÇA FURTADO" <br>
            (Comando de Elementos de Fronteira /1948)

        </div>

    </div>

    <table class="dados">

        <tr>
            <th class="sublinhado-em-cima centro"><br>CMT CIA CMDO 12º RM</th>

            <th class="centro">

                PLANOS DE TRANSPORTE

                <br> PARA O DIA

                @if($data_inicial === null || $data_final === null)

                    ( Todos os registros )

                @elseif($data_inicial === $data_final)

                    {{date('d/m/Y',strtotime($data_inicial))}}

                @else

                    {{date('d/m/Y',strtotime($data_inicial))}} ATÉ  {{date('d/m/Y',strtotime($data_final))}}

                @endif

            </th>

            <th class="sublinhado-em-cima centro"><br>GARAGEM</th>

        </tr>

    </table>

    <table class="dados">
        <tr>
            <th>CHE DE VTR</th>
            <th>MISSÃO</th>
            <th>ITINERÁRIO</th>
            <th>HORARIOS</th>
            <th>VIATURA</th>
            <th>DOC</th>
            <th>MOTORISTA</th>
            <th>TELEFONE</th>
            <th>FICHA</th>
        </tr>

        <?php

        $aux = array();

        ?>


        @foreach($registros as $registroData)
            <?php
            array_push($aux,$registroData->data_inicial);
            $aux_data = array_unique($aux);
            asort($aux_data);
            ?>
        @endforeach

        @if(!empty($aux_data))

            @foreach($aux_data as $datas)

                <tr class="">
                    <td colspan="9" >
                        <h4 style=" padding: -10px;">
                            <?php
                            $meses = array (1 => "Janeiro", 2 => "Fevereiro", 3 => "Março", 4 => "Abril", 5 => "Maio", 6 => "Junho", 7 => "Julho", 8 => "Agosto", 9 => "Setembro", 10 => "Outubro", 11 => "Novembro", 12 => "Dezembro");
                            $diasdasemana = array (1 => "Segunda-Feira",2 => "Terça-Feira",3 => "Quarta-Feira",4 => "Quinta-Feira",5 => "Sexta-Feira",6 => "Sábado",0 => "Domingo");

                            $hoje = getdate(strtotime($datas));

                            $dia = $hoje["mday"];
                            $mes = $hoje["mon"];
                            $nomemes = $meses[$mes];
                            $ano = $hoje["year"];
                            $diadasemana = $hoje["wday"];
                            $nomediadasemana = $diasdasemana[$diadasemana];

                            echo "$nomediadasemana, $dia de $nomemes de $ano";
                            ?>
                        </h4>
                    </td>
                </tr>

                @foreach($registros as $registro)
                    @if($registro->fixo == 1)
                        @if($registro->data_inicial == $datas)
                            <tr>
                                <td>{{$registro->chefe_viatura}}</td>
                                <td>{{$registro->missao}}</td>
                                <td>{{$registro->itinerario}}</td>
                                <td>{{date('H:i',strtotime($registro->hora_saida))}} - {{date('H:i',strtotime($registro->hora_entrada))}}</td>
                                <td>{{$registro->modelo}} - {{$registro->placa}} @if($registro->eb) - @endif {{$registro->eb}}</td>
                                <td>@if($registro->documento === 'sem pendencia') ok @else {{$registro->documento}} @endif </td>
                                <td>{{$registro->motorista}}</td>
                                <td>{{$registro->contato}}<br>{{$registro->contato_motorista}}</td>
                                <td>{{$registro->ficha}} </td>
                            </tr>
                        @endif
                    @endif
                @endforeach

                @foreach($registros as $registro)
                    @if($registro->fixo == 0)
                        @if($registro->data_inicial == $datas)
                            <tr>
                                <td>{{$registro->chefe_viatura}}</td>
                                <td>{{$registro->missao}}</td>
                                <td>{{$registro->itinerario}}</td>
                                <td>{{date('H:i',strtotime($registro->hora_saida))}} - {{date('H:i',strtotime($registro->hora_entrada))}}</td>
                                <td>{{$registro->modelo}} - {{$registro->placa}} @if($registro->eb) - @endif {{$registro->eb}}</td>
                                <td>@if($registro->documento === 'sem pendencia') ok @else {{$registro->documento}} @endif </td>
                                <td>{{$registro->motorista}}</td>
                                <td>{{$registro->contato}}<br>{{$registro->contato_motorista}}</td>
                                <td>{{$registro->ficha}} </td>
                            </tr>
                        @endif
                    @endif
                @endforeach

            @endforeach

        @endif

    </table>

    <table class="dados">
        <tr>
            <th>Quantidade de registros: {{$registros->count()}}</th>
        </tr>
    </table>
</div>

</body>

</html>

