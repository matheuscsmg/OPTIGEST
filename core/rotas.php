<?php


$rotas = [
    'home' => 'main@index',
    'reports' => 'main@reports',
   
    'new_employee' => 'main@new_employee',
    'create_employee' => 'main@create_employee',
    'new_project' => 'main@new_project',
    'create_project' => 'main@create_project',
];

$acao = 'home';

if(isset($_GET['a'])){

    if(!key_exists($_GET['a'], $rotas)){
        $acao='home';
    } else {
        $acao = $_GET['a'];
    }
}

$partes = explode('@', $rotas[$acao]);
$controlador = 'core\\controllers\\'.ucfirst($partes[0]);
$metodo = $partes[1];

$ctr = new $controlador();
$ctr->$metodo();