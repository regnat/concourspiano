function init() {
  var all = document.getElementsByTagName("*");
  for(var i=0;i<all.length;i++) {
    if (all[i].className == "nojavascript") {
      all[i].className = "javascript";
    }
    else if (all[i].className == "javascript") {
      all[i].className = "nojavascript";
    }
  }
}



