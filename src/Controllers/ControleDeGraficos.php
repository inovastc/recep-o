<?php

namespace sistema\Controllers;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use sistema\models\ModeloGraficos;

class ControleDeGraficos {

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
        return $this->response->setContent($this->twig->render('TemplateIndex.html'));
    }
    
    public function dadosGraficoPizza() {
        $modelo = new ModeloGraficos();      
        $graficos = $modelo->relatorioGrafico();
        $total = $modelo->relatorioGraficoTotal();
        return $this->response->setContent($this->twig->render('TemplateGraficoPizza.html',array('graficos' => $graficos, 'total' => $total)));
    }
}
