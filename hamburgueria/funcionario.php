<?php
    require_once 'modelo/funcionario.php';
    $objFunc = new Funcionario();
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
      <h3>Funcionario</h3>
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
                    <th>Login</th>
                    <th>Email</th>
                    <th>Editar</th>
                    <th>Deletar</th>
                </tr>                
            </thead>
            <tbody>
                <?php
                    $query = "select * from funcionario";
                    $stmt = $objFunc->runQuery($query);
                    $stmt->execute();
                    while($objFunc = $stmt->fetch(PDO::FETCH_ASSOC)){
                ?>
                        <tr>
                            <td><?php echo($objFunc['id']) ?></td>
                            <td><?php  echo($objFunc['nome']) ?></td>
                            <td><?php  echo($objFunc['login']) ?></td>
                            <td><?php echo($objFunc['email']) ?></td>
                            <td>
                              <button type="button" class="btn btn-info"
                                  data-toggle="modal" data-target="#myModalEditar"
                                  data-id="<?php echo($objFunc['id']) ?>"
                                  data-nome="<?php echo($objFunc['nome']) ?>"
                                  data-email="<?php echo($objFunc['email']) ?>"
                                  data-login="<?php echo($objFunc['login']) ?>"
                                  data-senha="<?php echo($objFunc['senha']) ?>">
                                  Editar
                              </button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger"
                                    data-toggle="modal" data-target="#myModalDeletar"
                                    data-id="<?php echo($objFunc['id']) ?>"
                                    data-nome="<?php echo( $objFunc['nome']) ?>">
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
        <h4 class="modal-title">Cadastrar Funcionario</h4>
        <button type="button" class="close" data-dismiss="modal" style="color:white">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
            <form action="controle/ctr_funcionario.php" method="POST"> 
                <input type="hidden" name="insert">
                <div class="form-group">
                    <label for="">Nome</label>
                    <input type="text" class="form-control" name="txtNome" required>
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="txtEmail" required>
                </div>
                <div class="form-group">
                    <label for="">Login</label>
                    <input type="text" class="form-control" name="txtLogin" required>
                </div>
                <div class="form-group">
                    <label for="">Senha</label>
                    <input type="password" class="form-control" name="txtSenha" required>
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
        <h4 class="modal-title">Deletar Funcionario</h4>
        <button type="button" class="close" data-dismiss="modal" style="color:white">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
            <form action="controle/ctr_funcionario.php" method="POST">
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
        <h4 class="modal-title">Editar Funcionario</h4>
        <button type="button" class="close" data-dismiss="modal" style="color:white">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
            <form action="controle/ctr_funcionario.php" method="POST">
                <input type="hidden" name="editar" id="recipient-id">
                <div class="form-group">
                    <label for="">Nome</label>
                    <input type="text" class="form-control" name="txtNome" id="recipient-nome">
                </div>
                <div class="form-group">
                    <label for="">Login</label>
                    <input type="text" class="form-control" name="txtLogin" id="recipient-login">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="txtEmail" id="recipient-email"> 
                </div>
                <div class="form-group">
                    <label for="">Senha</label>
                    <input type="password" class="form-control" name="txtSenha" id="recipient-senha">
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
        var recipientEmail = button.data('email')
        var recipientLogin = button.data('login')
        var recipientSenha = button.data('senha')

        var modal = $(this)
        modal.find('#recipient-id').val(recipientId)
        modal.find('#recipient-nome').val(recipientNome)
        modal.find('#recipient-email').val(recipientEmail)
        modal.find('#recipient-login').val(recipientLogin)
        modal.find('#recipient-senha').val(recipientSenha)
    })
</script>

</body>
</html>