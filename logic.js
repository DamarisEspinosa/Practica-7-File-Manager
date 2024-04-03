function mostrarTabla() {
    var forms = document.getElementById("containerForm");
    forms.style.display = "none";
    var tabla = document.getElementById("tablaArchivos");
    if (tabla.style.display === "none") {
        tabla.style.display = "block";
    } else {
        tabla.style.display = "none";
    }
}
function mostrarForm() {
    var tabla = document.getElementById("tablaArchivos");
    tabla.style.display = "none";
    var forms = document.getElementById("containerForm");
    if(forms.style.display === "none") {
        forms.style.display = "block";
    } else {
        forms.style.display = "none";
    }
}
function borrarArchivo(boton, nombreArchivo) {
    if (confirm("¿Está seguro que desea borrar " + nombreArchivo + "?")) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "operaciones/borrar_archivo.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                if (xhr.responseText === "success") {
                    boton.parentElement.parentElement.remove();
                    actualizarTablaArchivos(); // Llama a una función para actualizar la tabla
                    alert("El archivo " + nombreArchivo + " ha sido eliminado correctamente.");
                } else {
                    alert("Error al borrar el archivo: " + xhr.responseText);
                }
            }
        };
        xhr.send("nombre=" + encodeURIComponent(nombreArchivo));
    }
}
function subirArchivo() {
    var form = document.getElementById("formSubirArchivo");
    var formData = new FormData(form);
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "operaciones/subir_archivo.php", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            actualizarTablaArchivos(); 
            alert("El archivo se ha subido");
            mostrarForm();
            form.reset();
        }
    };
    xhr.send(formData);
}
function actualizarTablaArchivos() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "operaciones/actualizar_archivos.php", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById("tablaArchivos").innerHTML = xhr.responseText;
        }
    };
    xhr.send();
}