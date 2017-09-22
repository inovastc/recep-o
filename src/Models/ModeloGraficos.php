<?php

namespace sistema\models;

use sistema\Entity\Usuario;
use sistema\Util\Conexao;
use PDO;

class ModeloGraficos {

    function __construct() {
        
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

    function relatorioServicos() {
        try {
            $sql = "SELECT 
                        c.nome as nome, count(c.nome) as quantidade
                    FROM
                        servico s, categoria c
                    WHERE
                        s.categoria = c.codigo 
                    GROUP BY
                        c.nome";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->execute();
            return $p_sql->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function gerarJsonGraficoPizza() {
        $sql = "SELECT 
                        c.nome as nome, count(c.nome) as quantidade
                    FROM
                        servico s, categoria c
                    WHERE
                        s.categoria = c.codigo 
                    GROUP BY
                        c.nome";
        $p_sql = Conexao::getInstance()->prepare($sql);
        $p_sql->execute();
        return $p_sql->fetchAll();
        while ($row = $p_sql->fetch(PDO::FETCH_ASSOC)) {
            $data[] = array($row['nome'], hexdec($row['quantidade']));
        }

        $jSon = json_encode($data);
    }

}
