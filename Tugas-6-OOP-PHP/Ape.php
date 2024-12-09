<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
require_once 'animal.php';

class Ape extends Animal {
    public function __construct($name) {
        parent::__construct($name);
        $this->legs = 2;
    }
    public function yell() {
        echo "Yell: Auooo<br>";
    }
    public function display() {
        parent::display();
        $this->yell();
    }
}

  ?>
  
</body>
</html>