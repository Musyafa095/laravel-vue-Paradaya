<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OOP</title>
</head>
<body>
<?php
// Tugas-6-OOP-PHP/index.php
require_once 'Animal.php';
require_once 'Frog.php';
require_once 'Ape.php';

// Release 0
$sheep = new Animal("shaun");
$sheep->display();
echo "<br>";

// Release 1
$kodok = new Frog("buduk");
$kodok->display();
echo "<br>";

$sungokong = new Ape("kera sakti");
$sungokong->display();
?>
  
</body>
</html>