<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Conditional</title>
</head>
<body>
  <?php
    echo "<h3>Soal No 1 Conditional if else</h3>";
$name = "ahmad";
$role = "werewolf";
  if ($name == "" && $role == ""){
  echo " Nama harus disisi!";
    } else if ($name == !"" && $role == "" ){
    echo "Halo.$name, Pilih peranmu untuk memulai game!";
    } if($name == !"" && $role == "penyihir"){
    echo "Selamat datang di Dunia Werewolf, $name"."<br>";
    echo "Halo $role $name, kamu dapat melihat siapa yang menjadi werewolf!"."<br>";
  } else if ($name == !"" && $role == "guard"){
    echo "Selamat datang di Dunia Werewolf, $name"."<br>";
    echo "Halo $role $name, kamu akan membantu melindungi temanmu dari serangan werewolf"."<br>";
  } else if ($name == !"" && $role == "werewolf"){
    echo "Selamat datang di Dunia Werewolf, $name"."<br>";
    echo "Halo $role $name, Kamu akan memakan mangsa setiap malam"."<br>";
  }else{
   echo "Kamu wajib memilih nama/role yang sesuai di game!"."<br>";
  }
  echo "<h3>Soal No 2 Switch Case </h3>";
  function tanggal_lahir($hari, $bulan, $tahun){
    $nama_bulan = "";
    switch ($bulan) {
      case 1:
          $nama_bulan = "Januari";
          break;
      case 2:
          $nama_bulan = "Februari";
          break;
      case 3:
          $nama_bulan = "Maret";
          break;
      case 4:
          $nama_bulan = "April";
          break;
      case 5:
          $nama_bulan = "Mei";
          break;
      case 6:
          $nama_bulan = "Juni";
          break;
      case 7:
          $nama_bulan = "Juli";
          break;
      case 8:
          $nama_bulan = "Agustus";
          break;
      case 9:
          $nama_bulan = "September";
          break;
      case 10:
          $nama_bulan = "Oktober";
          break;
      case 11:
          $nama_bulan = "November";
          break;
      case 12:
          $nama_bulan = "Desember";
          break;
      default:
          return "Bulan tidak valid";
  }
  return $hari . " " . $nama_bulan . " " . $tahun;
}
echo tanggal_lahir(25,1,1996); // 25 Januari 1996
echo tanggal_lahir(7,2,2000); // 7 Februari 2000
echo tanggal_lahir(3,3,2003); // 3 Maret 2003
echo tanggal_lahir(8,4,1956); // 8 April 1956
echo tanggal_lahir(15,5,1978); // 15 Mai 1978
echo tanggal_lahir(22,6,2013); // 22 Juni 2013
echo tanggal_lahir(28,7,2004); // 28 Juli 2004
echo tanggal_lahir(17,8,1945); // 17 Agustus 1945
echo tanggal_lahir(1,9,2022); // 1 September 2022
echo tanggal_lahir(12,10,2002); // 12 Oktober 2002
echo tanggal_lahir(18,11,2018); // 18 November 2018
echo tanggal_lahir(9,12,1994); // 9 Desember 1996

 
    ?>
  
</body>
</html>