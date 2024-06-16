<?php
 require_once "../dao/connectFactory.php";
require_once "../model/Equipes.php";
require_once "../dao/EquipesDao.php";


$equipe= new Equipes;
$equipeDao= new EquipesDao;


$dataPost= filter_input_array(INPUT_POST); //pega todas as inputs e guardam em formato de array, só pega inputs do tipo POST
if(isset($_POST['cadastrar'])){
    $equipe->setNome($dataPost['nome']);
    $equipe->setDescricao($dataPost['descricao']);    
    $equipe->setQntPessoas($dataPost['qnt_pessoas']);       
   
   
    $equipeDao->inserir($equipe);
  
    header('Location: ../EquipeForm.php');
}else if(isset($_POST['deletar'])){
    $codigo_equipe = $dataPost['codigo_equipe'];
    $equipeDao->deletar($codigo_equipe);
    header('Location: ../EquipeForm.php');
}else if($_POST['atualizar']){
    $equipe->setNome($dataPost['nome']);
    $equipe->setDescricao($dataPost['descricao']);
    $equipe->setQntPessoas($dataPost['qnt_pessoas']);
    $equipe->setCodigo($dataPost['codigo_equipe']);    
    
    $equipeDao->atualizar($equipe);
    header('Location: ../EquipeForm.php');
}

?>