<?php
include_once('../conexao.php');

$retorno = $conn->prepare('SELECT * FROM Aluno');
$retorno->execute();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <script src="../javascript/ind.js"></script>
  <script src="../javascript/ind.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../style/listaaaa.css">

</head>

<body>
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nome</th>
        <th scope="col">Turma</th>
        <th scope="col">Idade</th>
        <th scope="col">Matrícula</th>
        <th scope="col">CPF</th>
        <th scope="col">Status</th>
        <th scope="col">Alterar</th>
        <th scope="col">Excluir</th>
      </tr>
    </thead>
    <?php foreach ($retorno->fetchall() as $value) { ?>
      <tbody>
        <tr>
          <th scope="row">
            <?= $value['idAluno'] ?>
          </th>
          <td>
            <?= $value['nomeAluno'] ?>
          </td>
          <td>
            <?= strtoupper($value['turma']) ?>
          </td>
          <td>
            <?= $value['idadeAluno'] ?>
          </td>
          <td>
            <?= $value['matriculaAluno'] ?>
          </td>
          <td>
            <?= $value['cpf'] ?>
          </td>
          <td>
            <?php if ($value['estatus'] == 'AP' || $value['estatus'] == 'ap') {
              echo "Aprovado";
            } else if ($value['estatus'] == 'RP' || $value['estatus'] == 'rp') {
              echo "Reprovado";
            }
            ?>
          </td>
          <td>
            <form action="alterarAluno.php" method="post">
              <input type="hidden" name="id" value="<?= $value['idAluno'] ?>">
              <button class="centro alterar" type="submit" name="alterarAluno">Alterar<ion-icon
                  name="construct"></ion-icon>
              </button>
            </form>
          </td>
          <td>
            <form action="cudrAluno.php" method="get">
              <input type="hidden" name="id" value="<?= $value['idAluno'] ?>">
              <button class="centro" type="submit" name="excluirAluno">Excluir<ion-icon name="trash"></ion-icon></button>
            </form>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>

  <div class="centro">
    <a href="../index.html">Voltar<ion-icon name="home"></ion-icon></a>
  </div>


</body>

</html>