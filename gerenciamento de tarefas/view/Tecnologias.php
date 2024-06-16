<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Cadastro de Tecnologias</title>
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
    <?php 
       include 'menu.php';        
     
       ?>

    <div class="container-fluid">
        <div class="row">
            <div class="row">
                <h1 class="text-center p-3"> Cadastro de Tecnologias</h1>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 m-5">
                    <form action="controller/TecnologiasController.php" method="post">
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome da tecnologia</label>
                            <input type="text" id="nome" name="nome" placeholder="Digite o nome da tecnologia"
                                class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="descricao" class="form-label">Descrição da tecnologia</label>
                            <textarea class="form-control" name="descricao" id="descricao" rows="3"
                                placeholder="Qual a função da técnologia no projeto?" required></textarea>
                        </div>
                        <div class="mb-3 d-flex justify-content-center">
                            <input type="submit" value="Cadastrar Técnologia" name="cadastrar" class="btn btn-warning">
                        </div>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <h3 class="text-center">Listagem de Tecnologias</h3>
                <table class=" table table-dark">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">ID</th>
                            <th scope="col">NOME</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Ações</th>

                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <!--Codigo de select-->
                        <?php
                        $tecnologias=$TecnologiasDao->listar();
                        if(!empty($tecnologias)){
                        foreach($tecnologias as $tecnologia): ?>
                        <tr>
                            <td><?php echo "{$tecnologia->getCodigo()}"?></td>
                            <td><?php echo "{$tecnologia->getNome()}"?></td>
                            <td><?php echo"{$tecnologia->getDescricao()}"?></td>
                            <td>
                                <form action="controller/TecnologiasController.php" method="post"
                                    style="display:inline;">
                                    <input type="hidden" name="codigo_tecnologia"
                                        value="<?php echo $tecnologia->getCodigo(); ?>">
                                    <input type="submit" value="Deletar" name="deletar" class="btn btn-danger">
                                </form>
                                <form action="view/editarTecnologia.php" method="post" style="display:inline;">
                                    <input type="hidden" name="codigo_tecnologia"
                                        value="<?php echo $tecnologia->getCodigo(); ?>">
                                    <input type="submit" value="Editar" class="btn btn-primary">
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; 
                        } ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>