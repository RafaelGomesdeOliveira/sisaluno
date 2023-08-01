<?php
include_once('../conexao.php');

if (isset($_POST['cadProfessor'])) {
    $nomeProfessor = $_POST['nomeProfessor'];
    $matriculaProfessor = $_POST['matricula'];
    $idadeProfessor = $_POST['idadeProfessor'];
    $areaAtuacao = $_POST['areaAtuacao'];
    $cpf = $_POST['cpfProfessor'];
    $estatus = $_POST['estatus'];

    if($estatus == 'ativo') {
        $valorEstatus = 1;
    }
    else {
        $valorEstatus = 0;
    }
    




    $sql = "INSERT INTO Professor (nomeProfessor, idProfessor,  matricula, idadeProfessor, areaAtuacao, cpf, estatusProfessor) VALUES('$nomeProfessor', DEFAULT, '$matriculaProfessor', '$idadeProfessor', '$areaAtuacao','$cpf', '$valorEstatus')";

    $sqlBanco = $conn->prepare($sql);
    $sqlBanco->execute();

    header("Location: ../index.html");
}

if(isset($_POST['alterarProfessor'])){

    $nomeProfessor = $_POST['nomeProfessor'];
    $idade = $_POST['idadeProfessor'];
    $areaAtuacao = $_POST['areaAtuacao'];
    $matriculaProfessor = $_POST['matricula'];
    $idProfessor = $_POST['id'];
    $cpfProfessor = $_POST['cpfProfessor'];
    $estatus = $_POST['estatus'];
    if($estatus == 'ativo') {
        $valorEstatus = 1;
    }
    else {
        $valorEstatus = 0;
    }
    


    $sql = "UPDATE Professor SET nomeProfessor = :nome, idProfessor = :id, matricula = :matriculaProfessor, idadeProfessor = :idade, areaAtuacao = :area, cpf = :cpfProfessor, estatusProfessor = :estatus WHERE idProfessor = :id";

    // $sql = "UPDATE Aluno SET nomeAluo = :nome";

    $stmt = $conn->prepare($sql);

    ##diz o paramentro e o tipo  do paramentros
    $stmt->bindParam(':id', $idProfessor, PDO::PARAM_INT);
    $stmt->bindParam(':nome', $nomeProfessor, PDO::PARAM_STR);
    $stmt->bindParam(':idade', $idade, PDO::PARAM_INT);
    $stmt->bindParam(':matriculaProfessor', $matriculaProfessor, PDO::PARAM_STR);
    $stmt->bindParam(':area', $areaAtuacao, PDO::PARAM_STR);
    $stmt->bindParam(':cpfProfessor', $cpfProfessor, PDO::PARAM_STR);
    $stmt->bindParam(':cpfProfessor', $cpfProfessor, PDO::PARAM_STR);
    $stmt->bindParam(':estatus', $valorEstatus, PDO::PARAM_INT);

    $stmt->execute();       

    header("Location: listaProfessores.php");
}


if(isset($_GET['excluirProfessor'])){

    $idProfessor = $_GET['id'];

    $sql = "DELETE FROM Professor WHERE idProfessor={$idProfessor} LIMIT 1";
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare($sql);
    $stmt->execute();

    echo $_SERVER['REQUEST_URI'];

    header("Location: listaProfessores.php");
}

