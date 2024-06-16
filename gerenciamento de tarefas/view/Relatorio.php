<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
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
     require 'menu.php';
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="row">
                <h1 class="text-center">Relatório</h1>
                <h6 class="text-center">O relatório desta pagina tem a intenção de mostrar a relação entre os cadastros
                </h6>
            </div>
            <div class="row mt-5">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <h3 class="text-center">Listagem de Tarefas</h3>
                    <table class=" table table-dark">
                        <thead>
                            <tr class="text-center">
                                <th scope="col"> ID tarefa</th>
                                <th scope="col">Titulo da tarefa</th>
                                <th scope="col">Descrição</th>
                                <th scope="col">Data de inicio da tarefa</th>
                                <th scope="col">Previsão do fim para a tarefa</th>
                                <th scope="col">Nome da tecnologia usada</th>
                                <th scope="col">Nome da equipe em ação</th>
                                <th scope="col">Quantidade de pessoas da equipe</th>
                                <th scope="col">Projeto a qual a tarefa se refere</th>

                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <!--Codigo de select-->
                            <?php
                            $resultados=$RelatorioDao->listar();
                            if ($resultados !== null) {
                                foreach ($resultados as $r) {
                                    echo "<tr>";
                                    foreach ($r as $chave => $valor) {                                  
                                                                          
                                     echo "<td>" . htmlspecialchars($valor) . "</td>";
                                        
                                    }
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='9'>Nenhum projeto encontrado ou ocorreu um erro.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>