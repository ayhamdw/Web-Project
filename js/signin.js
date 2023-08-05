$(".form")
  .find("input, textarea")
  .on("keyup blur focus", function (e) {
    var $this = $(this),
      label = $this.prev("label");

    if (e.type === "keyup") {
      if ($this.val() === "") {
        label.removeClass("active highlight");
      } else {
        label.addClass("active highlight");
      }
    } else if (e.type === "blur") {
      if ($this.val() === "") {
        label.removeClass("active highlight");
      } else {
        label.removeClass("highlight");
      }
    } else if (e.type === "focus") {
      if ($this.val() === "") {
        label.removeClass("highlight");
      } else if ($this.val() !== "") {
        label.addClass("highlight");
      }
    }
  });

$(".tab a").on("click", function (e) {
  e.preventDefault();

  $(this).parent().addClass("active");
  $(this).parent().siblings().removeClass("active");

  target = $(this).attr("href");

  $(".tab-content > div").not(target).hide();

  $(target).fadeIn(600);
});

window.onload = function () {
  const btnClicked = document.getElementById("submitButton");
  btnClicked.onclick = function () {
    const username = document.getElementById("usernameUp").value;
    const password = document.getElementById("passwordUp").value;

    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
        const responseText = xhr.responseText;
        if (responseText == "Success") {
          alert("Done");
        } else if (responseText == "Not Success") {
          alert("Not Done");
        }
      }
    };
    const params = `username=${username}&password=${password}`;
    xhr.open("POST", "../html/signin.php?" + params);
    xhr.send(null);
  };
};

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

window.onload = function () {
  const btnClicked = document.getElementById("submitButton");
  btnClicked.onclick = function () {
    const userName = document.getElementById("FirstName").value;
    const password = document.getElementById("SecondName").value;

    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
        const responseText = xhr.responseText;
        if (responseText == "Success") {
          alert("Done");
        } else if (responseText == "Not Success") {
          alert("Not Done");
        }
      }
    };
    const params = `userName=${userName}&password=${password}`;
    xhr.open("POST", "../html/signin.php?" + params);
    xhr.send(null);
  };
};
