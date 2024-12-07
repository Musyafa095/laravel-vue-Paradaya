<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Looping</title>
</head>
<body>
  <?php
echo "<h3>Soal No 1 Data Penduduk </h3>";
$data_Penduduk = [
  [
      "id" => "001",
      "Nama" => "Budi",
      "Kota Kelahiran" => "Jakarta"
  ],
  [
      "id" => "002",
      "Nama" => "Ince",
      "Kota Kelahiran" => "NTT"
  ],
  [
      "id" => "003",
      "Nama" => "Rahman",
      "Kota Kelahiran" => "Solo"
  ],
  [
      "id" => "004",
      "Nama" => "Asep",
      "Kota Kelahiran" => "Bandung"
  ],
  [
      "id" => "005",
      "Nama" => "Made",
      "Kota Kelahiran" => "Bali"
  ],
  [
      "id" => "006",
      "Nama" => "Ari",
      "Kota Kelahiran" => "Surabaya"
  ],
  [
      "id" => "007",
      "Nama" => "Indra",
      "Kota Kelahiran" => "Medan",
  ],
];
foreach ($data_Penduduk as $person){
  echo "id :". $person["id"]."<br>";
  echo "nama :". $person["Nama"]."<br>";
  echo "kota kelahiran :". $person["Kota Kelahiran"]."<br>";
  echo "<br>";

}



  ?>
</body>
</html>