<?php
include_once('../conexao.php');

if (isset($_POST['cadProfessor'])) {
    $nome = $_POST['nomeProfessor'];
    $matricula = $_POST['matricula'];
    $idade = $_POST['idadeProfessor'];
    $areaAtuacao = $_POST['areaAtuacao'];
    $cpf = $_POST['cpfProfessor'];
    $estatus = $_POST['estatus'];
    $dataNascimento = $_POST['dataNascimento'];
    $endereco = $_POST['endereco'];


    $data = date('Y/m/d'); // Data no formato 'Y/m/d'

    // Convertendo a data em um timestamp UNIX
    $timestamp = strtotime($data);
    
    // Formatando o timestamp no formato 'Ymd'
    $data_inteiro = date('Ymd', $timestamp);
    
    // Convertendo o resultado para um inteiro
    $data_inteiro = (int)str_replace('/', '', $data_inteiro);
    
    // echo $data_inteiro;

    //DATA NASCIMENTO
    $data = $dataNascimento; // Data no formato 'Y/m/d'

    // Convertendo a data em um timestamp UNIX
    $timestamp = strtotime($data);
    
    // Formatando o timestamp no formato 'Ymd'
    $nascimento_inteiro = date('Ymd', $timestamp);
    
    // Convertendo o resultado para um inteiro
    $nascimento_inteiro = (int)str_replace('-', '', $nascimento_inteiro);
    
    // echo $nascimento_inteiro;

    $valor =  substr($data_inteiro - $nascimento_inteiro, 0, 2);
    // echo "<br>$valor";


    if($estatus == 'ativo') {
        $valorEstatus = 1;
    }
    else {
        $valorEstatus = 0;
    }
    

    $sql = "INSERT INTO professor (nome, id,  matricula, idade, areaAtuacao, cpf, estatus, datanascimento, endereco) VALUES('$nome', DEFAULT, '$matricula', '$idade', '$areaAtuacao','$cpf', '$valorEstatus', '$dataNascimento', '$endereco')";

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

    // header("Location: listaProfessores.php");
}


if(isset($_GET['excluirProfessor'])){

    $idProfessor = $_GET['id'];

    $sql = "DELETE FROM professor WHERE id={$idProfessor} LIMIT 1";
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare($sql);
    $stmt->execute();

    echo $_SERVER['REQUEST_URI'];

    header("Location: listaProfessores.php");
}

