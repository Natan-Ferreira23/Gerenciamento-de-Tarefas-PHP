<?php
require_once "../dao/connectFactory.php";
require_once "../model/Tecnologias.php";
require_once "../dao/TecnologiasDao.php";


$tecnologia= new Tecnologias;
$tecnologiaDao= new TecnologiasDao;



$dataPost= filter_input_array(INPUT_POST); //pega todas as inputs e guardam em formato de array, só pega inputs do tipo POST
if(isset($_POST['cadastrar'])){
    $tecnologia->setNome($dataPost['nome']);
    $tecnologia->setDescricao($dataPost['descricao']);        
    $tecnologiaDao->inserir($tecnologia);
  
    header('Location: ../TecnologiaForm.php');
}else if(isset($_POST['deletar'])){
    $codigo_tecnologia = $dataPost['codigo_tecnologia'];
    $tecnologiaDao->deletar($codigo_tecnologia);
    header('Location: ../TecnologiaForm.php');
} else if($_POST['atualizar']){
    $tecnologia->setNome($dataPost['nome']);
    $tecnologia->setDescricao($dataPost['descricao']); 
    $tecnologia->setCodigo($dataPost['codigo_tecnologia']);
    
    $tecnologiaDao->atualizar($tecnologia);
    header('Location: ../TecnologiaForm.php');
} 

?>