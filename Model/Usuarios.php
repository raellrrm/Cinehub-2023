<?php
class Usuarios extends Model{

    public function verificarEmail($email){
        $sql=$this->db->prepare("SELECT id_usuario FROM usuarios WHERE email=:email");
        $sql->bindValue(':email',$email);
        $sql->execute();

        if($sql->rowCount()>0){
            return true;
        }else{
            return false;
        }
    }

    public function cadastrar($nome,$sobrenome,$senha,$email,$numero,$tipoUsuario,$bio='',$fotoPerfil=''){
        $sql=$this->db->prepare("INSERT INTO usuarios (nome, sobrenome, email, senha, numero, tipoUsuario) VALUES (:nome, :sobrenome, :email, :senha, :numero, :tipoUsuario)");
        $sql->bindValue(':nome',$nome);
        $sql->bindValue(':sobrenome',$sobrenome);
        $sql->bindValue(':email',$email);
        $sql->bindValue(':senha',md5($senha));
        $sql->bindValue(':numero',$numero);
        $sql->bindValue(':tipoUsuario',$tipoUsuario);
        $sql->execute();

        return true;
    }

    public function editarUsuario($nome,$sobrenome,$senha,$email,$numero, $id_usuario){
        $sql=$this->db->prepare("UPDATE usuarios SET nome=:nome, sobrenome=:sobrenome, senha=:senha, email=:email, numero=:numero WHERE id_usuario=:id_usuario");
        $sql->bindValue(':id_usuario',$id_usuario);
        $sql->bindValue(':nome',$nome);
        $sql->bindValue(':sobrenome',$sobrenome);
        $sql->bindValue(':email',$email);
        $sql->bindValue(':senha',md5($senha));
        $sql->bindValue(':numero',$numero);
        $sql->execute();

        return print_r($sql->errorInfo());
    }

    public function login($email,$senha){
        $sql=$this->db->prepare("SELECT * FROM usuarios WHERE email=:email AND senha=:senha");
        $sql->bindValue(':email',$email);
        $sql->bindValue(':senha',md5($senha));
        $sql->execute();

        if($sql->rowCount()>0){
            $sql=$sql->fetch();
            $_SESSION['cLogin']=$sql['id_usuario'];
            return true;
        }else{
            return false;
        }
    }

    public function getInfo(){
        $sql=$this->db->prepare("SELECT * FROM usuarios WHERE id_usuario=:id_usuario");
        $sql->bindValue(':id_usuario',$_SESSION['cLogin']);
        $sql->execute();

        if($sql->rowCount()>0){
            return $sql=$sql->fetch();
        }
    }

    public function getInfoAdm($id_usuario){
        $sql=$this->db->prepare("SELECT * FROM usuarios WHERE id_usuario=:id_usuario");
        $sql->bindValue(':id_usuario',$id_usuario);
        $sql->execute();

        if($sql->rowCount()>0){
            return $sql=$sql->fetch();
        }
    }

    public function getInfoPublicador($id_usuario){
        $sql=$this->db->prepare("SELECT * FROM usuarios WHERE id_usuario=:id_usuario");
        $sql->bindValue(':id_usuario',$id_usuario);
        $sql->execute();

        if($sql->rowCount()>0){
            return $sql->fetch();
        }
    }

    public function getInfoComentador($id_usuario){
        $sql=$this->db->prepare("SELECT * FROM usuarios WHERE id_usuario=:id_usuario");
        $sql->bindValue(':id_usuario',$id_usuario);
        $sql->execute();

        if($sql->rowCount()>0){
            return $sql->fetch();
        }
    
    }

    public function editarPefilUsuario($id_usuario,$nome,$sobrenome,$bio='',$fotoPerfil=''){
        
       if(!empty($fotoPerfil['tmp_name'])){
        $nomedoarquivo=md5(time().rand(0,9999));
        move_uploaded_file($fotoPerfil['tmp_name'],'assets/img/'.$nomedoarquivo.'.jpg');
        $fotoPerfil=$nomedoarquivo;
        
        $sql=$this->db->prepare("UPDATE usuarios SET fotoPerfil=:fotoPerfil WHERE id_usuario=:id_usuario");
        $sql->bindValue(':fotoPerfil',$fotoPerfil);
        $sql->bindValue(':id_usuario',$id_usuario);
        $sql->execute();

        return true;
       }
        
        $sql=$this->db->prepare("UPDATE usuarios SET nome=:nome, sobrenome=:sobrenome, bio=:bio WHERE id_usuario=:id_usuario");
        $sql->bindValue(':nome',$nome);
        $sql->bindValue(':sobrenome',$sobrenome);
        $sql->bindValue(':bio',$bio);
        $sql->bindValue(':id_usuario',$id_usuario);
        $sql->execute();

        return true;
    }

    public function loginAdmin($email,$senha){
        $filtro="administrador";
        $sql=$this->db->prepare("SELECT * FROM usuarios WHERE email=:email AND senha=:senha AND tipoUsuario=:tipoUsuario");
        $sql->bindValue(':email',$email);
        $sql->bindValue(':senha',md5($senha));
        $sql->bindValue(':tipoUsuario',$filtro);
        $sql->execute();

        if($sql->rowCount()>0){
            $sql=$sql->fetch();
            $_SESSION['cLogin']=$sql['id_usuario'];
            return true;
        }else{
            return false;
        }
    }
   
    public function getUsuarios(){
        $sql=$this->db->query("SELECT * FROM usuarios");

        if($sql->rowCount()>0){
            return $sql=$sql->fetchAll();
        }
    }

    public function deleteUser($id_usuario){
        $sql=$this->db->prepare("DELETE FROM usuarios WHERE id_usuario=:id_usuario");
        $sql->bindValue(':id_usuario',$id_usuario);
        $sql->execute();

        $sql=$this->db->prepare("DELETE FROM comentarios WHERE id_usuario=:id_usuario");
        $sql->bindValue(':id_usuario',$id_usuario);
        $sql->execute();

        $sql=$this->db->prepare("DELETE FROM publicacao WHERE id_usuario=:id_usuario");
        $sql->bindValue(':id_usuario',$id_usuario);
        $sql->execute();

        $sql=$this->db->prepare("DELETE FROM critica WHERE id_usuario=:id_usuario");
        $sql->bindValue(':id_usuario',$id_usuario);
        $sql->execute();

        $sql=$this->db->prepare("DELETE FROM perfil WHERE id_usuario=:id_usuario");
        $sql->bindValue(':id_usuario',$id_usuario);
        $sql->execute();

        $sql=$this->db->prepare("DELETE FROM assinatura WHERE id_usuario=:id_usuario");
        $sql->bindValue(':id_usuario',$id_usuario);
        $sql->execute();

        return true;
    }

    public function verificarPerfil(){
        $sql=$this->db->prepare("SELECT * FROM perfil WHERE id_usuario=:id_usuario");
        $sql->bindValue(':id_usuario',$_SESSION['cLogin']);
        $sql->execute();

        if($sql->rowCount()>0){
            return true;
        }else{
            return false;
        }
    }
}


?>