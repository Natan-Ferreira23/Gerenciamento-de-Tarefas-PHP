<?php 
require_once "dao/connectFactory.php";
require_once "model/Tarefas.php";
require_once "dao/TarefasDao.php";
$TarefasDao= new TarefasDao;
include "view/Tarefas.php";
?>