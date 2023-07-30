$("#dtpFrDate").datepicker({ dateFormat: "dd/mm/yy" });
$("#dtpFrDate").change(function () {
  var date2 = $("#dtpFrDate").datepicker("getDate");
  date2.setDate(date2.getDate() - 1);
  document.getElementById("dtpToDate").innerHTML =
    date2.toLocaleDateString("en-GB");
  console.log(date2.toLocaleDateString()); //My device lang is en-US
});
