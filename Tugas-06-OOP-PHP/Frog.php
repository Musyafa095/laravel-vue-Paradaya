<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
require_once 'Animal.php';

class Frog extends Animal {
    public function  jump(){
      echo "Hop hop hop <br>";
    }
    public function display() {
        parent::display();
        $this->jump();
    }
}
  ?>
  
</body>
</html>