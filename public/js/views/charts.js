
$(function (){
  'use strict';

  carregarPedidos()

  carregarViaturas()

  carregarMotoristas()

  carregarQuantidadeMissoes()

  function carregarPedidos() {
    $.ajax({
      url   : '/carrega/pedidos',
      method: 'get',
      success: function (retorno) {
        if (retorno === 0) {
          $('.analise').html('Sem dados');
          $('.processando').html('Sem dados');
          $('.aprovado').html('Sem dados');
          $('.qtd_pedidos').html('Sem dados');
        } else {
          $('.analise').html(retorno[0]);
          $('.processando').html(retorno[1]);
          $('.aprovado').html(retorno[2]);
          $('.qtd_pedidos').html(retorno[0]+retorno[1]+retorno[2]);

          var analise = retorno[0]
          var processadas = retorno[1]
          var aprovadas = retorno[2]
          var total = retorno[0]+retorno[1]+retorno[2]

          var resultadoAnalise     = (analise     * 100) / total;
          var resultadoProcessadas = (processadas * 100) / total;
          var resultadoAprovadas   = (aprovadas   * 100) / total;


          var pieData = {
            labels: [
              'Analise',
              'Processadas',
              'Aprovadas',
            ],
            datasets: [{

              data: [resultadoAnalise.toFixed(2),resultadoProcessadas.toFixed(2),resultadoAprovadas.toFixed(2)],

              backgroundColor: [
                '#a11500',
                '#1b35a1',
                '#05a110',
              ],

              hoverBackgroundColor: [
                '#a11500',
                '#1b35a1',
                '#05a110',
              ]

            }]
          };

          var ctx = document.getElementById('pedido_viatura');

          var chart = new Chart(ctx, {
            type: 'pie',
            data: pieData,
            options: {
              responsive: true
            }
          });
        }
      }
    })

  }

  function carregarViaturas() {
    $.ajax({
      url   : '/carrega/viaturas',
      method: 'get',
      success: function (retorno) {
        if (retorno === 0) {
          $('.viatura-ativa').html('Sem dados');
          $('.viatura-baixada').html('Sem dados');

        } else {
          $('.viatura-ativa').html(retorno[0]);
          $('.viatura-baixada').html(retorno[1]);

          var resultaAtivas = (retorno[0] * 100 )/ (retorno[0]+retorno[1]);
          var resultaBaixadas = (retorno[1] * 100) / (retorno[0] + retorno[1]);

          var pieData = {
            labels: [
              'Ativas',
              'Baixadas',
            ],
            datasets: [{

              data: [resultaAtivas.toFixed(2), resultaBaixadas.toFixed(2)],

              backgroundColor: [
                '#0fa731',
                '#a11500',
              ],

              hoverBackgroundColor: [
                '#0fa731',
                '#a11500',
              ]

            }]
          };

          var ctx = document.getElementById('canvas-5');

          var chart = new Chart(ctx, {
            type: 'pie',
            data: pieData,
            options: {
              responsive: true
            }
          });

        }
      }
    })

  }

  function carregarQuantidadeMissoes() {
    $.ajax({
          url   : '/carrega/quantidade/missoes',
          method: 'get',
          success: function (retorno) {
            var barChartData = {
              labels : ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
              datasets : [

                {
                  backgroundColor : 'rgba(151,187,205,0.5)',
                  borderColor : 'rgba(151,187,205,0.8)',
                  highlightFill : 'rgba(151,187,205,0.75)',
                  highlightStroke : 'rgba(151,187,205,1)',
                  data : [retorno[0],retorno[1],retorno[2],retorno[3],retorno[4],retorno[5],retorno[6],retorno[7],retorno[8],retorno[9],retorno[10],retorno[11]]
                }
              ]
            }
            var ctx = document.getElementById('canvas-2');
            var chart = new Chart(ctx, {
              type: 'bar',
              data: barChartData,
              options: {
                responsive: true
              }
            });
          }
        }
    )
  }

  function carregarMotoristas() {
    var i
    $.ajax({
          url   : '/carrega/quantidade/motoristas',
          method: 'get',
          success: function (retorno) {

            console.log(retorno)
            var doughnutData = {
              labels: [

                  'teste','teste','teste'

                  ],

              datasets: [{
                data: [300, 50, 100],
                backgroundColor: [
                  '#FF6384',
                  '#36A2EB',
                  '#FFCE56'
                ],
                hoverBackgroundColor: [
                  '#FF6384',
                  '#36A2EB',
                  '#FFCE56'
                ]
              }]
            };
            var ctx = document.getElementById('canvas-3');

            var chart = new Chart(ctx, {
              type: 'doughnut',
              data: doughnutData,
              options: {
                responsive: true
              }
            });
          }
        }
    )
  }

  var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
  var lineChartData = {
    labels : ['January','February','March','April','May','June','July'],
    datasets : [
      {
        label: 'My First dataset',
        backgroundColor : 'rgba(220,220,220,0.2)',
        borderColor : 'rgba(220,220,220,1)',
        pointBackgroundColor : 'rgba(220,220,220,1)',
        pointBorderColor : '#fff',
        data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
      },
      {
        label: 'My Second dataset',
        backgroundColor : 'rgba(151,187,205,0.2)',
        borderColor : 'rgba(151,187,205,1)',
        pointBackgroundColor : 'rgba(151,187,205,1)',
        pointBorderColor : '#fff',
        data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
      }
    ]
  }

  var ctx = document.getElementById('canvas-1');
  var chart = new Chart(ctx, {
    type: 'line',
    data: lineChartData,
    options: {
      responsive: true
    }
  });







  var radarChartData = {
    labels: ['Eating', 'Drinking', 'Sleeping', 'Designing', 'Coding', 'Cycling', 'Running'],
    datasets: [
      {
        label: 'My First dataset',
        backgroundColor: 'rgba(220,220,220,0.2)',
        borderColor: 'rgba(220,220,220,1)',
        pointBackgroundColor: 'rgba(220,220,220,1)',
        pointBorderColor: '#fff',
        pointHighlightFill: '#fff',
        pointHighlightStroke: 'rgba(220,220,220,1)',
        data: [65,59,90,81,56,55,40]
      },
      {
        label: 'My Second dataset',
        backgroundColor: 'rgba(151,187,205,0.2)',
        borderColor: 'rgba(151,187,205,1)',
        pointBackgroundColor: 'rgba(151,187,205,1)',
        pointBorderColor: '#fff',
        pointHighlightFill: '#fff',
        pointHighlightStroke: 'rgba(151,187,205,1)',
        data: [28,48,40,19,96,27,100]
      }
    ]
  };
  var ctx = document.getElementById('canvas-4');
  var chart = new Chart(ctx, {
    type: 'radar',
    data: radarChartData,
    options: {
      responsive: true
    }
  });


  var polarData = {
    datasets: [{
      data: [
        11,
        16,
        7,
        3,
        14
      ],
      backgroundColor: [
        '#FF6384',
        '#4BC0C0',
        '#FFCE56',
        '#E7E9ED',
        '#36A2EB'
      ],
      label: 'My dataset' // for legend
    }],
    labels: [
      'Red',
      'Green',
      'Yellow',
      'Grey',
      'Blue'
    ]
  };
  var ctx = document.getElementById('canvas-6');
  var chart = new Chart(ctx, {
    type: 'polarArea',
    data: polarData,
    options: {
      responsive: true
    }
  });











});
