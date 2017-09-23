$(document).ready(function () {
    $("#btnEnviarServico").on('click touchstart', function () {
        var form = document.getElementById('formCadastrarServico');
        descricao = form.descricao.value;
        descricaoDetalhada = form.descricaoDetalhada.value;
        categoria = form.categoria.value;
        setor = form.setor.value;
        responsavel = form.responsavel.value;
        setor_dois = form.setor_dois.value;
        responsavel_dois = form.responsavel_dois.value;

        if (descricao == "") {
            alert("Preencha o campo Descrição");
        } else if (descricaoDetalhada == "") {
            alert("Preencha o campo Descrição Detalhada");
        } else if (categoria == "vazio") {
            alert("Selecione a Categoria");
        } else if (setor == "vazio") {
            alert("Selecione o setor");
        } else if (responsavel == "") {
            alert("Preencha o nome do Responsável");
        } else if (setor_dois == "vazio") {
            alert("Selecione o setor");
        } else if (responsavel_dois == "") {
            alert("Preencha o nome do Responsável");
        } else {
            $.ajax({
                type: 'POST',
                url: '/inserirServico',
                data: {
                    descricao: descricao,
                    descricaoDetalhada: descricaoDetalhada,
                    categoria: categoria,
                    setor: setor,
                    responsavel: responsavel,
                    setor_dois: setor_dois,
                    responsavel_dois: responsavel_dois
                },
                success: function (data) {
                    alert(data);
                },
                error: function (data) {
                    alert(data.toString());
                }
            });
        }
    });
});



$(document).ready(function () {
    $("#btnEnviarCategoria").on('click touchstart', function () {
        categoria = $("#nomeCategoria").val();
        if (categoria == "") {
            alert("Preencha o nome da categoria");
        } else {
            $.ajax({
                type: 'POST',
                url: '/inserirCategoria',
                data: {
                    categoria: categoria,
                },
                success: function (data) {
                    alert(data);
                },
                error: function (data) {
                    alert(data);
                }
            });
        }
    });
});


$(document).ready(function () {
    $("#btnEnviarSetor").on('click touchstart', function () {
        setor = $("#nomeSetor").val();
        if (setor == "") {
            alert("Preencha o nome do setor");
        } else {
            $.ajax({
                type: 'POST',
                url: '/inserirSetor',
                data: {
                    setor: setor,
                },
                success: function (data) {
                    alert(data);
                },
                error: function (data) {
                    alert(data);
                }
            });
        }
    });
});


$(document).ready(function () {
    $("#btnCadastrarCliente").on('click touchstart', function () {
        var form = document.getElementById('formCadastrarCliente');
        dataCliente = form.dataCliente.value;
        nomeCliente = form.nomeCliente.value;
        cpf_cnpj = form.cpf_cnpj.value;
        emailCliente = form.emailCliente.value;
        telefoneCliente = form.telefoneCliente.value;
        finalidade = form.finalidadeCliente.value;

        if (nomeCliente == "") {
            alert("Preencha o nome do cliente");
        } else if (finalidade == 'selecione') {
            alert("Preencha o campo Serviço");
        } else {
            $.ajax({
                type: 'POST',
                url: '/inserirCliente',
                data: {
                    dataCliente: dataCliente,
                    nomeCliente: nomeCliente,
                    cpf_cnpj: cpf_cnpj,
                    emailCliente: emailCliente,
                    telefoneCliente: telefoneCliente,
                    finalidade: finalidade
                },
                success: function (data) {
                    alert(data);
                },
                error: function (data) {
                    mydata = data;
                    console.log(mydata);
                }
            });
        }
    });
});