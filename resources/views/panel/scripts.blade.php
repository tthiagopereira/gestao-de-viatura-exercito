<!-- Bootstrap and necessary plugins -->
<script src="{{ asset('js/vendor/jquery.min.js') }}"></script>
<script src="{{ asset('js/vendor/popper.min.js') }}"></script>
<script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/vendor/pace.min.js') }}"></script>
<!-- Plugins and scripts required by all views -->
<script src="{{ asset('js/vendor/Chart.min.js') }}"></script>
<!-- CoreUI main scripts -->
<script src="{{ asset('js/app.js')}}"></script>



<script src="{{ asset('DataTables/datatables.min.js') }}" defer></script>
<script src="{{ asset('js/maskinput.js') }}"></script>
<script src="{{asset('plugs/AmaranJS/dist/js/jquery.amaran.min.js')}}"></script>


<script>
    jQuery(function ($) {
        $("#identidade_militar").mask("999999999-9");
        $("#contato").mask("(99) 99999-9999");
        $("#contato2").mask("(99) 99999-9999");
        // $("#placa").mask("9999-a999");
        // $('#placa').mask('99999 - 9999');
    });

    $(document).ready(function(){
        $(".caixa_alta").keyup(function(){
            $(this).val($(this).val().toUpperCase());
        });
        var mensagem = $('#mensagem').val();
        var sinal = $('#cor').val();

        if(mensagem){

            $.amaran({
                'theme'     :'colorful',
                'content'   :{
                    bgcolor : sinal,
                    color   :'#fff',
                    message : mensagem,
                    delay: 10000
                },
                'position'  :'top right',
                'inEffect'  :'slideRight'
            });
        }
    });

</script>