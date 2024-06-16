<?php
require_once "../dao/connectFactory.php";
require_once "../model/Tarefas.php";
require_once "../dao/TarefasDao.php";


$tarefas= new Tarefas;
$tarefasDao= new TarefasDao;



$dataPost= filter_input_array(INPUT_POST); //pega todas as inputs e guardam em formato de array, só pega inputs do tipo POST
if(isset($_POST['cadastrar'])){
    $tarefas->setTitulo($dataPost['titulo']);
    $tarefas->setDescricao($dataPost['descricao']);
    $tarefas->setDataInicio($dataPost['data_inicio']);
    $tarefas->setPrevisaoFim($dataPost['previsao_fim']);
    $tarefas->setProjeto($dataPost['projetos']);
    $tarefas->setEquipe($dataPost['equipes']);
    $tarefas->setTecnologia($dataPost['tecnologias']);     
      
    $tarefasDao->inserir($tarefas);
  
    header('Location: ../TarefaForm.php');
}else if(isset($_POST['deletar'])){
    $codigo_tarefa = $dataPost['codigo_tarefa'];
    $tarefasDao->deletar($codigo_tarefa);
    header('Location: ../TarefaForm.php');
}else if($_POST['atualizar']){
    $tarefas->setTitulo($dataPost['titulo']);
    $tarefas->setDescricao($dataPost['descricao']);
    $tarefas->setDataInicio($dataPost['data_inicio']);   
    $tarefas->setPrevisaoFim($dataPost['previsao_fim']);
    $tarefas->setCodigo($dataPost['codigo_tarefa']);
    $tarefas->setProjeto($dataPost['projetos']);
    $tarefas->setEquipe($dataPost['equipes']);
    $tarefas->setTecnologia($dataPost['tecnologias']);
    
    $tarefasDao->atualizar($tarefas);
    header('Location: ../TarefaForm.php');
} 
?>