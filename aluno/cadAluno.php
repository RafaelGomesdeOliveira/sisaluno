<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/stylecadastro.css">
    <script src="../javascript/logica.js"></script>


</head>

<body>
    <?php
    if (isset($_GET['alerta'])) {
        ?>
        <script>
            alert("A sua data de nascimento não condiz com a sua idade");
        </script>
        <?php
    }
    ?>

    <section id="formulario">
        <form action="cudrAluno.php" method="post">
            <div class="titulo">
                <h1>Cadastre-se aluno</h1>
            </div>
            <div class="formularios">
                <div class="input-container">
                    <input placeholder="Nome" class="input-field" maxlength="50" type="text" name="nomeAluno" required>
                    <label for="input-field" class="input-label">Nome:</label>
                    <span class="input-highlight"></span>
                </div>

                <div class="input-container">
                    <input placeholder="Endereço" class="input-field" maxlength="50" type="text" name="endereco"
                        required>
                    <label for="input-field" class="input-label">Endereço:</label>
                    <span class="input-highlight"></span>
                </div>

                <div class="input-container metade">
                    <input placeholder="Turma" class="input-field" maxlength="4" type="text" name="turmaAluno" required>
                    <label for="input-field" class="input-label">Turma:</label>
                    <span class="input-highlight"></span>
                </div>

                <div class="input-container metade">
                    <input placeholder="Idade" class="input-field" type="number" name="idadeAluno" max="150" required
                        min="1">
                    <label for="input-field" class="input-label">Idade:</label>
                    <span class="input-highlight"></span>
                </div>

                <div class="input-container">
                    <input placeholder="Matrícula" class="input-field" maxlength="20" type="text" name="matriculaAluno"
                        required>
                    <label for="input-field" class="input-label">Matrícula:</label>
                    <span class="input-highlight"></span>
                </div>

                <div class="input-container">
                    <input placeholder="CPF" class="input-field" type="text" name="cpfAluno" required
                        oninput="mascara(this)">
                    <label for="input-field" class="input-label">CPF:</label>
                    <span class="input-highlight"></span>
                </div>


                <div class="input-container metade">
                    <input placeholder="AP ou RP" class="input-field" type="text" name="estatus" required id="meuInput"
                        oninput="validarInput(this)">
                    <label for="input-field" class="input-label">Status</label>
                    <span class="input-highlight"></span>
                </div>
                <div class="input-container metade">
                    <input placeholder="Data nascimento" class="input-field" type="date" name="dataNascimento" required>
                    <label for="input-field" class="input-label">Data nascimento:</label>
                    <span class="input-highlight"></span>
                </div>

                <div class="botoes">
                    <a href="../index.html">Voltar</a>
                    <input type="submit" value="Cadastrar" name="cadAluno">
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