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