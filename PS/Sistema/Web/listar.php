<?php

session_start();

if (empty($_SESSION['usuario'])) {
    echo "<script>alert('Usuário não logado!')</script>";
    echo "<meta http-equiv= 'refresh' content='0; URL=../index.php'/>";
}

$pdo = new PDO("mysql:host=localhost;dbname=exemplo","root","");
$sql = $pdo->prepare("SELECT id, nome, email FROM `usuarios`");
$sql->execute(array());
$info = $sql->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    
    <nav class="navbar bg-success">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="..\Recursos/logo.png" alt="" width="50px"></a>
            <a class="btn btn-dark" href="logout.php">Sair</a>
        </div>
    </nav>

    <div class="container text-center">
        <h2>Lista de Pedidos</h2>

        <?php
         
            if (!empty($_SESSION['erro'])) {
                echo $_SESSION['erro'];
                unset($_SESSION['erro']);
            }
        ?>
        
        <table class="table">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col">Opções</th>
                </tr>
            </thead>
            <tbody>
          
            <?php
                
                $pdo = new PDO('mysql:host=localhost;dbname=exemplo','root','');

                $sql = $pdo->prepare("SELECT id, nome, email FROM `usuarios`");

               
                $sql->execute(array());
                $info = $sql->fetchAll(PDO::FETCH_ASSOC);


                foreach ($info as $key => $value) {

                    echo "<form action='editar.php' method='get'>";
                    echo "<tr>";
                        echo "<th scope='row'>".$info[$key]['id']."</th>";
                        echo "<td>".$info[$key]['nome']."</td>";
                        echo "<td>".$info[$key]['email']."</td>";
                        echo "<td>";
                            echo "<a class='btn btn-warning' href='editar.php?id=".$info[$key]['id']."'>Edit</a>";
                            echo "<a class='btn btn-danger' href='deletar.php?id=".$info[$key]['id']."'>Del</a>";    
                        echo "</td>";
                    echo "</tr>";
                    echo "</form>";

                }
            ?>
        
        </tbody>
        </table>
    </div>

    <footer class="footer text-center fixed-bottom bg-dark py-3">
        <div class="container">
            <p class="text-light">Todos os direitos reservados - PharmaLife Solutions. 2023</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>