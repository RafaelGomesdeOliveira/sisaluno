<?php
include_once('../conexao.php');

if (isset($_POST['cadDisciplina'])) {
    $nomeDis = $_POST['nomeDis'];
    $ch = $_POST['ch'];
    $pre_requisito = $_POST['requisito'];
    $quantAluno = $_POST['quantAluno'];
    $semestre = $_POST['semestre'];
    $idprofessor = $_POST['idprofessor'];

    $sql = "INSERT INTO disciplina (nomedisciplina, ch, preRequisito, quantAlunos, semestre, id, idprofessor) VALUES('$nomeDis', '$ch', '$pre_requisito', '$quantAluno', '$semeste', DEFAULT, '$idprofessor')";

    $sqlBanco = $conn->prepare($sql);

    $sqlBanco->execute();

    header("Location: ../index.html");

}


if(isset($_POST['alterarDis'])){

    $nomeDis = $_POST['nomeDis'];
    $quantAluno = $_POST['quantAluno'];
    $ch = $_POST['ch'];
    $preRequisito = $_POST['requisito'];
    $idDis = $_POST['id'];
    $idprofessor = $_POST['idprofessor'];   
    $semestre = $_POST['semestre'];



    $sql = "UPDATE disciplina SET nomeDisciplina = :nome, ch = :ch, quantAlunos = :quantAlunos, preRequisito = :preRequisito, id = :id, semestre = :semestre, idprofessor = :idprofessor WHERE id = :id";

    // $sql = "UPDATE Aluno SET nomeAluo = :nome";

    $stmt = $conn->prepare($sql);

    ##diz o paramentro e o tipo  do paramentros
    $stmt->bindParam(':id', $idDis, PDO::PARAM_INT);
    $stmt->bindParam(':nome', $nomeDis, PDO::PARAM_STR);
    $stmt->bindParam(':ch', $ch, PDO::PARAM_INT);
    $stmt->bindParam(':preRequisito', $preRequisito, PDO::PARAM_STR);
    $stmt->bindParam(':quantAlunos', $quantAluno, PDO::PARAM_STR);
    $stmt->bindParam(':semestre', $semestre, PDO::PARAM_STR);
    $stmt->bindParam(':idprofessor', $idprofessor, PDO::PARAM_STR);
    $stmt->execute();

    header("Location: listaDis.php");
}


if(isset($_GET['excluirDis'])){

    $idDis = $_GET['id'];

    $sql = "DELETE FROM disciplina WHERE id={$idDis} LIMIT 1";
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare($sql);
    $stmt->execute();

    echo $_SERVER['REQUEST_URI'];

    header("Location: listaDis.php");

}



