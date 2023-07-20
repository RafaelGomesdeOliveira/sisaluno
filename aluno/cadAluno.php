<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../javascript/inde.js"></script>
    <link rel="stylesheet" href="../style/stylecadastro.css">
</head>

<body>
    <section id="formulario">
        <form action="cudrAluno.php" method="post" onsubmit="return verificarMinimoCaracteres()">
            <div class="titulo">
                <h1>Cadastre-se aluno</h1>
            </div>
            <div class="formularios">
                <div class="input-container">
                    <input placeholder="Nome" class="input-field" maxlength="50" type="text" name="nomeAluno" required>
                    <label for="input-field" class="input-label">Nome:</label>
                    <span class="input-highlight"></span>
                </div>

                <div class="input-container metade">
                    <input placeholder="Turma" class="input-field" maxlength="4" type="text" name="turmaAluno"required>
                    <label for="input-field" class="input-label">Turma:</label>
                    <span class="input-highlight"></span>
                </div>

                <div class="input-container metade">
                    <input placeholder="Idade" class="input-field" type="number" name="idadeAluno" max="150" required min="1">
                    <label for="input-field" class="input-label">Idade:</label>
                    <span class="input-highlight"></span>
                </div>

                <div class="input-container">
                    <input placeholder="Matrícula" class="input-field" maxlength="20" type="text" name="matriculaAluno" required>
                    <label for="input-field" class="input-label">Matrícula:</label>
                    <span class="input-highlight"></span>
                </div>

                <div class="input-container">
                    <input placeholder="CPF" class="input-field" type="text" name="cpfAluno" required oninput="mascara(this)">
                    <label for="input-field" class="input-label">CPF:</label>
                    <span class="input-highlight"></span>
                </div>

                <div class="input-container">
                    <input placeholder="AP ou RP" class="input-field" type="text" name="estatus" required id="meuInput" >
                    <label for="input-field" class="input-label">Status</label>
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