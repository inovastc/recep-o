<?php

namespace sistema\Controllers;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use sistema\models\ModeloServico;
use Symfony\Component\Routing\RequestContext;
use Twig\Environment;
use sistema\models\ModeloCategoria;

class ControleCategoria {

    function __construct(Response $response, Request $request, \Twig_Environment $twig, $sessao) {
        $this->response = $response;
        $this->request = $request;
        $this->twig = $twig;
        $this->sessao = $sessao;
    }

    function cadastrarCategoria() {
        $categoria = $_POST['categoria'];
        $modelo = new ModeloCategoria();
        if ($categoria == "") {
            echo 'Preencha o nome da categoria';
        } else {
            if ($modelo->verificaNomeDaCategoria($categoria)) {
                echo 'Categoria já Existente';
            } else {
                if ($modelo->cadastrarCategoria($categoria)) {
                    echo 'categoria Cadastrado com Sucesso';
                } else {
                    echo 'Erro ao Cadastrar categoria';
                }
            }
        }
    }
      
    function excluirCategoria() {
        $id = $_POST['id'];
        $modelo = new ModeloCategoria();
        if ($modelo->verificarServicoNoCategoria($id)) {
            echo ' Não é possivel excluir pois existe um serviço que faz parte desta categoria';
        } else {
            if ($modelo->excluirCategoria($id)) {
                echo 'Categoria Excluido com Sucesso';
            } else {
                echo 'Erro ao Excluir Categoria';
            }
        }
    }

    function editarCategoria() {
        $id = $_POST['id'];
        $novoNome = $_POST['novoNome'];
        $modelo = new ModeloCategoria();
        if ($novoNome == "") {
            echo 'Preencha o nome do Categoria';
        } else {
            if ($modelo->verificaNomeDoCategoria($novoNome)) {
                echo 'Categoria já Existente';
            } else {
                if ($modelo->editarCategoria(strtoupper($novoNome), $id)) {
                    echo 'Categoria Editado com Sucesso';
                } else {
                    echo 'Erro ao Editar Categoria';
                }
            }
        }
    }

}
