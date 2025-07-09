<?php
class Controller{

    public function loadLoginTemplate($viewName){
        require 'View/'.$viewName.'.php';
    }

    public function loadTemplate($viewName,$viewData=array()){
        extract($viewData);
        require 'View/template.php';
    }

    public function loadViewInTemplate($viewName,$viewData=array()){
        extract($viewData);
        require 'View/'.$viewName.'.php';
    }
}
?>