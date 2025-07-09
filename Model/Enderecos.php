<?php
class Enderecos extends Model{

    public function cadastrarEndereco($uf,$cidade,$rua,$numero,$cep){
        $sql=$this->db->prepare("SELECT * FROM endereco WHERE id_usuario=:id_usuario");
        $sql->bindValue(':id_usuario',$_SESSION['cLogin']);
        $sql->execute();

        if($sql->rowCount()>0){
            $sql=$this->db->prepare("UPDATE endereco SET id_usuario=:id_usuario, uf=:uf, cidade=:cidade, numero=:numero, rua=:rua, cep=:cep ");
            $sql->bindValue(':id_usuario',$_SESSION['cLogin']);
            $sql->bindValue(':uf',$uf);
            $sql->bindValue(':cidade',$cidade);
            $sql->bindValue(':numero',$numero);
            $sql->bindValue(':rua',$rua);
            $sql->bindValue(':numero',$numero);
            $sql->bindValue(':cep',$cep);
            $sql->execute();
    
            return print_r($sql->errorInfo());
        }else{
            $sql=$this->db->prepare("INSERT INTO endereco SET id_usuario=:id_usuario, uf=:uf, cidade=:cidade, numero=:numero, rua=:rua, cep=:cep ");
            $sql->bindValue(':id_usuario',$_SESSION['cLogin']);
            $sql->bindValue(':uf',$uf);
            $sql->bindValue(':cidade',$cidade);
            $sql->bindValue(':numero',$numero);
            $sql->bindValue(':rua',$rua);
            $sql->bindValue(':numero',$numero);
            $sql->bindValue(':cep',$cep);
            $sql->execute();
    
            return print_r($sql->errorInfo());
        }
      
    }
}
?>