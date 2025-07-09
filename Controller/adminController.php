<?php
class adminController extends Controller{

    public function listarUsuarios(){
        $usuarios=new Usuarios();
        $info=$usuarios->getInfo();
        if($info['tipoUsuario']!="administrador"){
            header("Location:".BASE_URL);
        }
        if(!isset($_SESSION['cLogin'])){
            header("Location:".BASE_URL);
        }
        $usuarios=new Usuarios();
        $listaUsuarios=$usuarios->getUsuarios();
        $dados=array('listaUsuarios'=>$listaUsuarios);
        $this->loadTemplate('listarUsuarios',$dados);
    }

    public function excluirUsuario($id_usuario){
        if(!isset($_SESSION['cLogin'])){
            header("Location:".BASE_URL);
        }
        $usuarios= new Usuarios();
        if($usuarios->deleteUser($id_usuario)){
            header("Location:".BASE_URL."admin/listarUsuarios");
        }
    }

    public function noticiasAdm(){
        $publicacoes= new Publicacoes();
        $totalNoticias=$publicacoes->getTotalNoticias();
        $p=1;
        if(isset($_GET['p']) && !empty($_GET['p'])){
            $p=$_GET['p'];
        }
        $perpage=12;
        $totalPaginas=ceil($totalNoticias['c']/$perpage);
        $noticiasAdm=$publicacoes->getNoticias($perpage,$p);
        $dados=array("noticiasAdm"=>$noticiasAdm,"totalPaginas"=>$totalPaginas);
        $this->loadTemplate('listaNoticiasAdm',$dados);
    }

    public function excluirNoticia($id_publicacao){
        $usuarios=new Usuarios();
        $info=$usuarios->getInfo();
        if($info['tipoUsuario']!="administrador"){
            header("Location:".BASE_URL);
        }
         if(!isset($_SESSION['cLogin'])){
            header("Location:".BASE_URL);
        }
        $publicacao=new Publicacoes();
        if($publicacao->excluirPublicacao($id_publicacao)){
            header("Location:".BASE_URL."admin/noticiasAdm");
        }
    }

    public function artigosAdm(){
        $publicacoes= new Publicacoes();
        $totalArtigos=$publicacoes->getTotalArtigos();
        $p=1;
        if(isset($_GET['p']) && !empty($_GET['p'])){
            $p=$_GET['p'];
        }
        $perpage=9;
        $totalPaginas=ceil($totalArtigos['c']/$perpage);
        $artigosAdm=$publicacoes->getArtigos($perpage,$p);
        $dados=array("artigosAdm"=>$artigosAdm,"totalPaginas"=>$totalPaginas);
        $this->loadTemplate('listaArtigosAdm',$dados);
    }

    
    public function excluirArtigo($id_publicacao){
        $usuarios=new Usuarios();
        $info=$usuarios->getInfo();
        if($info['tipoUsuario']!="administrador"){
            header("Location:".BASE_URL);
        }
         if(!isset($_SESSION['cLogin'])){
            header("Location:".BASE_URL);
        }
    
        $publicacao=new Publicacoes();
        if($publicacao->excluirPublicacao($id_publicacao)){
            header("Location:".BASE_URL."admin/artigosAdm");
        }
    }

    public function listarAssinaturas(){
        $usuarios=new Usuarios();
        $info=$usuarios->getInfo();
        if($info['tipoUsuario']!="administrador"){
            header("Location:".BASE_URL);
        }
        if(!isset($_SESSION['cLogin'])){
            header("Location:".BASE_URL);
        }
        $assinatura=new Assinatura();
        $listarAssinaturas=$assinatura->getAssinaturas();
        $dados=array('listarAssinaturas'=>$listarAssinaturas);
        $this->loadTemplate('listarAssinatura',$dados);
    }

    public function excluirAssinatura($id_usuario){
        $assinatura=new Assinatura();
        $assinatura->cancelarAssinaturaAdm($id_usuario);
        header("Location:".BASE_URL."admin/listarAssinaturas");
    }

    public function editarUsuario($id_usuario){
        $usuarios=new Usuarios();
        $dadosUsuario=$usuarios->getInfoAdm($id_usuario);
        if(isset($_POST['nome']) && isset($_POST['sobrenome']) && isset($_POST['email']) && isset($_POST['telefone']) && isset($_POST['senha'])){
            $nome=strip_tags($_POST['nome']);
            $sobrenome=strip_tags($_POST['sobrenome']);
            $email=strip_tags($_POST['email']);
            $telefone=strip_tags($_POST['telefone']);
            $senha=strip_tags($_POST['senha']);
            $numero=preg_replace("/\D/", "",$telefone);
            if(!(strlen($numero)===11)){
                header("Location:".BASE_URL."admin/editarUsuario/".$id_usuario."?telefone=false");
            }else{
                if($usuarios->verificarEmail($email)==true && $email==$dadosUsuario['email'] || $usuarios->verificarEmail($email)==false){
                    $usuarios->editarUsuario($nome,$sobrenome,$senha,$email,$numero,$id_usuario);
                    header("Location:".BASE_URL."admin/editarUsuario/".$id_usuario."?conta_editada=true");
                }else{
                    header("Location:".BASE_URL."admin/editarUsuario/".$id_usuario."?conta_editada=false");
                }
                   
            }
           
        }
        $dados=array("dadosUsuario"=>$dadosUsuario);
        $this->loadTemplate('editarUsuario',$dados);
    }
}
?>