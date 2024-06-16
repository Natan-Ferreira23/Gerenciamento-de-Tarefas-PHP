<?php

 class EquipesDao {
  public function inserir(Equipes $equipe){    
      try {      
          $sql = "INSERT INTO equipes(nome, descricao,qnt_pessoas) VALUES(:nome, :descricao,:qnt_pessoas)";
  
          $conn = ConnectionFactory::getConnection()->prepare($sql);
          $conn->bindValue(":nome", $equipe->getNome());
          $conn->bindValue(":descricao", $equipe->getDescricao());            
                       
          $conn->bindValue(":qnt_pessoas", $equipe->getQntPessoas());              
         
          return  $conn->execute();        
         
      } catch(Exception $e) {
          print "<p>Erro ao inserir Equipe: $e</p>";       
      }
  }

  public function deletar($cod){
    try {
      $sql = "DELETE FROM equipes WHERE codigo = :codigo";
      $conn = ConnectionFactory::getConnection()->prepare($sql);
      $conn->bindValue(":codigo", $cod);
      $conn->execute();
  } catch (Exception $e) {
      echo "Erro ao deletar Projeto: {$e->getMessage()}";
  }
  }
  public function listar(){
    try{
      $sql= "SELECT * FROM equipes;";
      $result=ConnectionFactory::getConnection()->query($sql);
      $lista=$result->fetchAll(PDO::FETCH_ASSOC); 
      $equipe_lista= array();
      foreach($lista  as $l){
        $equipe_lista[]= $this->listarEquipes($l);
      }
      return $equipe_lista;
    }catch(Exception $e){
      echo"Erro ao listar equipes {$e->getMessage()}";
    }
  }

  public function listarEquipes($row){
      $equipe= new Equipes();
      $equipe->setCodigo($row['codigo']);
      $equipe->setNome($row['nome']);
      $equipe->setDescricao($row['descricao']);    
            
      $equipe->setQntPessoas($row['qnt_pessoas']);       

      return $equipe;
  }
  public function listarP(){
    try{
        $sql = "SELECT projetos.codigo, projetos.nome FROM projetos";
        $conn = ConnectionFactory::getConnection();
        $stmt = $conn->query($sql);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows; // Retorna todas as linhas encontradas
    } catch(Exception $e){
        echo "Erro ao listar projetos: {$e->getMessage()}";
        return null; // Retorna null em caso de erro
    }
}
public function buscarPorCodigo($codigo) {
  try {
      $sql = "SELECT * FROM equipes WHERE codigo = :codigo";
      $conn = ConnectionFactory::getConnection()->prepare($sql);
      $conn->bindValue(":codigo", $codigo);
      $conn->execute();
      $row = $conn->fetch(PDO::FETCH_ASSOC);
      return $this->listarEquipes($row);
  } catch (Exception $e) {
      echo "Erro ao buscar projeto: {$e->getMessage()}";
  }
}
public function atualizar(Equipes $equipe) {
try {
  $sql="UPDATE equipes SET nome = :nome, descricao = :descricao, qnt_pessoas= :qnt_pessoas WHERE codigo = {$equipe->getCodigo()}";
    $conn = ConnectionFactory::getConnection()->prepare($sql);
    $conn->bindValue(":nome", $equipe->getNome());
    $conn->bindValue(":descricao", $equipe->getDescricao());
    $conn->bindValue(":qnt_pessoas", $equipe->getQntPessoas());
     
    
    return $conn->execute();
} catch (Exception $e) {
    echo "Erro ao atualizar projeto: {$e->getMessage()}";
}
}
} 
?>