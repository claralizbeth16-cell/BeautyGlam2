// ==========================
// REGISTRAR USUARIO
// ==========================
function registrar() {
    const nombre = document.getElementById("nombre").value.trim();
    const correo = document.getElementById("correo").value.trim();
    const password = document.getElementById("password").value.trim();

    if (!nombre || !correo || !password) {
        alert("❌ Complete todos los campos.");
        return;
    }

    if (!correo.includes("@") || !correo.includes(".")) {
        alert("❌ Ingrese un correo válido.");
        return;
    }

    if (password.length < 6) {
        alert("❌ La contraseña debe tener al menos 6 caracteres.");
        return;
    }

    const usuario = { nombre, correo, password };
    localStorage.setItem("usuario", JSON.stringify(usuario));

    alert("✅ Cuenta creada correctamente.");
    window.location.href = "login.html";
}

// ==========================
// INICIAR SESIÓN
// ==========================
function login() {
    const correo = document.getElementById("correo").value.trim();
    const password = document.getElementById("password").value.trim();
    const usuario = JSON.parse(localStorage.getItem("usuario"));

    if (!usuario) {
        alert("⚠️ Primero debes crear una cuenta.");
        window.location.href = "crear-cuenta.html";
        return;
    }

    if (correo === usuario.correo && password === usuario.password) {
        localStorage.setItem("sesion", "activa");
        alert("👋 Bienvenida " + usuario.nombre);
        window.location.href = "productos.html";
    } else {
        alert("❌ Correo o contraseña incorrectos.");
    }
}

// ==========================
// VERIFICAR SESIÓN
// ==========================
function verificarSesion() {
    if (localStorage.getItem("sesion") !== "activa") {
        alert("⚠️ Debes iniciar sesión.");
        window.location.href = "login.html";
    }
}

// ==========================
// CERRAR SESIÓN
// ==========================
function cerrarSesion() {
    localStorage.removeItem("sesion");
    window.location.href = "index.html";
}

// ==========================
// AGREGAR PRODUCTOS
// ==========================
function agregarCarrito(nombre, precio) {
    let carrito = JSON.parse(localStorage.getItem("carrito")) || [];

    const index = carrito.findIndex(item => item.nombre === nombre);
    if (index >= 0) {
        carrito[index].cantidad += 1;
    } else {
        carrito.push({ nombre, precio, cantidad: 1 });
    }

    localStorage.setItem("carrito", JSON.stringify(carrito));
    alert(`✅ ${nombre} agregado al carrito.`);
}

// ==========================
// MOSTRAR CARRITO
// ==========================
function mostrarCarrito() {
    const carrito = JSON.parse(localStorage.getItem("carrito")) || [];
    const lista = document.getElementById("listaCarrito");
    let total = 0;

    lista.innerHTML = "";

    carrito.forEach((producto, indice) => {
        total += producto.precio * producto.cantidad;

        lista.innerHTML += `
        <div class="item">
            <span>${producto.nombre} - $${producto.precio} x ${producto.cantidad}</span>
            <button onclick="eliminarProducto(${indice})">❌ Eliminar</button>
        </div>`;
    });

    document.getElementById("total").textContent = "$" + total.toFixed(2);
}

// ==========================
// ELIMINAR PRODUCTO
// ==========================
function eliminarProducto(indice) {
    let carrito = JSON.parse(localStorage.getItem("carrito")) || [];
    carrito.splice(indice, 1);
    localStorage.setItem("carrito", JSON.stringify(carrito));
    mostrarCarrito();
}

// ==========================
// FINALIZAR COMPRA
// ==========================
function finalizarCompra() {
    
    const carrito = JSON.parse(localStorage.getItem("carrito")) || [];
    if (carrito.length === 0) {
        alert("⚠️ Tu carrito está vacío.");
        return;
    }
    window.location.href = "compra.php";
}
app.listen(app.get("port"), "0.0.0.0", () => {
    console.log("servidor corriendo en el puerto", app.get("port"));
});