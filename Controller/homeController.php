<?php
class homeController extends Controller{

    public function index(){

        $publicacoes= new Publicacoes();
        $ultimasNoticias=$publicacoes->getUltimasNoticias();
        $noticiasHome=$publicacoes->getNoticiasHome();
        $principaisArtigos=$publicacoes->getPrincipaisArtigos();
        $dados=array("ultimasNoticias"=>$ultimasNoticias,"noticiasHome"=>$noticiasHome,"artigos"=>$principaisArtigos);
        $this->loadTemplate('home',$dados);
    }

    public function sobreNos(){
        $this->loadTemplate("sobreNos");
    }
}
?>