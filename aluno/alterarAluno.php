<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../javascript/ind.js"></script>
    <link rel="stylesheet" href="../style/stylecadastro.css">
</head>

<body>

    <?php
    include_once('../conexao.php');

    $id = $_POST['id'];

    $sql = "SELECT * FROM Aluno WHERE idAluno = :id";

    $retorno = $conn->prepare($sql);

    $retorno->bindParam(':id', $id, PDO::PARAM_INT);

    $retorno->execute();

    $array_retorno = $retorno->fetch();

    $nome = $array_retorno['nomeAluno'];
    $idade = $array_retorno['idadeAluno'];
    $turma = $array_retorno['turma'];
    $matricula = $array_retorno['matriculaAluno'];
    $cpf = $array_retorno['cpf'];
    $estatus = $array_retorno['estatus'];

    ?>

    <section id="formulario">
        <form action="cudrAluno.php" method="post">
            <div class="titulo">
                <h1>Alterar aluno</h1>
            </div>
            <div class="formularios">
                <div class="input-container">
                    <input placeholder="Nome" class="input-field" type="text" name="nomeAluno" value="<?= $nome ?>"
                        required>
                    <label for="input-field" class="input-label">Nome:</label>
                    <span class="input-highlight"></span>
                </div>


                <div class="input-container metade">
                    <input placeholder="Turma" class="input-field" type="text" value="<?= strtoupper($turma)?>" name="turmaAluno"
                        required>
                    <label for="input-field" class="input-label">Turma:</label>
                    <span class="input-highlight"></span>
                </div>

                <div class="input-container metade">
                    <input placeholder="Idade" class="input-field" type="number" name="idadeAluno" value="<?= $idade ?>"
                        required min="0">
                    <label for="input-field" class="input-label">Idade:</label>
                    <span class="input-highlight"></span>
                </div>

                <div class="input-container">
                    <input placeholder="Matrícula" class="input-field" type="text" name="matriculaAluno"
                        value="<?= $matricula ?>" required>
                    <label for="input-field" class="input-label">Matrícula:</label>
                    <span class="input-highlight"></span>
                </div>

                <div class="input-container">
                    <input placeholder="CPF" class="input-field" type="text" value="<?= $cpf?>" minlength="14" name="cpfAluno"
                    id="meuInput">
                    <label for="input-field" class="input-label">CPF:</label>
                    <span class="input-highlight"></span>
                </div>
                <div class="input-container">
                    <input placeholder="AP ou RP" class="input-field" type="text" name="estatus" required value="<?=strtoupper($estatus)?>" oninput="validarInput(this)">
                    <label for="input-field" class="input-label">Status</label>
                    <span class="input-highlight"></span>
                </div>

                <input name="id" type="hidden" value="<?= $id ?>" />
                <div class="botoes">
                    <a href="listaAluno.php">Voltar</a>
                    <input type="submit" value="Alterar" name="alterarAluno">
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