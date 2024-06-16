<?php
require_once "../dao/connectFactory.php";
require_once "../model/Equipes.php";
require_once "../dao/EquipesDao.php";



if (isset($_POST['codigo_equipe'])) {
    $equipeDao2= new EquipesDao;
    $codigo = $_POST['codigo_equipe'];
    $equipe = $equipeDao2->buscarPorCodigo($codigo);
}


?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="geral.css">
    <title>Editar Equipes</title>
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
                <h1 class="text-center p-3">Editar Equipes</h1>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 m-5">
                    <form action="../controller/EquipesController.php" method="post">
                        <input type="hidden" name="codigo_equipe" value="<?php echo $equipe->getCodigo(); ?>">
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome da Equipe</label>
                            <input type="text" id="nome" name="nome" class="form-control"
                                value="<?php echo $equipe->getNome(); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="qnt_pessoas" class="form-label">Quantidade de Pessoas na Equipe</label>
                            <input type="number" id="qnt_pessoas" name="qnt_pessoas"
                                value="<?php echo $equipe->getQntPessoas()?>" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="descricao" class="form-label">Descrição do Projeto</label>
                            <textarea class="form-control" name="descricao" id="descricao" rows="3"
                                required><?php echo $equipe->getDescricao(); ?></textarea>
                        </div>

                        <div class="mb-3 d-flex justify-content-center">
                            <a href="../EquipeForm.php" class="btn btn-danger me-1">Cancelar</a>
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