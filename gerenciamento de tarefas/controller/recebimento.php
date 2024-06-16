<?php 
$dataPost= filter_input_array(INPUT_POST); 
if($_POST['atualizar']){
    echo $dataPost['nome'] . "<br>";
    echo $dataPost['descricao'] . "<br>";
    echo $dataPost['qnt_pessoas'] . "<br>";
   
}
?>