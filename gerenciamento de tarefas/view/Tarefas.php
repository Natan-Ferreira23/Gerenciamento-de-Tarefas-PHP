<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Cadastro de Tarefas</title>
    <style>
    body {
        background-color: #6c8d82;

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
                <h1 class="text-center p-3"> Cadastro de Tarefas</h1>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 m-5">
                    <form action="controller/TarefasController.php" method="post">
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Titulo da Tarefa</label>
                            <input type="text" id="titulo" name="titulo" placeholder="Digite o nome da tarefa"
                                class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="descricao" class="form-label">Descrição da Tarefa</label>
                            <textarea class="form-control" name="descricao" id="descricao" rows="3"
                                placeholder="Como a tarefa vai ser?" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="tecnologias" class="form-label">Qual tecnologia?</label>
                            <select name="tecnologias" id="tecnologias" class="form-select">
                                <option disabled selected value="">Selecione Tecnologias</option>
                                <?php $tecnologias=$TarefasDao->listarT();                             
                                foreach ($tecnologias as $row) {
                                echo '<option value="' . $row['codigo'] . '">' .$row['nome'] . '</option>';
                            }  
                         ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="projetos">Qual projeto?</label>
                            <select name="projetos" id="projetos" class="form-select">
                                <option disabled selected value="">Selecione Projetos</option>
                                <?php $projetos=$TarefasDao->listarP();                             
                                    foreach ($projetos as $row) {
                                    echo '<option value="' . $row['codigo'] . '">' .$row['nome'] . '</option>';
                                   }  
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="equipes">Qual equipe?</label>
                            <select name="equipes" id="equipes" class="form-select">
                                <option disabled selected value="">Selecione uma equipe</option>
                                <?php $equipes=$TarefasDao->listarE();
                             
                                foreach ($equipes as $row) {
                                echo '<option value="' . $row['codigo'] . '">' .$row['nome'] . '</option>';
                                }  
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="data_inicio" class="form-label">Data de Início</label>
                            <input type="date" name="data_inicio" id="data_inicio" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="previsao_fim" class="form-label">Previsão de Fim</label>
                            <input type="date" name="previsao_fim" id="previsao_fim" class="form-control" required>
                        </div>
                        <div class="mb-3 d-flex justify-content-center">
                            <input type="submit" id="botao" name="cadastrar" value="Cadastrar Tarefa"
                                class="btn btn-warning">
                        </div>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <h3 class="text-center">Listagem de Tarefas</h3>
                <table class=" table table-dark">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">ID</th>
                            <th scope="col">NOME</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Data de inicio da tarefa</th>
                            <th scope="col">Previsão do fim para a tarefa</th>
                            <th scope="col">Ações</th>

                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <!--Codigo de select-->
                        <?php
                        $tarefas=$TarefasDao->listar();
                        if(!empty($tarefas)){
                        foreach($tarefas as $tarefa): ?>
                        <tr>
                            <td><?php echo "{$tarefa->getCodigo()}"?></td>
                            <td><?php echo "{$tarefa->getTitulo()}"?></td>
                            <td><?php echo"{$tarefa->getDescricao()}"?></td>
                            <td><?php echo"{$tarefa->getDataInicio()}"?></td>
                            <td><?php echo"{$tarefa->getPrevisaoFim()}"?></td>
                            <td>
                                <form action="controller/TarefasController.php" method="post" style="display:inline;">
                                    <input type="hidden" name="codigo_tarefa"
                                        value="<?php echo $tarefa->getCodigo(); ?>">
                                    <input type="submit" value="Deletar" name="deletar" class="btn btn-danger">
                                </form>
                                <form action="view/editarTarefa.php" method="post" style="display:inline;">
                                    <input type="hidden" name="codigo_tarefa"
                                        value="<?php echo $tarefa->getCodigo(); ?>">
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

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        let botao = document.getElementById('botao');
        let projetos = document.getElementsByName('projetos')[0];
        let equipes = document.getElementsByName('equipes')[0];
        let tecnologias = document.getElementsByName('tecnologias')[0];
        if (botao) {
            botao.addEventListener('click', function(event) {
                if (projetos.value === "") {
                    alert("É obrigatório selecionar um projeto !");
                    event.preventDefault();
                } else if (equipes.value === "") {
                    alert("É obrigatório selecionar uma equipe !");
                    event.preventDefault();
                } else if (tecnologias.value === "") {
                    alert("É obrigatório selecionar uma tecnologia !");
                    event.preventDefault();
                }
            });
        }
    });
    </script>
</body>

</html>