$("#formBuscar").on("submit", function (event) {
  event.preventDefault();

  var formData = {
    buscar: $("#buscar").val(),
  };

  fetch("accesoCliente/buscarID", {
    method: "POST",
    body: JSON.stringify(formData),
    headers: {
      "Content-Type": "application/json",
    },
  })
    .then((response) => response.json())
    .then((data) => {
      if (data) {
        console.log("paso");
        $(".tablaPaciente").removeAttr("style");
        $(".tablaResultado").removeAttr("style");
        tablaPaciente(data);
        tablaResultado(data);
      } else {
        alert("Error en la actualización: " + data.message);
      }
    })
    .catch((error) => {
      console.error("Error en la solicitud Fetch: ", error);
    });
});

function tablaPaciente(data) {
  const tbody = $("#tbodyPaciente");
  tbody.empty();

  $.each(data, function (i, row) {
    const tr = $("<tr>");
    tr.html(
      `
      <td> ${row.id} </td>
      <td> ${row.rut} </td>
      <td> ${row.nombre} </td>
      <td> ${row.apPat} </td>
      <td> ${row.apMat} </td>
      <td> ${row.telefono} </td>
      <td> ${row.direccion} </td>
      <td> ${row.mail} </td>
      <td> ${row.fechaNacimiento} </td>
      <td> ${row.genero} </td>
      `
    );
    tbody.append(tr);
  });
}
function tablaResultado(data) {
  const tbody = $("#tbodyResultado");
  tbody.empty();

  $.each(data, function (i, row) {
    const tr = $("<tr>");
    tr.html(
      `
      <td> ${row.descripcion} </td>
      <td> ${row.resultado} </td>
      <td> ${row.nombre_centro} </td>
      <td> ${row.codigo} </td>
      <td> ${row.Confirmacion} </td>
      <td> ${row.observacion} </td>
      `
    );
    tbody.append(tr);
  });
}
