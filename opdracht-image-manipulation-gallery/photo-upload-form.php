<?php

    session_start();

    function __autoload( $className ) {

        include_once( 'classes/' . $className . '.php' );

    }

    $message = Message::getMessage();

?>

<!doctype html>
<html>
<head>

    <title>Opdracht image manipulation gallery</title>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">

</head>
<body>

    <?php if ( isset ( $message ) ): ?>

        <div class="modal <?= $message['type'] ?>">
            <?= $message['text'] ?>
        </div>

    <?php endif ?>  

    <ul>
        <li><a href="gallery.php"><i class="fa fa-arrow-left"></i> Terug naar gallery</a></li>
    </ul>

    <h1>Foto uploaden</h1>

    <hr>

    <form action="photo-upload.php" method="POST" enctype="multipart/form-data">

        <input type="file" name="image" id="image">

        <label for="title">Titel</label>
        <input type="text" name="title" placeholder="Titel">

        <label for="caption">Beschrijving</label>
        <input type="text" name="caption" placeholder="Beschrijving">

        <input type="submit" name="submit" value="Verzenden">

    </form>

</body>
</html>