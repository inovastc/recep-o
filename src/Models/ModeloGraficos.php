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
            $sql = "SELECT c.codigo as codigo, c.nome as nome, COUNT(r.finalidade) as quantidade
                    from relatorio r
                    inner join servico s on s.codigo = r.finalidade
                    inner join categoria c on c.codigo = s.categoria
                    group by c.nome
                    order by c.codigo";
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
                        count(id) as total
                    FROM
                        relatorio";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->execute();
            return $p_sql->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
}
