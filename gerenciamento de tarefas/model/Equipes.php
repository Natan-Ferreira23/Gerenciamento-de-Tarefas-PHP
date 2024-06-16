<?php 
class Equipes{
    private $nome;
    private $descricao;    
    private $codigo;
    private $qnt_pessoa;
    
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
   public function getQntPessoas(){
    return  $this->qnt_pessoa;
   }
   public function setQntPessoas($qntPessoas){
    $this->qnt_pessoa=$qntPessoas;
   }
}
?>