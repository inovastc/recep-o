<?php

namespace sistema\Controllers;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use sistema\models\ModeloCliente;
use Symfony\Component\Routing\RequestContext;
use Twig\Environment;

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
            $cpf = $_POST['cpf'];
            $cnpj = $_POST['cnpj'];
            $emailCliente = $_POST['emailCliente'];
            $telefoneCliente = $_POST['telefoneCliente'];
            $finalidade = $_POST['finalidade'];
            $modelo = new ModeloCliente();
            if ($nome == "") {
                echo("Preencha o nome do cliente");
            } else if ($finalidade == 'selecione') {
                echo("Preencha o campo Serviço");
            } else {
                if ($modelo->cadastrarCliente($data, $nome, $cpf, $cnpj, $emailCliente, $telefoneCliente, $finalidade)) {
                    echo 'Cadastrado com Sucesso';
                } else {
                    echo 'Erro ao Cadastrar Cliente';
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
    function buscaClientes(){
        try{
            
        } catch (Exception $ex) {

        }
    }
}
