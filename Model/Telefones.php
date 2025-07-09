<?php
class Telefones extends Model{
    
    public function cadastrarTelefone($telefone){
        $sql=$this->db->prepare("INSERT INTO telefone SET id_usuario=:id_usuario, numero=:numero");
        $sql->bindValue(':id_usuario',$_SESSION['cLogin']);
        $sql->bindValue(':numero',$telefone);
        $sql->execute();

        return true;
    }
}
?>