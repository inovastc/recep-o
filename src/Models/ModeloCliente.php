<?php

namespace sistema\models;

use sistema\Util\Conexao;
use PDO;

class ModeloCliente {

    function __construct() {
        
    }

    function buscaClientes() {
        try {
            $sql = "SELECT r.id, r.dataCliente, r.nome, r.cpf, r.cnpj, r.email, r.telefone, s.descricao FROM relatorio r inner join servico s on r.finalidade = s.codigo";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->execute();
            return $p_sql->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function cadastrarCliente($data, $nome, $cpf, $cnpj, $email, $telefone, $finalidade) {
        try {
            $sql = "INSERT INTO `relatorio` (`id`, `dataCliente`, `nome`, `cpf`, `cnpj`, `email`, `telefone`, `finalidade`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?)";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(1, $data);
            $p_sql->bindValue(2, $nome);
            $p_sql->bindValue(3, $cpf);
            $p_sql->bindValue(4, $cnpj);
            $p_sql->bindValue(5, $email);
            $p_sql->bindValue(6, $telefone);
            $p_sql->bindValue(7, $finalidade);
            if ($p_sql->execute()) {
                return Conexao::getInstance()->lastInsertId();
            }
            return 0;
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar executar esta ação. <br> $e";
        }
    }
}
