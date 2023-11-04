<?php

$dom = new DOMDocument("1.0", "UTF-8");
$dom->formatOutput = 1;

//Create the root of the tree.
$root = $dom->createElement('Noticias');

/* ==================== New N° 1 ==================== */
$branch = $dom->createElement('Noticia');

$leaf = $dom->createElement('Titulo');
$leaf->appendChild($dom->createTextNode('Marvel Studios Releases First Trailer For ECHO - "No Bad Deed Goes Unpunished"'));
$branch->appendChild($leaf);

$leaf = $dom->createElement('TextoNoticia');
$leaf->appendChild($dom->createTextNode('The series centers on Maya Lopez (Alaqua Cox) as she struggles to reconnect with her Native American roots while balancing aspirations tied to a life of crime as successor to the brutal legacy of Wilson Fisk (Vincent D Onofrio) aka Kingpin. In the first episode, we are introduced to Maya Lopez and her struggles.'));
$branch->appendChild($leaf);

/* ==================== New N° 2 ==================== */
$branch2 = $dom->createElement('Noticia');

$leaf2 = $dom->createElement('Titulo');
$leaf2->appendChild($dom->createTextNode('Apple’s iPhone lineup is selling well, but the Mac is in a serious rough patch'));
$branch2->appendChild($leaf2);

$leaf2 = $dom->createElement('TextoNoticia');
$leaf2->appendChild($dom->createTextNode('Apple reported a record September earnings quarter on Thursday, with iPhone revenue up year over year — even with just a week or so of iPhone 15 sales factored into the numbers. But all of the company’s other hardware divisions were down, and as CNBC noted, overall sales were down for the fourth consecutive quarter. The company brought in $89.5 billion in revenue overall for the quarter.
CEO Tim Cook told CNBC that the iPhone 15 lineup is showing stronger early momentum than the 14 series. “If you look at iPhone 15 for that period of time and compare it to iPhone 14 for the same time in the year-ago quarter, iPhone 15 did better than iPhone 14,” he said, adding that the Pro and Pro Max devices were both currently supply-constrained.'));
$branch2->appendChild($leaf2);

/* ==================== New N° 3 ==================== */
$branch3 = $dom->createElement('Noticia');

$leaf3 = $dom->createElement('Titulo');
$leaf3->appendChild($dom->createTextNode('Call of Duty can now take up over 200GB of space, but it’s complicated'));
$branch3->appendChild($leaf3);

$leaf3 = $dom->createElement('TextoNoticia');
$leaf3->appendChild($dom->createTextNode('Ahead of the release of Call of Duty: Modern Warfare III on November 10th, Activision has preemptively provided more details about the enormous file size of the game to explain why it’s “larger than last year.”
As reported by IGN, players with early access to the game’s single-player campaign found that the total file size for Call of Duty at installation — which also includes the Modern Warfare II campaign, Warzone, and Call of Duty HQ — now comes in at 234.9GB on PlayStation 5. For PC gamers, the file size is a slightly more palatable 172GB with the Modern Warfare II campaign and Warzone installed.'));
$branch3->appendChild($leaf3);

if (isset($_POST['create-xml'])) {
    //Add branches to the root of the XML file.
    $root->appendChild($branch);
    $root->appendChild($branch2);
    $root->appendChild($branch3);

    //Add the root to the dom.
    $dom->appendChild($root);

    //Save the dom in a XML file.
    $dom->save('assets/xml/archivo.xml');
    header('location: examinador.php');
}
?>

<!doctype html>
<html lang="es">

<head>
    <title>Daily Bugle</title>
    <link rel="shortcut icon" href="assets/images/news-logo.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/create.css">
</head>

<body>
    <h1>Daily Bugle XML news</h1>
    <form method="POST" id="create-form" name="create-form">
        <h3>Si no has creado tu archivo XML, créalo ahora mismo</h3>
        <button type="submit" id="create-xml" name="create-xml">Crear archivo XML</button>
    </form>
</body>

</html>