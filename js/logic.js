function cargar() {
    var request = new XMLHttpRequest();
    request.open("GET", "operaciones/mostrar_archivo.php", true);
    request.onreadystatechange = function(){
        if (request.readyState == 4 && request.status == 200){
            document.getElementById("container").innerHTML = request.responseText;
        }
    }
    request.send();
}

function obtenerExtension(nombreArchivo) {
    return nombreArchivo.split('.').pop(); 
}

function Ver(hash) {
    var datos = {
        valor_hash: hash,
    };
    
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "operaciones/verArchivo.php", true);
    xhttp.setRequestHeader("Content-Type", "application/json");
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var respuesta = JSON.parse(this.responseText);
            console.log(respuesta);
            cargar();
        }
    };
    xhttp.send(JSON.stringify(datos));
}

document.getElementById('formSubirArchivo').addEventListener('submit', function(e) {
    e.preventDefault();
    let formData = new FormData(this);

    let nuevo_nombre = document.getElementById("nombreArchivo");
    if (nuevo_nombre.value.trim() !== '') {
        let extension = obtenerExtension(formData.get('archivo').name);
        let nuevoNombre = nuevo_nombre.value.trim() +"."+ extension; 
        formData.set('archivo', archivo.files[0], nuevoNombre); 
    }

    fetch('operaciones/subir_archivo.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        console.log(data)
        cargar();
    })
    .catch(error => {
        console.error('Error:', error);
    });
});

function eliminar_archivo(name_file, id, hash) {
    var resp = prompt("Esta seguro de eliminar el archivo "+name_file+" ?\n y/n");

    if(resp === "y"){
        let formData = new FormData();
        formData.append("archivo",name_file);
        formData.append("id_val", id);
        formData.append("hash_val", hash);
        console.log("name_file:", name_file);

        fetch('operaciones/borrar_archivo.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            console.log(data)
            cargar();
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
}