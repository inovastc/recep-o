$(document).ready(function () {
    $("button").on('click touchstart', function () {
        valor = this.value; // O value é a ação a ser executada      
        id = this.id; // o ID é o ID do elemento no banco de dados              
        if (valor == "editarCategoria") {
            
            var novoNome = prompt("Digite o nome do Categoria:");
            if (novoNome == "" || novoNome == null) {
                alert("Cancelado com Sucesso");
            } else {
                $.ajax({
                    type: 'POST',
                    url: '/editarCategoria',
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
        } else if (valor == "excluirCategoria") {
            if (confirm("Deseja Excluir ?")) {               
                $.ajax({
                    type: 'POST',
                    url: '/excluirCategoria',
                    data: {
                        id: id
                    },
                    success: function (data) {
                        alert(data);
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