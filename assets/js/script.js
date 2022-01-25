// configurações
var base_url = '/teste_p21';

$(() => {
    
    // Ações do botão da página princripal
    $("#btn_import_xml").on('click', function () {
        window.location="importacao";
    })
    $("#btn_send_communication").on('click', function () {
        window.location="enviar";
    })

    // MASK
    $(".mask_my").mask('00/0000')
    $(".mask_cel").mask('(00) 00000-0000');
    $(".mask_cep").mask('00000-000');

    // Subir xml importado
    $("#btn_subir_import").on('click', function () {
        var mesano = $("form#form_import_info #inp_mes").val();
        var inp_file = $("#inp_file").val();
        
        if(mesano < 7){
            show_erro('Informe o Mês/Ano!');
            return false;
        }

        if(inp_file.slice(-3) !== 'xml' || inp_file == '') {
            show_erro("Informe o arquivo XML.");
            return false;
        }

        $("#form_import_info").submit();



    })

    // Cadastro manual
    $("#btn_cad_manual").on('click', function () {
        var nome = $("form#form_cad_manual #nome").val();
        var documento = $("form#form_cad_manual #documento").val();
        var cep = $("form#form_cad_manual #cep").val();
        var endereco = $("form#form_cad_manual #endereco").val();
        var telefone = $("form#form_cad_manual #telefone").val();
        var bairro = $("form#form_cad_manual #bairro").val();
        var cidade = $("form#form_cad_manual #cidade").val();
        var uf = $("form#form_cad_manual #uf").val();
        var email = $("form#form_cad_manual #email").val();

        if( nome == '' ||
            documento == '' ||
            cep == '' ||
            endereco == '' ||
            telefone.length < 14 ||
            bairro == '' ||
            cidade == '' ||
            uf == '' ||
            email == '' 
        ){
            show_erro("Informe todos campos para inserir um torcedor");
            return false;
        }

        $("#form_cad_manual").submit();

    })

    // Enviar comunicado
    $("#btn_enviar").on('click', function () {
        var mensagem = $("form#form_enviar #mensagem").val();

        if( mensagem == '' )
        {
            show_erro("Informe a mensagem que deseja enviar!");
            return false;
        }

        $("#form_enviar").submit();

    })
    
})

function show_erro(mensagem){
    Swal.fire({
        icon: 'error',
        title: '',
        text: mensagem
      })

}

// Editar torcedores
function abre_edicao_torcedores (documento){

    Swal.fire({
        title: 'Por favor aguarde!',
        html: 'Dados sendo carregado para atualização',// add html attribute if you want or remove    
        onBeforeOpen: () => {
            Swal.showLoading()
        },
    });

    $.ajax({
        url : base_url + "/principal/get_dados",
        type : 'post',
        data : {
             documento : documento
        }
   })
   .done(function(retorno){
        var parse = JSON.parse(retorno);

        var nome = parse.nome;
        var documento = parse.documento;
        var cep = parse.cep;
        var email = parse.email;
        var telefone = parse.telefone;
        var bairro = parse.bairro;
        var cidade = parse.cidade;
        var endereco = parse.endereco;
        var uf = parse.uf;

        $("#nome").val(nome);
        $("#documento").val(documento);
        $("#email").val(email);
        $("#cep").val(cep);
        $("#telefone").val(telefone);
        $("#bairro").val(bairro);
        $("#cidade").val(cidade);
        $("#endereco").val(endereco);
        $("#uf").val(uf);

        $("#btn_cad_manual").html('Atualizar');
        $("#title_cad_alt").html('Atualizar cadastro');
   })

}