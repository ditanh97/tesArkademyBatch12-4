//source: https://kangmicin.com/2019/05/25/pembahasan-soal-arkademy-batch-10-kloter-2/

/*username kombinasi dari huruf kecil 5-9 karakter, tidak boleh ada karakter, huruf besar dan angka*/
function is_username_valid(username) {
  // Huruf dari a sampai z
  var lowercaseRe = /[a-z]/g;
  var len = username.length;

  // check panjang string dan memastikan karater yang ditemukan sama dengan panjang string
	if(len >= 5 && len <= 9 && username.match(lowercaseRe).length == len) {
    	return true;
    }
    return false;
}

/*password kombinasi dari huruf kecil, besar, angka,
dan karakter spesial*/

function is_password_valid(password) {
  // huruf keci a sampai z
	var lowercaseRe = /[a-z]/g;

  // huruf besar A sampai Z
  var uppercaseRe = /[A-Z]/g;

  // angka dari 0 sampai 9
  var numberRe = /[0-9]/g;

  // karater unik _@#$ atau %
  var specialRe = /[_@#$%]/g;

  if(password.length == 10
     && lowercaseRe.test(password)
     && uppercaseRe.test(password)
     && numberRe.test(password)
     && specialRe.test(password)) {
     return true;
  }

  return false;
}

var name = is_username_valid("ditut");
var pass = is_password_valid("diGiT4g$ti");
console.log(name);
console.log(pass);
