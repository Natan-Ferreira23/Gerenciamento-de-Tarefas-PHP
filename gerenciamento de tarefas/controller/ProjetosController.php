<?php
require_once "../dao/connectFactory.php";
require_once "../model/Projetos.php";
require_once "../dao/ProjetosDao.php";

$projeto= new Projetos;
$projetosDao= new ProjetosDao;


$dataPost= filter_input_array(INPUT_POST); //pega todas as inputs e guardam em formato de array, só pega inputs do tipo POST
if(isset($_POST['cadastrar'])){
    $projeto->setNome($dataPost['nome']);
    $projeto->setDescricao($dataPost['descricao']);
    $projeto->setDataInicio($dataPost['data_inicio']);
    $projeto->setPrevisaoFim($dataPost['previsao_fim']); 
    
    $projetosDao->inserir($projeto);

    //preenchendo tabela n para n;
   
 //   $equipe->setProjeto($dataPost['projeto']);    
    header('Location: ../ProjetoForm.php');
}else if(isset($_POST['deletar'])){
    $codigo_projeto = $dataPost['codigo_projeto'];
    $projetosDao->deletar($codigo_projeto);
    header('Location: ../ProjetoForm.php');
}else if($_POST['atualizar']){
    $projeto->setNome($dataPost['nome']);
    $projeto->setDescricao($dataPost['descricao']);
    $projeto->setDataInicio($dataPost['data_inicio']);   
    $projeto->setPrevisaoFim($dataPost['previsao_fim']);
    $projeto->setCodigo($dataPost['codigo_projeto']);
    
    $projetosDao->atualizar($projeto);
    header('Location: ../ProjetoForm.php');
} 
?>