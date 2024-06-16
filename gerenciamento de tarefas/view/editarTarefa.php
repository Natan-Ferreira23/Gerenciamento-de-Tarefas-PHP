<?php
require_once "../dao/connectFactory.php";
require_once "../model/Tarefas.php";
require_once "../dao/TarefasDao.php";



if (isset($_POST['codigo_tarefa'])) {
    $tarefaDao2= new TarefasDao;
    $codigo = $_POST['codigo_tarefa'];
    $tarefa = $tarefaDao2->buscarPorCodigo($codigo);
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="geral.css">
    <title>Editar Tarefa</title>
    <style>
    body {
        background-color: #6c8d82;
    }

    label {
        color: white;
    }

    h1,
    h2,
    h3,
    h4,
    h5 h6 {
        color: white;
    }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="row">
                <h1 class="text-center p-3">Editar Tarefa</h1>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 m-5">
                    <form action="../controller/TarefasController.php" method="post">
                        <input type="hidden" name="codigo_tarefa" value="<?php echo $tarefa->getCodigo(); ?>">
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Titulo da Tarefa</label>
                            <input type="text" id="titulo" name="titulo" class="form-control"
                                value="<?php echo $tarefa->getTitulo(); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="descricao" class="form-label">Descrição da Tarefa</label>
                            <textarea class="form-control" name="descricao" id="descricao" rows="3"
                                required><?php echo $tarefa->getDescricao(); ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="tecnologias" class="form-label">Qual Tecnologia?</label>
                            <select name="tecnologias" id="tecnologias" class="form-select">
                                <?php 
                                        $tecnologias=$tarefaDao2->listarT();                             
                                        foreach ($tecnologias as $row):
                                        if($tarefa->getEquipe()===$row['codigo']){
                                            echo "<option selected value='".$row['codigo'] ."'>". $row['nome'] ."</option>";
                                        }else{
                                            echo '<option value="' . $row['codigo'] . '">' .$row['nome'] . '</option>';
                                        }
                                        endforeach;
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="projetos" class="form-label">Qual projeto?</label>
                            <select name="projetos" id="projetos" class="form-select">
                                <?php 
                                    $projetos=$tarefaDao2->listarP();                             
                                    foreach ($projetos as $row):
                                     if($tarefa->getProjeto()===$row['codigo']){
                                         echo "<option selected value='".$row['codigo'] ."'>". $row['nome'] ."</option>";
                                     }else{
                                        echo '<option value="' . $row['codigo'] . '">' .$row['nome'] . '</option>';
                                     }
                                    endforeach;
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="equipes" class="form-label"> Qual equipe?</label>
                            <select name="equipes" id="equipes" class="form-select">
                                <?php 
                                        $equipes=$tarefaDao2->listarE();                             
                                        foreach ($equipes as $row):
                                        if($tarefa->getEquipe()===$row['codigo']){
                                            echo "<option selected value='".$row['codigo'] ."'>". $row['nome'] ."</option>";
                                        }else{
                                            echo '<option value="' . $row['codigo'] . '">' .$row['nome'] . '</option>';
                                        }
                                        endforeach;
                                ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="data_inicio" class="form-label">Data de Início</label>
                            <input type="date" name="data_inicio" id="data_inicio" class="form-control"
                                value="<?php echo $tarefa->getDataInicio(); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="previsao_fim" class="form-label">Previsão de Fim</label>
                            <input type="date" name="previsao_fim" id="previsao_fim" class="form-control"
                                value="<?php echo $tarefa->getPrevisaoFim(); ?>" required>
                        </div>
                        <div class="mb-3 d-flex justify-content-center">
                            <a href="../TarefaForm.php" class="btn btn-danger me-1">Cancelar</a>
                            <input type="submit" value="Salvar Alterações" class="btn btn-primary" name="atualizar">

                        </div>

                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>