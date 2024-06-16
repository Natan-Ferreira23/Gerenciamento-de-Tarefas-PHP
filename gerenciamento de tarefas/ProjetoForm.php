<?php 
require_once "dao/connectFactory.php";
require_once "model/Projetos.php";
require_once "dao/ProjetosDao.php";
$projetosDao= new ProjetosDao();
include "view/Projetos.php";
?>