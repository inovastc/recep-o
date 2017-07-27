<?php

namespace sistema\models;

use sistema\Entity\Usuario;
use sistema\Util\Conexao;
use PDO;

class ModeloSetor {

    function __construct() {
        
    }

    function buscaSetores() {
        try {
            $sql = "SELECT * FROM setor";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->execute();
            return $p_sql->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function verificaNomeDosetor($nome) {
        try {
            $sql = "SELECT * FROM `setor` WHERE nome = ?";
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

    function cadastrarSetor($nome) {
        try {
            $sql = "INSERT INTO `setor` (`codigo`, `nome`) VALUES (NULL, ?)";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(1, $nome);
            if ($p_sql->execute()) {
                return Conexao::getInstance()->lastInsertId();
            }
            return 0;
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar executar esta ação. <br> $e";
        }
    }
    
    
    function verificarServicoNoSetor($id) {
         try {
            $sql = "SELECT * FROM `servico` WHERE setor = ? or setor_dois = ?";
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

    function excluirSetor($id) {
         try {
            $sql = "delete from `setor` WHERE codigo = ?";
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

    function editarSetor($novoNome, $id) {
        try {
            $sql = "UPDATE `setor` SET `nome`= ? WHERE codigo = ?";
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
