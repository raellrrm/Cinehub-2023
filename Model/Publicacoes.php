<?php
class Publicacoes extends Model{

    public function criarPublicacao($titulo,$descricao,$conteudo,$data_hora,$categoria,$imagem){
    if(isset($imagem['tmp_name']) && !empty($imagem['tmp_name'])){
        $nomedoarquivo=md5(time().rand(0,9999));
        move_uploaded_file($imagem['tmp_name'],'assets/img/'.$nomedoarquivo.'.jpg');
        $imagem=$nomedoarquivo;
    }
    $sql=$this->db->prepare("INSERT INTO publicacao (id_usuario, titulo, descricao, conteudo, data_hora, categoria, imagem) VALUES (:id_usuario, :titulo, :descricao, :conteudo, :data_hora, :categoria, :imagem)");
    $sql->bindValue(':id_usuario',$_SESSION['cLogin']);
    $sql->bindValue(':titulo',$titulo);
    $sql->bindValue(':descricao',$descricao);
    $sql->bindValue(':conteudo',$conteudo);
    $sql->bindValue(':data_hora',$data_hora);
    $sql->bindValue(':categoria',$categoria);
    $sql->bindValue(':imagem',$imagem);
    $sql->execute();

    return true;
}

    public function getUltimasNoticias(){
        $filtro="noticia";
        $sql=$this->db->prepare("SELECT * FROM publicacao  WHERE categoria=:categoria  ORDER BY data_hora DESC LIMIT 9");
        $sql->bindValue(':categoria',$filtro);
        $sql->execute();

        if($sql->rowCount()>0){
            $sql=$sql->fetchAll();
            return $sql;
        }
    }

    public function getUltimosArtigos(){
        $filtro="artigo";
        $sql=$this->db->prepare("SELECT * FROM publicacao  WHERE categoria=:categoria  ORDER BY data_hora DESC LIMIT 5");
        $sql->bindValue(':categoria',$filtro);
        $sql->execute();

        if($sql->rowCount()>0){
            $sql=$sql->fetchAll();
            return $sql;
        }
    }

    public function getNoticiasHome(){
        $filtro="noticia";
        $sql=$this->db->prepare("SELECT * FROM publicacao WHERE categoria=:categoria ORDER BY data_hora DESC LIMIT 10 ");
        $sql->bindValue(':categoria',$filtro);
        $sql->execute();
        if($sql->rowCount()>0){
            $sql=$sql->fetchAll();
            return $sql;
        }
    }

    public function getPrincipaisArtigos(){
        $filtro="artigo";
        $sql=$this->db->prepare("SELECT * FROM publicacao WHERE categoria=:categoria ORDER BY data_hora DESC  LIMIT 6");
        $sql->bindValue(':categoria',$filtro);
        $sql->execute();
        
        if($sql->RowCount()>0){
            return $sql=$sql->fetchAll();
        }
    }

    public function getNoticia($id_publicacao){
        $sql=$this->db->prepare("SELECT *,(select id_usuario from usuarios where publicacao.id_usuario = usuarios.id_usuario)as publicador FROM publicacao WHERE id_publicacao=:id_publicacao");
        $sql->bindValue(':id_publicacao',$id_publicacao);
        $sql->execute();

        if($sql->rowCount()>0){
           return $sql=$sql->fetch();
            
        }

    }

    public function getNoticias($perpage,$p){
        $filtro="noticia";
        $offset = ($p - 1) * $perpage;
        $sql=$this->db->prepare("SELECT * FROM publicacao WHERE categoria=:categoria ORDER BY data_hora DESC  LIMIT $offset,$perpage");
        $sql->bindValue(':categoria',$filtro);
        $sql->execute();
        
        if($sql->rowCount()>0){
            return $sql=$sql->fetchAll();
        }
    }

    public function getTotalNoticias(){
        $filtro="noticia";
        $sql=$this->db->prepare("SELECT COUNT(*) as c FROM publicacao WHERE categoria=:categoria");
        $sql->bindValue(':categoria',$filtro);
        $sql->execute();

        if($sql->rowCount()>0){
            return $sql=$sql->fetch();
        }
    }

    public function getArtigos($perpage,$p){
        $filtro="artigo";
        $offset = ($p - 1) * $perpage;
        $sql=$this->db->prepare("SELECT * FROM publicacao WHERE categoria=:categoria ORDER BY data_hora DESC LIMIT $offset,$perpage");
        $sql->bindValue(':categoria',$filtro);
        $sql->execute();
        
        if($sql->rowCount()>0){
            return $sql=$sql->fetchAll();
        }
    }

    public function getTotalArtigos(){
        $filtro="artigo";
        $sql=$this->db->prepare("SELECT COUNT(*) as c FROM publicacao WHERE categoria=:categoria");
        $sql->bindValue(':categoria',$filtro);
        $sql->execute();

        if($sql->rowCount()>0){
            return $sql=$sql->fetch();
        }
    }

    public function getArtigo($id_publicacao){
        $sql=$this->db->prepare("SELECT *,(select id_usuario from usuarios where publicacao.id_usuario = usuarios.id_usuario)as publicador FROM publicacao WHERE id_publicacao=:id_publicacao");
        $sql->bindValue(':id_publicacao',$id_publicacao);
        $sql->execute();

        if($sql->rowCount()>0){
           return $sql=$sql->fetch();
            
        }
    }

    public function getNoticiasVejaMais(){
        $filtro="noticia";
        $sql=$this->db->prepare("SELECT * FROM publicacao WHERE categoria=:categoria LIMIT 4");
        $sql->bindValue(':categoria',$filtro);
        $sql->execute();

        if($sql->rowCount()>0){
           return $sql=$sql->fetchAll();
        }
    }

    public function getTotalNoticiasUsuario(){
        $filtro="noticia";
        $sql=$this->db->prepare("SELECT COUNT(*)as c FROM publicacao WHERE categoria=:categoria AND id_usuario=:id_usuario");
        $sql->bindValue(':categoria',$filtro);
        $sql->bindValue(':id_usuario',$_SESSION['cLogin']);
        $sql->execute();

        if($sql->rowCount()>0){
            $sql=$sql->fetch();
            return $sql['c'];
        }
    }

    public function getTotalArtigosUsuario(){
        $filtro="artigo";
        $sql=$this->db->prepare("SELECT COUNT(*)as c FROM publicacao WHERE categoria=:categoria AND id_usuario=:id_usuario");
        $sql->bindValue(':categoria',$filtro);
        $sql->bindValue(':id_usuario',$_SESSION['cLogin']);
        $sql->execute();

        if($sql->rowCount()>0){
            $sql=$sql->fetch();
            return $sql['c'];
        }
    }
    
    public function getMinhasNoticias($perpage,$p){
        $filtro="noticia";
        $offset = ($p - 1) * $perpage;
        $sql=$this->db->prepare("SELECT * FROM publicacao WHERE categoria=:categoria AND id_usuario=:id_usuario ORDER BY data_hora DESC LIMIT  $offset,$perpage");
        $sql->bindValue(':categoria',$filtro);
        $sql->bindValue(':id_usuario',$_SESSION['cLogin']);
        $sql->execute();

        if($sql->rowCount()>0){
            return $sql=$sql->fetchAll();
        }
    }

    public function getMeusArtigos($perpage,$p){
        $filtro="artigo";
        $offset = ($p - 1) * $perpage;
        $sql=$this->db->prepare("SELECT * FROM publicacao WHERE categoria=:categoria AND id_usuario=:id_usuario ORDER BY data_hora DESC LIMIT  $offset,$perpage");
        $sql->bindValue(':categoria',$filtro);
        $sql->bindValue(':id_usuario',$_SESSION['cLogin']);
        $sql->execute();

        if($sql->rowCount()>0){
            return $sql=$sql->fetchAll();
        }
    }

    public function editarPublicacao($id_publicacao,$titulo,$descricao,$conteudo,$data_hora,$categoria,$imagem=''){
        if(isset($imagem['tmp_name']) && !empty($imagem['tmp_name'])){
            $nomedoarquivo=md5(time().rand(0,9999));
            move_uploaded_file($imagem['tmp_name'],'assets/img/'.$nomedoarquivo.'.jpg');
            $imagem=$nomedoarquivo;

            $sql=$this->db->prepare("UPDATE publicacao SET imagem=:imagem WHERE id_publicacao=:id_publicacao");
            $sql->bindValue(':imagem',$imagem);
            $sql->bindValue(':id_publicacao',$id_publicacao);
            $sql->execute();
        }
        $sql=$this->db->prepare("UPDATE publicacao SET id_usuario=:id_usuario, titulo=:titulo, descricao=:descricao, conteudo=:conteudo, data_hora=:data_hora, categoria=:categoria WHERE id_publicacao=:id_publicacao");
        $sql->bindValue(':id_usuario',$_SESSION['cLogin']);
        $sql->bindValue(':titulo',$titulo);
        $sql->bindValue(':descricao',$descricao);
        $sql->bindValue(':conteudo',$conteudo);
        $sql->bindValue(':data_hora',$data_hora);
        $sql->bindValue(':categoria',$categoria);
        $sql->bindValue(':id_publicacao',$id_publicacao);
        $sql->execute();
    
        return  true;
    }

    public function excluirPublicacao($id_publicacao){
        $sql=$this->db->prepare("DELETE FROM publicacao WHERE id_publicacao=:id_publicacao");
        $sql->bindValue(':id_publicacao',$id_publicacao);
        $sql->execute();

        $sql=$this->db->prepare("DELETE FROM comentarios WHERE id_publicacao=:id_publicacao");
        $sql->bindValue(':id_publicacao',$id_publicacao);
        $sql->execute();

        return true;
    }

    public function getInfoPublicacao($id_publicacao){
        $sql=$this->db->prepare("SELECT * FROM publicacao WHERE id_publicacao=:id_publicacao");
        $sql->bindValue(':id_publicacao',$id_publicacao);
        $sql->execute();

        if($sql->rowCount()>0){
            return $sql=$sql->fetch();
        }
    }

   

}
?>