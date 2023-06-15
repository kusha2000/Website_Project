const inputs = document.querySelectorAll(".input");

var icon=document.getElementById("icon-dark");

icon.onclick=function(){
  document.body.classList.toggle("dark-theme");
}


function focusFunc() {
  let parent = this.parentNode;
  parent.classList.add("focus");
}

function blurFunc() {
  let parent = this.parentNode;
  if (this.value == "") {
    parent.classList.remove("focus");
  }
}

inputs.forEach((input) => {
  input.addEventListener("focus", focusFunc);
  input.addEventListener("blur", blurFunc);
});