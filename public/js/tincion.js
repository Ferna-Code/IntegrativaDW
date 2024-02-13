$(document).ready(function () {
  var selectedId;
  $("tbody").on("click", ".openModalBtn", function () {
    $("#myModal").css("display", "block");
    selectedId = $(this).data("id");
    $("#confirmacion").prop("checked", false);
    $("#observacion").val("");
  });

  $(".close").click(function () {
    $("#myModal").css("display", "none");
  });

  $(window).click(function (event) {
    if (event.target == $("#myModal")[0]) {
      $("#myModal").css("display", "none");
    }
  });

  $("#myFormTincion").on("submit", function (event) {
    event.preventDefault();

    var formData = {
      id: selectedId,
      confirmacion: $("#confirmacion").is(":checked"),
      observacion: $("#observacion").val(),
    };

    fetch("tincion/updateTincion", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(formData),
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {
          fetch("tincion/getData")
            .then((response) => {
              response.json();
              if (!response.json.success) {
                $("#myModal").css("display", "none");
                const tbody = $("tbody");
                tbody.empty();
              }
            })
            .then((data) => {
              if (data) {
                actualizarTabla(data);
                $("#myModal").css("display", "none");
              } else {
                alert("Error en la actualización: " + data.message);
              }
            })
            .catch((error) => {
              console.error("Error en la solicitud Fetch: ", error);
            });
        } else {
          alert("Error en la actualización: " + data.message);
        }
      })
      .catch((error) => {
        const tbody = $("tbody");
        tbody.empty();
        console.error("Error en la solicitud Fetch: ", error);
      });
  });

  function actualizarTabla(data) {
    const tbody = $("tbody");
    tbody.empty();

    $.each(data, function (i, row) {
      const tr = $("<tr>");
      tr.html(
        `
        <td> ${row.id} </td>
        <td> ${row.examen_id} </td>
        <td> ${row.confirmacion} </td>
        <td> ${row.observacion} </td>
        <td> ${row.fecha} </td>
        <td> ${row.hora} </td>
        <td>
            <button data-id="${row.id}" type='button' class='btn btn-primary openModalBtn'>Diagnosticar</button>
        </td>

        `
      );
      tbody.append(tr);
    });
  }
});
