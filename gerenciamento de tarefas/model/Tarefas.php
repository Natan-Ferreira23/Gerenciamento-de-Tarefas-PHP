<?php 
class Tarefas{
  private $titulo;
  private $descricao;

  private $data_inicio;
  private $previsao_fim;
  private $tecnologia;
  private $projeto;
  private $equipe;
  private $codigo;
  
 
  public function getTitulo(){
    return $this->titulo;
  }
  public function setTitulo($titulo){
    
        $this->titulo=$titulo;
    
  }
  public function getDescricao(){
    return $this->descricao;
  }
  public function setDescricao($descricao){
  
        $this->descricao=$descricao;
    
  }  
  public function getDataInicio(){
    return $this->data_inicio;
  }
  public function setDataInicio($data_inicio){
        $data_inicio=date('Y-m-d',strtotime($data_inicio));
        $this->data_inicio=$data_inicio;
    
  }
  public function getPrevisaoFim(){
    return $this->previsao_fim;
  }
  public function setPrevisaoFim($previsao_fim){
        $previsao_fim=date('Y-m-d',strtotime($previsao_fim));
        $this->previsao_fim=$previsao_fim;
    
  }
  public function getTecnologia(){
    return $this->tecnologia;
  }
  public function setTecnologia($tecnologia){
    $this->tecnologia= $tecnologia;
  }
  public function getProjeto(){
    return $this->projeto;
  }
  public function setProjeto($projeto){
    $this->projeto=$projeto;
  }
  public function getEquipe(){
    return $this->equipe;
  }
  public function setEquipe($equipe){
    $this->equipe=$equipe;
  }
  public function getCodigo(){
    return $this->codigo;
  }
  public function setCodigo($codigo){
    $this->codigo=$codigo;
  }
}
?>