<?php
    session_start();
    

    if ($_POST['email'] == $_POST['conf'] AND $_POST['senha'] == $_POST['confsenha']) {
        
      
        $pdo = new PDO('mysql:host=localhost;dbname=exemplo','root','');

        $sql = $pdo->prepare("INSERT INTO `usuarios` VALUES (null,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        
        
        $sql->execute(array($_POST['nome'],
                            $_POST['endereco'],
                            $_POST['numero'],
                            $_POST['cidade'],
                            $_POST['estado'],
                            $_POST['rg'],
                            $_POST['cpf'],
                            $_POST['sexo'],
                            $_POST['datanasc'],
                            $_POST['email'],
                            $_POST['senha'],
                            'vazio',
                            $_POST['remedio'],
                            $_POST['quantidaderemedio']                      
        ));

       
        $_SESSION['ok'] = "<div class='alert alert-success' role='alert'>Usuário cadastrado com sucesso!</div>";
        echo "<meta http-equiv= 'refresh' content='0; URL=verpedidos.php'/>";

    } else {
        $_SESSION['ok'] = "<div class='alert alert-danger' role='alert'>Dados não conferem!</div>";
        echo "<meta http-equiv= 'refresh' content='0; URL=cadastrar.php'/>";

        
    }
    

?>