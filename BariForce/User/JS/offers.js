function copyCode(elementId, btnElement) {
  var codeText = document.getElementById(elementId).innerText;

  navigator.clipboard.writeText(codeText);

  btnElement.innerText = "Copied!";
  btnElement.style.background = "#2ecc71";
  btnElement.style.color = "white";

  setTimeout(function () {
    btnElement.innerText = "Copy Code";
    btnElement.style.background = "";
    btnElement.style.color = "";
  }, 2000);
}
