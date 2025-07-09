<?php
class Criticas extends Model{

    public function getTotalCriticas($id_filme){
        $sql=$this->db->prepare("SELECT COUNT(*) as c FROM critica WHERE id_filme=:id_filme");
        $sql->bindValue(':id_filme',$id_filme);
        $sql->execute();
        
        if($sql->rowCount()>0){
            $sql=$sql->fetch();
            return $sql['c'];
        }
    }

    public function getTotalFilmes(){
        $sql=$this->db->query("SELECT COUNT(*) as c FROM filmes");
        $sql=$sql->fetch();
        return $sql['c'];
    }

    public function cadastrarFilme($titulo,$sinopse,$classificacao,$genero,$fotoFilme,$fotoFundo,$dataLanc){
        if(isset($fotoFilme['tmp_name']) && !empty($fotoFilme['tmp_name'])){
            $nomedoarquivo=md5(time().rand(0,9999));
            move_uploaded_file($fotoFilme['tmp_name'],'assets/img/'.$nomedoarquivo.'.jpg');
            $fotoFilme=$nomedoarquivo;
        }

        if(isset($fotoFundo['tmp_name']) && !empty($fotoFundo['tmp_name'])){
            $nomedoarquivo=md5(time().rand(0,9999));
            move_uploaded_file($fotoFundo['tmp_name'],'assets/img/'.$nomedoarquivo.'.jpg');
            $fotoFundo=$nomedoarquivo;
        }
        $sql=$this->db->prepare("INSERT INTO filmes SET titulo=:titulo,sinopse=:sinopse,classificacao=:classificacao,genero=:genero,fotoFilme=:fotoFilme, fotoFundo=:fotoFundo, dataLanc=:dataLanc ");
        $sql->bindValue(':titulo',$titulo);
        $sql->bindValue(':sinopse',$sinopse);
        $sql->bindValue(':classificacao',$classificacao);
        $sql->bindValue(':genero',$genero);
        $sql->bindValue(':fotoFilme',$fotoFilme);
        $sql->bindValue(':fotoFundo',$fotoFundo);
        $sql->bindValue(':dataLanc',$dataLanc);
        $sql->execute();
        
        return true;
    }

    public function editarFilme($titulo,$sinopse,$classificacao,$genero,$fotoFilme,$fotoFundo,$dataLanc,$id_filme){
        if(isset($fotoFilme['tmp_name']) && !empty($fotoFilme['tmp_name'])){
            $nomedoarquivo=md5(time().rand(0,9999));
            move_uploaded_file($fotoFilme['tmp_name'],'assets/img/'.$nomedoarquivo.'.jpg');
            $fotoFilme=$nomedoarquivo;

            $sql=$this->db->prepare("UPDATE filmes SET fotoFilme=:fotoFilme WHERE id_filme=:id_filme");
            $sql->bindValue(':fotoFilme',$fotoFilme);
            $sql->bindValue(':id_filme',$id_filme);
            $sql->execute();
        }

        if(isset($fotoFundo['tmp_name']) && !empty($fotoFundo['tmp_name'])){
            $nomedoarquivo=md5(time().rand(0,9999));
            move_uploaded_file($fotoFundo['tmp_name'],'assets/img/'.$nomedoarquivo.'.jpg');
            $fotoFundo=$nomedoarquivo;

            $sql=$this->db->prepare("UPDATE filmes SET fotoFundo=:fotoFundo WHERE id_filme=:id_filme");
            $sql->bindValue(':fotoFundo',$fotoFundo);
            $sql->bindValue(':id_filme',$id_filme);
            $sql->execute();
        }

        $sql=$this->db->prepare("UPDATE filmes SET titulo=:titulo, sinopse=:sinopse, classificacao=:classificacao, genero=:genero WHERE id_filme=:id_filme");
        $sql->bindValue(':titulo',$titulo);
        $sql->bindValue(':sinopse',$sinopse);
        $sql->bindValue(':classificacao',$classificacao);
        $sql->bindValue(':genero',$genero);
        $sql->bindValue(':id_filme',$id_filme);
        $sql->execute();

        return true;
    }

    public function excluirFilme($id_filme){
        $sql=$this->db->prepare("DELETE FROM critica WHERE id_filme=:id_filme");
        $sql->bindValue(':id_filme',$id_filme);
        $sql->execute();

        $sql=$this->db->prepare("DELETE FROM filmes WHERE id_filme=:id_filme");
        $sql->bindValue(':id_filme',$id_filme);
        $sql->execute();

        return true;

    }

    public function getFilmes($perpage,$p){
        $offset = ($p - 1) * $perpage;
        $sql=$this->db->query("SELECT * FROM filmes ORDER BY dataLanc DESC LIMIT $offset,$perpage");
        if($sql->rowCount()>0){
            return $sql=$sql->fetchAll();
        }
    }

    public function getFilme($id_filme){
        $sql=$this->db->prepare("SELECT * FROM filmes WHERE id_filme=:id_filme");
        $sql->bindValue(":id_filme",$id_filme);
        $sql->execute();

        if($sql->rowCount()>0){
            return $sql=$sql->fetch();
        }
    }

    public function fazerCritica($conteudo,$notaCritica,$data_hora,$id_filme){

        $sql=$this->db->prepare("SELECT * FROM critica WHERE id_usuario=:id_usuario AND id_filme=:id_filme");
        $sql->bindValue(':id_usuario',$_SESSION['cLogin']);
        $sql->bindValue(':id_filme',$id_filme);
        $sql->execute();

        if($sql->rowCount()>0){
            return false;
        }else{

        $sql=$this->db->prepare("INSERT INTO critica SET conteudo=:conteudo, notaCritica=:notaCritica, data_hora=:data_hora, id_usuario=:id_usuario, id_filme=:id_filme");
        $sql->bindValue(':conteudo',$conteudo);
        $sql->bindValue(':notaCritica',$notaCritica);
        $sql->bindValue(':data_hora', $data_hora);
        $sql->bindValue(':id_usuario', $_SESSION['cLogin']);
        $sql->bindValue(':id_filme',$id_filme);
        $sql->execute();

        $sql=$this->db->prepare("UPDATE filmes SET nota=(select (SUM(notaCritica)/COUNT(*)) from critica where critica.id_filme=filmes.id_filme) WHERE id_filme=:id_filme");
        $sql->bindValue(':id_filme',$id_filme);
        $sql->execute();

        return true;
        }
    }

    public function editarCritica($conteudo,$notaCritica,$id_critica,$id_filme){
        $sql=$this->db->prepare("UPDATE critica SET conteudo=:conteudo, notaCritica=:notaCritica WHERE id_critica=:id_critica");
        $sql->bindValue(':conteudo',$conteudo);
        $sql->bindValue(':notaCritica',$notaCritica);
        $sql->bindValue(':id_critica',$id_critica);
        $sql->execute();

        $zero=0;
        $sql = $this->db->prepare("UPDATE filmes SET nota =:zero WHERE id_filme = :id_filme");
        $sql->bindValue(':zero',$zero);
        $sql->bindValue(':id_filme', $id_filme);
        $sql->execute();

    
        $sql=$this->db->prepare("UPDATE filmes SET nota=(select (SUM(notaCritica)/COUNT(*)) from critica where critica.id_filme=filmes.id_filme) WHERE id_filme=:id_filme");
        $sql->bindValue(':id_filme',$id_filme);
        $sql->execute();



        return true;
       
    }

    public function getNomeFilme($id_critica){
        $sql=$this->db->prepare("SELECT *, (select filmes.titulo from filmes where filmes.id_filme=critica.id_filme) as titulo, (select filmes.id_filme from filmes where filmes.id_filme=critica.id_filme) as id_filme, (select filmes.nota from filmes where filmes.id_filme=critica.id_filme) as nota FROM critica WHERE id_critica=:id_critica");
        $sql->bindValue(':id_critica',$id_critica);
        $sql->execute();

        if($sql->rowCount()>0){
            return $sql=$sql->fetch();         
        }
    }

    public function excluirCritica($id_critica,$id_filme){
        $sql=$this->db->prepare("DELETE FROM critica WHERE id_critica=:id_critica");
        $sql->bindValue(':id_critica',$id_critica);
        $sql->bindValue();
        $sql->execute();

        $zero=0;
        $sql = $this->db->prepare("UPDATE filmes SET nota =:zero WHERE id_filme = :id_filme");
        $sql->bindValue(':zero',$zero);
        $sql->bindValue(':id_filme', $id_filme);
        $sql->execute();

    
        $sql=$this->db->prepare("UPDATE filmes SET nota=(select (SUM(notaCritica)/COUNT(*)) from critica where critica.id_filme=filmes.id_filme) WHERE id_filme=:id_filme");
        $sql->bindValue(':id_filme',$id_filme);
        $sql->execute();

        return true;
    }

    public function getCriticas($id_filme,$perpage,$p){
        $offset = ($p - 1) * $perpage;
        $sql=$this->db->prepare("SELECT *,(select fotoFilme from filmes where critica.id_filme=filmes.id_filme) as fotoFilme, (select titulo from filmes where critica.id_filme=filmes.id_filme) as titulo, (select nome  from usuarios where critica.id_usuario=usuarios.id_usuario) as nomeUsuario, (select sobrenome  from usuarios where critica.id_usuario=usuarios.id_usuario) as sNomeUsuario FROM critica  WHERE id_filme=:id_filme ORDER BY data_hora DESC  LIMIT $offset,$perpage");
        $sql->bindValue(':id_filme',$id_filme);
        $sql->execute();

        if($sql->rowCount()>0){
            return $sql->fetchAll();
        }
        
    }

    public function getCritica($id_critica){
        $sql=$this->db->prepare("SELECT *, (select filmes.fotoFilme from filmes where critica.id_filme=filmes.id_filme) as fotoFilme ,(select filmes.fotoFundo from filmes where critica.id_filme=filmes.id_filme) as fotoFundo, (select titulo from filmes where critica.id_filme=filmes.id_filme) as titulo , (select dataLanc from filmes where critica.id_filme=filmes.id_filme) as dataLanc ,(select classificacao from filmes where critica.id_filme=filmes.id_filme) as classificacao, (select genero from filmes where critica.id_filme=filmes.id_filme) as genero, (select nota from filmes where critica.id_filme=filmes.id_filme) as nota ,(select sinopse from filmes where critica.id_filme=filmes.id_filme) as sinopse, (select nome  from usuarios where critica.id_usuario=usuarios.id_usuario) as nomeUsuario, (select sobrenome  from usuarios where critica.id_usuario=usuarios.id_usuario) as sNomeUsuario FROM critica WHERE id_critica=:id_critica");
        $sql->bindValue(':id_critica',$id_critica);
        $sql->execute();

        if($sql->rowCount()>0){
            return $sql=$sql->fetch();
        }
    }

    public function getUltimasCriticas(){
        $sql=$this->db->query("SELECT * FROM filmes LIMIT 8 ");
        if($sql->rowCount()>0){
            return $sql=$sql->fetchAll();
        }

    }

    public function getCriticasVejaMais(){
        $sql=$this->db->query("SELECT * FROM filmes LIMIT 6");
        if($sql->rowCount()>0){
            return $sql=$sql->fetchAll();
        }

    }

    public function getTotalCriticasUsuario(){
        $sql=$this->db->prepare("SELECT COUNT(*) as c FROM critica WHERE id_usuario=:id_usuario");
        $sql->bindValue(':id_usuario',$_SESSION['cLogin']);
        $sql->execute();

        if($sql->rowCount()>0){
            $sql=$sql->fetch();
            return $sql['c'];
        }
    }

    public function getFilmeUsuario($perpage,$p){
        $offset = ($p - 1) * $perpage;
        $sql=$this->db->prepare("SELECT *, (select filmes.fotoFilme from filmes where critica.id_filme=filmes.id_filme) as fotoFilme , (select titulo from filmes where critica.id_filme=filmes.id_filme) as titulo , (select genero from filmes where critica.id_filme=filmes.id_filme) as genero FROM critica WHERE id_usuario=:id_usuario ORDER BY data_hora DESC  LIMIT $offset,$perpage");
        $sql->bindValue(':id_usuario',$_SESSION['cLogin']);
        $sql->execute();
        
        if($sql->rowCount()>0){
            return $sql=$sql->fetchAll();
        }
    }

    public function palavraChaveFilme($palavraChaves){
        $palavraChaves=explode(" ", $palavraChaves);
        $condicao = array();

        if(count($palavraChaves)>1){
              $condicao[]="LOWER(titulo) LIKE '%" . strtolower(trim(implode(" ",$palavraChaves))) . "%'";
        }else{
             foreach ($palavraChaves as $palavraChave){
                if(strlen(trim($palavraChave))>1){
                    $condicao[]="LOWER(titulo) LIKE '%" . strtolower(trim($palavraChave)) . "%'";
                }
                
        }
        }

        return implode(" AND ", $condicao);
    }

    public function pesquisarFilme($termoPesquisa){
        $sql=$this->db->query("SELECT * FROM filmes WHERE ".$termoPesquisa."");
        if($sql instanceof PDOStatement){
        if($sql->rowCount()>0){
           return $sql->fetchAll();
        }else{
            return false;
        }}else{
            return false;
        }
    }

    public function getTotalFilmePesquisado($termoPesquisa){
        $sql=$this->db->query("SELECT COUNT(*)as c FROM filmes WHERE ".$termoPesquisa."");
        if($sql->rowCount()>0){
            $sql=$sql->fetch();
            return $sql['c'];
        }
    }
}
?>