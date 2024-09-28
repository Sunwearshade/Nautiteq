function login() {
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;

    // Pre-carga de usuarios
    const users = [
        { username: 'admin', password: 'admin123', role: 'admin' },
        { username: 'dueno1', password: 'dueno123', role: 'dueno' },
        { username: 'supervisor1', password: 'supervisor123', role: 'supervisor' },
        { username: 'gerente_op', password: 'gerente123', role: 'gerente_operaciones' },
        { username: 'gerente_fin', password: 'gerente123', role: 'gerente_financiero' }
    ];

    const user = users.find(u => u.username === username && u.password === password);
    if (user) {
        window.location.href = `/${user.role}/dashboard.html`;
    } else {
        alert('Usuario o contraseña incorrectos');
    }
}