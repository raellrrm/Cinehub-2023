<?php
class perfilController extends Controller{

    public function index(){
         if(!isset($_SESSION['cLogin'])){
            header("Location:".BASE_URL);
        }
        $usuarios=new Usuarios();
        $info=$usuarios->getInfo();
        $dados=array("info"=>$info);
        $this->loadTemplate('perfil',$dados);
    }

    public function minhasPublicacoes(){
        $usuarios=new Usuarios();
        $info=$usuarios->getInfo();
        if($info['tipoUsuario']!="publicador"){
            header("Location:".BASE_URL);
        }
        if(!isset($_SESSION['cLogin'])){
            header("Location:".BASE_URL);
        }
        $usuarios=new Usuarios();
        $pulicacoes=new Publicacoes();
        $criticas=new Criticas();
        $totalCriticas=$criticas->getTotalCriticasUsuario();
        $totalNoticias=$pulicacoes->getTotalNoticiasUsuario();
        $totalArtigos=$pulicacoes->getTotalArtigosUsuario();
        $info=$usuarios->getInfo();
        if($usuarios->verificarPerfil()){
            $verificarPerfil=true;
        }else{
            $verificarPerfil=false;
        }
        $dados=array("verificarPerfil"=>$verificarPerfil,"info"=>$info,"totalNoticias"=>$totalNoticias,"totalArtigos"=>$totalArtigos,"totalCriticas"=>$totalCriticas);
        $this->loadTemplate('perfilMinhasPublicacoes',$dados);
    }

    public function editarPerfil($id_usuario){
        if(!isset($_SESSION['cLogin'])){
            header("Location:".BASE_URL);
        }
        $usuarios=new Usuarios();
        $info=$usuarios->getInfo();
        $dados=array("info"=>$info);
        if(isset($_POST['nome']) && !empty($_POST['nome']) && isset($_POST['sobrenome']) && isset($_POST['sobrenome']) && isset($_FILES['fotoPerfil']) && isset($_POST['bio'])){
            $nome=strip_tags($_POST['nome']);
            $sobrenome=strip_tags($_POST['sobrenome']);
            $bio=strip_tags($_POST['bio']);
            $fotoPerfil=$_FILES['fotoPerfil'];
            if($usuarios->editarPefilUsuario($id_usuario,$nome,$sobrenome,$bio,$fotoPerfil)){
                header("Location:".BASE_URL."perfil?editar-perfil=true");
            }
        
            
        }
        $this->loadTemplate('alterarPerfil',$dados);
    }    

    public function meuPlano(){
        if(!isset($_SESSION['cLogin'])){
            header("Location:".BASE_URL);
        }
        $usuarios=new Usuarios();
        $info=$usuarios->getInfo();
        $assinatura=new Assinatura();
        $assinaturaInfo=$assinatura->getAssinaturaInfo();
        $dados=array("info"=>$info,"assinaturaInfo"=>$assinaturaInfo);
        
        $this->loadTemplate('meuPlano',$dados);
    }

    public function alterarPlano(){
        $usuarios=new Usuarios();
        $info=$usuarios->getInfo();
        $dados=array("info"=>$info);
        $this->loadTemplate('alterarPlano',$dados);
    }

    public function excluirPlano(){
        $assinatura=new Assinatura();
        $assinatura->cancelarAssinatura();
        header("Location:".BASE_URL."perfil/meuPlano");
    }
}
?>