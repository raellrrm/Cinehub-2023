<?php
class Assinatura extends Model{

    public function verificarAssinatura(){
        $sql=$this->db->prepare("SELECT * FROM assinatura WHERE id_usuario=:id_usuario");
        $sql->bindValue(':id_usuario',$_SESSION['cLogin']);
        $sql->execute();

        if($sql->rowCount()>0){
            return false;
        }else{
            return true;
        }
    }

    public function cadastrarAssinatura($tipo,$metodo,$valor,$email,$dataHora){
        $sql=$this->db->prepare("INSERT INTO assinatura SET tipo=:tipo, metodo=:metodo, valor=:valor, email=:email, dataHora=:dataHora, id_usuario=:id_usuario");
        $sql->bindValue(':tipo',$tipo);
        $sql->bindValue(':metodo',$metodo);
        $sql->bindValue(':valor',$valor);
        $sql->bindValue(':email',$email);
        $sql->bindValue(':dataHora',$dataHora);
        $sql->bindValue(':id_usuario',$_SESSION['cLogin']);
        $sql->execute();

        $sql=$this->db->prepare("INSERT INTO perfil SET id_usuario=:id_usuario, tipoAssinatura=:tipoAssinatura");
        $sql->bindValue(':id_usuario',$_SESSION['cLogin']);
        $sql->bindValue(':tipoAssinatura',$tipo);
        $sql->execute();

        return true;
    }

    public function getAssinatura(){
        $sql=$this->db->prepare("SELECT * FROM assinatura WHERE id_usuario=:id_usuario");
        $sql->bindValue(':id_usuario',$_SESSION['cLogin']);
        $slq->execute();
    }

    public function getAssinaturaInfo(){
        $sql=$this->db->prepare("SELECT * FROM perfil WHERE id_usuario=:id_usuario");
        $sql->bindValue(':id_usuario',$_SESSION['cLogin']);
        $sql->execute();

        if($sql->rowCount()>0){
            return $sql=$sql->fetch();
        }
    }

    public function cancelarAssinatura(){
        $sql=$this->db->prepare("DELETE FROM assinatura WHERE id_usuario=:id_usuario");
        $sql->bindValue(':id_usuario',$_SESSION['cLogin']);
        $sql->execute();

        $sql=$this->db->prepare("DELETE FROM perfil WHERE id_usuario=:id_usuario");
        $sql->bindValue(':id_usuario',$_SESSION['cLogin']);
        $sql->execute();

    }

    public function alterarAssinatura($tipo,$metodo,$valor,$email,$dataHora){
        $sql=$this->db->prepare("UPDATE assinatura SET tipo=:tipo, metodo=:metodo, valor=:valor, email=:email, dataHora=:dataHora, id_usuario=:id_usuario");
        $sql->bindValue(':tipo',$tipo);
        $sql->bindValue(':metodo',$metodo);
        $sql->bindValue(':valor',$valor);
        $sql->bindValue(':email',$email);
        $sql->bindValue(':dataHora',$dataHora);
        $sql->bindValue(':id_usuario',$_SESSION['cLogin']);
        $sql->execute();

        $sql=$this->db->prepare("UPDATE perfil SET id_usuario=:id_usuario, tipoAssinatura=:tipoAssinatura");
        $sql->bindValue(':id_usuario',$_SESSION['cLogin']);
        $sql->bindValue(':tipoAssinatura',$tipo);
        $sql->execute();

        return true;
    }

    public function getAssinaturas(){
        $sql=$this->db->query("SELECT * FROM assinatura");
        
        if($sql->rowCount()>0){
            return $sql=$sql->fetchAll();
        }
    }

    public function cancelarAssinaturaAdm($id_usuario){
        $sql=$this->db->prepare("DELETE FROM assinatura WHERE id_usuario=:id_usuario");
        $sql->bindValue(':id_usuario',$id_usuario);
        $sql->execute();

        $sql=$this->db->prepare("DELETE FROM perfil WHERE id_usuario=:id_usuario");
        $sql->bindValue(':id_usuario',$_SESSION['cLogin']);
        $sql->execute();
    }
}
?>