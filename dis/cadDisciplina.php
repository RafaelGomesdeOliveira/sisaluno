<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/stylecadastro.css">
</head>

<body>
    <section id="formulario">
        <form action="cudrDisciplina.php" method="post">
            <div class="titulo">
                <h1>Cadastre disciplina</h1>
            </div>
            <div class="formularios">
                <div class="input-container">
                    <input placeholder="Nome" class="input-field" type="text" name="nomeDis" required>
                    <label for="input-field" class="input-label">Nome:</label>
                    <span class="input-highlight"></span>
                </div>

                <div class="input-container">
                    <input placeholder="Quantidade de alunos" class="input-field" type="number" name="quantAluno" required min="0">
                    <label for="input-field" class="input-label">Quantidade  de aluno:</label>
                    <span class="input-highlight"></span>
                </div>

                <div class="input-container">
                    <input placeholder="Carga horária" class="input-field" type="number" name="ch" required min="1">
                    <label for="input-field" class="input-label">Carga horária:</label>
                    <span class="input-highlight"></span>
                </div>

                <div class="input-container">
                    <input placeholder="Pré-requisito" class="input-field" type="text" name="requisito" required>
                    <label for="input-field" class="input-label">Pré-requisito:</label>
                    <span class="input-highlight"></span>
                </div>
                <div class="botoes">
                    <a href="../index.html">Voltar</a>
                    <input type="submit" value="Cadastrar" name="cadDisciplina">
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