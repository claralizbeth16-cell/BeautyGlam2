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

    const usuario = {
        nombre,
        correo,
        password
    };

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

        alert("👋 Bienvenido(a) " + usuario.nombre);

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

    alert("👋 Has cerrado sesión.");

    window.location.href = "index.html";

}

// ==========================
// AGREGAR AL CARRITO
// ==========================
function agregarCarrito(nombre, precio) {

    let carrito = JSON.parse(localStorage.getItem("carrito")) || [];

    const existe = carrito.find(producto => producto.nombre === nombre);

    if (existe) {

        existe.cantidad++;

    } else {

        carrito.push({
            nombre: nombre,
            precio: precio,
            cantidad: 1
        });

    }

    localStorage.setItem("carrito", JSON.stringify(carrito));

    alert("✅ Producto agregado al carrito.");

}

// ==========================
// MOSTRAR CARRITO
// ==========================
function mostrarCarrito() {

    const lista = document.getElementById("listaCarrito");

    if (!lista) return;

    let carrito = JSON.parse(localStorage.getItem("carrito")) || [];

    lista.innerHTML = "";

    let total = 0;

    if (carrito.length === 0) {

        lista.innerHTML = "<p>🛒 Tu carrito está vacío.</p>";

        document.getElementById("total").textContent = "$0.00";

        return;

    }

    carrito.forEach((producto, indice) => {

        total += producto.precio * producto.cantidad;

        lista.innerHTML += `
        <div class="item">
            <strong>${producto.nombre}</strong><br>
            Precio: $${producto.precio}<br>
            Cantidad: ${producto.cantidad}<br><br>

            <button onclick="eliminarProducto(${indice})">
                Eliminar
            </button>

            <hr>
        </div>
        `;

    });

    document.getElementById("total").textContent = "$" + total.toFixed(2);

}

// ==========================
// ELIMINAR PRODUCTO
// ==========================
function eliminarProducto(indice) {

    let carrito = JSON.parse(localStorage.getItem("carrito")) || [];

    carrito.splice(indice,1);

    localStorage.setItem("carrito",JSON.stringify(carrito));

    mostrarCarrito();

}

// ==========================
// FINALIZAR COMPRA
// ==========================
function finalizarCompra() {

    let carrito = JSON.parse(localStorage.getItem("carrito")) || [];

    if(carrito.length===0){

        alert("⚠️ Tu carrito está vacío.");

        return;

    }

    window.location.href="compra.html";

}

// ==========================
// VACIAR CARRITO
// ==========================
function vaciarCarrito(){

    localStorage.removeItem("carrito");

    mostrarCarrito();

}

// ==========================
// COMPRA EXITOSA
// ==========================
function compraRealizada(){

    alert("🎉 Gracias por comprar en Beauty Glam.");

    localStorage.removeItem("carrito");

    window.location.href="index.html";

}