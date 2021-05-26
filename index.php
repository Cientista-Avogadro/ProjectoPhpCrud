
   <!DOCTYPE html>
   <html lang="">
       <head>
           <meta charset="utf-8">
           <meta http-equiv="X-UA-Compatible" content="IE=edge">
           <meta name="viewport" content="width=device-width, initial-scale=1">
           <title>cadastro de Alunos</title>
           <!-- Bootstrap CSS -->
           <link rel="stylesheet" href="./css/style.css">
           <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
           <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" rel="stylesheet">
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script>
       </head>
       <body>
        <?php include_once 'process.php';?>

                    <?php if(isset($_SESSION['message'])):?>
                        <div class="alert alert-<?=$_SESSION['msg_type']?> " id="alerta">
                        <?php echo $_SESSION['message']; unset($_SESSION['message']); ?>
                        </div> 
                    <?php endif?>
                <div class="container">
                   

                    <?php 
                        $mysqli = new mysqli('localhost','root','','crud') or die(mysqli_error($mysqli));
                        $result= $mysqli->query("SELECT * FROM data") or die($mysqli->error);
                    ?>

                    <div  class="row justify-content-center">
                            <!-- table -->
                        <table class="table text-center">
                            <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Localização</th>
                                        <th colspan="2">Acção</th>
                                    </tr>
                            </thead>
                            <?php while($row = $result->fetch_assoc()):?>
                                <tr>
                                        <td><?php echo $row['nome'];?></td>
                                        <td><?php echo $row['localization'];?></td>
                                        <td>
                                            <a href="index.php?edit=<?php echo $row['id'];?>" class="btn btn-info">Editar</a>
                                            <a href="process.php?delete=<?php echo $row['id'];?>" class="btn btn-danger">Deletar</a>
                                        </td>
                                </tr>
                             <?php endwhile;?>
                        </table>
                    </div>

                    <?php function pre_r($array){ echo '<pre>';print_r($array); echo '</pre>';}?>

                    <div class="row justify-content-center text-center">
                        <form action="process.php" method="POST" class="">
                            <input type="hidden" name="id" value="<?php echo $id;?>">
                            <div class="form-group">
                                <label for="">Nome</label>
                                <input type="text" name="nome" id="" class="form-control" value="<?php echo $nome;?>"
                                 placeholder="Insira o seu Nome" required>
                            </div>
                            <div class="form-group">
                                <label for="">Localização</label>
                                <input type="text" name="localization" id="" class="form-control" value="<?php echo $localization; ?>"
                                 placeholder="Insira a sua Localização" required>
                            </div>
                            <div class="form-group">
                                <?php 
                                    if($update==true):
                                ?>
                                        <button type="submit" class="btn btn-info" name="update">Actualizar</button>
                                 <?php else: ?>
                                        <button type="submit" class="btn btn-primary" name="save">Cadastrar</button>
                                    <?php endif?>
                            </div>
                       </form>
                    </div>
                </div>
       </body>
</html>