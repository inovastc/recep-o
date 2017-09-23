<?php

namespace sistema\Controllers;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use sistema\models\ModeloServico;
use sistema\models\ModeloTeste;
use Symfony\Component\Routing\RequestContext;
use Twig\Environment;

class ControleServicos {

    function __construct(Response $response, Request $request, \Twig_Environment $twig, $sessao) {
        $this->response = $response;
        $this->request = $request;
        $this->twig = $twig;
        $this->sessao = $sessao;
    }

    function cadastrarServico() {
        try {
            $descricao = $_POST['descricao'];
            $descricaoDetalhada = $_POST['descricaoDetalhada'];
            $categoria = $_POST['categoria'];
            $setor = $_POST['setor'];
            $responsavel = $_POST['responsavel'];
            $setor_dois = $_POST['setor_dois'];
            $responsavel_dois = $_POST['responsavel_dois'];
            $modelo = new ModeloServico();
            if ($descricao == "") {
                echo("Preencha o campo Descrição");
            } else if ($descricaoDetalhada == "") {
                echo("Preencha o campo Descrição Detalhada");
            } else if ($categoria == "vazio") {
                echo("Selecione a Categoria");
            } else if ($setor == "vazio") {
                echo("Selecione o setor");
            } else if ($responsavel == "") {
                echo("Preencha o nome do Responsável");
            } else if ($setor_dois == "vazio") {
                echo("Selecione o setor");
            } else if ($responsavel_dois == "") {
                echo("Preencha o nome do Responsável");
            } else {
                if ($modelo->verificaNomeDoServico($descricao)) {
                    echo 'Serviço já Existente';
                } else {
                    if ($modelo->cadastrarServico($descricao, $descricaoDetalhada, $categoria, $setor, $responsavel, $setor_dois, $responsavel_dois)) {
                        echo 'Serviço Cadastrado com Sucesso';
                    } else {
                        echo 'Erro ao Cadastrar Serviço';
                    }
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
}