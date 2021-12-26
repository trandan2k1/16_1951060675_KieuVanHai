
function readmore() {
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");
	
  if (btnText.innerHTML === "Rút gọn") {
    btnText.innerHTML = "Xem tiếp"; 
    moreText.style.display = "none";
  } else {
    btnText.innerHTML = "Rút gọn"; 
    moreText.style.display = "inline";
  }
}
