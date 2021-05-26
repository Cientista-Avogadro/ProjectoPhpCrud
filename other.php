<?php include_once 'process.php';?>
                    <?php if(isset($_SESSION['message'])):?>
                        <div class="alert alert-<?=$_SESSION['msg_type']?> " id="alerta">
                        <?php echo $_SESSION['message']; unset($_SESSION['message']); ?>
                        </div> 
                    <?php endif?>

<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link" id="pn" href="#">Cadastrar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="pn" href="#">Listar</a>
      </li>
    </ul>
  </div>
  <div class="card-body">
    <?php include_once 'index.php' ;?>
  </div>
</div>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="./js/script.js"></script>