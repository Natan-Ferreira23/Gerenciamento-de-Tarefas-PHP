<?php 
require_once "dao/connectFactory.php";
require_once "dao/RelatorioDao.php";
$RelatorioDao= new RelatorioDao;
include "view/Relatorio.php";
?>