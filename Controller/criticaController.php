<?php
class criticaController extends Controller{

    public function index(){
        $criticas=new Criticas();
        $totalFilmes=$criticas->getTotalFilmes();
         $p=1;
        if(isset($_GET['p']) && !empty($_GET['p'])){
            $p=$_GET['p'];
        }
        $perpage=12;
        $totalPaginas=ceil($totalFilmes/$perpage);
        $listaFilmes=$criticas->getFilmes($perpage,$p);
        if(isset($_GET['filme']) && !empty($_GET['filme'])){
            $_GET['filme'];
            $termoPesquisa=$criticas->palavraChaveFilme($_GET['filme']);
            if($criticas->pesquisarFIlme($termoPesquisa)==false){
                $totalFilmePesquisado=0;
                $dados=array("totalFilmePesquisado"=>$totalFilmePesquisado);
                $this->loadTemplate('pesquisaDoFilme',$dados);
            }else{
            $infoFilmePesquisado=$criticas->pesquisarFilme($termoPesquisa);
           $totalFilmePesquisado=$criticas->getTotalFilmePesquisado($termoPesquisa);
            $dados=array("infoFilmePesquisado"=>$infoFilmePesquisado,"totalFilmePesquisado"=>$totalFilmePesquisado);
            $this->loadTemplate('pesquisaDoFilme',$dados);
            }
        }else{
            $dados=array("listaFilmes"=>$listaFilmes,"totalPaginas"=>$totalPaginas);
            $this->loadTemplate("criticas",$dados);
        }
     
    }


    public function cadastrarFilmes(){
        if(isset($_POST['titulo']) && isset($_POST['sinopse']) && isset($_POST['classificacao']) && isset($_POST['genero']) && isset($_FILES['fotoFilme']) && isset($_FILES['fotoFundo']) && isset($_POST['dataLanc'])){
            $titulo=strip_tags($_POST['titulo']);
            $sinopse=strip_tags($_POST['sinopse']);
            $classificacao=strip_tags($_POST['classificacao']);
            $genero=$_POST['genero'];            
            $genero=implode(', ',$genero);
            $fotoFilme=$_FILES['fotoFilme'];
            $fotoFundo=$_FILES['fotoFundo'];
            $dataLanc=$_POST['dataLanc'];
                                                                                                                                                                                                                                                                                                                 
            $criticas=new Criticas();
            if($criticas->cadastrarFilme($titulo,$sinopse,$classificacao,$genero,$fotoFilme,$fotoFundo,$dataLanc)){
                header("Location:".BASE_URL."critica/cadastrarFilmes/?cadastrar-filme=true");
              }  
        }
        $this->loadTemplate("cadastrarFilme");
    }

    public function abrirFilme($id_filme){
        $criticas=new Criticas;
        $filme=$criticas->getFilme($id_filme);
        $totalCriticas=$criticas->getTotalCriticas($id_filme);
        $p=1;
        if(isset($_GET['p']) && !empty($_GET['p'])){
            $p=$_GET['p'];
        }
        $perpage=12;
        $totalPaginas=ceil($totalCriticas/$perpage);
        $criticasFilme=$criticas->getCriticas($id_filme,$perpage,$p);
        $dados=array("filme"=>$filme,"criticasFilme"=>$criticasFilme,"totalPaginas"=>$totalPaginas,"id_filme"=>$id_filme);
        $this->loadTemplate('filme',$dados);
    }

    public function criarCritica(){
        $criticas=new Criticas();
        $totalFilmes=$criticas->getTotalFilmes();
        $p=1;
       if(isset($_GET['p']) && !empty($_GET['p'])){
           $p=$_GET['p'];
       }
       $perpage=12;
       $totalPaginas=ceil($totalFilmes/$perpage);
        $listaFilmes=$criticas->getFilmes($perpage,$p);
        $dados=array("listaFilmes"=>$listaFilmes,"totalPaginas"=>$totalPaginas);
        $this->loadTemplate("escolherFilmeCritica",$dados);
    }

    public function fazerCritica($id_filme){
        $criticas=new Criticas;
        $filme=$criticas->getFilme($id_filme);
        $dados=array("filme"=>$filme);

        if(isset($_POST['conteudo']) && isset($_POST['notaCritica'])){
            $conteudo=strip_tags($_POST['conteudo']);
            $notaCritica=strip_tags($_POST['notaCritica']);
            $data_hora=date('Y-m-d H:i:s');

            if($criticas->fazerCritica($conteudo,$notaCritica,$data_hora,$id_filme)){
                header("Location:".BASE_URL."critica/fazerCritica/".$id_filme."?critica=true");
            }else{
                header("Location:".BASE_URL."critica/fazerCritica/".$id_filme."?critica=false");
            }   
        }
        $this->loadTemplate('fazerCriticaForm',$dados);
    }

    public function abrirCritica($id_critica){
        $criticas=new Criticas();
        $critica=$criticas->getCritica($id_critica);
        $ultimasCriticas=$criticas->getUltimasCriticas();
        $criticasVejaMais=$criticas->getCriticasVejaMais();
        $dados=array("critica"=>$critica,"ultimasCriticas"=>$ultimasCriticas,"criticasVejaMais"=>$criticasVejaMais);
        $this->loadTemplate("criticaFilme",$dados);
    }

    public function minhasCriticas(){
        $criticas=new Criticas();
        $totalCriticas=$totalCriticasUsuario=$criticas->getTotalCriticasUsuario();
        $p=1;
       if(isset($_GET['p']) && !empty($_GET['p'])){
           $p=$_GET['p'];
       }
       $perpage=12;
       $totalPaginas=ceil($totalCriticas/$perpage);
        $filmeUsuarioCritica=$criticas->getFilmeUsuario($perpage,$p);
        $dados=array("filmeUsuarioCritica"=>$filmeUsuarioCritica,"totalPaginas"=>$totalPaginas);
        $this->loadTemplate('minhasCriticas',$dados);
    }

    public function editarCritica($id_critica){
        $criticas=new Criticas;
        $nomeFilme=$criticas->getNomeFilme($id_critica);
        $id_filme=$nomeFilme['id_filme'];
        $critica=$criticas->getCritica($id_critica);
        if(isset($_POST['conteudo']) && isset($_POST['notaCritica'])){
            $conteudo=strip_tags($_POST['conteudo']);
            $notaCritica=strip_tags($_POST['notaCritica']);   
            if($criticas->editarCritica($conteudo,$notaCritica,$id_critica,$id_filme)){
                header("Location:".BASE_URL."critica/editarCritica/".$id_critica."?editar=true");
            }
        }
        $dados=array("nomeFilme"=>$nomeFilme,"critica"=>$critica);
    $this->loadTemplate('editarCriticaForm',$dados);
    }

    public function excluirCritica($id_critica){
        $criticas=new Criticas();
        $nomeFilme=$criticas->getNomeFilme($id_critica);
        $id_filme=$nomeFilme['id_filme'];
        $criticas->excluirCritica($id_critica,$id_filme);
        header("Location:".BASE_URL."critica/minhasCriticas");
    }

    public function filmes(){
        $criticas=new Criticas();
        $totalFilmes=$criticas->getTotalFilmes();
         $p=1;
        if(isset($_GET['p']) && !empty($_GET['p'])){
            $p=$_GET['p'];
        }
        $perpage=12;
        $totalPaginas=ceil($totalFilmes/$perpage);
        $listaFilmes=$criticas->getFilmes($perpage,$p);
        $dados=array("listaFilmes"=>$listaFilmes,"totalPaginas"=>$totalPaginas);
        $this->loadTemplate("listarFilmes",$dados);
    }

    public function editarFilme($id_filme){
        $criticas=new Criticas();
        $infoFilme=$criticas->getFilme($id_filme);
        $genero=explode(',',$infoFilme['genero']);
        if(isset($_POST['titulo']) && isset($_POST['sinopse']) && isset($_POST['classificacao']) && isset($_POST['genero']) && isset($_FILES['fotoFilme']) && isset($_FILES['fotoFundo']) && isset($_POST['dataLanc'])){
            $titulo=strip_tags($_POST['titulo']);
            $sinopse=strip_tags($_POST['sinopse']);
            $classificacao=strip_tags($_POST['classificacao']);
            $genero=$_POST['genero'];            
            $genero=implode(', ',$genero);
            $fotoFilme=$_FILES['fotoFilme'];
            $fotoFundo=$_FILES['fotoFundo'];
            $dataLanc=$_POST['dataLanc'];                                           
            
          if($criticas->editarFilme($titulo,$sinopse,$classificacao,$genero,$fotoFilme,$fotoFundo,$dataLanc,$id_filme)){
            header("Location:".BASE_URL."critica/editarFilme/".$id_filme."?editarFilme=true");
          }
        }
        $dados=array("infoFilme"=>$infoFilme,"genero"=>$genero);
        $this->loadTemplate("editarFilme",$dados);
    }

    public function excluirFilme($id_filme){
        $criticas=new Criticas();
        if( $criticas->excluirFilme($id_filme)){
            header("Location:".BASE_URL."critica/filmes");
        }
    }
}
?>