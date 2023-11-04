<?php
/* ------------------------- Search new ------------------------- */
if (isset($_GET['search-new'])) {
    if (file_exists("assets/xml/archivo.xml")) {
        $xml = simplexml_load_file("assets/xml/archivo.xml"); {
            $searchText = $_GET['search-new'];
            $foundNews = array();

            foreach ($xml->Noticia as $noticia) {
                $textoNoticia = $noticia->TextoNoticia;

                if (strpos($textoNoticia, $searchText) !== false) {
                    $foundNews[] = [
                        'titulo' => $noticia->Titulo,
                        'textoNoticia' => $textoNoticia,
                    ];
                }
            }
        }
    } else {
        echo
        '<div class="custom-alert" id="customExist">
            <p>
                El archivo no existe. <a href="creadorxml.php">Crear archivo</a>
                <span class="close-button" onclick="existAlerta()" style="padding-left: 15px">&times;</span>
            </p>
        </div>';
    }
}
?>
<!-- ------------------------- html section ------------------------- -->
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Daily Bugle</title>
    <link rel="shortcut icon" href="assets/images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container">
        <h1>Daily Bugle</h1>

        <!-- Formulario de búsqueda -->
        <form action="examinador.php" method="get">
            <label style="font-size: 18px; font-family: JosefinSans-Bold;">Buscar por texto en la noticia:</label>
            <input type="text" name="search-new" />
            <input type="submit" value="Buscar" />
        </form>

        <h2>Noticias Encontradas:</h2>
        <!-- Mostrar la búsqueda de noticias -->
        <?php if (!empty($foundNews)) { ?>
            <?php foreach ($foundNews as $foundNew) { ?>
                <div class="noticia-box">
                    <h3>
                        <?php echo $foundNew['titulo'] ?>
                    </h3>
                    <p>
                        <?php echo $foundNew['textoNoticia'] ?>
                    </p>
                </div>
            <?php } ?>
        <?php } else if (empty($foundNews)) { ?>
            <div class="custom-alert" id="customAlert">
                <p>
                    No se encontró ninguna coincidencia.
                    <span class="close-button" onclick="cerrarAlerta()" style="padding-left: 15px">&times;</span>
                </p>
            </div>
        <?php } ?>
    </div>

    <!-- ---------- Scripts section ---------- -->
    <script src="assets/js/fun.js"></script>
    <script>
        <?php if (empty($foundNews)) { ?>
            var customAlert = document.getElementById('customAlert');
            customAlert.style.display = 'block';
        <?php } ?>

        <?php if (!file_exists("assets/xml/archivo.xml")) { ?>
            var customExist = document.getElementById('customExist');
            customExist.style.display = 'block';
        <?php } ?>
    </script>
</body>

</html>