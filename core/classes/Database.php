<?php

namespace core\classes;

use Exception;
use PDO;
use PDOException;

class Database{

    private $ligacao;

    private function on_db() {
        $this->ligacao =  new PDO(
        'mysql:'.
        'host='.MYSQL_SERVER.';'.
        'dbname='.MYSQL_DATABASE.';'.
        'charset='.MYSQL_CHARSET,
        MYSQL_USER,
        MYSQL_PASS,
        array(PDO::ATTR_PERSISTENT => true));

        //debug
        $this->ligacao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    private function off_db(){
        $this->ligacao = null;
    }

    public function select($sql, $parametros = null){

        $sql = trim($sql);

        if(!preg_match("/^SELECT/i", $sql)){
            throw new Exception('Base de dados - Não é uma instrução SELECT.');
        }

        $this->on_db();

        $resultados = null;
        try {
            if(!empty($parametros)){
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
                $resultados = $executar->fetchAll(PDO::FETCH_CLASS);
            } else {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
                $resultados = $executar->fetchAll(PDO::FETCH_CLASS);
            }

        } catch (PDOException $e) {
            return false;
        }

        $this->off_db();

        return $resultados;

    }

    public function insert($sql, $parametros = null){

        $sql = trim($sql);    

        if(!preg_match("/^INSERT/i", $sql)){
            throw new Exception('Base de dados - Não é uma instrução INSERT.');
        }

        $this->on_db();

        try {
            if(!empty($parametros)){
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
            } else {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
            }

        } catch (PDOException $e) {
            return false;
        }

        $this->off_db();

    }

    public function update($sql, $parametros = null){

        $sql = trim($sql);

        if(!preg_match("/^UPDATE/i", $sql)){
            throw new Exception('Base de dados - Não é uma instrução UPDATE.');
        }

        $this->on_db();

        try {
            if(!empty($parametros)){
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
            } else {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
            }

        } catch (PDOException $e) {
            return false;
        }

        $this->off_db();

    }

    public function delete($sql, $parametros = null){

        $sql = trim($sql);

        if(!preg_match("/^DELETE/i", $sql)){
            throw new Exception('Base de dados - Não é uma instrução DELETE.');
        }

        $this->on_db();

        try {
            if(!empty($parametros)){
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
            } else {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
            }

        } catch (PDOException $e) {
            return false;
        }

        $this->off_db();

    }

    public function statement($sql, $parametros = null){

        $sql = trim($sql);

        if(preg_match("/^(SELECT | INSERT| UPDATE | DELETE)/i", $sql)){
            throw new Exception('Base de dados - Instrução inválida.');
        }

        $this->on_db();

        try {
            if(!empty($parametros)){
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
            } else {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
            }

        } catch (PDOException $e) {
            return false;
        }

        $this->off_db();

    }
    
}
