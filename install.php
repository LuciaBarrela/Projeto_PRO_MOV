<?php
include 'config.php'; // Criar base de dados que suporta o site

//Criar base de dados
$ligacao = new PDO("mysql:host=$host", $user, $password);
$motor = $ligacao->prepare("CREATE DATABASE $base_dados");
$motor->execute();
$ligacao = null;

echo '<p> Base de dados criada com sucesso </p>';

//Abrir a base de dados para adicionar as tabelas
$ligacao = new PDO("mysql:dbname=$base_dados;host=$host", $user, $password);

$sql_REGISTO = "CREATE TABLE REGISTO (
    id_registo INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(50),
    utilizador VARCHAR(25),
    password VARCHAR(255),
    password2 VARCHAR(255)
    )";

$motor = $ligacao->prepare($sql_REGISTO);
$motor->execute();

$sql_USER= "CREATE TABLE USER ( 
    id_user INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_registo INT NOT NULL,
    utilizador VARCHAR(25),
    pass VARCHAR(255),
    email VARCHAR(50),
    FOREIGN KEY (id_registo) REFERENCES REGISTO(id_registo)
    )";

$motor = $ligacao->prepare($sql_USER);
$motor->execute();

$sql_LOGIN= "CREATE TABLE LOGIN (
    id_login INT PRIMARY KEY AUTO_INCREMENT,
    id_user INT NOT NULL,
    localizacao_ip INT,
    hora TIME,
    data DATE,
    status VARCHAR(250),
    FOREIGN KEY (id_user) REFERENCES USER(id_user)
    )";

$motor = $ligacao->prepare($sql_LOGIN);
$motor->execute();

$sql_ATIVIDADE_USER= "CREATE TABLE ATIVIDADE_USER (
    id_atividade INT PRIMARY KEY AUTO_INCREMENT,
    id_login INT NOT NULL,
    atividade VARCHAR(250),
    data DATE,
    hora TIME,
    FOREIGN KEY (id_login) REFERENCES LOGIN(id_login)
    )";

$motor = $ligacao->prepare($sql_ATIVIDADE_USER);
$motor->execute();

$sql_EMPRESA= "CREATE TABLE EMPRESA (
    id_empresa INT PRIMARY KEY AUTO_INCREMENT,
    nome_empresa VARCHAR(50),
    localizacao VARCHAR(50),
    Av_Rua VARCHAR(150),	
    LotNum INT,
    Andar VARCHAR(30),
    Localidade VARCHAR(250),
    CodPostal INT
    )";

$motor = $ligacao->prepare($sql_EMPRESA);
$motor->execute();

$sql_LABORATORIO= "CREATE TABLE LABORATORIO (
    id_laboratorio INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100)
    )";

$motor = $ligacao->prepare($sql_LABORATORIO);
$motor->execute();

$sql_CURSO= "CREATE TABLE CURSO (
    id_curso INT PRIMARY KEY AUTO_INCREMENT,
    programa VARCHAR(100),
    nome_curso VARCHAR(100),
    horas_totais FLOAT,
    numHoras_FPCT INT,
    id_laboratorio INT,
    FOREIGN KEY (id_laboratorio) REFERENCES LABORATORIO(id_laboratorio)
    )";

$motor = $ligacao->prepare($sql_CURSO);
$motor->execute();

$sql_COORDENADOR= "CREATE TABLE COORDENADOR (
    id_coordenador INT PRIMARY KEY AUTO_INCREMENT,
    primeiro_nome VARCHAR(50),
    segundo_nome VARCHAR(50)
    )";

$motor = $ligacao->prepare($sql_COORDENADOR);
$motor->execute();

$sql_TURMA= "CREATE TABLE TURMA (
    id_turma INT PRIMARY KEY AUTO_INCREMENT,
    nome_turma VARCHAR(100),
    localizacao VARCHAR(100),
    estado VARCHAR(50),
    regime VARCHAR(50),
    id_coordenador INT,
    data_inicio DATE,
    data_fim DATE,
    id_curso INT,
    FOREIGN KEY (id_curso) REFERENCES CURSO(id_curso),
    FOREIGN KEY (id_coordenador) REFERENCES COORDENADOR(id_coordenador)
    )";

$motor = $ligacao->prepare($sql_TURMA);
$motor->execute();

$sql_FORMANDO= "CREATE TABLE FORMANDO (
    id_formando INT PRIMARY KEY AUTO_INCREMENT,
    primeiro_nome VARCHAR(50),
    segundo_nome VARCHAR(50),
    numero_telemovel VARCHAR(50),
    email VARCHAR(100),
    data_nascimento DATE,
    id_turma INT,
    id_fpct INT,
    FOREIGN KEY (id_turma) REFERENCES TURMA(id_turma)
    )";

$motor = $ligacao->prepare($sql_FORMANDO);
$motor->execute();

$sql_FPCT= "CREATE TABLE FPCT (
    id_fpct INT PRIMARY KEY AUTO_INCREMENT,
    data_inicio DATE,
    data_fim DATE,
    id_empresa INT, 
    id_curso INT,
    id_formando INT, 
    FOREIGN KEY (id_curso) REFERENCES CURSO(id_curso),
    FOREIGN KEY (id_empresa) REFERENCES EMPRESA(id_empresa),
    FOREIGN KEY (id_formando) REFERENCES FORMANDO(id_formando)
    )";

$motor = $ligacao->prepare($sql_FPCT);
$motor->execute();


echo '<p>Tabelas criadas com sucesso</p>';

$ligacao = null;

echo '<p>Processo de criação de base de dados terminado com sucesso.</p>';
?>
