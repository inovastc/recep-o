<?php

namespace sistema\Controllers;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use sistema\models\ModeloServico;
use Symfony\Component\Routing\RequestContext;
use Twig\Environment;
use sistema\models\ModeloSetor;
use sistema\models\ModeloCategoria;

class ControleDePaginas {

    private $response;
    private $request;
    private $twig;
    private $sessao;

    function __construct(Response $response, Request $request, \Twig_Environment $twig, $sessao) {
        $this->response = $response;
        $this->request = $request;
        $this->twig = $twig;
        $this->sessao = $sessao;
    }

    public function index() {
        $date = date('Y-m-d');
        $modeloServico = new ModeloServico();
        $listaServicos = $modeloServico->listaServicos();
        return $this->response->setContent($this->twig->render('TemplateIndex.html', array('date' => $date, 'servicos' => $listaServicos)));
    }

    public function novoServico() {
        $modeloC = new ModeloCategoria(); 
        $modeloS = new ModeloSetor();
        $categorias = $modeloC->buscaCaterogias();
        $setores = $modeloS->buscaSetores();
        return $this->response->setContent($this->twig->render('TemplateCadastrarServico.html',array('categorias' => $categorias ,'setores' => $setores)));
    }
    
    public function setores() {
        $modelo = new ModeloSetor();
        $setores = $modelo->buscaSetores();
        return $this->response->setContent($this->twig->render('TemplateSetores.html',array('setores' => $setores)));
    }
    
    public function categorias() {
        $modelo = new ModeloCategoria();
        $categorias = $modelo->buscaCaterogias();
        return $this->response->setContent($this->twig->render('TemplateCategorias.html',array('categorias' => $categorias)));
    }
    
    public function relacao() {
        $modelo = new ModeloCategoria();      
        $categorias = $modelo->buscaCaterogias(); 
        $servicos = $modelo->buscaServicosNaCaterogias();
        return $this->response->setContent($this->twig->render('TemplateRelacao.html',array('categorias' => $categorias,'servicos' => $servicos )));
    }
    
    public function relacaoDetalhada() {
        $modelo = new ModeloServico();      
        $servicos = $modelo->buscaServicos();        
        return $this->response->setContent($this->twig->render('TemplateRelacaoDetalhada.html',array('servicos' => $servicos)));
    }
    
    public function relatorio() {
        $modelo = new \sistema\models\ModeloCliente();      
        $clientes = $modelo->buscaClientes();        
        return $this->response->setContent($this->twig->render('TemplateRelatorio.html',array('clientes' => $clientes)));
    }
}
