<?php

namespace sistema\Controllers;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use sistema\models\ModeloCliente;
use Symfony\Component\Routing\RequestContext;
use Twig\Environment;
use sistema\models\ModeloCategoria;

class ControleCliente {

    function __construct(Response $response, Request $request, \Twig_Environment $twig, $sessao) {
        $this->response = $response;
        $this->request = $request;
        $this->twig = $twig;
        $this->sessao = $sessao;
    }

    function cadastrarCliente() {
        try {
            $data = $_POST['dataCliente'];
            $nome = $_POST['nomeCliente'];
            $cpf_cnpj = $_POST['cpf_cnpj'];
            $emailCliente = $_POST['emailCliente'];
            $telefoneCliente = $_POST['telefoneCliente'];
            $finalidade = $_POST['finalidade'];
            $modelo = new ModeloCliente();
            if ($nome == "") {
                echo("Preencha o nome do cliente");
            } else if ($finalidade == 'selecione') {
                echo("Preencha o campo Serviço");
            } else {
                if ($modelo->cadastrarCliente(NULL, $data, $nome, $cpf_cnpj, $emailCliente, $telefoneCliente, $finalidade)) {
                    echo 'Cliente Cadastrado com Sucesso';
                } else {
                    echo 'Erro ao Cadastrar Cliente';
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function excluirCategoria() {
        $id = $_POST['id'];
        $modelo = new ModeloCategoria();

        if ($modelo->verificarServicoNaCategoria($id)) {
            echo ' Não é possivel excluir pois existe um '
            . 'serviço que faz parte desta categoria';
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
            if ($modelo->verificaNomeDaCategoria($novoNome)) {
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
