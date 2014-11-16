<?php

    function __autoload($className) {
        include 'classes/' . $className . '.php';
    }

    $meerkat    = new Animal('Timon', 'male', 50);
    $boar    	= new Animal('Poomba', 'male', 70);
    $bird   	= new Animal('Zazu', 'male', 30);

    $meerkat->changeHealth(-20);
    $boar->changeHealth(-10);
    $bird->changeHealth(-40);

?>