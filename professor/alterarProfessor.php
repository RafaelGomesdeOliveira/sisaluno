<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../javascript/indexx.js"></script>
    <link rel="stylesheet" href="../style/stylecadastro.css">
</head>

<body>
    <?php
    include_once('../conexao.php');

    $id = $_POST['id'];


    $sql = "SELECT * FROM Professor WHERE idProfessor = :id";

    $retorno = $conn->prepare($sql);

    $retorno->bindParam(':id', $id, PDO::PARAM_INT);

    $retorno->execute();

    $array_retorno = $retorno->fetch();

    $nome = $array_retorno['nomeProfessor'];
    $idade = $array_retorno['idadeProfessor'];
    $matricula = $array_retorno['matricula'];
    $areaAtuacao = $array_retorno['areaAtuacao'];
    $cpfProfessor = $array_retorno['cpf'];
    $estatus = $array_retorno['estatusProfessor'];


    ?>
    <section id="formulario">
        <form action="cudrProfessor.php" method="post" onsubmit="return verificarMinimoCaracteres()">
            <div class="titulo">
                <h1>Alterar professor</h1>
            </div>
            <div class="formularios">
                <div class="input-container">
                    <input placeholder="Nome" class="input-field" type="text" name="nomeProfessor" value="<?= $nome?>" required>
                    <label for="input-field" class="input-label">Nome:</label>
                    <span class="input-highlight"></span>
                </div>

                <div class="input-container maior">
                    <input placeholder="Área atuação" class="input-field" type="text" name="areaAtuacao" value="<?= $areaAtuacao?>" required>
                    <label for="input-field" class="input-label">Área de atuação:</label>
                    <span class="input-highlight"></span>
                </div>

                <div class="input-container menor">
                    <input placeholder="Idade" class="input-field" type="number" name="idadeProfessor" value="<?= $idade?>" required min="0">
                    <label for="input-field" class="input-label">Idade:</label>
                    <span class="input-highlight"></span>
                </div>

                <div class="input-container">
                    <input placeholder="Matrícula" class="input-field" type="text" name="matricula" value="<?= $matricula?>" required>
                    <label for="input-field" class="input-label">Matrícula:</label>
                    <span class="input-highlight"></span>
                </div>

                <div class="input-container">
                    <input placeholder="CPF" class="input-field" type="text" name="cpfProfessor" value="<?= $cpfProfessor?>" required id="meuInput">
                    <label for="input-field" class="input-label">CPF:</label>
                    <span class="input-highlight"></span>
                </div>
                <div class="input-container">
                    <select placeholder="Selectione o estatus do professor" name="estatus" id="iestatus">
                        <option <?php if($estatus == 1){echo 'selected';}?> value="ativo">Ativo</option>
                        <option <?php if($estatus == 0){echo 'selected';}?> value="inativo">Inativo</option>
                    </select>
                    <label for="input-field" class="input-label">Estatus</label>
                    <span class="input-highlight"></span>
                </div>
                <input type="hidden" name="id" value="<?= $id?>" >
                <div class="botoes">
                    <a href="listaProfessores.php">Voltar</a>
                    <input type="submit" value="Alterar" name="alterarProfessor">   
                </div>
            </div>

        </form>
    </section>


</body>

</html>