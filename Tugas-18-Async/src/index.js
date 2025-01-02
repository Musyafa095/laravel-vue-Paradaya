import { registerKaryawan } from './register.js';
import { loginKaryawan } from './login.js';
import { addSiswaToTrainer } from './addSiswa.js';

// Ambil dlu perintah dan parameter dari command line
const command = process.argv[2];
const args = process.argv.slice(3).join(',');

// Jalankan fungsi berdasarkan perintah
switch (command) {
    case 'register':
        const [name, password, role] = args.split(',');
        registerKaryawan(name, password, role);
        break;
    case 'login':
        const [loginName, loginPassword] = args.split(',');
        loginKaryawan(loginName, loginPassword);
        break;
    case 'addSiswa':
        const [studentName, trainerName] = args.split(',');
        addSiswaToTrainer(studentName, trainerName);
        break;
    default:
        console.log('Perintah tidak dikenali, ayok coba lagi Hhaa!');
}

