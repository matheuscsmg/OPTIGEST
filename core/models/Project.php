<?php

namespace core\models;
use core\classes\Database;

class Project{

    private $description;
    private $value;
    private $status;
    private $delivery_date;

    //Getters and Setter
    public function get_description() {
        return $this->description;
    }  
     
    public function set_description($description) {
        $this->description = $description;
    }

    public function get_value() {
        return $this->value;
    }  
     
    public function set_value($value) {
        $this->value = $value;
    }

    public function get_status() {
        return $this->status;
    }  
     
    public function set_status($status) {
        $this->status = $status;
    }

    public function get_deliv() {
        return $this->delivery_date;
    }  
     
    public function set_deliv($delivery_date) {
        $this->delivery_date = $delivery_date;
    }

    //Método para criar projeto
    public function register_project(){

        $bd = new Database();

        $parametros = [
            ':id_employee' => ($_POST['link_emp']),
            ':description' => ($this->description),
            ':value' => ($this->value),
            ':status' => ($this->status),
            ':delivery_date' => ($this->delivery_date)
        ];
        $bd->insert("
            INSERT INTO projects VALUES(
                0,
                :id_employee,
                :description,
                :value,
                :status, 
                :delivery_date
            )
        ", $parametros);
                
        
    }
}