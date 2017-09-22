<?php

namespace sistema\models;

use sistema\Util\Conexao;
use PDO;

class ModeloCliente {

    function __construct() {
        
    }

    function buscaServicosNaCaterogias() {
        try {
            $sql = "SELECT servico.descricaoDetalhada, categoria.nome FROM servico INNER JOIN categoria ON servico.categoria = categoria.codigo";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->execute();
            return $p_sql->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function buscaCaterogias() {
        try {
            $sql = "SELECT * FROM categoria";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->execute();
            return $p_sql->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function verificaNomeDaCategoria($nome) {
        try {
            $sql = "SELECT * FROM `categoria` WHERE nome = ?";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(1, $nome);
            $p_sql->execute();
            if ($p_sql->rowCount() == 1) {
                return $p_sql->fetch(PDO::FETCH_OBJ);
            } else
                return false;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function cadastrarCliente($data, $nome, $cnpj_cpf, $email, $telefone, $finalidade) {
        try {
            $sql = "INSERT INTO 'relatorio' ('id', data', 'nome', 'cnpj/cpf', 'email', 'telefone', 'finalidade) VALUES (NULL, ?, ?, ?, ?, ?, ?)";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(1, $data);
            $p_sql->bindValue(2, $nome);
            $p_sql->bindValue(3, $cnpj_cpf);
            $p_sql->bindValue(4, $email);
            $p_sql->bindValue(5, $telefone);
            $p_sql->bindValue(6, $finalidade);
            if ($p_sql->execute()) {
                return Conexao::getInstance()->lastInsertId();
            }
            return 0;
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar executar esta ação. <br> $e";
        }
    }

    function verificarServicoNaCategoria($id) {
        try {
            $sql = "select * from servico WHERE servico.categoria = ? or servico.categoria = ?";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(1, $id);
            $p_sql->bindValue(2, $id);
            $p_sql->execute();
            if ($p_sql->rowCount() == 1) {
                return $p_sql->fetch(PDO::FETCH_OBJ);
            } else
                return false;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function excluirCategoria($id) {
        try {
            $sql = "delete from `Categoria` WHERE codigo = ?";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(1, $id);
            if ($p_sql->execute()) {
                return true;
            } else
                return false;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function editarCategoria($novoNome, $id) {
        try {
            $sql = "UPDATE `Categoria` SET `nome`= ? WHERE codigo = ?";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(1, $novoNome);
            $p_sql->bindValue(2, $id);
            if ($p_sql->execute()) {
                return true;
            } else
                return false;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
