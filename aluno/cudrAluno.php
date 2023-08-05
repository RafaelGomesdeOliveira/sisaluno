<?php
include_once('../conexao.php');

if (isset($_POST['cadAluno'])) {
    $nomeAluno = $_POST['nomeAluno'];
    $turma = strtoupper($turma = $_POST['turmaAluno']);
    $idade = $_POST['idadeAluno'];
    $matriculaAluno = $_POST['matriculaAluno'];
    $cpfAluno = $_POST['cpfAluno'];
    $estatus = strtoupper($estatus = $_POST['estatus']);
    $dataNascimento = $_POST['dataNascimento'];
    $endereco = $_POST['endereco'];

    $data = date('Y/m/d'); // Data no formato 'Y/m/d'

    // Convertendo a data em um timestamp UNIX
    $timestamp = strtotime($data);
    
    // Formatando o timestamp no formato 'Ymd'
    $data_inteiro = date('Ymd', $timestamp);
    
    // Convertendo o resultado para um inteiro
    $data_inteiro = (int)str_replace('/', '', $data_inteiro);
    
    echo $data_inteiro;

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

    if($valor == $idade){

    $sql = "INSERT INTO aluno (nome, id, idade, matricula, turma, cpf, estatus, endereco, datanascimento) VALUES('$nomeAluno', DEFAULT, '$idade', '$matriculaAluno', '$turma','$cpfAluno', '$estatus', '$endereco', '$dataNascimento')";

    $sqlBanco = $conn->prepare($sql);

    $sqlBanco->execute();
    header("Location: ../index.html");
    }
    else {
        header("Location: cadAluno.php?alerta=" . urlencode(1));
    }
    

}

if (isset($_POST['alterarAluno'])) {

    $nomeAluno = $_POST['nomeAluno'];
    $idade = $_POST['idadeAluno'];
    $turmaAluno = $_POST['turmaAluno'];
    $matriculaAluno = $_POST['matriculaAluno'];
    $idAluno = $_POST['id'];
    $cpfAluno = $_POST['cpfAluno'];
    $estatus = $_POST['estatus'];
    $dataNascimento = $_POST['dataNascimento'];
    $endereco = $_POST['endereco'];

    $valor = 0;
    $data = date('Y/m/d'); // Data no formato 'Y/m/d'

    // Convertendo a data em um timestamp UNIX
    $timestamp = strtotime($data);
    
    // Formatando o timestamp no formato 'Ymd'
    $data_inteiro = date('Ymd', $timestamp);
    
    // Convertendo o resultado para um inteiro
    $data_inteiro = (int)str_replace('/', '', $data_inteiro);
    
    echo $data_inteiro . "<br>";

    //DATA NASCIMENTO
    $data = $dataNascimento; // Data no formato 'Y/m/d'

    // Convertendo a data em um timestamp UNIX
    $timestamp = strtotime($data);
    
    // Formatando o timestamp no formato 'Ymd'
    $nascimento_inteiro = date('Ymd', $timestamp);
    
    // Convertendo o resultado para um inteiro
    $nascimento_inteiro = (int)str_replace('-', '', $nascimento_inteiro);
    
    echo $nascimento_inteiro;

    $valor =  substr($data_inteiro - $nascimento_inteiro, 0, 2);
    echo "<br><strong>$valor</strong>";

    if($valor == $idade){

    $sql = "UPDATE aluno SET nome = :nomeAluno, id = :idAluno, idade = :idadeAluno, matricula = :matriculaAluno, turma = :turmaAluno, cpf = :cpfAluno, estatus = :estatusAluno, endereco = :endereco, datanascimento = :dataNascimento WHERE id = :idAluno";

    // $sql = "UPDATE Aluno SET nomeAluo = :nome";

    $stmt = $conn->prepare($sql);

    ##diz o paramentro e o tipo  do paramentros
    $stmt->bindParam(':idAluno', $idAluno, PDO::PARAM_INT);
    $stmt->bindParam(':nomeAluno', $nomeAluno, PDO::PARAM_STR);
    $stmt->bindParam(':idadeAluno', $idade, PDO::PARAM_INT);
    $stmt->bindParam(':matriculaAluno', $matriculaAluno, PDO::PARAM_STR);
    $stmt->bindParam(':turmaAluno', $turmaAluno, PDO::PARAM_STR);
    $stmt->bindParam(':cpfAluno', $cpfAluno, PDO::PARAM_STR);
    $stmt->bindParam(':estatusAluno', $estatus, PDO::PARAM_STR);
    $stmt->bindParam(':dataNascimento', $dataNascimento, PDO::PARAM_STR);
    $stmt->bindParam(':endereco', $endereco, PDO::PARAM_STR);
    $stmt->execute();
    header("Location: listaAluno.php");
    }
    else {
        // header("Location: listaAluno.php?alerta=" . urlencode(1));
    }

}

if (isset($_GET['excluirAluno'])) {

    $idAluno = $_GET['id'];

    $sql = "DELETE FROM aluno WHERE id={$idAluno} LIMIT 1";
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare($sql);
    $stmt->execute();

    header("Location: listaAluno.php");

}