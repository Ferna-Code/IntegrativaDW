$(document).ready(function () {
  getPerfiles();
  getProcedencias();

  $("#formRegistro").on("submit", function (event) {
    event.preventDefault();
    var rut = $("#rut").val();
    validar = validaRut(rut);
    var RegexFormatoRut = /^\d{7,8}-[k|K|\d]{1}$/;

    if (!RegexFormatoRut.test(rut)) {
      alert("Ingresar rut con el formato: 11111111-1");
      return;
    }
    if (validar) {
      var formData = {
        rut: $("#rut").val(),
        nombre: $("#nombre").val(),
        apPat: $("#apPat").val(),
        apMat: $("#apMat").val(),
        procedencia: $("#procedencia").val(),
        mail: $("#mail").val(),
        nivel: $("#nivel").val(),
      };

      fetch("admin/registroAdmin", {
        method: "POST",
        body: JSON.stringify(formData),
        headers: {
          "Content-Type": "application/json",
        },
      })
        .then((response) => {
          if (!response.ok) {
            throw new Error("Error en la solicitud Fetch");
          }
          return response.json();
        })
        .then((data) => {
          if (data.success !== undefined && data.success) {
            alert("!Registro exitosa!");
            $("#rut").val("");
            $("#nombre").val("");
            $("#apPat").val("");
            $("#apMat").val("");
            $("#procedencia").val("");
            $("#mail").val("");
            $("#nivel").val("");
            getPerfiles();
          } else if (data.message === "El código ya existe en la tabla.") {
            alert("Error en la actualización: " + data.message);
          } else {
            alert("Error en la actualización: " + data.message);
          }
        })
        .catch((error) => {
          console.error("Error en la solicitud Fetch: ", error);
        });
    } else {
      alert("El Rut ingresado no es valido");
    }
  });

  $("#formActualizar").on("submit", function (event) {
    event.preventDefault();
    var rut = $("#rut_actualizar").find(":selected").data("test");
    var RegexFormatoRut = /^\d{7,8}-[k|K|\d]{1}$/;

    if (!RegexFormatoRut.test(rut)) {
      alert("Ingresar rut con el formato: 11111111-1");
      return;
    }

    var formData = {
      rut: rut,
      nombre: $("#nombre_actualizar").val(),
      apPat: $("#apPat_actualizar").val(),
      apMat: $("#apMat_actualizar").val(),
      procedencia: $("#procedencia_actualizar").val(),
      mail: $("#mail_actualizar").val(),
      nivel: $("#nivel_actualizar").val(),
    };
    console.log(formData);
    fetch("admin/actualizarAdmin/", {
      method: "POST",
      body: JSON.stringify(formData),
      headers: {
        "Content-Type": "application/json",
      },
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.success !== undefined && data.success) {
          alert("¡Actualización exitosa!");
          $("#rut_actualizar").val("");
          $("#nombre_actualizar").val("");
          $("#apPat_actualizar").val("");
          $("#apMat_actualizar").val("");
          $("#procedencia_actualizar").val("");
          $("#mail_actualizar").val("");
          $("#nivel_actualizar").val("");
        } else {
          alert("Error en la actualización: " + data.message);
        }
      })
      .catch((error) => {
        console.error("Error en la solicitud Fetch: ", error);
      });
  });

  $("#formEliminar").on("submit", function (event) {
    event.preventDefault();
    var rut = $("#rut_eliminar").val();
    var RegexFormatoRut = /^\d{7,8}-[k|K|\d]{1}$/;

    if (!RegexFormatoRut.test(rut)) {
      alert("Ingresar rut con el formato: 11111111-1");
      return;
    }

    var formData = {
      rut: $("#rut_eliminar").val(),
    };
    console.log(formData);
    fetch("admin/eliminarAdmin/", {
      method: "POST",
      body: JSON.stringify(formData),
      headers: {
        "Content-Type": "application/json",
      },
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.success !== undefined && data.success) {
          alert("¡Actualización exitosa!");
          $("#rut_eliminar").val("");
          getPerfiles();
        } else {
          alert("Error en la actualización: " + data.message);
        }
      })
      .catch((error) => {
        console.error("Error en la solicitud Fetch: ", error);
      });
  });

  $("#registroCentro").on("submit", function (event) {
    event.preventDefault();

    var formData = {
      codigo: $("#codigoCentro").val(),
      nombre: $("#nombreCentro").val(),
    };
    console.log(formData);
    fetch("admin/registroCentro/", {
      method: "POST",
      body: JSON.stringify(formData),
      headers: {
        "Content-Type": "application/json",
      },
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.success !== undefined && data.success) {
          alert("¡Actualización exitosa!");
          $("#codigoCentro").val("");
          $("#nombreCentro").val("");
          getProcedencias();
        } else {
          alert("Error en la actualización: " + data.message);
        }
      })
      .catch((error) => {
        console.error("Error en la solicitud Fetch: ", error);
      });
  });

  $("#formActualizarCentro").on("submit", function (event) {
    event.preventDefault();

    var formData = {
      codigo: $("#codigo_actualizar").val(),
      nombre: $("#nombre_actualizarCentro").val(),
    };
    console.log(formData);
    fetch("admin/actualizarCentro/", {
      method: "POST",
      body: JSON.stringify(formData),
      headers: {
        "Content-Type": "application/json",
      },
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.success !== undefined && data.success) {
          alert("¡Actualización exitosa!");
          $("#codigo_actualizar").val("");
          $("#nombre_actualizarCentro").val("");
          getProcedencias();
        } else {
          alert("Error en la actualización: " + data.message);
        }
      })
      .catch((error) => {
        console.error("Error en la solicitud Fetch: ", error);
      });
  });

  $("#formEliminarCentro").on("submit", function (event) {
    event.preventDefault();

    var formData = {
      codigo: $("#codigo_eliminar").val(),
    };
    console.log(formData);
    fetch("admin/eliminarCentro/", {
      method: "POST",
      body: JSON.stringify(formData),
      headers: {
        "Content-Type": "application/json",
      },
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.success !== undefined && data.success) {
          alert("¡Actualización exitosa!");
          $("#codigo_eliminar").val("");
          getProcedencias();
        } else {
          alert("Error en la actualización: " + data.message);
        }
      })
      .catch((error) => {
        console.error("Error en la solicitud Fetch: ", error);
      });
  });

  $("#formBusqueda").on("submit", function (event) {
    event.preventDefault();

    var formData = {
      fechaInicio: $("#fechaInicio").val(),
      fechaFin: $("#fechaFin").val(),
    };
    console.log(formData);
    fetch("/admin/buscarCentros/", {
      method: "POST",
      body: JSON.stringify(formData),
      headers: {
        "Content-Type": "application/json",
      },
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.success !== undefined && data.success) {
          getTabla(data);
        } else {
          alert("Error en la búsqueda: " + data.message);
        }
      })
      .catch((error) => {
        console.error("Error en la solicitud Fetch: ", error);
      });
  });

  var navLinks = $("nav-link");

  for (var i = 0; i < navLinks.length; i++) {
    navLinks[i].on("click", function (event) {
      $("#resultadoBusqueda").style.display = "none";
    });
  }

  // FRECUENCIA DE CENTRO DE TOMAS

  $("#formFrecuencia").on("submit", function (event) {
    event.preventDefault();

    var formData = {
      codigo: $("#codigo_busqueda").val(),
    };

    console.log(formData);
    fetch("/admin/buscarFrecuenciaCentros/", {
      method: "POST",
      body: JSON.stringify(formData),
      headers: {
        "Content-Type": "application/json",
      },
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.success !== undefined && data.success) {
          getTabla(data);
        } else {
          alert("Error en la búsqueda: " + data.message);
        }
      })
      .catch((error) => {
        console.error("Error en la solicitud Fetch: ", error);
      });
  });

  function getTabla(data) {
    $("#resultadoBusqueda").empty();

    var tableHTML =
      '<table border="1" id="miTabla">' +
      "<tr>" +
      "<th>id</th>" +
      "<th>Paciente_id</th>" +
      "<th>Diagnostico_codigo</th>" +
      "<th>Fecha</th>" +
      "<th>Centro_codigo</th>" +
      "<th>Resultado</th>" +
      "<th>Fecha_entrega</th>" +
      "</tr>";

    data.resultados.forEach(function (resultado) {
      tableHTML +=
        "<tr>" +
        "<td>" +
        resultado.id +
        "</td>" +
        "<td>" +
        resultado.paciente_id +
        "</td>" +
        "<td>" +
        resultado.diagnostico_codigo +
        "</td>" +
        "<td>" +
        resultado.fecha +
        "</td>" +
        "<td>" +
        resultado.centro_codigo +
        "</td>" +
        "<td>" +
        resultado.resultado +
        "</td>" +
        "<td>" +
        resultado.fecha_entrega +
        "</td>" +
        "</tr>";
    });

    tableHTML += '</table">';

    $("#resultadoBusqueda").append(tableHTML);

    var style = $(
      "<style>" +
        "table {" +
        "   width: 90%;" +
        "   border-collapse: collapse;" +
        "   margin: 20px auto;" +
        "}" +
        "table tr:nth-child(even) {" +
        "   background-color: #f2f2f2;" +
        "}" +
        "table tr:nth-child(odd) {" +
        "   background-color: #d9edf7;" +
        "}" +
        "table tr:hover {" +
        "   background-color: #5bc0de;" +
        "   color: #fff;" +
        "}" +
        "table td, table th {" +
        "   border: 1px solid #ddd;" +
        "   padding: 8px;" +
        "}" +
        "table th {" +
        "   background-color: #337ab7;" +
        "   color:  #fff;" +
        "}" +
        "</style>"
    );

    $("head").append(style);
    document.getElementById("resultadoBusqueda").style.display = "block";
  }

  //EXPORTAR ARCHIVO

  $("#exportarAExcel").on("click", function (event) {
    event.preventDefault();
    alert("¡Éxito! archivo creado.");
    exportarAExcel();
  });
  $("#exportarAExcel2").on("click", function (event) {
    event.preventDefault();
    alert("¡Éxito! archivo creado.");
    exportarAExcel2();
  });

  function exportarAExcel() {
    var tabla = document.getElementById("miTabla");
    var csv_contenido = "data:text/csv;charset=utf-8,\uFEFF";

    var headers = [];
    $(tabla)
      .find("th")
      .each(function () {
        headers.push('"' + $(this).text() + '"');
      });
    csv_contenido += headers.join(";") + "\n";

    $(tabla)
      .find("tbody tr")
      .each(function () {
        var row_data = [];
        $(this)
          .find("td")
          .each(function () {
            row_data.push('"' + $(this).text() + '"');
          });
        csv_contenido += row_data.join(";") + "\n";
      });

    var encodedUri = encodeURI(csv_contenido);
    var link = document.createElement("a");
    link.setAttribute("href", encodedUri);
    link.setAttribute("download", "registros.csv");

    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
  }

  function exportarAExcel2() {
    var tabla = document.getElementById("miTablaFrecuencia");
    var csv_contenido = "data:text/csv;charset=utf-8,\uFEFF";

    var headers = [];
    $(tabla)
      .find("th")
      .each(function () {
        headers.push('"' + $(this).text() + '"');
      });
    csv_contenido += headers.join(";") + "\n";

    $(tabla)
      .find("tbody tr")
      .each(function () {
        var row_data = [];
        $(this)
          .find("td")
          .each(function () {
            row_data.push('"' + $(this).text() + '"');
          });
        csv_contenido += row_data.join(";") + "\n";
      });

    var encodedUri = encodeURI(csv_contenido);
    var link = document.createElement("a");
    link.setAttribute("href", encodedUri);
    link.setAttribute("download", "registros.csv");

    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
  }

  function validaRut(rut) {
    var _rut = rut.toUpperCase();
    var _multiplicacion = 0;
    var _suma = 0;
    var _arrayVerificador = [3, 2, 7, 6, 5, 4, 3, 2, 11];
    var _estado = 0;

    if (_rut.length < 10) {
      alert("El largo del rut no debe ser menor a 10");
      return false;
    }

    if (_rut.length > 10) {
      alert("El largo del rut no debe ser mayor a 10");
      return false;
    }

    if (_rut[8] !== "-") {
      alert("Falta el guion antes del número verificador");
      return false;
    }

    let splitRut = _rut.split("-");

    if (!/^\d+$/.test(splitRut[0])) {
      alert("No debe ingresar letras antes del número verificador");
      return false;
    }

    if (!/^\d+$/.test(splitRut[1]) && splitRut[1] !== "K") {
      alert("El número verificador no es válido");
      return false;
    }

    for (var index in splitRut[0]) {
      _multiplicacion = parseInt(splitRut[0][index]) * _arrayVerificador[index];
      _suma += _multiplicacion;
    }

    let _digitoVerificador =
      _suma % _arrayVerificador[8] === 0
        ? 0
        : _arrayVerificador[8] - (_suma % _arrayVerificador[8]);

    switch (splitRut[1]) {
      case "K":
        switch (_digitoVerificador) {
          case 10:
            _estado = 1;
            break;
          case 11:
            _estado = 2;
            break;
          default:
            _estado = 2;
        }
        break;
      default:
        if (_digitoVerificador === 11 || _digitoVerificador == splitRut[1]) {
          _estado = 1;
        } else if (_digitoVerificador === 10) {
          _estado = 2;
        } else if (_digitoVerificador === 11) {
          _estado = 2;
        } else {
          _estado = 2;
        }
    }
    return _estado === 1;
  }

  function getPerfiles() {
    fetch("admin/getData")
      .then((response) => response.json())
      .then((data) => {
        if (data) {
          const select = $("#rut_actualizar");
          select.empty(); // clear antes de actualizar
          const optionSelect = $(
            `<option class="obtenerID">Seleccione Rut a Actualizar</option>`
          );
          select.append(optionSelect);
          $.each(data, function (i, row) {
            const option = $(
              `<option value="${row.id}" data-test="${row.rut}" class="obtenerID">${row.rut}</option>`
            );
            select.append(option);
          });
        } else {
          alert("Error en la actualización: " + data.message);
        }
      })
      .catch((error) => {
        console.error("Error en la solicitud Fetch: ", error);
      });
  }

  function getProcedencias() {
    fetch("admin/getProcedencias")
      .then((response) => response.json())
      .then((data) => {
        if (data) {
          const select = $(
            "#procedencia, #procedencia_actualizar, #codigo_actualizar"
          );
          select.empty(); // clear antes de actualizar
          const optionSelect = $(
            `<option class="obtenerID">Seleccione Centro de Toma</option>`
          );
          select.append(optionSelect);
          $.each(data, function (i, row) {
            const option = $(
              `<option value="${row.codigo}" class="obtenerID">${row.nombre}</option>`
            );
            select.append(option);
          });
        } else {
          alert("Error en la actualización: " + data.message);
        }
      })
      .catch((error) => {
        console.error("Error en la solicitud Fetch: ", error);
      });
  }

  $("#rut_actualizar").on("change", function (event) {
    event.preventDefault();
    var formData = {
      id: $(this).val(),
    };

    fetch("admin/buscarPerfil", {
      method: "POST",
      body: JSON.stringify(formData),
      headers: {
        "Content-Type": "application/json",
      },
    })
      .then((response) => response.json())
      .then((data) => {
        if (data) {
          console.log(data);
          $("#nombre_actualizar").val(data[0].nombre);
          $("#apPat_actualizar").val(data[0].apPat);
          $("#apMat_actualizar").val(data[0].apMat);
          $("#procedencia_actualizar").val(data[0].procedencia);
          $("#mail_actualizar").val(data[0].mail);
          $("#nivel_actualizar").val(data[0].nivel);
        } else {
          alert("Error en la actualización: " + data.message);
        }
      })
      .catch((error) => {
        console.error("Error en la solicitud Fetch: ", error);
      });
  });
});
