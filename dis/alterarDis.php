<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/stylecadastro.css">
</head>

<body>
<?php
    include_once('../conexao.php');

    $id = $_POST['id'];


    $sql = "SELECT * FROM disciplina WHERE id = :id";

    $retorno = $conn->prepare($sql);

    $retorno->bindParam(':id', $id, PDO::PARAM_INT);

    $retorno->execute();

    $array_retorno = $retorno->fetch();

    $nome = $array_retorno['nomedisciplina'];
    $ch = $array_retorno['ch'];
    $quantAluno = $array_retorno['quantAlunos'];
    $preRequisito = $array_retorno['preRequisito'];
    $idprofessor = $array_retorno['idprofessor'];
    $semestre = $array_retorno['semestre'];


    ?>

    <section id="formulario">
        <form action="cudrDisciplina.php" method="post">
            <div class="titulo">
                <h1>Alterar disciplina</h1>
            </div>
            <div class="formularios">
                <div class="input-container">
                    <input placeholder="Nome" class="input-field" type="text" name="nomeDis" required value="<?= $nome?>" >
                    <label for="input-field" class="input-label">Nome:</label>
                    <span class="input-highlight"></span>
                </div>

                <div class="input-container metade">
                    <input placeholder="N° alunos" class="input-field" type="number" name="quantAluno" required min="0" value="<?= $quantAluno?>" >
                    <label for="input-field" class="input-label">N°alunos:</label>
                    <span class="input-highlight"></span>
                </div>

                <div class="input-container metade">
                    <input placeholder="Carga horária" class="input-field" type="number" name="ch" required min="1" value="<?= $ch?>" >
                    <label for="input-field" class="input-label">Carga horária:</label>
                    <span class="input-highlight"></span>
                </div>

                <div class="input-container">
                    <input placeholder="Pré-requisito" class="input-field" type="text" name="requisito" required value="<?= $preRequisito?>" >
                    <label for="input-field" class="input-label">Pré-requisito:</label>
                    <span class="input-highlight"></span>
                </div>

                <div class="input-container metade">
                    <input placeholder="ID Professor" class="input-field" value="<?= $idprofessor?>" type="text" name="idprofessor" required>
                    <label for="input-field" class="input-label">ID Professor:</label>
                    <span class="input-highlight"></span>
                </div>

                <div class="input-container metade">
                    <input placeholder="Semestre" class="input-field" type="text" value="<?= $semestre?>" name="semestre" required>
                    <label for="input-field" class="input-label">Semestre:</label>
                    <span class="input-highlight"></span>
                </div>

                <input type="hidden" name="id" value="<?= $id?>" >
                <div class="botoes">
                    <a href="listaDis.php">Voltar</a>
                    <input type="submit" value="Alterar" name="alterarDis">
                </div>
            </div>
            
            
        </form>

    </section>


</body>

</html>


<!-- 
                        <label for="inome">Nome:</label>
                    <input type="text" name="nome" id="inome">
    <label for="iidade">Idade:</label>
<input type="number" name="idade" id="iidade">
<label for="iturma">Turma:</label>
<input type="text" name="turma" id="iturma">

<label for="imatricula">Matricula:</label>
<input type="text" name="matricula" id="imatricula"> -->