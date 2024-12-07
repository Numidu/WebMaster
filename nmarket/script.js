function register() {
  var name = document.getElementById("name").value;
  var email = document.getElementById("email").value;
  var pwd = document.getElementById("pwd").value;

  var form = new FormData();
  form.append("n", name);
  form.append("e", email);
  form.append("p", pwd);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      document.getElementById("error").innerHTML = response;
      document.getElementById("error").className = "d-block text-danger";
    }
  };

  request.open("POST", "registerprocess.php", true);
  request.send(form);
}

function loging() {
  var email = document.getElementById("email");
  var pwd = document.getElementById("pwd");
  var remember = document.getElementById("remember");

  var form = new FormData();

  form.append("e", email.value);
  form.append("p", pwd.value);
  form.append("r", remember.checked);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if ((request.readyState == 4) & (request.status == 200)) {
      var response = request.responseText;
      if (response == "success") {
        window.location = "index.php";
      } else {
        document.getElementById("error").innerHTML = response;
        document.getElementById("error").className = "d-block text-danger";
      }
    }
  };
  request.open("POST", "logingprocess.php", true);
  request.send(form);
}

function sendForgetEmail() {
  var email = document.getElementById("email").value;

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if ((request.readyState == 4) & (request.status == 200)) {
      var response = request.responseText;
      if (response == "success") {
        var mm;
        var model = document.getElementById("model");
        mm = new bootstrap.Modal(model);
        mm.show();
      } else {
        document.getElementById("error").innerHTML = response;
        document.getElementById("error").classname = "d-block text-danger";
      }
    }
  };
  request.open("GET", "sendForgotverification.php?e=" + email, true);
  request.send();
}

function changepassword() {
  var npw = document.getElementById("npw").value;
  var cpw = document.getElementById("cpw").value;
  var vcode = document.getElementById("vcode").value;
  var email = document.getElementById("email").value;

  var form = new FormData();

  form.append("n", npw);
  form.append("c", cpw);
  form.append("v", vcode);
  form.append("e", email);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if ((request.readyState == 4) & (request.status == 200)) {
      var response = request.responseText;
      if (response == "success") {
        window.location.reload();
      } else {
        document.getElementById("merror").innerHTML = response;
        document.getElementById("merror").className = "text-danger";
      }
    }
  };
  request.open("POST", "resertPassword.php", true);
  request.send(form);
}

function logout() {
  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if ((request.readyState == 4) & (request.status == 200)) {
      var response = request.responseText;
      if (response == "success") {
        window.location.reload();
      } else {
        alert(response);
      }
    }
  };
  request.open("GET", "logoutprocess.php", true);
  request.send();
}

function updateuser() {
  var address = document.getElementById("address").value;
  var mobile = document.getElementById("mobile").value;

  var form = new FormData();

  form.append("a", address);
  form.append("m", mobile);
  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if ((request.readyState == 4) & (request.status == 200)) {
      var response = request.responseText;
      if (response == "sucess") {
        window.location.reload();
      } else {
        alert(response);
      }
    }
  };
  request.open("POST", "updateuserprocess.php", true);
  request.send(form);
}

function adminlogin() {
  var email = document.getElementById("email").value;
  var pwd = document.getElementById("pwd").value;

  var form = new FormData();

  form.append("e", email);
  form.append("p", pwd);
  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if ((request.readyState == 4) & (request.status == 200)) {
      var response = request.responseText;
      if (response == "sucess") {
        window.location = "adminpanel.php";
      } else {
        alert(response);
      }
    }
  };
  request.open("POST", "adminlogingprocess.php", true);
  request.send(form);
}

function UploadImages() {
  var image = document.getElementById("imageUploader");
  image.onchange = function () {
    var file_count = image.files.length;
    if (file_count <= 3) {
      for (var x = 0; x < file_count; x++) {
        var file = this.files[x];
        var url = window.URL.createObjectURL(file);
        document.getElementById("i" + x).src = url;
      }
    } else {
      alert("please upload 3 or less images");
    }
  };
}

function addProduct() {
  var title = document.getElementById("title").value;
  var price = document.getElementById("price").value;
  var item = document.getElementById("item").value;
  var dcost = document.getElementById("dcost").value;
  var storage = document.getElementById("storage").value;
  var color = document.getElementById("color").value;
  var size = document.getElementById("size").value;
  var description = document.getElementById("desc").value;
  var image = document.getElementById("imageUploader");

  var form = new FormData();

  form.append("t", title);
  form.append("p", price);
  form.append("i", item);
  form.append("dc", dcost);
  form.append("st", storage);
  form.append("c", color);
  form.append("s", size);
  form.append("de", description);

  var file_count = image.files.length;

  for (var x = 0; x < file_count; x++) {
    form.append("image" + x, image.files[x]);
  }

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      if (response == "success") {
        window.location.reload();
      } else {
        alert(response);
      }
    }
  };

  request.open("POST", "addProductProcess.php", true);
  request.send(form);
}

function addTocart(id) {
  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if ((request.readyState == 4) & (request.status == 200)) {
      var response = request.responseText;
      alert(response);
      window.location.reload();
    }
  };
  request.open("GET", "addTocartprocess.php?id=" + id, true);
  request.send();
}

function addTowatchlist(id) {
  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if ((request.readyState == 4) & (request.status == 200)) {
      var response = request.responseText;
      alert(response);
      window.location.reload();
    }
  };
  request.open("GET", "addTowatchlistprocess.php?id=" + id, true);
  request.send();
}

function search() {
  var text = document.getElementById("txt").value;
  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      document.getElementById("area").innerHTML = response;
    }
  };

  request.open("GET", "searchprocess.php?t=" + encodeURIComponent(text), true);
  request.send();
}

function remove(type, id) {
  var form = new FormData();

  form.append("t", type);
  form.append("i", id);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      if (response == "success") {
        alert(response);
        window.location.reload();
      } else {
        alert(response);
      }
    }
  };
  request.open("POST", "removeProcess.php", true);
  request.send(form);
}

function buyNow(id) {
  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      try {
        var obj = JSON.parse(response);
        var item = obj["item"];
        var total = obj["amount"];

        if (response == 1) {
          alert("Please update your email.");
        } else if (response == 2) {
          alert("Please log in first.");
        } else {
          payhere.onCompleted = function onCompleted(orderId) {
            //console.log("Payment completed. OrderID: " + orderId);
            alert("Order successful! Your Order ID: " + orderId);
            saveinvoice(orderId, item, total);
          };

          // Payment window closed
          payhere.onDismissed = function onDismissed() {
            console.log("Payment dismissed.");
          };

          payhere.onError = function onError(error) {
            console.log("Error: " + error);
          };

          var payment = {
            sandbox: true,
            merchant_id: obj["m_id"],
            return_url: "http://localhost/nmarket/index.php",
            cancel_url: "http://localhost/nmarket/index.php",
            notify_url: "http://sample.com/notify",
            order_id: obj["id"],
            items: obj["item"],
            amount: obj["amount"],
            currency: "LKR",
            hash: obj["hash"],
            first_name: obj["fname"],
            last_name: obj["lname"],
            email: obj["email"],
            phone: obj["mobile"],
            address: obj["address"],
            city: "Colombo",
            country: "Sri Lanka",
            delivery_address: obj["address"],
            delivery_city: "Kalutara",
            delivery_country: "Sri Lanka",
            custom_1: "",
            custom_2: "",
          };

          // Show the payhere.js popup
          payhere.startPayment(payment);
        }
      } catch (e) {
        console.error("Invalid JSON response: " + response);
        alert("An error occurred while processing the payment.");
      }
    }
  };

  request.open("GET", "buyNowProcess.php?id=" + id, true);
  request.send(); // Removed `form` as it is undefined
}

function saveinvoice(oId, item, total) {
  var form = new FormData();

  form.append("oi", oId);
  form.append("it", item);
  form.append("to", total);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      if (response.trim() == "success") {
        window.location = "index.php";
      } else {
        console.error("Error: " + response);
        alert("Failed to save invoice. Please try again.");
      }
    }
  };
  request.open("POST", "saveinvoiceProcess.php", true);
  request.send(form);
}

function changestatus(st, id) {
  var form = new FormData();
  form.append("s", st);
  form.append("i", id);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      if (response == "sucess") {
        window.location.reload();
      } else {
        alert(response);
      }
    }
  };

  request.open("POST", "changestatusProcess.php", true);
  request.send(form);
}

function updateProduct(id) {
  var title = document.getElementById("title").value;
  var price = document.getElementById("price").value;
  var item = document.getElementById("item").value;
  var dcost = document.getElementById("dcost").value;
  var storage = document.getElementById("storage").value;
  var color = document.getElementById("color").value;
  var size = document.getElementById("size").value;
  var description = document.getElementById("desc").value;
  var image = document.getElementById("imageUploader");

  var form = new FormData();

  form.append("t", title);
  form.append("p", price);
  form.append("i", item);
  form.append("dc", dcost);
  form.append("st", storage);
  form.append("c", color);
  form.append("s", size);
  form.append("de", description);
  form.append("id", id);

  var file_count = image.files.length;

  for (var x = 0; x < file_count; x++) {
    form.append("image" + x, image.files[x]);
  }

  // Create a new XMLHttpRequest object
  var request = new XMLHttpRequest();

  // Set up a callback function to handle the response
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;

      alert(response);
    }
  };

  // Open and send the request
  request.open("POST", "UpdateproductProcess.php", true);
  request.send(form);
}

function buyproduct() {
  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      if (response === "1") {
        alert("Please update your email.");
      } else if (response === "2") {
        alert("Please log in first.");
      } else {
        try {
          var obj = JSON.parse(response);
          console.log("Parsed JSON:", obj);

          var item = obj["item"];
          var total = obj["amount"];

          // Payment completed
          payhere.onCompleted = function onCompleted(orderId) {
            console.log("Payment completed. OrderID: " + orderId);
            alert("Order successful! Your Order ID: " + orderId);
            saveinvoice(orderId, item, total);
          };

          payhere.onDismissed = function onDismissed() {
            console.log("Payment dismissed.");
          };

          payhere.onError = function onError(error) {
            console.log("Error: " + error);
          };

          var payment = {
            sandbox: true,
            merchant_id: obj["m_id"],
            return_url: "http://localhost/nmarket/index.php",
            cancel_url: "http://localhost/nmarket/index.php",
            notify_url: "http://sample.com/notify",
            order_id: obj["id"],
            items: obj["item"],
            amount: obj["amount"],
            currency: obj["currency"],
            hash: obj["hash"],
            first_name: obj["fname"],
            last_name: obj["lname"],
            email: obj["email"],
            phone: obj["mobile"],
            address: obj["address"],
            city: obj["city"],
            country: obj["country"],
            delivery_address: obj["address"],
            delivery_city: "Kalutara",
            delivery_country: "Sri Lanka",
            custom_1: "",
            custom_2: "",
          };

          payhere.startPayment(payment);
        } catch (e) {
          console.error("Invalid JSON response: " + response);
          alert("An error occurred while processing the payment.");
        }
      }
    }
  };
  request.open("POST", "buyProductprocess.php", true);
  request.send();
}
