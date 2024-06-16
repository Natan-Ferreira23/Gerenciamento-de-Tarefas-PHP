<?php
 class TarefasDao{
    public function inserir(Tarefas $tarefa){
      try{
        $sql="INSERT INTO tarefas (titulo,descricao,data_inicio,previsao_fim,projetos_codigo,equipes_codigo,tecnologias_codigo) VALUES(:titulo, :descricao, :data_inicio, :previsao_fim, :projetos_codigo, :equipes_codigo, :tecnologias_codigo);";
        $conn=ConnectionFactory::getConnection()->prepare($sql); //os dois pontos sao para chamar o metodo do objt sem instanciar o obj]
        $conn->bindValue(":titulo",$tarefa->getTitulo());
        $conn->bindValue(":descricao",$tarefa->getDescricao());
        $conn->bindValue(":data_inicio",$tarefa->getDataInicio());
        $conn->bindValue(":previsao_fim",$tarefa->getPrevisaoFim());       
        $conn->bindValue(":projetos_codigo",$tarefa->getProjeto());       
        $conn->bindValue(":equipes_codigo",$tarefa->getEquipe());      
        $conn->bindValue(":tecnologias_codigo",$tarefa->getTecnologia());                  
        return $conn->execute();
      }catch(Exception $e){
        print "<p> Erro ao inserir Tarefa $e</p>";       
      }
  
    }
    public function deletar($cod){
      try {
        $sql = "DELETE FROM tarefas WHERE codigo = :codigo";
        $conn = ConnectionFactory::getConnection()->prepare($sql);
        $conn->bindValue(":codigo", $cod);
        $conn->execute();
    } catch (Exception $e) {
        echo "Erro ao deletar tarefa: {$e->getMessage()}";
    }
    }
    public function listar(){
      try{
        $sql= "SELECT * FROM tarefas;";
        $result=ConnectionFactory::getConnection()->query($sql);
        $lista=$result->fetchAll(PDO::FETCH_ASSOC); 
        $tarefa_lista= array();
        foreach($lista  as $l){
            $tarefa_lista[]= $this->listarTarefas($l);
        }
        return  $tarefa_lista;
      }catch(Exception $e){
        echo"Erro ao listar tarefas {$e->getMessage()}";
      }
    }
    public function listarTarefas($row){
        $tarefa= new Tarefas;
        $tarefa->setCodigo($row['codigo']);
        $tarefa->setTitulo($row['titulo']);
        $tarefa->setDescricao($row['descricao']);  
        $tarefa->setDataInicio($row['data_inicio']);     
        $tarefa->setPrevisaoFim($row['previsao_fim']);     

        return $tarefa;
    }
    public function listarP(){
        try{
             $sql="SELECT projetos.codigo, projetos.nome FROM projetos";
            $conn = ConnectionFactory::getConnection();
            $stmt = $conn->query($sql);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $rows; // Retorna todas as linhas encontradas
        } catch(Exception $e){
            echo "Erro ao listar projetos: {$e->getMessage()}";
            return null; // Retorna null em caso de erro
        }
    }
    public function listarE(){
      try{
          $sql = "SELECT equipes.codigo, equipes.nome FROM equipes";
          $conn = ConnectionFactory::getConnection();
          $stmt = $conn->query($sql);
          $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
          return $rows; // Retorna todas as linhas encontradas
      } catch(Exception $e){
          echo "Erro ao listar equipes: {$e->getMessage()}";
          return null; // Retorna null em caso de erro
      }
  }
  public function listarT(){
    try{
        $sql = "SELECT tecnologias.codigo, tecnologias.nome FROM tecnologias";
        $conn = ConnectionFactory::getConnection();
        $stmt = $conn->query($sql);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows; // Retorna todas as linhas encontradas
    } catch(Exception $e){
        echo "Erro ao listar Tecnologias: {$e->getMessage()}";
        return null; // Retorna null em caso de erro
    }
}   public function buscarPorCodigo($codigo) {
  try {
      $sql = "SELECT * FROM tarefas WHERE codigo = :codigo";
      $conn = ConnectionFactory::getConnection()->prepare($sql);
      $conn->bindValue(":codigo", $codigo);
      $conn->execute();
      $row = $conn->fetch(PDO::FETCH_ASSOC);
      return $this->listarTarefas($row);
  } catch (Exception $e) {
      echo "Erro ao buscar projeto: {$e->getMessage()}";
  }
}
public function atualizar(Tarefas $tarefas) {
try {
  $sql="UPDATE 
  tarefas SET titulo = :titulo, 
  descricao = :descricao,
  data_inicio = :data_inicio, 
  previsao_fim = :previsao_fim,
  projetos_codigo=:projetos_codigo,
  equipes_codigo=:equipes_codigo,
  tecnologias_codigo=:tecnologias_codigo
  WHERE codigo = {$tarefas->getCodigo()}";
    $conn = ConnectionFactory::getConnection()->prepare($sql);
    $conn->bindValue(":titulo", $tarefas->getTitulo());
    $conn->bindValue(":descricao", $tarefas->getDescricao());
    $conn->bindValue(":data_inicio", $tarefas->getDataInicio());
    $conn->bindValue(":previsao_fim", $tarefas->getPrevisaoFim());
    $conn->bindValue("projetos_codigo",$tarefas->getProjeto());
    $conn->bindValue("equipes_codigo",$tarefas->getEquipe());
    $conn->bindValue("tecnologias_codigo",$tarefas->getTecnologia());
    
    return $conn->execute();
} catch (Exception $e) {
    echo "Erro ao atualizar Tecnologia: {$e->getMessage()}";
}
}

 }
 

?>