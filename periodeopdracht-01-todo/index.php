<?php 

	session_start();

	$todos		=	( isset( $_SESSION['item']['todo'] ) ) ? $_SESSION['item']['todo'] : '';
	$dones		= 	( isset( $_SESSION['item']['done'] ) ) ? $dones = $_SESSION['item']['done'] : '';
	$message = "";

	if(isset($_POST['voegToe'])) {
		//nieuw item toevoegen aan todo array
		
		if ($_POST['item'] == "") {
			$message = "Geef een waarde in snoeper!";
		}else{			
			$_SESSION['item']['todo'][] = $_POST['item'];
		    herlaadPagina();
		}

		//$todos = array_push($_SESSION['item']['todo'], array($_POST['item']));
	    //$todos = $_SESSION['item']['todo'];
	}

	if(isset($_GET['toDone'])) {
		//item toevoegen aan done array

		$oldTodos = $_SESSION['item']['todo'];

	    $_SESSION['item']['done'][] = $_GET['toDone'];	    	    
	    $_SESSION['item']['todo'] =  array_diff($oldTodos, array($_GET['toDone']));
	    herlaadPagina();

	    //array_push( $_SESSION['item']['done'], array( $_GET['done']));
	    //array van todo updaten
	    //$_SESSION['item']['todo'] = array_diff($_SESSION['item']['todo'], array($_GET['done']));     
	}

	if(isset($_GET['toTodo'])) {
		//item toevoegen aan todo array

		$oldDones = $_SESSION['item']['done'];
		
	    $_SESSION['item']['todo'][] =  $_GET['toTodo'];	     
	    $_SESSION['item']['done'] = array_diff($oldDones, array($_GET['toTodo']));  
	    herlaadPagina(); 

	    //array_push( $_SESSION['item']['done'], array( $_GET['done']));
	    //array van todo updaten
	    //$_SESSION['item']['todo'] = array_diff($_SESSION['item']['todo'], array($_GET['done']));
	}

	if (isset($_GET['verwijderDone'])) {

		$_SESSION['item']['done'] = array_diff($dones, array($_GET['verwijderDone']));
		herlaadPagina();

		//$dones = array_diff($dones, array($_GET['verwijderDone']));
    	//$_SESSION['item']['done'] = $dones;
	}

	if(isset($_GET['verwijderTodo'])) {
	    $_SESSION['item']['todo'] = array_diff($todos, array($_GET['verwijderTodo']));
	    herlaadPagina();

	    //$_SESSION['item']['done'] = array_diff($dones, array($_GET['verwijderDone']));
	    //$todos = array_diff($todos, array($_GET['verwijderTodo']));
    	//$_SESSION['item']['todo'] = $todos;
	}

	function herlaadPagina()
	{
		header('Location: index.php');
	}

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="periodeopdracht todo-app">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Periode opdracht todo</title>
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
    	<div class="container">

        <h1>Item toevoegen</h1>

		<form action="index.php" method="post">
		    <input type="text" name="item" placeholder="item" />
		    <input type="submit" name="voegToe" value="Voeg toe" />
		</form>

        <h1>Todo app</h1>
        <h2>Nog te doen</h2>

        <p class="error"><?php echo $message ?></p> 

		<?php if(empty($todos)) { ?>
		    <p>Je hebt nog geen TODO's toegevoegd. Zo weinig werk of meesterplanner?</p>
		<?php } else { ?>
		    <ul>
		    	<?php foreach ($todos as $todo): ?>
		            <li>
		                <a href="index.php?toDone=<?= $todo ?>" class="toDone"> <i class="fa fa-chevron-down"></i> <?= $todo ?></a>
		                <a href="index.php?verwijderTodo=<?= $todo ?>" class="verwijder"><i class="fa fa-times"></i></a>
		            </li>
		        <?php endforeach ?>
		    </ul>
		<?php } ?>

        <h2>Done and done!</h2>

		<?php if(empty($dones)) { ?>
		    <p>Werk aan de winkel...</p>
		<?php } else { ?>
		    <ul>
		    	<?php foreach ($dones as $done): ?>
		            <li>
		                <a href="index.php?toTodo=<?= $done ?>" class="toTodo"> <i class="fa fa-chevron-down"></i> <?= $done ?></a>
		                <a href="index.php?verwijderDone=<?= $done ?>" class="verwijder"><i class="fa fa-times"></i></a>
		            </li>
		        <?php endforeach ?>
		    </ul>
		<?php } ?>
		</div>

    </body>
</html>