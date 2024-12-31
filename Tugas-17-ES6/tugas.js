//-----------------------------------Tugas ES6-----------------------
// Soal 1
const luasPersegiPanjang = (panjang, lebar) => panjang * lebar;
const kelilingPersegiPanjang = (panjang, lebar) => 2 * (panjang + lebar);
let panjang = 10;
let lebar = 5;
const luas = luasPersegiPanjang(panjang, lebar);
const keliling = kelilingPersegiPanjang(panjang, lebar);
console.log(`luas persegi panjangnya yaitu : ${luas}`);
console.log(`keliling persegi panjangnya yaitu : ${keliling}`);

// Soal 2
const newFunction = (firstName, lastName) => ({
  firstName, lastName, fullName: () => console.log(`${firstName} ${lastName}`)});
 newFunction('William', 'Imoh').fullName();

// Soal 3
const newObject = {
  firstName: 'Muhammad',
  lastName: 'Iqbal Mubarok',
  addres: 'Jalan Ranamanyar',
  hobby: 'playing football',
};
//destructuring
const {firstName, lastName, addres, hobby} = newObject;
console.log(firstName, lastName, addres, hobby);

// Soal 4
const west = ['Will', 'Chris', 'Sam', 'Holly']
const east = ['Gill', 'Brian', 'Noel', 'Maggie']
const combined = [...west, ...east];
console.log(combined);

// Soal 5
const planet = 'earth';
const view = 'glass';
before = `Lorem var ${view} dolor sit amet consectetur adipiscing elit ${planet}`;
console.log(before);
