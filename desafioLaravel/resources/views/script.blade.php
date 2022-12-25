<script>
  $(document).ready(function() {

    $('#tabelaCadastros').DataTable({
      "order": [
        [1, "desc"]
      ],
      "scrollX": true,
      "scrollY": "450px",
      "pageLength": 70,
      "oSearch": {
        "bSmart": false
      },
      "search": {
        regex: false,
        smart: false
      },
      "lengthMenu": [15, 25, 50, 100, 200],
      "dom": 'lBfrtipr',
      "aoColumnDefs": [{
        'bSortable': false,
        'aTargets': [0]
      }],
      buttons: [
        'excelHtml5'
      ],
      "language": {
        "lengthMenu": "Exibindo MENU registros por páginas",
        "zeroRecords": "Sem registros",
        "info": "Exibindo página PAGE de PAGES",
        "search": "Pesquisar:",
        "infoEmpty": "sem registros",
        "infoFiltered": "(Filtrado de MAX registros)",
        "paginate": {
          "previous": "Anterior",
          "next": "Próxima"
        }
      },
    });

    id = $('#id_cad_cli').val();
    if (id) {

      carregarReferencias(id)
      carregarBancos(id)
      carregarHistorico(id)
    }
    $('#abrirModalBanco').click(function() {

      $('#modalBanco').show();

    });
    $('#fecharModalBanco').click(function() {

      $('#modalBanco').hide();

    });
    $('#abrirModalReferencia').click(function() {

      $('#modalReferencia').show();

    });
    $('#fecharModalReferencia').click(function() {

      $('#modalReferencia').hide();

    });
    $('#cadastrarBanco').on('click', function(e) {
      e.preventDefault();
      let id_cadastro = $('#id_cad_cli').val();
      bancoC = $('#bancoC').val();
      agenciaC = $('#agenciaC').val();
      contaC = $('#contaC').val();
      aberturaC = $('#aberturaC').val();
      chequeC = $('#chequeC').val();

      $.ajax({
        url: '/intranet/bancos/store',
        type: 'POST',
        data: {
          id_cadastro: id_cadastro,
          bancoC: bancoC,
          agenciaC: agenciaC,
          contaC: contaC,
          aberturaC: aberturaC,
          chequeC: chequeC
        },
        enctype: "application/json",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
          carregarBancos(id_cadastro)
        }

      });



    });

    $('#cadastrarReferencia').on('click', function(e) {
      e.preventDefault();
      let id_cadastro = $('#id_cad_cli').val();
      nomeR = $('#nomeR').val();
      dddR = $('#dddR').val();
      telefoneR = $('#telefoneR').val();
      parentescoR = $('#parentescoR').val();
      
      $.ajax({
        url: '/intranet/referencias/store',
        type: 'POST',
        data: {
          id_cadastro: id_cadastro,
          nomeR: nomeR,
          dddR: dddR,
          telefoneR: telefoneR,
          parentescoR:   parentescoR
        },
        enctype: "application/json",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
          
          carregarReferencias(id_cadastro)
        }

      });



    });

    $(document).on('click', '#delBanco', function() {
      let id = $(this).attr('data-id');
      let id_cadastro = $('#id_cad_cli').val();
      $.ajax({
        url: '/intranet/bancos/trash',
        type: 'POST',
        dataType: 'json',
        data: {
          id: id,
          _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
          carregarBancos(id_cadastro)

        }

      });


    });

    $(document).on('click', '#delReferencia', function() {
      let id = $(this).attr('data-id');
      let id_cadastro = $('#id_cad_cli').val();
      $.ajax({
        url: '/intranet/referencias/trash',
        type: 'POST',
        dataType: 'json',
        data: {
          id: id,
          _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
          carregarReferencias(id_cadastro)

        }

      });


    });
    $(document).on('click', '#getDetalheHist', function() {
      let id = $(this).attr('data-id');
     
      carregarHistoricoDetalhe(id)

    });




    function carregarReferencias(id) {
      $.ajax({
        url: '/intranet/referencias/get/' + id,
        type: 'GET',
        success: function(data) {
          let html = '';
          for (let i = 0; i < data.referencias.length; i++) {
            html += '<tr>';
            html += '<td> ' + data.referencias[i].nome + '</td>';
            html += '<td> ' + data.referencias[i].telefone_ddd + '</td>';
            html += '<td> ' + data.referencias[i].telefone + '</td>';
            switch (data.referencias[i].parentesco) {
              case "1":
                html += '<td>Amigo</td>';
                break;
              case "2":
                html += '<td>Vizinho</td>';
                break;
              case "3":
                html += '<td>Irmão</td>';
                break;
              case "4":
                html += '<td>Pai</td>';
                break;
              case "5":
                html += '<td>Mãe</td>';
                break;
              case "6":
                html += '<td>Filho</td>';
                break;
              case "7":
                html += '<td>Outros</td>';
                break;
              default:
                html += '<td>Não informado</td>';
            }

            html += '<td><button type="button" id="delReferencia" data-id="' + data.referencias[i].id + '" class="btn btn-white"><i class="fa fa-trash" aria-hidden="true"></i></button></td>';
            html += '</tr>';

          }

          $('#body-cli').html(html);

        }

      });

    }

    function carregarHistorico(id) {
      $.ajax({
        url: '/intranet/historico/get/' + id,
        type: 'GET',
        success: function(data) {
        
         let html = '';
          for (let i = 0; i < data.historico.length; i++) {
            datas = data.historico[i].posted;
            dataFormatada = datas.replace(/(\d*)-(\d*)-(\d*).*/, '$3-$2-$1');
            html += '<tr>';
            html += '<td> ' + dataFormatada + '</td>';
            html += '<td> ' + data.historico[i].id_financeira + '</td>';
            switch (data.historico[i].tipo_liquidacao) {
              case "1":
                html += '<td>Cheque</td>';
                break;
              case "2":
                html += '<td>Consignação</td>';
                break;
              case "3":
                html += '<td>Débito em conta</td>';
                break;
              case "4":
                html += '<td>Carnê</td>';
                break;
              default:
                html += '<td>Não informado</td>';
            }
            html += '<td> ' + data.historico[i].valor_financiado + '</td>';
            switch (data.historico[i].id_status) {
              case "0":
                html += '<td>Pré-análise</td>';
                break;
              case "1":
                html += '<td>Análise</td>';
                break;
              case "2":
                html += '<td>Recusado</td>';
                break;
              case "3":
                html += '<td>Aprovado</td>';
                break;
              case "4":
                html += '<td>Formalizado</td>';
                break;
              case "5":
                html += '<td>Andamento</td>';
                break;
              case "6":
                html += '<td>Quitado</td>';
                break;
              case "7":
                html += '<td>Atrasado</td>';
                break;
              case "8":
                html += '<td>Cancelado</td>';
                break;
              case "9":
                html += '<td>Trabalhando</td>';
                break;
              default:
                html += '<td>Não informado</td>';
            }
            html += '<td><button type="button" id="getDetalheHist" data-id="' + data.historico[i].id + '" class="btn btn-white"><i class="fa fa-check" aria-hidden="true"></i></button></td>';
            html += '</tr>';

          }

          $('#body-hist').html(html);

        }

      });

    }

    function carregarHistoricoDetalhe(id) {
      $.ajax({
        url: '/intranet/historico/get/detalhe/' + id,
        type: 'GET',
        success: function(data) {
          for (let i = 0; data.historico_detalhe.length > 0; i++) {
          var datas = data.historico_detalhe[i].posted;
          $('#hdPosted').val(datas.replace(/(\d*)-(\d*)-(\d*).*/, '$3-$2-$1'));
          $('#hdLiquidacao').val(data.historico_detalhe[i].tipo_liquidacao);
          $('#hdFinanceira').val(data.historico_detalhe[i].id_financeira);
          $('#hdStatus').val(data.historico_detalhe[i].id_status)
          $('#hdValorF').val(data.historico_detalhe[i].valor_financiado)
          $('#hdValorL').val(data.historico_detalhe[i].valor_liquido)
          let qtParc = 100;
          html = '';
          for (let i = 0; i < qtParc; i++) {
            
            html += '<option value="'+ i +'">'+ i +'</option>';
          }
          $('#hdQtdeParcelas').html(html);
          
          $('#hdQtdeParcelas').val(data.historico_detalhe[i].quantidade_parcelas)
          $('#hdCorretor').val(data.historico_detalhe[i].id_usuario)
          $('#hdValorParcelas').val(data.historico_detalhe[i].valor_parcelas)
          $('#hdTaxa').val(data.historico_detalhe[i].taxa)
          $('#hdPrimeiroVenc').val(data.historico_detalhe[i].primeiro_vencimento)
          $('#hdFaturamento').val(data.historico_detalhe[i].faturamento)
          $('#hdAgendamento').val(data.historico_detalhe[i].data_agendamento)
          $('#hdObservacoes').html(data.historico_detalhe[i].observacoes_historico)
          carregarHistoricoLog(data.historico_detalhe[i].id)
          }
          

        }

      });

    }

    function carregarBancos(id) {
      $.ajax({
        url: '/intranet/bancos/get/' + id,
        type: 'GET',
        success: function(data) {
          let html = '';
          for (let i = 0; i < data.bancos.length; i++) {
            html += '<tr>';
            html += '<td> ' + data.bancos[i].banco + '</td>';
            html += '<td> ' + data.bancos[i].agencia + '</td>';
            html += '<td> ' + data.bancos[i].conta + '</td>';
            switch (data.bancos[i].cheque) {
              case 1:
                html += '<td>Sim</td>';
                break;
              default:
                html += '<td>Não</td>';
            }
            html += '<td> ' + data.bancos[i].abertura + '</td>';
            html += '<td><button type="button" id="delBanco" data-id="' + data.bancos[i].id + '" class="btn btn-white"><i class="fa fa-trash" aria-hidden="true"></i></button></td>';

            html += '</tr>';

          }

          $('#body-bco').html(html);

        }

      });

    }

    function carregarHistoricoLog(id) {
      $.ajax({
        url: '/intranet/historico/log/get/' + id,
        type: 'GET',
        success: function(data) {
          let html = '';
          for (let i = 0; i < data.logs.length; i++) {
            d = data.logs[i].data
            dataSeparada = d.split(" ")
            html += '<tr>';
            html += '<td> ' + dataSeparada[0].replace(/(\d*)-(\d*)-(\d*).*/, '$3-$2-$1') + '</td>';
            html += '<td> ' + dataSeparada[1]  + '</td>';
            html += '<td> ' + data.logs[i].status + '</td>';
            html += '<td> ' + data.logs[i].usuario + '</td>';
            html += '<td> ' + data.logs[i].texto + '</td>';

            html += '</tr>';

          }

          $('#logs-hist').html(html);

        }

      });

    }


  });
</script>