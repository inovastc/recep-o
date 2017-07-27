<?php

namespace sistema\Controllers;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RequestContext;
use Twig\Environment;
use sistema\models\ModeloSetor;

class ControleSetor {

    function __construct(Response $response, Request $request, \Twig_Environment $twig, $sessao) {
        $this->response = $response;
        $this->request = $request;
        $this->twig = $twig;
        $this->sessao = $sessao;
    }

    function cadastrarSetor() {
        $setor = $_POST['setor'];
        $modelo = new ModeloSetor();
        if ($setor == "") {
            echo 'Preencha o nome do setor';
        } else {
            if ($modelo->verificaNomeDosetor($setor)) {
                echo 'Setor já Existente';
            } else {
                if ($modelo->cadastrarSetor($setor)) {
                    echo 'Setor Cadastrado com Sucesso';
                } else {
                    echo 'Erro ao Cadastrar Setor';
                }
            }
        }
    }

    function excluirSetor() {
        $id = $_POST['id'];
        $modelo = new ModeloSetor();
        if ($modelo->verificarServicoNoSetor($id)) {
            echo ' Não é possivel excluir pois existe um serviço que faz parte desta categoria';
        } else {
            if ($modelo->excluirSetor($id)) {
                echo 'Setor Excluido com Sucesso';
            } else {
                echo 'Erro ao Excluir Setor';
            }
        }
    }

    function editarSetor() {
        $id = $_POST['id'];
        $novoNome = $_POST['novoNome'];
        $modelo = new ModeloSetor();
        if ($novoNome == "") {
            echo 'Preencha o nome do setor';
        } else {
            if ($modelo->verificaNomeDosetor($novoNome)) {
                echo 'Setor já Existente';
            } else {
                if ($modelo->editarSetor($novoNome, $id)) {
                    echo 'Setor Editado com Sucesso';
                } else {
                    echo 'Erro ao Editar Setor';
                }
            }
        }
    }

}
