function showHint(str) {
  let txtHint = document.querySelector("#txtHint");

  if (str.length === 0) {
    // code 4a
    txtHint.innerText = "";
    return;
  }

  xhttp = new XMLHttpRequest();

  // code 4b
  xhttp.onreadystatechange = () => {
    if (xhttp.readyState != 4) {
      return;
    } else if (xhttp.status == 200) {
      // txtHint.innerText = xhttp.responseText;
      let names = JSON.parse(xhttp.responseText).map(i => i.name);
      txtHint.innerText = (names.length > 0) ? names.join(", ") : "no suggestion";
    } else {
      alert("Something went wrong.");
    }
  }

  xhttp.open("GET", "php11F_gethint2.php?keyword=" + str, true);
  xhttp.send();
}