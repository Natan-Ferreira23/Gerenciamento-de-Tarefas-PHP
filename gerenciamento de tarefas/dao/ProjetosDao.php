<?php
 class ProjetosDao{
    public function inserir(Projetos $projeto){
      try{
        $sql="INSERT INTO projetos(nome,descricao,data_inicio, previsao_fim) VALUES(:nome, :descricao, :data_inicio, :previsao_fim);";
        $conn=ConnectionFactory::getConnection()->prepare($sql); //os dois pontos sao para chamar o metodo do objt sem instanciar o obj]
        $conn->bindValue(":nome",$projeto->getNome());
        $conn->bindValue(":descricao",$projeto->getDescricao());
        $conn->bindValue(":data_inicio",$projeto->getDataInicio());
        $conn->bindValue(":previsao_fim",$projeto->getPrevisaoFim());       
        
        return $conn->execute();
      }catch(Exception $e){
        print "<p> Erro ao inserir Projeto $e</p>";       
      }
  
    }
    public function deletar($cod){
      try {
        $sql = "DELETE FROM projetos WHERE codigo = :codigo";
        $conn = ConnectionFactory::getConnection()->prepare($sql);
        $conn->bindValue(":codigo", $cod);
        $conn->execute();
    } catch (Exception $e) {
        echo "Erro ao deletar Projeto: {$e->getMessage()}";
    }
    }
    public function listar(){
      try{
        $sql= "SELECT * FROM projetos;";
        $result=ConnectionFactory::getConnection()->query($sql);
        $lista=$result->fetchAll(PDO::FETCH_ASSOC); 
        $projeto_lista= array();
        foreach($lista  as $l){
            $projeto_lista[]= $this->listarProjetos($l);
        }
        return  $projeto_lista;
      }catch(Exception $e){
        echo"Erro ao listar projetos {$e->getMessage()}";
      }
    }
    public function listarProjetos($row){
        $projeto= new Projetos();
        $projeto->setCodigo($row['codigo']);
        $projeto->setNome($row['nome']);
        $projeto->setDescricao($row['descricao']);  
        $projeto->setDataInicio($row['data_inicio']);     
        $projeto->setPrevisaoFim($row['previsao_fim']);     

        return $projeto;
    }

    public function buscarPorCodigo($codigo) {
      try {
          $sql = "SELECT * FROM projetos WHERE codigo = :codigo";
          $conn = ConnectionFactory::getConnection()->prepare($sql);
          $conn->bindValue(":codigo", $codigo);
          $conn->execute();
          $row = $conn->fetch(PDO::FETCH_ASSOC);
          return $this->listarProjetos($row);
      } catch (Exception $e) {
          echo "Erro ao buscar projeto: {$e->getMessage()}";
      }
  }
  public function atualizar(Projetos $projeto) {
    try {
      $sql="UPDATE projetos SET nome = :nome, descricao = :descricao, data_inicio = :data_inicio, previsao_fim = :previsao_fim WHERE codigo = {$projeto->getCodigo()}";
        $conn = ConnectionFactory::getConnection()->prepare($sql);
        $conn->bindValue(":nome", $projeto->getNome());
        $conn->bindValue(":descricao", $projeto->getDescricao());
        $conn->bindValue(":data_inicio", $projeto->getDataInicio());
        $conn->bindValue(":previsao_fim", $projeto->getPrevisaoFim());       
        
        return $conn->execute();
    } catch (Exception $e) {
        echo "Erro ao atualizar projeto: {$e->getMessage()}";
    }
}
 }

?>