<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistema de gerenciamento de serviços e de pessoas">
    <meta name="author" content="Thiago Pereira dos Santos">
    <meta name="keyword" content="Sistema de gerenciamento de serviços e de pessoas">
    <!-- <link rel="shortcut icon" href="assets/ico/favicon.png"> -->


    <title>Parca - Sistema de Pedido de viaturas</title>

    <!-- Icons -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/simple-line-icons.css') }}" rel="stylesheet">

    <!-- Main styles for this application -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Styles required by this views -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">


    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}"/>
    <!--===============================================================================================-->
    <link href="{{ asset('js/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!--===============================================================================================-->
    {{--<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">--}}
    <link href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet">
    <!--===============================================================================================-->
    <link href="{{ asset('js/vendor/animate/animate.css') }}" rel="stylesheet">
    <!--===============================================================================================-->
    <link href="{{ asset('js/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet">
    <!--===============================================================================================-->
    <link href="{{ asset('js/vendor/select2/select2.min.css') }}" rel="stylesheet">
    <!--===============================================================================================-->
    <link href="{{ asset('css/util.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    <!--=============================================================-->
    <link rel="stylesheet" href="{{asset('plugs/AmaranJS/dist/css/amaran.min.css')}}">
</head>

<body class="app flex-row align-items-center">
@if(Session::has('mensagem'))
    <input type="text" value="{{Session::get('mensagem')['msg']}}" id="mensagem" hidden>
    <input type="text" value="{{Session::get('mensagem')['cor']}}" id="cor" hidden>
@endif
<div class="limiter">

    <div class="container-login100">

        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">
            Manual
        </button>
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter1">
            História
        </button>

        <div class="wrap-login100">

            <div class="login100-pic js-tilt" data-tilt>

                <img src="img/img-01.png" alt="IMG">

            </div>

            <form method="POST" action="{{ route('login') }}" class="login100-form validate-form">

                {{ csrf_field() }}

                <span class="login100-form-title">
						Parca
					</span>

                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">

                    <input type="text" name="identidade_militar" id="identidade_militar" class="form-control{{ $errors->has('identidade_militar') ? ' is-invalid' : '' }} input-sm chat-input input100" required placeholder="Identidade Militar">

                    @if ($errors->has('identidade_militar'))
                        {{--<span class="invalid-feedback teste" role="alert"  ><strong></strong></span>--}}
                        <input type="text" hidden value="{{ $errors->first('identidade_militar') }} " id="mensagem">
                    @endif

                    <script type="text/javascript">
                        setTimeout(function() {
                            $(".teste").fadeOut().empty();
                        }, 4000);
                    </script>

                    <span class="focus-input100"></span>

                    <span class="symbol-input100">

							<i class="fa fa-envelope" aria-hidden="true"></i>

                    </span>

                </div>

                <div class="wrap-input100 validate-input" data-validate = "Password is required">

                    <input type="password" name="password" class="form-control input-sm chat-input input100" placeholder="Informe a senha" required>

                    <span class="focus-input100"></span>

                    <span class="symbol-input100">

							<i class="fa fa-lock" aria-hidden="true"></i>

						</span>

                </div>

                <div class="container-login100-form-btn">
                    <button id="teste" type="submit" class="login100-form-btn">
                        Entrar
                    </button>
                </div>

                <div class="text-center p-t-12">
                    <a class="txt2" href="{{ route('register') }}">
                        Novo usuário
                    </a>
                </div>
                <div class="text-center p-t-12">
                    <a class="txt2" href="{{ route('senha') }}">
                        Esqueceu a senha ?
                    </a>
                </div>

                <div class="text-center p-t-120">

                    <div class="footer text-white text-center txt2">

                        <p>© 2019 Parca -Sistema de Pedido de Viaturas - Este sistema foi desenvolvido pela

                            <a href="#" class="link-simples-branco" data-toggle="modal" data-target="#largeModal">

                                SDS/12 RM

                            </a>

                        </p>

                    </div>

                </div>
            </form>

        </div>

        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title audiowide" id="exampleModalLongTitle">Bem vindo</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4>SPV - Sistema de pedido de viatura</h4>
                        <hr>
                        <p class="alert alert-success">Tela de login - Caso tenha realizado seu registro apenas informe sua identidade militar e sua senha para acessar o sistema.</p>
                        <hr>
                        <p class="alert alert-danger">Caso não tenha realizado seu registro no sistema clique no botão "Registra-se e informe seus dados para ter acesso ao sistema."</p>
                        <hr>
                        <p class="alert alert-dark">
                            Objetivo do sistema - Melhoramento do processo dos pedidos de viatura.
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title audiowide" id="exampleModalLongTitle">Bem vindo</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4>Parcas</h4>
                        <hr>
                        As parcas, na mitologia romana (moiras na mitologia grega), eram filhas da noite (ou de Zeus e de Témis). Divindades que controlam o destino dos mortais e determinam o curso da vida humana, decidindo questões como vida e morte, de maneira que nem Zeus poderia contestar suas decisões.

                        São também designadas fates, daí o termo fatalidade. São três deusas: Nona (Cloto), "Décima" (Láquesis) e "Morta" (Átropos). Cloto tece o fio da vida, Décima cuida de sua extensão e caminho, Morta corta o fio.

                        Interessante notar que em Roma se tinha a estrutura de calendário solar para os anos, e lunar para os atuais meses. A gravidez humana é de nove luas, não nove meses; portanto Nona tece o fio da vida no útero materno, até a nona lua; Décima representa o nascimento efetivo, o corte do cordão umbilical, o início da vida terrena, o individuo definido, a décima lua. Morta é a outra extremidade, o fim da vida terrena, que pode ocorrer a qualquer momento.

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title audiowide">Parca - Sistema de Pedido de Viaturas</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="text-center">
                            <h3 class="">Informações sobre os desenvolvedores</h3>
                        </div>
                        <hr>
                        <div class="row ">

                            <div class="col-md-1"></div>

                            <div class="col-md-10 text-center">


                                <div class="card">
                                    <div class="card-header">
                                        Desenvolvedor Full-Stack
                                    </div>

                                    <div class="card-body">

                                        <div class="row">

                                            <div class="col-md-2">
                                                <img src="/img/militar.png"
                                                     class="img-fluid mx-auto d-block img-thumbnail">
                                            </div>

                                            <div class="col-md-10">

                                                <ul>
                                                    <li>Nome - Thiago Pereira dos Santos</li>
                                                    <li>Posto - 3º Sgt</li>
                                                    <li>Nome de Guerra - Sgt Dos Santos</li>
                                                    <li>OM - 12ª Região Militar</li>
                                                    <li>email - tthiagopereira7@gmail.com</li>
                                                </ul>

                                            </div>

                                        </div>

                                    </div>

                                </div>


                            </div>

                            <div class="col-md-1"></div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fecha</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

    </div>

</div>

<!--===============================================================================================-->
<script src="{{ asset('js/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('js/vendor/bootstrap/js/popper.js') }}"></script>
<script src="{{ asset('js/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('js/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('js/vendor/tilt/tilt.jquery.min.js') }}"></script>
<script >
    $('.js-tilt').tilt({
        scale: 1.1
    })

    var mensagem = $('#mensagem').val();

    $(document).ready(function(){

        if(mensagem){
            $.amaran({
                'theme'     :'colorful',
                'content'   :{
                    bgcolor:'#ae3232',
                    color:'#fff',
                    message: mensagem
                },
                'position'  :'bottom right',
                'outEffect' :'slideBottom'
            });
        }
    });



</script>
<!--===============================================================================================-->
<!-- Bootstrap and necessary plugins -->
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/vendor/jquery.min.js') }}"></script>
<script src="{{ asset('js/vendor/popper.min.js') }}"></script>
<script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
<script src="{{asset('plugs/AmaranJS/dist/js/jquery.amaran.min.js')}}"></script>
<script src="{{ asset('js/maskinput.js') }}"></script>
<script>
    jQuery(function ($) {
        $("#identidade_militar").mask("999999999-9");
        $("#contato").mask("(99) 99999-9999");
    });
</script>

</body>
</html>