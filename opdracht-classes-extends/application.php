<?php

    function __autoload($className) {
        include 'classes/' . $className . '.php';
    }

    $meerkat    = new Animal('Timon', 'almost female', 50);
    $boar    	= new Animal('Poomba', 'male', 70);
    $bird   	= new Animal('Zazu', 'male', 30);

    $meerkat->changeHealth(-20);
    $boar->changeHealth(+10);
    $bird->changeHealth(-40);

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>opdracht-classes-extends</title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>

        <h1>Opdracht classes extends</h1>

        <h2><?php echo $meerkat->getName(); ?></h2>
        <ul>
            <li><?php echo $meerkat->getGender(); ?></li>
            <li><?php echo $meerkat->getHealth(); ?></li>
            <li><?php echo $meerkat->doSpecialMove(); ?></li>
        </ul>

        <h2><?php echo $boar->getName(); ?></h2>
        <ul>
            <li><?php echo $boar->getGender(); ?></li>
            <li><?php echo $boar->getHealth(); ?></li>
            <li><?php echo $boar->doSpecialMove(); ?></li>
        </ul>

        <h2><?php echo $bird->getName(); ?></h2>
        <ul>
            <li><?php echo $bird->getGender(); ?></li>
            <li><?php echo $bird->getHealth(); ?></li>
            <li><?php echo $bird->doSpecialMove(); ?></li>
        </ul>

    </body>
</html>