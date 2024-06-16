<?php 
 class Projetos{
    private $nome;
    private $descricao;
    private $data_inicio;
    private $previsao_fim;
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
    public function setPrevisaoFim($previsaoFim){
       
        $previsaoFim=date('Y-m-d',strtotime($previsaoFim)); // convertendo a data para  o padrão do mysql
        $this->previsao_fim=$previsaoFim;
       
    } 
    public function getCodigo(){
        return $this->codigo;
    }
    public function setCodigo($codigo){
        $this->codigo=$codigo;
    }
 }
?>