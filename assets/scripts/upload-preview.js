function triggerClick(e) {
  document.querySelector("#profileImage").click();
}
function displayImage(e) {
  if (e.files[0]) {
    const reader = new FileReader();
    reader.onload = function(e) {
      document
        .querySelector("#profileDisplay")
        .setAttribute("src", e.target.result);
      document.querySelector("#profileDisplay").classList.remove("hide-img");
      document.querySelector("#hide-div").classList.add("hide-img");
    };
    reader.readAsDataURL(e.files[0]);
  }
}
