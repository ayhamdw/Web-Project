function getIndexDonar(x) {
  // index of row
  tableIndex = x.rowIndex;
  console.log(tableIndex);
}

function declineDonar() {
  let username =
    document.getElementById("myTable").rows[tableIndex].cells[3].innerHTML; // username
  let requestID =
    document.getElementById("myTable").rows[tableIndex].cells[0].innerHTML; // request id
  document.getElementById("myTable").deleteRow(tableIndex);
  console.log(requestID);
  console.log(username);
  $(document).ready(function () {
    var url = window.location.href;
    var params = url.split("?ID=");
    var url = window.location.href;
    $.ajax({
      type: "POST",
      url: "adminRequest.php",
      data: {
        id: username,
        state: "Decline",
        typeofPerson: "Donar",
        requestID: requestID,
      },
      success: function (result) {},
    });
  });
}

function acceptDonar() {
  let username =
    document.getElementById("myTable").rows[tableIndex].cells[3].innerHTML; // username
  let requestID =
    document.getElementById("myTable").rows[tableIndex].cells[0].innerHTML; // request id
  document.getElementById("myTable").deleteRow(tableIndex);
  console.log(requestID);
  console.log(username);
  $(document).ready(function () {
    var url = window.location.href;
    var params = url.split("?ID=");
    var url = window.location.href;
    $.ajax({
      type: "POST",
      url: "adminRequest.php",
      data: {
        id: username,
        state: "Accept",
        typeofPerson: "Donar",
        requestID: requestID,
      },
      success: function (result) {},
    });
  });
}

// Patient

function getIndexPatient(x) {
  // index of row
  tableIndex1 = x.rowIndex;
  console.log(tableIndex1);
}

function declinePatient() {
  let username =
    document.getElementById("myTablePatient").rows[tableIndex1].cells[3]
      .innerHTML;
  let requestID =
    document.getElementById("myTablePatient").rows[tableIndex1].cells[0]
      .innerHTML; // request id
  document.getElementById("myTablePatient").deleteRow(tableIndex1);
  console.log(username);
  $(document).ready(function () {
    var url = window.location.href;
    var params = url.split("?ID=");
    $.ajax({
      type: "POST",
      url: "adminRequest.php",
      data: {
        id: username,
        state: "Decline",
        typeofPerson: "Patient",
        requestID: requestID,
      },
      success: function (result) {
        alert(username + " " + requestID);
      },
    });
  });
}

function acceptPatient() {
  let username =
    document.getElementById("myTablePatient").rows[tableIndex1].cells[3]
      .innerHTML;
  let requestID =
    document.getElementById("myTablePatient").rows[tableIndex1].cells[0]
      .innerHTML; // request id
  document.getElementById("myTablePatient").deleteRow(tableIndex1);
  console.log(username);
  $(document).ready(function () {
    var url = window.location.href;
    var params = url.split("?ID=");
    $.ajax({
      type: "POST",
      url: "adminRequest.php",
      data: {
        id: username,
        state: "Accept",
        typeofPerson: "Patient",
        requestID: requestID,
      },
      success: function (result) {
        alert(username + " " + requestID);
      },
    });
  });
}
