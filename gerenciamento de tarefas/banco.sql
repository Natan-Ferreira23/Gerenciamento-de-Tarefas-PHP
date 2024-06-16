CREATE TABLE Projetos (
    codigo int PRIMARY KEY AUTO_INCREMENT,
    nome varchar(200) NOT NULL,
    descricao varchar(500) NOT NULL,
    data_inicio date NOT NULL,
    previsao_fim date NOT NULL
);

CREATE TABLE Equipes (
    codigo int PRIMARY KEY AUTO_INCREMENT,
    nome varchar(100) NOT NULL,
    descricao varchar(200) NOT NULL,
    qnt_pessoas int NOT NULL,
);

CREATE TABLE Tecnologias (
    codigo int PRIMARY KEY AUTO_INCREMENT,
    nome varchar(200) NOT NULL,
    descricao varchar(500) NOT NULL
);

CREATE TABLE Tarefas (
    codigo int PRIMARY KEY AUTO_INCREMENT,
    titulo varchar(100) NOT NULL,
    descricao varchar(500) NOT NULL,
    data_inicio date NOT NULL,
    previsao_fim date NOT NULL,
    projetos_codigo int NOT NULL,
    equipes_codigo int NOT NULL,
    tecnologias_codigo int NOT NULL,
    FOREIGN KEY (projetos_codigo) REFERENCES Projetos (codigo) ON DELETE CASCADE,
    FOREIGN KEY (equipes_codigo) REFERENCES Equipes (codigo) ON DELETE CASCADE,
    FOREIGN KEY (tecnologias_codigo) REFERENCES Tecnologias (codigo)
);

SELECT
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
    JOIN Projetos p ON t.projetos_codigo = p.codigo;