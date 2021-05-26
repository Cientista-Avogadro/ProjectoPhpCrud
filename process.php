<?php 

    session_start();

    $mysqli = new mysqli('localhost','root','','crud') or die(mysqli_error($mysqli));
    
    $id=0;
    $update=false;
    $nome ='';
    $localization ='';

    if(isset($_POST['save'])){
        $nome = $_POST['nome'];
        $localization = $_POST['localization'];
        if((is_null($nome) and is_null($localization)) or ($nome=='' and $localization=='')){
            $_SESSION['message'] = 'Por favor Preencha os Campos';
            $_SESSION['msg_type'] = 'warning';
        }
        else{
            $mysqli->query("INSERT INTO data VALUES (default, '$nome','$localization')") or  die($mysqli->error);
            $_SESSION['message'] = 'Cadastrado com Sucesso';
            $_SESSION['msg_type'] = 'success';
        }
       
      

        header('location: index.php');
    }

    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $mysqli->query("DELETE FROM data WHERE id = $id") or die($mysqli->error());
    
        $_SESSION['message'] = 'Deletado com Sucesso';
        $_SESSION['msg_type'] = 'danger';
      
        header('location: index.php');
    }

    if(isset($_GET['edit'])){
        $id = $_GET['edit'];
        $update=true;
        $result = $mysqli->query("SELECT * FROM data WHERE id = $id") or die($mysqli->error());
        
            if(count(array($result))==1){
                $row = $result->fetch_array();
                $nome =$row['nome'];
                $localization =$row['localization'];
            }
    }

    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $nome =$_POST['nome'];
        $localization =$_POST['localization']; 

        $mysqli->query("UPDATE data SET nome = '$nome', localization ='$localization' WHERE id=$id ") or die($mysqli->error());
    
        $_SESSION['message'] = 'Dados foram actualizados com sucesso';
        $_SESSION['msg_type'] = 'warning';

        header('location: index.php');
    }

?> 