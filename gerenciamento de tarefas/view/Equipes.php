<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Cadastro de Equipes</title>
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
                <h1 class="text-center p-3"> Cadastro de Equipes</h1>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 m-5">
                    <!--controller/EquipesController.php-->
                    <form action="controller/EquipesController.php" method="post">
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome da Equipe</label>
                            <input type="text" id="nome" name="nome" placeholder="Digite o nome da equipe.."
                                class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="qnt_pessoas" class="form-label">Quantidade de Pessoas na Equipe</label>
                            <input type="number" id="qnt_pessoas" name="qnt_pessoas"
                                placeholder="Digite a quantidade de pessoas.." class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="descricao" class="form-label">Descrição da equipe</label>
                            <textarea class="form-control" name="descricao" id="descricao" rows="3"
                                placeholder="A equipe é responsavel por?" required></textarea>
                        </div>
                        <div class="mb-3 d-flex justify-content-center">
                            <input type="submit" id="botao" value="Cadastrar Equipe" class="btn btn-warning"
                                name="cadastrar">
                        </div>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <h3 class="text-center">Listagem de Equipes</h3>
                    <table class=" table table-dark">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">ID</th>
                                <th scope="col">NOME</th>
                                <th scope="col">Descrição</th>
                                <th scope="col">Quantidade de pessoas na Equipe</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <!--Codigo de select-->
                            <?php 
                            $equipes=$equipeDao->listar();
                          if(isset($equipes)){ 
                          foreach($equipes as $equipe): ?>
                            <tr>
                                <td><?php echo "{$equipe->getCodigo()}"?></td>
                                <td><?php echo "{$equipe->getNome()}"?></td>
                                <td><?php echo"{$equipe->getDescricao()}"?></td>
                                <td><?php echo "{$equipe->getQntPessoas()}" ?></td>
                                <td>
                                    <form action="controller/EquipesController.php" method="post"
                                        style="display:inline;">
                                        <input type="hidden" name="codigo_equipe"
                                            value="<?php echo $equipe->getCodigo(); ?>">
                                        <input type="submit" value="Deletar" name="deletar" class="btn btn-danger">
                                    </form>
                                    <form action="view/editarEquipe.php" method="post" style="display:inline;">
                                        <input type="hidden" name="codigo_equipe"
                                            value="<?php echo $equipe->getCodigo(); ?>">
                                        <input type="submit" value="Editar" class="btn btn-primary">
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; 
                             }?>
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
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        let botao = document.getElementById('botao');
        let projetos = document.getElementsByName('projetos')[0];
        if (botao) {
            botao.addEventListener('click', function(event) {
                if (projetos.value === "") {
                    alert("É obrigatório selecionar um projeto !");
                    event.preventDefault();
                }
            });
        }
    });
    </script>
</body>

</html>