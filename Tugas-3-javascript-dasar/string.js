//-------------------------------------STRING JS----------------------------------------------------------------------------------
//__________________________________Jawaban Soal1__________________________________________________________________________________
var word = "JavaScript";
var second = "is";
var third = "awesome";
var fourth = "and";
var fifth = "I";
var sixth = "love";
var seventh = "it!";
var hasil =
  word +
  " " +
  second +
  " " +
  third +
  " " +
  fourth +
  " " +
  fifth +
  " " +
  sixth +
  " " +
  seventh;
console.log(hasil); //Output "JavaScript is awesome and I love it!"

//_____________________________Jawaban Soal2_____________________________________________________________________
var sentence = "I am going to be Web Developer";
var exampleFirstWord = sentence[0];
var secondWord = sentence[2] + sentence[3];
var thirdWord =
  sentence[5] + sentence[6] + sentence[7] + sentence[8] + sentence[9];
var fourthWord = sentence[11] + sentence[12];
var fifthWord = sentence[14] + sentence[15];
var sixthWord = sentence[17] + sentence[18] + sentence[19];
var seventhWord =
  sentence[21] +
  sentence[22] +
  sentence[23] +
  sentence[24] +
  sentence[25] +
  sentence[26] +
  sentence[27] +
  sentence[28] +
  sentence[29];

console.log("First Word: " + exampleFirstWord); //Output "I"
console.log("Second Word: " + secondWord); //Output "am"
console.log("Third Word: " + thirdWord); //Output "going"
console.log("Fourth Word: " + fourthWord); //Output "to"
console.log("Fifth Word: " + fifthWord); //Output "be"
console.log("Sixth Word: " + sixthWord); //Output "Web"
console.log("Seventh Word: " + seventhWord); //Output "Developer"

//___________________________________Jawaban Soal 3________________________________________________________________
var sentence3 = "wow JavaScript is so cool";

var exampleFirstWord3 = sentence3.substring(0, 3);
var secondWord3 = sentence3.substring(4, 14);
var thirdWord3 = sentence3.substring(15, 17);
var fourthWord3 = sentence3.substring(18, 20);
var fifthWord3 = sentence3.substring(21, 25);

var firstWordLength = exampleFirstWord3.length;
var secondWordLength = secondWord3.length;
var thirdWordLength = thirdWord3.length;
var fourthWordLength = fourthWord3.length;
var fifthWordLength = fifthWord3.length;

console.log("First Word: " + exampleFirstWord3 + ", with length: " + firstWordLength); //output "First Word: wow, with length: 3"
console.log("Second Word: " + secondWord3 + ", with length: " + secondWordLength); //ouput "Second Word: JavaScript, with length: 10"
console.log("Third Word: " + thirdWord3 + ", with length: " + thirdWordLength); //output "Third Word: is, with length: 2"
console.log("Fourth Word: " + fourthWord3 + ", with length: " + fourthWordLength); //output "Fourth Word: so, with length: 2"
console.log("Fifth Word: " + fifthWord3 + ", with length: " + fifthWordLength);//output "Fifth Word: cool, with length: 4"

