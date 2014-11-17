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

    $lion1      = new Lion('Simba','male-kid',100,'good guy');
    $lion2      = new Lion('Scar','male',110,'bad guy');

    $lion1->changeHealth(+15);

    $zebra1     = new Zebra('Louisa','female',80,'north africa');
    $zebra2     = new Zebra('Marja','female',70,'south africa');

    $zebra1->changeHealth(-25);

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
        <div class="container">
            <h1>Opdracht classes extends</h1>
            <h2>Instanties van Animal class</h2>

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


            <h2>Instanties van Lion class</h2>

            <h2><?php echo $lion1->getName(); ?></h2>
            <ul>
                <li><?php echo $lion1->getGender(); ?></li>
                <li><?php echo $lion1->getHealth(); ?></li>
                <li><?php echo $lion1->doSpecialMove(); ?></li>
                <li><?php echo $lion1->getSpecies(); ?></li>
            </ul>

            <h2><?php echo $lion2->getName(); ?></h2>
            <ul>
                <li><?php echo $lion2->getGender(); ?></li>
                <li><?php echo $lion2->getHealth(); ?></li>
                <li><?php echo $lion2->doSpecialMove(); ?></li>
                <li><?php echo $lion2->getSpecies(); ?></li>
            </ul>

            <h2>Instanties van Zebra class</h2>

            <h2><?php echo $zebra1->getName(); ?></h2>
            <ul>
                <li><?php echo $zebra1->getGender(); ?></li>
                <li><?php echo $zebra1->getHealth(); ?></li>
                <li><?php echo $zebra1->doSpecialMove(); ?></li>
                <li><?php echo $zebra1->getSpecies(); ?></li>
            </ul>

            <h2><?php echo $zebra2->getName(); ?></h2>
            <ul>
                <li><?php echo $zebra2->getGender(); ?></li>
                <li><?php echo $zebra2->getHealth(); ?></li>
                <li><?php echo $zebra2->doSpecialMove(); ?></li>
                <li><?php echo $zebra2->getSpecies(); ?></li>
            </ul>

        </div>
    </body>
</html>