// Funciones para mostrar y ocultar el modal
function openModal(examId) {
    //Cargar la información del examen correspondiente en el modal
    document.getElementById("myModal").style.display = "flex";
    document.getElementById("idExamen").value = examId;

}


function closeModal() {
    document.getElementById("myModal").style.display = "none";
}

// Función para procesar la actualización del examen
function updateExam() {
    // Aquí puedes agregar lógica para actualizar el examen en la base de datos
    // y cerrar el modal después de la actualización
    var codigo_diagnostico = document.getElementById("modEstado").value;
    var idExamen = document.getElementById("idExamen").value;
    
    // Configurar los datos que se enviarán en la solicitud

    var data = {
    id: idExamen,
    codigoDiagnostico: codigo_diagnostico
    };
    
    // Realizar la llamada Fetch
    fetch("diagnostico/actualizarEstadoDiagnostico", {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json'
        // Puedes agregar más encabezados según sea necesario
    },
    body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(data => {
        // Hacer algo con la respuesta del servidor
        if(data.success){
            //Recargar la pagina
            alert("Registro actualizado correctamente");
            window.location.reload();

        }else{
            alert("Ocurrio un error");
        }
        console.log(data);
    })
    .catch(error => {
        // Manejar errores en la llamada Fetch
        console.error('Error en la llamada Fetch:');
    });

    closeModal();
}
// Cerrar el modal si se hace clic fuera del contenido
window.onclick = function(event) {
    if (event.target == document.getElementById("myModal")) {
        closeModal();
    }
    if (event.target == document.getElementById("muestrasModal")) {
        closeMuestrasModal();
    }
};

// Funciones para mostrar y ocultar el modal de ver muestras

function openMuestrasModal(examId) {
    // Aquí puedes cargar la información de las muestras correspondientes en el modal de ver muestras
    document.getElementById("muestrasModal").style.display = "flex";
}

function closeMuestrasModal() {
    document.getElementById("muestrasModal").style.display = "none";
}