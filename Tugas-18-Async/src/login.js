import fs from 'fs/promises';
const path = './data.json';

export async function loginKaryawan(name, password) {
    try {
        const data = await fs.readFile(path, 'utf8');
        const employees = JSON.parse(data);

        const employee = employees.find(emp => emp.name === name && emp.password === password);

        if (employee) {
            employee.isLogin = true;

            await fs.writeFile(path, JSON.stringify(employees, null, 2));
            console.log('Berhasil Login');
        } else {
            console.log('Nama atau password salah, ayok semangat coba lagi!');
        }
    } catch (err) {
        console.log('Error:', err);
    }
}
