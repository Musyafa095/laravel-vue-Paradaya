import fs from 'fs/promises';
const path = './data.json';

export async function registerKaryawan(name, password, role) {
    try {
        const data = await fs.readFile(path, 'utf8');
        const employees = JSON.parse(data);

    
        const newEmployee = {
            name,
            password,
            role,
            isLogin: false
        };

        employees.push(newEmployee);

        await fs.writeFile(path, JSON.stringify(employees, null, 2));
        console.log('Berhasil register');
    } catch (err) {
        console.log('Error:', err);
    }
}
