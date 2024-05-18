<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <div class="password">
    <input type="password" id="password" placeholder="Password">
    <button onclick="showPassword()">Show Password</button>
    <script>
      function showPassword() { // function to show the password
        var x = document.getElementById("password"); // set x as the element with id "password"
        if (x.type === "password") { // if the type of the element is password
          x.type = "text"; // change the type to text
        } else {
          x.type = "password"; // otherwise, change the type to password
        }
      }
    </script>
  </div>
</body>
</html>