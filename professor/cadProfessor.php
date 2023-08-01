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
    <section id="formulario">
        <form action="cudrProfessor.php" id="meuFormulario" method="post">
            <div class="titulo">
                <h1>Alterar professor</h1>
            </div>
            <div class="formularios">
                <div class="input-container">
                    <input placeholder="Nome" class="input-field" type="text" name="nomeProfessor" required>
                    <label for="input-field" class="input-label">Nome:</label>
                    <span class="input-highlight"></span>
                </div>

                <div class="input-container maior">
                    <input placeholder="Área atuação" class="input-field" type="text" name="areaAtuacao" required>
                    <label for="input-field" class="input-label">Área de atuação:</label>
                    <span class="input-highlight"></span>
                </div>

                <div class="input-container menor">
                    <input placeholder="Idade" class="input-field" type="number" name="idadeProfessor" required>
                    <label for="input-field" class="input-label">Idade:</label>
                    <span class="input-highlight"></span>
                </div>

                <div class="input-container">
                    <input placeholder="Matrícula" class="input-field" type="text" name="matricula" required>
                    <label for="input-field" class="input-label">Matrícula:</label>
                    <span class="input-highlight"></span>
                </div>

                <div class="input-container">
                    <input placeholder="CPF" class="input-field" type="text" name="cpfProfessor" required min="14"
                        max="14" oninput="mascara(this)">
                    <label for="input-field" class="input-label">CPF:</label>
                    <span class="input-highlight"></span>
                </div>
                <div class="input-container">
                    <select placeholder="Selectione o estatus do professor" name="estatus" id="iestatus">
                        <option value="ativo">Ativo</option>
                        <option value="inativo">Inativo</option>
                    </select>
                    <label for="input-field" class="input-label">Estatus</label>
                    <span class="input-highlight"></span>
                </div>
                <div class="botoes">
                    <a href="../index.html">Voltar</a>
                    <input type="submit" value="Cadastrar" name="cadProfessor">
                    
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