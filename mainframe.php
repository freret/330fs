
<?php
    header("Content-type: text/css; charset: UTF-8");
/*We used the https://www.w3schools.com/css/css_navbar.asp and pieces of code to help build our bar */

@font-face {
  font-family: "Lato-Black";
  src: url("Fonts/Lato-Black.ttf");
  src: url("Fonts/Lato-Black.eot") format("eot"), url("Fonts/Lato-Black.woff") format("woff"), url("Fonts/Lato-Black.woff2") format("woff2");
}

@font-face {
  font-family: "Lato-Light";
  src: url("Fonts/Lato-Light.ttf");
  src: url("Fonts/Lato-Light.eot") format("eot"), url("Fonts/Lato-Light.woff") format("woff"), url("Fonts/Lato-Light.woff2") format("woff2");
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
  position: fixed;
  top: 0;
  width: 100%;
}

li a {
  font-family: "Lato-Light", lato-light, sans-serif;
  font-weight: lighter;
  float: left;
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  list-style-type: none;
}

li b {
  font-family: "Lato-Light", lato-light, sans-serif;
  font-weight: lighter;
  float: left;
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  list-style-type: none;
}

/*We used the https://www.w3schools.com/css/css_navbar.asp and pieces of code to help build our bar */

li a:hover {
  background-color: #111;
}

body {
  background-color: DodgerBlue;
}

.active {
  background-color: #c62828;
}

.Upload {
  background-color: #2E8B57;
}

#testing {
  padding-top: 40pt;
  width: 100%;
  text-align: center;
  color: white;
}

th {
  background-color: #333;
  color: white;
  font-family: "Lato-Light", lato-light, sans-serif;
  font-weight: lighter;
}

td {
  color: white;
  font-family: "Lato-Light", lato-light, sans-serif;
  font-weight: lighter;
  border: 1pt solid white;
}

.upload {
  background-color: #white;
  width: 10%;
}

.uploadmessage {
  color: white;
  opacity: 70%;
  font-size: 20pt;
  font-family: "Lato-Light", lato-light, sans-serif;
  font-weight: lighter;
}
?>
