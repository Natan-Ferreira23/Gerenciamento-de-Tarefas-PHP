<?php 
require_once "dao/connectFactory.php";
require_once "model/Equipes.php";
require_once "dao/EquipesDao.php";
$equipeDao= new EquipesDao();

include "view/Equipes.php";
?>