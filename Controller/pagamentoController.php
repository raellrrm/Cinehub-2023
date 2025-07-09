<?php
class pagamentoController extends Controller{

    public function planoBasic(){
        if(isset($_POST['email'])){
            $assinatura=new Assinatura();
            $tipo="Basic";
            $dataHora=date('Y-m-d H:i:s');
            $valor="29.00";
            $email=$_POST['email'];
            $metodo=$_POST['metodo'];
            if($assinatura->verificarAssinatura()){
                $assinatura->cadastrarAssinatura($tipo,$metodo,$valor,$email,$dataHora);
                header("Location:".BASE_URL."perfil/minhasPublicacoes?plano_active=true");
            }else{
                $assinatura->alterarAssinatura($tipo,$metodo,$valor,$email,$dataHora);
                header("Location:".BASE_URL."perfil/meuPlano?plano_edit=true");
            }
        }
        $this->loadTemplate('planoBasic');
    }

    public function planoPremium(){
        if(isset($_POST['email'])){
            $assinatura=new Assinatura();
            $tipo="Premium";
            $dataHora=date('Y-m-d H:i:s');
            $valor="59.00";
            $email=$_POST['email'];
            $metodo=$_POST['metodo'];
            if($assinatura->verificarAssinatura()){
                $assinatura->cadastrarAssinatura($tipo,$metodo,$valor,$email,$dataHora);
                header("Location:".BASE_URL."perfil/minhasPublicacoes?plano_active=true");
            }else{
                $assinatura->alterarAssinatura($tipo,$metodo,$valor,$email,$dataHora);
                header("Location:".BASE_URL."perfil/meuPlano?plano_edit=true");
            }
        }
        $this->loadTemplate('planoPremium');
    }

    public function planoUltimate(){
         if(isset($_POST['email'])){
            $assinatura=new Assinatura();
            $tipo="Ultimate";
            $dataHora=date('Y-m-d H:i:s');
            $valor="99.00";
            $email=$_POST['email'];
            $metodo=$_POST['metodo'];
            if($assinatura->verificarAssinatura()){
                $assinatura->cadastrarAssinatura($tipo,$metodo,$valor,$email,$dataHora);
                header("Location:".BASE_URL."perfil/minhasPublicacoes?plano_active=true");
            }else{
                $assinatura->alterarAssinatura($tipo,$metodo,$valor,$email,$dataHora);
                header("Location:".BASE_URL."perfil/meuPlano?plano_edit=true");
            }
        }
        $this->loadTemplate('planoUltimate');
    }
}
?>