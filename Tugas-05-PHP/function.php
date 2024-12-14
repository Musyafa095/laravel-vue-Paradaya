<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>function</title>
</head>
<body>
  <?php
    echo "<h3> Soal 1 </h3>";
    function Greetings($name){
      return "Hello $name. Selamat Datang di Sanbercode";
    }
    echo greetings("Bagas")."<br>"; // Halo Bagas, Selamat Datang di Sanbercode!
    echo greetings("Wahyu")."<br>"; // Halo Wahyu, Selamat Datang di Sanbercode!
    echo greetings("budi")."<br>"; // Halo budi, Selamat Datang di Sanbercode!
    echo greetings("ayu")."<br>"; // Halo ayu, Selamat Datang di Sanbercode!
      echo "<h3> Soal 2 </h3>";
      function kalikan ($num1, $num2){
        return $num1 * $num2;
      }
      echo kalikan(2,3)."<br>"; // 9
      echo kalikan(5,5)."<br>"; // 25
      echo kalikan(7, 8)."<br>"; // 56
      echo kalikan(11, 56)."<br>"; // 616
   

      ?>
  
</body>
</html>