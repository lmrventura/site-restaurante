<?php
    require_once 'modelo/cliente.php';
    $objCliente = new Cliente();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>HBV</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/nav.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
  
<div class="header">
<nav>
    <div class="before"></div>
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
        &#9776;
    </label>
    <ul id="menu">
        <li>
            <a href="index.html">Home</a>
        </li>
        <li>
            <a href="funcionario.php" target="_blank">Funcionario</a>
        </li>
        <li>
            <a href="cliente.php" target="_blank">Cliente</a>
        </li>
        
        <li>
            <a href="produto.php" target="_blank">Produto</a>
        </li>
        <li>
            <a href="venda.php">Venda</a>
        </li>
    </ul>
</nav>
</div>
<div class="container">
    <br>
    <br>
    <br>
  <div class="row">
      <h3>Cliente</h3>
      <table class="table table-striped">            
            <thead>  
                <tr>
                    <th colspan="5">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalCadastrar">Novo</button>
                    </th>
                </tr>              
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Editar</th>
                    <th>Deletar</th>
                </tr>                
            </thead>
            <tbody>
                <?php
                    $query = "select * from cliente";
                    $stmt = $objCliente->runQuery($query);
                    $stmt->execute();
                    while($objCliente = $stmt->fetch(PDO::FETCH_ASSOC)){
                ?>
                        <tr>
                            <td><?php echo($objCliente['id']) ?></td>
                            <td><?php  echo($objCliente['nome']) ?></td>
                            <td><?php echo($objCliente['telefone']) ?></td>
                            <td>
                              <button type="button" class="btn btn-info"
                                  data-toggle="modal" data-target="#myModalEditar"
                                  data-id="<?php echo($objCliente['id']) ?>"
                                  data-nome="<?php echo($objCliente['nome']) ?>"
                                  data-telefone="<?php echo($objCliente['telefone']) ?>">
                                  Editar
                              </button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger"
                                    data-toggle="modal" data-target="#myModalDeletar"
                                    data-id="<?php echo($objCliente['id']) ?>"
                                    data-nome="<?php echo( $objCliente['nome']) ?>">
                                        Deletar
                                </button>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
            </tbody>
      </table>
  </div>
</div>

<!-- The Modal Cadastrar-->
<div class="modal" id="myModalCadastrar">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header" style="background-color: black; color:white">
        <h4 class="modal-title">Cadastrar Cliente</h4>
        <button type="button" class="close" data-dismiss="modal" style="color:white">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
            <form action="controle/ctr_cliente.php" method="POST">
                <input type="hidden" name="insert">
                <div class="form-group">
                    <label for="">Nome</label>
                    <input type="text" class="form-control" name="txtNome" required>
                </div>
                <div class="form-group">
                    <label for="">Telefone</label>
                    <input type="text" class="form-control" name="txtTelefone" required>
                </div>
                <button type="submit" class="btn btn-success">Enviar</button>
            </form>
      </div>
    </div>
  </div>
</div>


<!-- The Modal Deletar-->
<div class="modal" id="myModalDeletar">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header" style="background-color: black; color:white">
        <h4 class="modal-title">Deletar Cliente</h4>
        <button type="button" class="close" data-dismiss="modal" style="color:white">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
            <form action="controle/ctr_cliente.php" method="POST">
                <input type="hidden" name="delete" id="recipient-id">
                <div class="form-group">
                    <label for="">Nome</label>
                    <input type="text" class="form-control" name="txtNome" id="recipient-nome" readonly>
                </div>
               
                <button type="submit" class="btn btn-success">Enviar</button>
            </form>
      </div>
    </div>
  </div>
</div>


<!-- The Modal Editar-->
<div class="modal" id="myModalEditar">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header" style="background-color: black; color:white">
        <h4 class="modal-title">Editar Cliente</h4>
        <button type="button" class="close" data-dismiss="modal" style="color:white">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
          <form action="controle/ctr_cliente.php" method="POST">
              <input type="hidden" name="editar" id="recipient-id">
              <div class="form-group">
                  <label for="">Nome</label>
                  <input type="text" class="form-control" name="txtNome" id="recipient-nome">
              </div>
              <div class="form-group">
                  <label for="">Telefone</label>
                  <input type="text" class="form-control" name="txtTelefone" id="recipient-telefone">
              </div>
              <button type="submit" class="btn btn-success">Enviar</button>
          </form>
      </div>
    </div>
  </div>
</div>


</div>
</div>

<script>
    $('#myModalDeletar').on('show.bs.modal', function(event){
        var button = $(event.relatedTarget)
        var recipientId = button.data('id');
        var recipientNome = button.data('nome')

        var modal = $(this)
        modal.find('#recipient-id').val(recipientId);
        modal.find('#recipient-nome').val(recipientNome);
    })
</script>

<script>
    $('#myModalEditar').on('show.bs.modal', function(event){
        var button = $(event.relatedTarget)
        var recipientId = button.data('id')
        var recipientNome = button.data('nome')
        var recipientTelefone = button.data('telefone')

        var modal = $(this)
        modal.find('#recipient-id').val(recipientId)
        modal.find('#recipient-nome').val(recipientNome)
        modal.find('#recipient-telefone').val(recipientTelefone)
    })
</script>

</body>
</html>