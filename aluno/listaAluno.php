<?php
include_once('../conexao.php');

$retorno = $conn->prepare('SELECT * FROM aluno');
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

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

  <link rel="stylesheet" href="../style/lista.css">

</head>

<body>
  <?php
  if (isset($_GET['alerta'])) {
    ?>
    <script>
      alert("A sua data de nascimento ou sua idade não pode ser alterada, porque a data de nascimento não condiz com a sua idade");
    </script>
    <?php
  }
  ?>
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nome</th>
        <th scope="col">Endereço</th>
        <th scope="col">Turma</th>
        <th scope="col">Idade</th>
        <th scope="col">Matrícula</th>
        <th scope="col">CPF</th>
        <th scope="col">Status</th>
        <th scope="col">Data de nascimento</th>
        <th scope="col">Alterar</th>
        <th scope="col">Excluir</th>
      </tr>
    </thead>
    <?php foreach ($retorno->fetchall() as $value) { ?>
      <tbody>
        <tr>
          <th scope="row">
            <?= $value['id'] ?>
          </th>
          <td>
            <?= $value['nome'] ?>
          </td>
          <td>
            <?= $value['endereco'] ?>
          </td>
          <td>
            <?= strtoupper($value['turma']) ?>
          </td>
          <td>
            <?= $value['idade'] ?>
          </td>
          <td>
            <?= $value['matricula'] ?>
          </td>
          <td>
            <?= $value['cpf'] ?>
          </td>
          <td>
            <?php if (strtoupper($value['estatus']) == 'AP') {
              echo "Aprovado";
            } else if (strtoupper($value['estatus']) == 'RP') {
              echo "Reprovado";
            }
            ?>
          </td>
          <td>
            <?php
            $dataNas = $value['datanascimento'];
            $dataEmTempo = strtotime($dataNas);
            $dataAjustada = date("d/m/Y", $dataEmTempo);
            echo "$dataAjustada";
            ?>
          </td>
          <td>
            <form action="alterarAluno.php" method="post">
              <input type="hidden" name="id" value="<?= $value['id'] ?>">
              <button class="btn centro alterar" type="submit" name="alterarAluno">Alterar<ion-icon
                  name="construct"></ion-icon>
              </button>
            </form>
          </td>
          <td>
            <form action="cudrAluno.php" method="get">
              <input type="hidden" name="id" value="<?= $value['id'] ?>">
              <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                data-bs-target="#exampleModal<?php echo $value['id'] ?>">
                Excluir<ion-icon name="trash-sharp"></ion-icon>
              </button>

              <!-- Modal -->
              <div class="modal fade" id="exampleModal<?php echo $value['id'] ?>" tabindex="-1"
                aria-labelledby="exampleModalLabel<?php echo $value['id'] ?>" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Confirmação de Exclusão</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <p>Deseja realmente excluir o aluno
                        <strong>
                          <?php
                          echo $value['nome'];
                          ?>
                        </strong>
                        do
                        <strong>
                          <?php echo strtoupper($value['turma']); ?>
                        </strong>
                        de id igual a <strong>
                          <?php
                          echo $value['id'];
                          ?>
                        </strong>
                        ?
                      </p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                      <form action="cudrAluno.php" method="get">
                        <input type="hidden" name="id" value="<?= $value['id'] ?>">
                        <button class="btn btn-primary" type="submit" name="excluirAluno">Confirmar</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
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