<?php
 class TecnologiasDao{
    public function inserir(Tecnologias $tecnologia){
      try{
        $sql="INSERT INTO tecnologias(nome,descricao) VALUES(:nome, :descricao);";
        $conn=ConnectionFactory::getConnection()->prepare($sql); //os dois pontos sao para chamar o metodo do objt sem instanciar o obj]
        $conn->bindValue(":nome",$tecnologia->getNome());
        $conn->bindValue(":descricao",$tecnologia->getDescricao());
        
     
        return $conn->execute();
      }catch(Exception $e){
        print "<p> Erro ao inserir Tecnologia $e</p>";       
      }
  
    }
    public function deletar($cod){
      try {
        $sql = "DELETE FROM tecnologias WHERE codigo = :codigo";
        $conn = ConnectionFactory::getConnection()->prepare($sql);
        $conn->bindValue(":codigo", $cod);
        $conn->execute();
    } catch (Exception $e) {
        echo "Erro ao deletar Projeto: {$e->getMessage()}";
    }
    }
    public function listar(){
      try{
        $sql= "SELECT * FROM tecnologias;";
        $result=ConnectionFactory::getConnection()->query($sql);
        $lista=$result->fetchAll(PDO::FETCH_ASSOC); 
        $tecnologia_lista= array();
        foreach($lista  as $l){
            $tecnologia_lista[]= $this->listarTecnologias($l);
        }
        return  $tecnologia_lista;
      }catch(Exception $e){
        echo"Erro ao listar tecnologias {$e->getMessage()}";
      }
    }
    public function listarTecnologias($row){
        $tecnologia= new Tecnologias();
        $tecnologia->setCodigo($row['codigo']);
        $tecnologia->setNome($row['nome']);
        $tecnologia->setDescricao($row['descricao']);          
            

        return $tecnologia;
    }
    public function listar2(){
        try{
            $sql = "SELECT tarefas.codigo, tarefas.titulo FROM tarefas";
            $conn = ConnectionFactory::getConnection();
            $stmt = $conn->query($sql);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $rows; // Retorna todas as linhas encontradas
        } catch(Exception $e){
            echo "Erro ao listar tarefas: {$e->getMessage()}";
            return null; // Retorna null em caso de erro
        }
    }
    public function buscarPorCodigo($codigo) {
      try {
          $sql = "SELECT * FROM tecnologias WHERE codigo = :codigo";
          $conn = ConnectionFactory::getConnection()->prepare($sql);
          $conn->bindValue(":codigo", $codigo);
          $conn->execute();
          $row = $conn->fetch(PDO::FETCH_ASSOC);
          return $this->listarTecnologias($row);
      } catch (Exception $e) {
          echo "Erro ao buscar projeto: {$e->getMessage()}";
      }
  }
  public function atualizar(Tecnologias $tecnologia) {
    try {
      $sql="UPDATE tecnologias SET nome = :nome, descricao = :descricao WHERE codigo = {$tecnologia->getCodigo()}";
        $conn = ConnectionFactory::getConnection()->prepare($sql);
        $conn->bindValue(":nome", $tecnologia->getNome());
        $conn->bindValue(":descricao", $tecnologia->getDescricao());           
        
        return $conn->execute();
    } catch (Exception $e) {
        echo "Erro ao atualizar projeto: {$e->getMessage()}";
    }
}
 }

?>