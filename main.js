function register() {
    let email = document.getElementById("reg-email").value;
    let password = document.getElementById("reg-password").value;
    
    if (email && password) {
        localStorage.setItem("userEmail", email);
        localStorage.setItem("userPassword", password);
        alert("Registrasi Berhasil! Silakan login.");
        window.location.href = "login.html";
    } else {
        alert("Mohon isi semua field!");
    }
}

function login() {
    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;
    let savedEmail = localStorage.getItem("userEmail");
    let savedPassword = localStorage.getItem("userPassword");
    
    if (email === savedEmail && password === savedPassword) {
        alert("Login Berhasil!");
        window.location.href = "home.html";
    } else {
        document.getElementById("error-message").innerText = "Email atau Password salah!";
    }
}