import fs from 'fs/promises';
const path = './data.json';

export async function addSiswaToTrainer(studentName, trainerName) {
    try {
        const data = await fs.readFile(path, 'utf8');
        const employees = JSON.parse(data);

        // Memeriksa apakah admin sudah login
        const admin = employees.find(emp => emp.role === 'admin' && emp.isLogin);
        if (!admin) {
            console.log('Admin harus login terlebih dahulu');
            return;
        }

        // Cari trainer
        const trainer = employees.find(emp => emp.name === trainerName && emp.role === 'trainer');
        if (!trainer) {
            console.log('Trainer tidak ditemukan');
            return;
        }

        if (!trainer.students) {
            trainer.students = [];
        }
        trainer.students.push({ name: studentName });

        await fs.writeFile(path, JSON.stringify(employees, null, 2));
        console.log('Berhasil add siswa');
    } catch (err) {
        console.log('Error:', err);
    }
}
