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
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <div class="container">
        <h1>Daily Bugle</h1>

        <!-- Formulario de búsqueda -->
        <form action="examinador.php" method="get">
            <label>Buscar por texto en la noticia:</label>
            <input type="text" name="search-new" />
            <input type="submit" value="Buscar" />
        </form>
        <?php
        if (!empty($foundNews)) { ?>
            <h2>Noticias Encontradas:</h2>
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
        <?php } ?>
    </div>
</body>

</html>