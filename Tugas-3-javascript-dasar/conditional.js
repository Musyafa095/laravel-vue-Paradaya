var nama = "juned";
var peran = "werewolf";

if (nama == "" && peran == "") {
  console.loh("nama harus diisi!");
} else if (nama == "john" && peran == "") {
  console.log(`Halo ${nama}  Pilih peranmu untuk memulai game!`);
} else if (nama == "jane" && peran == "penyihir") {
  console.log(
    `Selamat datang di Dunia Werewolf, ${nama} \n Hallo penyihir ${nama}, kamu dapat melihat siapa siapa yang menjadi werewolf!`
  );
} else if (nama == "jenita" && peran == guard) {
  console.log(
    `Selamat datang di Dunia Werewolf, ${nama} \n Hallo guard ${nama}, kamu akan membantu melindungi temanmu dari serangan werewolf!`
  );
} else if (nama == "juned" && peran == "werewolf") {
  console.log(
    `Selamat datang di Dunia Werewolf, ${nama} \n Hallo werewolf ${nama}, Kamu akan memakan mangsa setiap malam!"`
  );
} else {
  console.log("anda harus memasukan nama sesuai list/daftar nama!");
}
