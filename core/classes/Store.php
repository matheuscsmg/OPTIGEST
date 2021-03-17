<?php

namespace core\classes;

use Exception;

class Store {

    public static function Layout($estruturas, $dados = null){
        if(!is_array($estruturas)){
            throw new Exception("Coleção de estruturas incorreta");
        }

        if(!empty($dados) && is_array($dados)){

            extract($dados);
        }

        foreach($estruturas as $estrutura){
            include("../core/views/$estrutura.php");
        }
    }

    public static function redirect($rota = ''){

        header('Location: ' . BASE_URL. "?a=$rota");
    }

    public static function printData($data){

        if(is_array($data) || is_object($data)){
                echo '<pre>';
                print_r($data);
        } else {
            echo '<pre>';
             echo $data;
        }

        die('<br>Terminado');
    }

}