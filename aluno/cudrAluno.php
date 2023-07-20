<?php
include_once('../conexao.php');

if (isset($_POST['cadAluno'])) {
    $nomeAluno = $_POST['nomeAluno'];
    strtoupper($turma = $_POST['turmaAluno']);
    $idade = $_POST['idadeAluno'];
    $matriculaAluno = $_POST['matriculaAluno'];
    $cpfAluno = $_POST['cpfAluno'];
    strtoupper($estatus = $_POST['estatus']);

    $sql = "INSERT INTO Aluno (nomeAluno, idAluno, idadeAluno, matriculaAluno, turma, cpf, estatus) VALUES('$nomeAluno', DEFAULT, '$idade', '$matriculaAluno', '$turma','$cpfAluno', '$estatus')";

    $sqlBanco = $conn->prepare($sql);

    $sqlBanco->execute();
    header("Location: ../index.html");

}

if(isset($_POST['alterarAluno'])){
    $nomeAluno = $_POST['nomeAluno'];
    $idade = $_POST['idadeAluno'];
    $turmaAluno = $_POST['turmaAluno'];
    $matriculaAluno = $_POST['matriculaAluno'];
    $idAluno = $_POST['id'];
    $cpfAluno = $_POST['cpfAluno'];
    $estatus = $_POST['estatus'];


    $sql = "UPDATE Aluno SET nomeAluno = :nome, idAluno = :id, idadeAluno = :idade, matriculaAluno = :matriculaAluno, turma = :turmaAluno, cpf = :cpf, estatus = :estatus WHERE idAluno = :id";

    // $sql = "UPDATE Aluno SET nomeAluo = :nome";

    $stmt = $conn->prepare($sql);

    ##diz o paramentro e o tipo  do paramentros
    $stmt->bindParam(':id', $idAluno, PDO::PARAM_INT);
    $stmt->bindParam(':nome', $nomeAluno, PDO::PARAM_STR);
    $stmt->bindParam(':idade', $idade, PDO::PARAM_INT);
    $stmt->bindParam(':matriculaAluno', $matriculaAluno, PDO::PARAM_STR);
    $stmt->bindParam(':turmaAluno', $turmaAluno, PDO::PARAM_STR);
    $stmt->bindParam(':cpf', $cpfAluno, PDO::PARAM_STR);
    $stmt->bindParam(':estatus', $estatus, PDO::PARAM_STR);
    $stmt->execute();

    header("Location: listaAluno.php");
}

if(isset($_GET['excluirAluno'])){

    $idAluno = $_GET['id'];

    $sql = "DELETE FROM Aluno WHERE idAluno={$idAluno} LIMIT 1";
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare($sql);
    $stmt->execute();

    header("Location: listaAluno.php");

}