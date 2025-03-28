if(window.history.replaceState){
window.history.replacestate(null,null,window.location.href);
}

function myFun() {
    var popup = document.getElementById("myPopup12");
    popup.classList.toggle("show");
  }