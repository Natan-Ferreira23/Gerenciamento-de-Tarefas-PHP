<?php 
class Tecnologias{
    private $nome;
    private $descricao;  
    private $codigo;
     

  public function getNome(){
      return $this->nome;
  }
  public function setNome($nome){
      
          $this->nome=$nome;
       
  }
  public function getDescricao(){
      return $this->descricao; 
  }
  public function setDescricao($descricao){
   
       $this->descricao=$descricao;
      
  }  
  public function getCodigo(){
    return $this->codigo;
  }
  public function setCodigo($codigo){
    $this->codigo=$codigo;
  }
}
?>