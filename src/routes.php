<?php

namespace sistema\Routes;

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$rotas = new RouteCollection();


//LINKS
$rotas->add('raiz', new Route('/', array('_controller' => 'sistema\Controllers\ControleDePaginas', '_method' => 'index')));
$rotas->add('novoServico', new Route('/novoServico', array('_controller' => 'sistema\Controllers\ControleDePaginas', '_method' => 'novoServico')));
$rotas->add('setor', new Route('/setor', array('_controller' => 'sistema\Controllers\ControleDePaginas', '_method' => 'setores')));
$rotas->add('categoria', new Route('/categoria', array('_controller' => 'sistema\Controllers\ControleDePaginas', '_method' => 'categorias')));
$rotas->add('relacao', new Route('/relacao', array('_controller' => 'sistema\Controllers\ControleDePaginas', '_method' => 'relacao')));
$rotas->add('relacaoDetalhada', new Route('/relacaoDetalhada', array('_controller' => 'sistema\Controllers\ControleDePaginas', '_method' => 'relacaoDetalhada')));



// ROTAS DO AJAX teste
$rotas->add('inserirServico', new Route('/inserirServico', array('_controller' => 'sistema\Controllers\ControleServicos', '_method' => 'cadastrarServico')));
$rotas->add('inserirCategoria', new Route('/inserirCategoria', array('_controller' => 'sistema\Controllers\ControleCategoria', '_method' => 'cadastrarCategoria')));
$rotas->add('excluirCategoria', new Route('/excluirCategoria', array('_controller' => 'sistema\Controllers\ControleCategoria', '_method' => 'excluirCategoria')));
$rotas->add('editarCategoria', new Route('/editarCategoria', array('_controller' => 'sistema\Controllers\ControleCategoria', '_method' => 'editarCategoria')));
$rotas->add('inserirSetor', new Route('/inserirSetor', array('_controller' => 'sistema\Controllers\ControleSetor', '_method' => 'cadastrarSetor')));
$rotas->add('excluirSetor', new Route('/excluirSetor', array('_controller' => 'sistema\Controllers\ControleSetor', '_method' => 'excluirSetor')));
$rotas->add('editarSetor', new Route('/editarSetor', array('_controller' => 'sistema\Controllers\ControleSetor', '_method' => 'editarSetor')));
return $rotas;
