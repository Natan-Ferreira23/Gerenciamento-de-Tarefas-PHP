<?php 
require_once "dao/connectFactory.php";
require_once "model/Tecnologias.php";
require_once "dao/TecnologiasDao.php";
$TecnologiasDao= new TecnologiasDao;
include "view/Tecnologias.php";
?>