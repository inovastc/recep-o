<?php

namespace sistema\models;

use sistema\Entity\Usuario;
use sistema\Util\Conexao;
use PDO;

class ModeloServico {

    function __construct() {
        
    }

    function cadastrarServico($descricao, $descricaoDetalhada, $categoria, $setor, 
            $responsavel, $setor_dois, $responsavel_dois) {
        
        try {
            $sql = "INSERT INTO `servico` (`codigo`, `descricao`, `descricaoDetalhada`, `categoria`, `setor`, `responsavel`, `setor_dois`, `responsavel_dois`) "
                    . "VALUES (NULL, ?, ?, ?, ?, ?, ?, ?)";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(1, $descricao);
            $p_sql->bindValue(2, $descricaoDetalhada);
            $p_sql->bindValue(3, $categoria);
            $p_sql->bindValue(4, $setor);
            $p_sql->bindValue(5, $responsavel);
            $p_sql->bindValue(6, $setor_dois);
            $p_sql->bindValue(7, $responsavel_dois);
            if ($p_sql->execute()) {
                return Conexao::getInstance()->lastInsertId();
            }
            return 0;
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar executar esta ação. <br> $e";
        }
    }

    function verificaNomeDoServico($desc) {
        try {
            $sql = "SELECT * FROM `servico` WHERE descricao = ?";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(1, $desc);
            $p_sql->execute();
            if ($p_sql->rowCount() == 1) {
                return $p_sql->fetch(PDO::FETCH_OBJ);
            } else
                return false;
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

    function cadastrarCategoria($nome) {
        try {
            $sql = "INSERT INTO `categoria` (`codigo`, `nome`) VALUES (NULL, ?)";
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

}
