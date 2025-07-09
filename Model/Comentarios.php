<?php
class Comentarios extends Model{

    public function addComentario($id_publicacao,$conteudo,$data_hora){
        $sql=$this->db->prepare("INSERT INTO comentarios (id_usuario, id_publicacao, conteudo, data_hora) VALUE (:id_usuario, :id_publicacao, :conteudo, :data_hora)");
        $sql->bindValue(':id_usuario',$_SESSION['cLogin']);
        $sql->bindValue(':id_publicacao',$id_publicacao);
        $sql->bindValue(':conteudo',$conteudo);
        $sql->bindValue(':data_hora',$data_hora);
        $sql->execute();
        
        return true;
    }

    public function getComentarios($id_publicacao){
        $sql=$this->db->prepare("SELECT * FROM comentarios WHERE id_publicacao=:id_publicacao ORDER BY data_hora DESC");
        $sql->bindValue(':id_publicacao',$id_publicacao);
        $sql->execute();

        if($sql->rowCount()){
            return $sql=$sql->fetchAll();
        }
    }

    public function getTotalComentarios($id_publicacao){
        $sql=$this->db->prepare("SELECT COUNT(*)as c FROM comentarios WHERE id_publicacao=:id_publicacao");
        $sql->bindValue(':id_publicacao',$id_publicacao);
        $sql->execute();

        if($sql->rowCount()>0){
            $sql=$sql->fetch();
            return $sql['c'];
        }
    }

    public function getInfoComentario($id_comentario){
        $sql=$this->db->prepare("SELECT * FROM comentarios WHERE id_comentario=:id_comentario");
        $sql->bindValue(':id_comentario',$id_comentario);
        $sql->execute();
        
        if($sql->rowCount()>0){
           return $sql=$sql->fetch();
        }

    }

    public function excluirComentario($id_comentario){
        $sql=$this->db->prepare("DELETE FROM comentarios WHERE id_comentario=:id_comentario");
        $sql->bindValue(':id_comentario',$id_comentario);
        $sql->execute();
    }
}
?>