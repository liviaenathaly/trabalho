<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    
    <nav class="navbar bg-success">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="Recursos/pilulas.png" alt="" width="80px"></a>
            <div class="ms-auto">
                <a class="btn btn-lg btn-warning" href="Web/cadastrar.php">Fazer Pedido</a>
                <a class="btn btn-lg btn-light" href="Web/verpedidos.php">Ver meus pedidos</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-6 mt-5">
                <div class="imagens">
                    <div class="flex-column d-flex  align-items-center">
                        <div class="textos">
                            <h1 class="mb-3">Sobre Remédios</h1>
                        </div>
                        <a href="Web/remedios.php"> <img src="Recursos/remedios.jpg" class="" alt="" width="800px"> </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mt-5">
                <div class="imagens">
                    <div class="flex-column d-flex align-items-center">
                        <div class="textos">
                            <h1 class="mb-3" >Conheça nosso projeto</h1>
                        </div>
                        <a href="Web/cientistas.php"> <img src="Recursos/cientistas.jpg" class="" alt="" width="800px"> </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
