<?php
class cadastroController extends Controller{

    public function index(){
        if(isset($_POST['nome']) && isset($_POST['sobrenome']) && isset($_POST['email']) && isset($_POST['telefone']) && isset($_POST['senha']) && isset($_POST['tipoUsuario'])){
            $nome=strip_tags($_POST['nome']);
            $sobrenome=strip_tags($_POST['sobrenome']);
            $email=strip_tags($_POST['email']);
            $telefone=strip_tags($_POST['telefone']);
            $senha=strip_tags($_POST['senha']);
            $tipoUsuario=strip_tags($_POST['tipoUsuario']);
            $numero=preg_replace("/\D/", "",$telefone);
            if(!(strlen($numero)===11)){
                header("Location:".BASE_URL."cadastro?telefone=false");
            }else{
                $usuarios=new Usuarios();
           
                if($usuarios->verificarEmail($email)==false){
                    $usuarios->cadastrar($nome,$sobrenome,$senha,$email,$numero,$tipoUsuario);
                    header("Location:".BASE_URL."logar?conta_criada=true");
                }else{
                    header("Location:".BASE_URL."cadastro?conta_criada=false");
                }
                   
            }
           
        }
        $this->loadLoginTemplate('cadastrar');
       
    }

    public function criarCritica(){
        $this->loadTemplate('escolherFilmeCritica');
    }
}
?>