<?php

    function __autoload( $className ) {
        include 'classes/' . $className . '.php';
    }

    $new    =   150;
    $unit   =   100;

    $percent = new Percent( $new, $unit );

?>

 <!doctype html>
 <html>
     <head>
         <meta charset="utf-8">
         <title>Untitled</title>
     </head>
     <body>
         
         <table>
         	<tr>
         		<td>Absolute</td>
         		<td><?php echo $percent->absolute ?></td>        		
         	</tr>
         	<tr>
         		<td>Relative</td>
         		<td><?php echo $percent->relative ?></td>
         	</tr>
         	<tr>
         		<td>Hundred</td>
         		<td><?php echo $percent->hundred ?></td>
         	</tr>
         	<tr>
         		<td>Nominal</td>
         		<td><?php echo $percent->nominal ?></td>
         	</tr>
         </table>
     </body>
 </html>