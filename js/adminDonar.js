$("#formId").submit(function (e) {
  e.preventDefault(); // avoid to execute the actual submit of the form.

  var form = $(this);
  var actionUrl = form.attr("action");

  $.ajax({
    type: "POST",
    url: actionUrl,
    data: form.serialize(), // serializes the form's elements.
    success: function (data) {
      alert("Added Successfully");
      document.getElementById("formId").reset();
    },
  });
});

function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    alltags = tr[i].getElementsByTagName("td");
    isFound = false;
    for (j = 0; j < alltags.length; j++) {
      td = alltags[j];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
          j = alltags.length;
          isFound = true;
        }
      }
    }
    if (!isFound && tr[i].className !== "headerClass") {
      tr[i].style.display = "none";
    }
  }
}

function getIndex(x) {
  // index of row
  tableIndex = x.rowIndex;
  console.log(tableIndex);
}
function deleteDonar() {
  let username =
    document.getElementById("myTable").rows[tableIndex].cells[3].innerHTML;
  document.getElementById("myTable").deleteRow(tableIndex);
  console.log(username);
  $(document).ready(function () {
    var url = window.location.href;
    var params = url.split("?ID=");
    $.ajax({
      type: "POST",
      url: "adminDonar.php",
      data: { id: username },
      success: function (result) {},
    });
  });
}
