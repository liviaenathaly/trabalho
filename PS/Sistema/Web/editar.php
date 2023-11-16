<?php


    session_start();

    if (empty($_SESSION['usuario'])) {
        echo "<script>alert('Usuário não logado!')</script>";
        echo "<meta http-equiv= 'refresh' content='0; URL=../index.php'/>";
    }
    
    $pdo = new PDO("mysql:host=localhost;dbname=exemplo","root","");
    $sql = $pdo->prepare("SELECT * FROM `usuarios` WHERE id=?");
    $sql->execute(array($_GET['id']));
    $info = $sql->fetchAll(PDO::FETCH_ASSOC);


    if ($info[0]['email'] != $_SESSION['usuario']) {

        $_SESSION['erro'] = "<div class='alert alert-danger' role='alert'>Usuário inválido para operação!</div>";
        echo "<meta http-equiv= 'refresh' content='0; URL=listar.php'/>";
        exit();

    } 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar bg-success">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="../Recursos/logo.png" alt="" width="50px"></a>
        </div>
    </nav>

    <div class="container text-center mt-2">
        <h2>Atualizar Pedido</h2>
        <p>
            Altere as informações abaixo e clique no botão
            atualizar para modificar o seu pedido.
        </p>
        <?php
           
        ?>
        <form action="updatecad.php" method="post">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <input class="form-control" type="text" name="id" id="" placeholder="ID" 
                        value="<?php
                                if (isset($info)) {
                                    echo $info[0]['id'];
                                }
                            ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <input class="form-control" type="text" name="nome" id="" placeholder="Primeiro nome" 
                    value="<?php
                            if (isset($info)) {
                                echo $info[0]['nome'];
                            }
                        ?>" required>
                </div>
                
            </div>

            <div class="row mt-3">
                <div class="col-md-10">
                    <input class="form-control" type="text" name="end" id="" placeholder="Endereço" 
                    value="<?php
                            if (isset($info)) {
                                echo $info[0]['endereco'];
                            }
                        ?>"
                    required>
                </div>
                <div class="col-md-2">
                    <input class="form-control" type="number" name="num" id="" placeholder="Número" 
                    value="<?php
                            if (isset($info)) {
                                echo $info[0]['numero'];
                            }
                        ?>"
                    required>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6">
                    <input class="form-control" type="text" name="cidade" id="" placeholder="Cidade" 
                    value="<?php
                            if (isset($info)) {
                                echo $info[0]['cidade'];
                            }
                        ?>"
                    required>
                </div>

                <div class="col-md-6">
                    <input class="form-control" type="text" name="estado" id="" placeholder="Estado" 
                    value="<?php
                            if (isset($info)) {
                                echo $info[0]['estado'];
                            }
                        ?>"
                    required>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-3">
                    <select class="form-control" name="sexo" id="" required>
                        <option <?php if ($info[0]['sexo'] == "Selecione") echo "selected"; ?>>Selecione</option>
                        <option <?php if ($info[0]['sexo'] == "fem") echo "selected"; ?>>Feminino</option>
                        <option <?php if ($info[0]['sexo'] == "masc") echo "selected"; ?>>Masculino</option>
                        <option <?php if ($info[0]['sexo'] == "indeterminado") echo "selected"; ?>>Prefiro não dizer</option>
                        
                    </select>
                </div>
            
                <div class="col-md-3">
                    <input class="form-control" type="number" name="rg" id="" placeholder="RG" 
                    value="<?php
                            if (isset($info)) {
                                echo $info[0]['rg'];
                            }
                        ?>"
                    required>
                </div>
                
                <div class="col-md-3">
                    <input class="form-control" type="number" name="cpf" id="" placeholder="CPF" 
                    value="<?php
                            if (isset($info)) {
                                echo $info[0]['cpf'];
                            }
                        ?>"
                    required>
                </div>
                
                <div class="col-md-3">
                    <input class="form-control" type="date" name="datanasc" id="" placeholder="Data de nascimento" 
                    value="<?php
                            if (isset($info)) {
                                echo $info[0]['data'];
                            }
                        ?>"
                    required>
                </div>
                <div class="row mt-3">
                <div class="col-md-3">
                    <select class="form-control" name="remedio" id="" required>
                        <option <?php if ($info[0]['remedio'] == "Selecione") echo "selected"; ?>> Altere seu pedido</option>
                        <option <?php if ($info[0]['remedio'] == "dorflex") echo "selected"; ?>>Dorflex</option>
                        <option <?php if ($info[0]['remedio'] == "neosaldina") echo "selected"; ?>>Neosaldina</option>
                        <option <?php if ($info[0]['remedio'] == "puran") echo "selected"; ?>>Puran</option>
                        <option <?php if ($info[0]['remedio'] == "losartana") echo "selected"; ?>>Losartana</option>
                        <option <?php if ($info[0]['remedio'] == "dipirona") echo "selected"; ?>>Dipirona</option>
                        <option <?php if ($info[0]['remedio'] == "rivotril") echo "selected"; ?>>Rivotril</option>
                        <option <?php if ($info[0]['remedio'] == "zolpidem") echo "selected"; ?>>Zolpidem</option>
                        <option <?php if ($info[0]['remedio'] == "paracetamol") echo "selected"; ?>>Paracetamol</option>
                        <option <?php if ($info[0]['remedio'] == "doril") echo "selected"; ?>>Doril</option>
                        <option <?php if ($info[0]['remedio'] == "amoxicilina") echo "selected"; ?>>Amoxicilina</option>
                        
                        
                        
                    </select>
                </div>
                
                <div class="col-md-3">
                    <select class="form-control" name="quantidaderemedio" id="" required>
                        <option <?php if ($info[0]['quantidaderemedio'] == "Selecione") echo "selected"; ?>>Altere a quantidade</option>
                        <option <?php if ($info[0]['quantidaderemedio'] == "1") echo "selected"; ?>>1</option>
                        <option <?php if ($info[0]['quantidaderemedio'] == "2") echo "selected"; ?>>2</option>
                        <option <?php if ($info[0]['quantidaderemedio'] == "3") echo "selected"; ?>>3</option>
                        <option <?php if ($info[0]['quantidaderemedio'] == "4") echo "selected"; ?>>4</option>
                        <option <?php if ($info[0]['quantidaderemedio'] == "5") echo "selected"; ?>>5</option>
                        
                    </select>
                </div>

            </div>

            <div class="row mt-3">
                <div class="col-md-6">
                    <input class="form-control" type="email" name="email" id="" placeholder="Digite seu e-mail de usuário..." 
                    value="<?php
                            if (isset($info)) {
                                echo $info[0]['email'];
                            }
                        ?>"
                    required>
                </div>
                <div class="col-md-6">
                    <input class="form-control" type="email" name="emailconf" id="" placeholder="Confirme seu e-mail de usuário..." 
                    value="<?php
                            if (isset($info)) {
                                echo $info[0]['email'];
                            }
                        ?>"
                    required>
                </div>

            </div>

            <div class="row mt-3">
                <div class="col-md-6">
                    <input class="form-control" type="password" name="senha" id="" placeholder="Digite sua senha..." required>
                </div>
                <div class="col-md-6">
                    <input class="form-control" type="password" name="senhaconf" id="" placeholder="Confirme sua senha..." required>
                </div>

            </div>
<div>
            <input class="btn btn-success mt-5" name="atualizar" type="submit" value="Atualizar">
            <a class="btn btn-danger mt-5 text-light" href="listar.php">Cancelar</a>
                        </div>
            
        </form>

        <br><br><br><br>
    </div>

    <footer class="footer py-3 bg-dark fixed-bottom">
        <div class="container text-center">
           <p class="text-light">Todos os direitos reservados - PharmaLife Solutions. 2023</p> 
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>