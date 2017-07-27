$(document).ready(function () {
    $("button").on('click touchstart', function () {
        valor = this.value; // O value é a ação a ser executada      
        id = this.id; // o ID é o ID do elemento no banco de dados              

        if (valor == "editarSetor") {
            var novoNome = prompt("Digite o nome do setor:");
            if (novoNome == "" || novoNome == null) {
                alert("Cancelado com Sucesso");
            } else {
                $.ajax({
                    type: 'POST',
                    url: '/editarSetor',
                    data: {
                        id: id,
                        novoNome: novoNome
                    },
                    success: function (data) {
                        alert(data);
                        location.reload();
                    },
                    error: function (data) {
                        alert(data);
                    }
                });
            }
        } else if (valor == "excluirSetor") {
            if (confirm("Deseja Excluir ?")) {               
                $.ajax({
                    type: 'POST',
                    url: '/excluirSetor',
                    data: {
                        id: id
                    },
                    success: function (data) {
                        alert(data);
                         location.reload();
                    },
                    error: function (data) {
                        alert(data);
                    }
                });
            }else{
               alert("Cancelado com Sucesso");
            }
        }
    });
});