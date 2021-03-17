<?php

namespace core\models;

use core\classes\Database;
use core\classes\Store;

class Employeer
{

    private $name;
    private $age;
    private $job;
    private $salary;
    private $admission_date;

    public function get_name() {
        return $this->name;
     }  
     
     public function set_name($name) {
        $this->name = $name;
       }

    public function get_age() {
        return $this->age;
       }   
     
    public function set_age($age) {
        $this->age = $age;
       }

    public function get_job() {
        return $this->job;
       }       
     
    public function set_job($job) {
        $this->job = $job;
       }

    public function get_salary() {
        return $this->salary;
       }       
     
    public function set_salary($salary) {
        $this->salary = $salary;
       }

    public function get_date() {
        return $this->admission_date;
       }       
     
    public function set_date($admission_date) {
        $this->admission_date = $admission_date;
    }
   
       public function register_employee()
    {

        $bd = new Database();

        $parametros = [
            ':name' => ($this->name),
            ':age' => ($this->age),
            ':job' => ($this->job),
            ':salary' => ($this->salary),
            ':admission_date' => ($this->admission_date)
        ];
        $bd->insert("
            INSERT INTO employees VALUES(
                0,
                :name,
                :age,
                :job,
                :salary, 
                :admission_date
            )
        ", $parametros);
    }

    public function list_employee()
    {

        $bd = new Database();
        $employee = $bd->select("
            SELECT * FROM employees
        ");
        return $employee;
    }

    public function average_age()
    {

        $bd = new Database();
        $av_age = $bd->select("
        SELECT AVG(DISTINCT age) FROM employees;
        ");

        return $av_age;
    }

    public function all_job()
    {

        $bd = new Database();
        $jobs = $bd->select("
            SELECT NAME, JOB FROM employees;;
        ");

        return $jobs;
    }

    public function state_project()
    {

        $bd = new Database();
        $state_proj = $bd->select("
            SELECT *  FROM projects WHERE STATUS='completed' AND DELIVERY_DATE BETWEEN '2021-01-01' AND '2021-12-31'
            ORDER BY VALUE DESC;
        ");

        return $state_proj;
    }

    public function up_salary($perc){

        $result = $this->salary  +  ($this->salary / 100 * $perc);
        return $result;    

    }

    public function project_pend(){
        $bd = new Database();
        $date_1 = $_POST['date_1'];
        $date_2 = $_POST['date_2'];
        $pend_proj = $bd->select("
            SELECT * FROM projects WHERE STATUS <>'completed'  AND DELIVERY_DATE BETWEEN $date_1 AND $date_2
            GROUP BY ID_EMPLOYEE
            ORDER BY DELIVERY_DATE;
        ");
    }
}
