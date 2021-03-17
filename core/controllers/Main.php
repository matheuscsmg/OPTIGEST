<?php

namespace core\controllers;

use core\classes\Store;
use core\models\Employeer;
use core\models\Project;
use Exception;

class Main
{

    public function index()
    {
        Store::Layout([
            'layouts/html_header',
            'layouts/header',
            'home'
        ]);
    }

    public function new_employee()
    {
        Store::Layout([
            'layouts/html_header',
            'layouts/header',
            'create_employee'
        ]);
    }

    public function create_employee()
    {

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            $this->index();
            return;
        }
        $employee = new Employeer();
        $employee->set_name($_POST['text_name']);
        $employee->set_age($_POST['text_age']);
        $employee->set_job($_POST['text_job']);
        $employee->set_salary($_POST['text_salary']);
        $employee->set_date($_POST['text_ad_date']);

        try{

            $employee->register_employee();
            
            Store::Layout([
                'layouts/html_header',
                'layouts/header',
                'create_employee'
            ]);

        } catch (Exception $err){
            echo $err;
            return;
        }
        
        
    }

    public function new_project()
    {
        Store::Layout([
            'layouts/html_header',
            'layouts/header',
            'create_project',
        ]);
    }

    public function create_project()
    {

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            $this->index();
            return;
        }
        $project = new Project();
        $project->set_description($_POST['description']);
        $project->set_value($_POST['value_proj']);
        $project->set_status($_POST['state']);
        $project->set_deliv($_POST['text_dv_date']);

        
        try{

            $project->register_project();
            Store::Layout([
                'layouts/html_header',
                'layouts/header',
                'create_project'
            ]);

        } catch (Exception $err){
            echo $err;
            return;
        }
    }
    
    public function reports(){

        Store::Layout([
            'layouts/html_header',
            'layouts/header',
            'reports'
        ]);
        return;
    }
}
