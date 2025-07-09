<?php
class logarController extends Controller{

    public function index(){

        if(isset($_POST['email']) && $_POST['senha']){
            $email=strip_tags($_POST['email']);
            $senha=strip_tags($_POST['senha']);

            $usuarios=new Usuarios();
            if($usuarios->login($email,$senha)){
                header("Location:".BASE_URL);
            }else{
                header("Location:".BASE_URL."logar?login=false");
            }
        }
        $this->loadLoginTemplate('login');
    }

    public function sair(){
        unset($_SESSION['cLogin']);
        header("Location:".BASE_URL);
    }

    public function loginAdm(){
        if(isset($_POST['email']) && isset($_POST['senha'])){
            $email=strip_tags($_POST['email']);
            $senha=strip_tags($_POST['senha']);

            $usuarios=new Usuarios();
            if($usuarios->loginAdmin($email,$senha)){
                header("Location:".BASE_URL."admin/listarUsuarios");
            }else{
                header("Location:".BASE_URL."logar/loginAdm?login=false");
            }
        }

        $this->loadLoginTemplate('loginAdm');
    }
}
?>