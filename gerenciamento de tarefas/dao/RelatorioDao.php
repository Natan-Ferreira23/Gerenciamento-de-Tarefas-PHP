<?php 
class RelatorioDao{
    public function listar(){
        try{
            $sql="SELECT
            t.codigo AS Codigo_Tarefa,
            t.titulo AS Titulo_Tarefa,
            t.descricao AS Descricao_Tarefa,
            t.data_inicio AS Data_Inicio_Tarefa,
            t.previsao_fim AS Previsao_Fim_Tarefa,
            tec.nome AS Nome_Tecnologia,
            e.nome AS Nome_Equipe,
            e.qnt_pessoas AS Quantidade_Pessoas,
            p.nome AS Nome_Projeto
        FROM
            Tarefas t
            JOIN Tecnologias tec ON t.tecnologias_codigo = tec.codigo
            JOIN Equipes e ON t.equipes_codigo = e.codigo
            JOIN Projetos p ON t.projetos_codigo = p.codigo;";
            $conn = ConnectionFactory::getConnection();
            $stmt = $conn->query($sql);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $rows; // Retorna todas as linhas encontradas
        } catch(Exception $e){
            echo "Erro ao listar relatório: {$e->getMessage()}";
            return null; // Retorna null em caso de erro
        }
    }
}
?>