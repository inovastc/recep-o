<?php

namespace sistema\models;

use sistema\Entity\Usuario;
use sistema\Util\Conexao;
use PDO;

class ModeloGraficos {

    function __construct() {
        
    }

    function relatorioGrafico() {
        try {
            $sql = "SELECT 
                        c.codigo as codigo, c.nome as nome, count(c.nome) as quantidade
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
    
    function relatorioGraficoTotal() {
        try {
            $sql = "SELECT 
                        count(c.codigo) as total
                    FROM
                        servico s, categoria c
                    WHERE
                        s.categoria = c.codigo ";
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
