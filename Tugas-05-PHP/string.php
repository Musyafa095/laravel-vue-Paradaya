<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>string</title>
</head>
<body>
<h1>Berlatih String PHP</h1>
<?php   
   echo "<h3> Soal No 1</h3>";
   $first_sentence = "Hello PHP!" ; // Panjang string 10, jumlah kata: 2
   $second_sentence = "I'm ready for the challenges"; // Panjang string: 28,  jumlah kata: 5
  echo "Panjang string ".strlen($first_sentence).", jumlah kata ".str_word_count($first_sentence)."<br>";
  echo "Panjang string ".strlen($second_sentence).", jumlah kata ".str_word_count($second_sentence)."<br>";
  echo "<h3> Soal No 2</h3>";
  $string2 = "I love PHP";
  echo "<label>String: </label> \"$string2\" <br>";
  echo "Kata pertama: " . substr($string2, 0, 1) . "<br>" ; 
  echo "Kata kedua: " . substr($string2, 2, 5) . "<br>" ;
  echo "Kata ketiga: " . substr($string2, 7) . "<br>" ;
  echo "<h3> Soal No 3</h3>";
  $string3 = "PHP is old but Good!"."<br>" ;
   echo "string: \"$string3\" PHP is old but awesome"."<br>" ;
   ?>
  
</body>
</html>