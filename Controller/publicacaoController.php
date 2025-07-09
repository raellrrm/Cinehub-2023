<?php
class publicacaoController extends Controller{

    public function index(){
        if(isset($_POST['titulo'])){
            $titulo=strip_tags($_POST['titulo']);
            $descricao=strip_tags($_POST['descricao']);
            $conteudo=strip_tags($_POST['conteudo']);
            $data_hora=date('Y-m-d H:i:s');
            $categoria=strip_tags($_POST['categoria']);
            $imagem=$_FILES['imagem'];
            $publicacao=new Publicacoes();
           if( $publicacao->criarPublicacao($titulo,$descricao,$conteudo,$data_hora,$categoria,$imagem)){
                header("Location:".BASE_URL."publicacao?post_create=true");
           }
        }
        $this->loadTemplate('criarPublicacao');
    }

    public function abrirNoticia($id_publicacao){
        $publicacoes= new Publicacoes();
        $noticia=$publicacoes->getNoticia($id_publicacao);
        $ultimasNoticias=$publicacoes->getUltimasNoticias();
        $noticiasVejaMais=$publicacoes->getNoticiasVejaMais();
        $usuarios=new Usuarios();
        $info='';
        if(isset($_SESSION['cLogin'])){
         $info=$usuarios->getInfo();
        }
        $publicador=$usuarios->getInfoPublicador($noticia['publicador']);
        $comentarios= new Comentarios();
        $totalComentarios=$comentarios->getTotalComentarios($id_publicacao);

        if(isset($_POST['conteudo']) && !empty($_POST['conteudo'])){
            $id_publicacao=$id_publicacao;
            $data_hora=date('Y-m-d H:i:s');
            $conteudo=$_POST['conteudo'];

          
            if($comentarios->addComentario($id_publicacao,$conteudo,$data_hora)){
                header("Location:".BASE_URL."publicacao/abrirNoticia/".$id_publicacao);
            }
        }
        $listaComentarios=$comentarios->getComentarios($id_publicacao);
        $comentarios_comentadores=array();
        if(!empty($listaComentarios)){
            foreach($listaComentarios as $comentario){
                $comentador=$usuarios->getInfoComentador($comentario['id_usuario']);
                $comentarios_comentadores[]=array('comentario'=>$comentario,'comentador'=>$comentador);
            }
        }
        
        $dados=array("noticia"=>$noticia,"ultimasNoticias"=>$ultimasNoticias,"publicador"=>$publicador,"vejaMais"=>$noticiasVejaMais,"info"=>$info,"comentarios_comentadores"=>$comentarios_comentadores,"totalComentarios"=> $totalComentarios);
        $this->loadTemplate('noticia',$dados);
    }

    public function noticias(){
        $publicacoes= new Publicacoes();
        $totalNoticias=$publicacoes->getTotalNoticias();
        $p=1;
        if(isset($_GET['p']) && !empty($_GET['p'])){
            $p=$_GET['p'];
        }
        $perpage=12;
        $totalPaginas=ceil($totalNoticias['c']/$perpage);
        $noticias=$publicacoes->getNoticias($perpage,$p);
        $dados=array("noticias"=>$noticias,"totalPaginas"=>$totalPaginas);
        $this->loadTemplate('noticias',$dados);
    }

    public function artigos(){
        $publicacoes= new Publicacoes();
        $totalArtigos=$publicacoes->getTotalArtigos();
        $p=1;
        if(isset($_GET['p']) && !empty($_GET['p'])){
            $p=$_GET['p'];
        }
        $perpage=9;
        $totalPaginas=ceil($totalArtigos['c']/$perpage);
        $artigos=$publicacoes->getArtigos($perpage,$p);
        $dados=array("artigos"=>$artigos,"totalPaginas"=>$totalPaginas);
        $this->loadTemplate('artigos',$dados);
    }

    public function abrirArtigo($id_publicacao){
        $publicacoes= new Publicacoes();
        $artigo=$publicacoes->getArtigo($id_publicacao);
        $ultimosArtigos=$publicacoes->getUltimosArtigos();
        $usuarios=new Usuarios();
        $info=$usuarios->getInfo();
        $publicador=$usuarios->getInfoPublicador($artigo['publicador']);
        $principaisArtigos=$publicacoes->getPrincipaisArtigos();
        $comentarios= new Comentarios();
        $totalComentarios=$comentarios->getTotalComentarios($id_publicacao);

        if(isset($_POST['conteudo']) && !empty($_POST['conteudo'])){
            $id_publicacao=$id_publicacao;
            $data_hora=date('Y-m-d H:i:s');
            $conteudo=$_POST['conteudo'];

          
            if($comentarios->addComentario($id_publicacao,$conteudo,$data_hora)){
                header("Location:".BASE_URL."publicacao/abrirArtigo/".$id_publicacao);
            }
        }
        $listaComentarios=$comentarios->getComentarios($id_publicacao);
        $comentarios_comentadores=array();
        if(!empty($listaComentarios)){
            foreach($listaComentarios as $comentario){
                $comentador=$usuarios->getInfoComentador($comentario['id_usuario']);
                $comentarios_comentadores[]=array('comentario'=>$comentario,'comentador'=>$comentador);
            }
        }
        $dados=array("artigo"=>$artigo,"ultimosArtigos"=>$ultimosArtigos,"publicador"=>$publicador,"info"=>$info,"principaisArtigos"=>$principaisArtigos,"comentarios_comentadores"=>$comentarios_comentadores,"totalComentarios"=> $totalComentarios);
        $this->loadTemplate('artigo',$dados);
    }

    public function excluirComentarioNoticia($id_comentario){
        $comentarios=new Comentarios();
        $info=$comentarios->getInfoComentario($id_comentario);
        $id_publicacao=$info['id_publicacao'];
        $comentarios->excluirComentario($id_comentario);
        header("Location:".BASE_URL."publicacao/abrirNoticia/".$id_publicacao);
    }

    public function excluirComentarioArtigo($id_comentario){
        $comentarios=new Comentarios();
        $info=$comentarios->getInfoComentario($id_comentario);
        $id_publicacao=$info['id_publicacao'];
        $comentarios->excluirComentario($id_comentario);
        header("Location:".BASE_URL."publicacao/abrirArtigo/".$id_publicacao);
    }

    public function minhasNoticias(){
        $usuarios=new Usuarios();
        $info=$usuarios->getInfo();
        if($info['tipoUsuario']!="publicador"){
            header("Location:".BASE_URL);
        }
        if(!isset($_SESSION['cLogin'])){
            header("Location:".BASE_URL);
        }
        $publicacoes=new Publicacoes();
        $totalNoticiasUsuario=$publicacoes->getTotalNoticiasUsuario();
        $p=1;
        if(isset($_GET['p']) && !empty($_GET['p'])){
            $p=$_GET['p'];
        }
        $perpage=12;
        $totalPaginas=ceil($totalNoticiasUsuario/$perpage);
        $minhasNoticias=$publicacoes->getMinhasNoticias($perpage,$p);
        $dados=array("minhasNoticias"=>$minhasNoticias,"totalPaginas"=>$totalPaginas);
        $this->loadTemplate('minhasNoticias',$dados);
    }

    public function editarNoticia($id_publicacao){
        $usuarios=new Usuarios();
        $info=$usuarios->getInfo();
        if($info['tipoUsuario']!="publicador"){
            header("Location:".BASE_URL);
        }
        if(!isset($_SESSION['cLogin'])){
            header("Location:".BASE_URL);
        }
        $publicacao=new Publicacoes();
        $info=$publicacao->getInfoPublicacao($id_publicacao);
        if(isset($_POST['titulo'])){
            $titulo=strip_tags($_POST['titulo']);
            $descricao=strip_tags($_POST['descricao']);
            $conteudo=strip_tags($_POST['conteudo']);
            $data_hora=$info['data_hora'];
            $categoria=strip_tags($_POST['categoria']);
            if (empty($_FILES['imagem'])){
                $imagem=$info['imagem'];
            }else{
                $imagem=$_FILES['imagem'];
            }
            if($publicacao->editarPublicacao($id_publicacao,$titulo,$descricao,$conteudo,$data_hora,$categoria,$imagem)){
                header("Location:".BASE_URL."publicacao/editarNoticia/".$id_publicacao."?editar-post=true");
            }
             
        }
        $dados=array("info"=>$info);
        $this->loadTemplate('editarPublicacao',$dados);
    }

    public function excluirNoticia($id_publicacao){
        $usuarios=new Usuarios();
        $info=$usuarios->getInfo();
        if($info['tipoUsuario']!="publicador"){
            header("Location:".BASE_URL);
        }
         if(!isset($_SESSION['cLogin'])){
            header("Location:".BASE_URL);
        }
        $publicacao=new Publicacoes();
        if($publicacao->excluirPublicacao($id_publicacao)){
            header("Location:".BASE_URL."publicacao/minhasNoticias");
        }
    }

    public function meusArtigos(){
        $usuarios=new Usuarios();
        $info=$usuarios->getInfo();
        if($info['tipoUsuario']!="publicador"){
            header("Location:".BASE_URL);
        }
        if(!isset($_SESSION['cLogin'])){
            header("Location:".BASE_URL);
        }
        $publicacoes=new Publicacoes();
        $totalArtigosUsuario=$publicacoes->getTotalArtigosUsuario();
        $p=1;
        if(isset($_GET['p']) && !empty($_GET['p'])){
            $p=$_GET['p'];
        }
        $perpage=12;
        $totalPaginas=ceil($totalArtigosUsuario/$perpage);
        $meusArtigos=$publicacoes->getMeusArtigos($perpage,$p);
        $dados=array("meusArtigos"=>$meusArtigos,"totalPaginas"=>$totalPaginas);
        $this->loadTemplate('meusArtigos',$dados);
    }

    public function editarArtigo($id_publicacao){
        $usuarios=new Usuarios();
        $info=$usuarios->getInfo();
        if($info['tipoUsuario']!="publicador"){
            header("Location:".BASE_URL);
        }
        if(!isset($_SESSION['cLogin'])){
            header("Location:".BASE_URL);
        }
        $publicacao=new Publicacoes();
        $info=$publicacao->getInfoPublicacao($id_publicacao);
        if(isset($_POST['titulo'])){
            $titulo=strip_tags($_POST['titulo']);
            $descricao=strip_tags($_POST['descricao']);
            $conteudo=strip_tags($_POST['conteudo']);
            $data_hora=$info['data_hora'];
            $categoria=strip_tags($_POST['categoria']);
            if (empty($_FILES['imagem'])){
                $imagem=$info['imagem'];
            }else{
                $imagem=$_FILES['imagem'];
            }
            $status=strip_tags($_POST['status']);
            if($publicacao->editarPublicacao($id_publicacao,$titulo,$descricao,$conteudo,$data_hora,$categoria,$status,$imagem)){
                header("Location:".BASE_URL."publicacao/editarArtigo/".$id_publicacao."?editar-post=true");
            }
             
        }
        $dados=array("info"=>$info);
        $this->loadTemplate('editarPublicacao',$dados);
    }

    public function excluirArtigo($id_publicacao){
        $usuarios=new Usuarios();
        $info=$usuarios->getInfo();
        if($info['tipoUsuario']!="publicador"){
            header("Location:".BASE_URL);
        }
         if(!isset($_SESSION['cLogin'])){
            header("Location:".BASE_URL);
        }
    
        $publicacao=new Publicacoes();
        if($publicacao->excluirPublicacao($id_publicacao)){
            header("Location:".BASE_URL."publicacao/meusArtigos");
        }
    }

}
?>       