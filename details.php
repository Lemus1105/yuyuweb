<?php

require 'config/config.php';
require 'config/database.php';
$db = new Database();
$con = $db->conectar();

$id = isset($_GET['id']) ? $_GET['id'] : '';
$token = isset($_GET['token']) ? $_GET['token'] : '';


$token_tmp = hash_hmac('sha1', $id, KEY_TOKEN);

$sql = $con->prepare("SELECT count(id) FROM productos WHERE id=? AND activo=1");
$sql->execute([$id]);

if($sql->fetchColumn() > 0) {
    $sql = $con->prepare("SELECT nombre, descripcion, precio   FROM productos WHERE id=? AND activo=1 
    LIMIT 1");
    $sql->execute([$id]);  
    $row = $sql->fetch(PDO::FETCH_ASSOC);
    $nombre = $row['nombre'];
    $descripcion = $row['descripcion'];
    $precio = $row['precio'];
    
   

}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YuYu</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/estilos.css" rel="stylesheet">
</head>

<body background="img/fondo.jpg"> 
    
    
    <!--Barra de navegación-->
    <header>
        <div class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a href="index.php" class="navbar-brand">
                    <strong>YuYu</strong>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarHeader">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link active">Catalogo</a>
                        </li>
                        <li class="nav-item">
                            <a href="contacto.html" class="nav-link">Contacto</a>
                        </li>
                    </ul>
                    <a href="carrito.php" class="btn btn-primary">
                        Carrito<span id="num_cart" class="badge bg-secondary"></span>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!--Contenido-->

    
    <main>
        <div class="container">
            <div class="row">
                <div class="center" >
             

                </div>
                <br>
                <p>Un amigurumi es un adorable muñeco tejido con la 
                técnica de crochet. Los amigurumis son ideales para bebes y niños, 
                pero también pueden ser para adultos. Pueden ser desde animales de peluche 
                a muñecos personalizados de personas.<br>
                <p>Todos los productos de Yuyu están fabricados a mano, 
                    en consecuencia, pueden presentar una falla menor. Dentro de nuestra empresa 
                    solemos manejar distintos tipos de estambre al fabricar, por lo que si compras un producto, 
                    parecido a alguna que ya habías adquirido anteriormente, 
                    la textura puede cambiar.<br>

                <div class="col-md-6 order-md-2">
                    <h2><?php echo $nombre; ?> </h2>
                    <h2><?php echo MONEDA . number_format($precio, 2,'.', ','); ?> </h2>
                    <p class="lead">
                        <?php echo $descripcion; ?>

                    </p>
                    
                    <div class="d-grid gap-3 col-10 mx-auto">
                        <div>
                        <a href="index.php" class="navbar-brand">
                        <button class="btn btn-primary" type="button">Comprar ahora</button>
                        </a>
                        <img src="img/fondo2.png">
                   </div>
                       
                    </div>
                   
                </div>
           
            </div>        
        </div>
    </main>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
    crossorigin="anonymous"></script>


    <script>
        function addProducto(id, token){
            let url = 'clases/carrito.php'
            let formData = new FormData()
            formData.append('id', id)
            formData.append('token', token)
            
            fetch(url, {
                method: 'POST'
                body: formData,
                mode: 'cors'
            }).then(response => response.json())
            .then(data=> {
                if(data.ok){
                    let elemento = document.getElementById("num_cart")
                    elemento.innerHTML = data.numero
                }
            })
        }
    </script>

   
</body>

</html>