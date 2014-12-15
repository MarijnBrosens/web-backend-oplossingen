<!DOCTYPE html>
<html>
	<head>
		<title><?= $title ?></title>
		<link rel="stylesheet" type="text/css" href="../style.css">
	</head>
<body>

    <?php if ( $messages ): ?>

        <?php foreach ($messages as $message): ?>

            <div class="<?= $message[ 'type' ] ?>">
                <?= $message[ 'text' ] ?>
            </div>

        <?php endforeach ?>
        
    <?php endif ?>