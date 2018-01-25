$(document).ready(function() {
  var elem = document.getElementById("myBar"); 
  var width = 0;
  var id = setInterval(frame, 10);
  var total = parseFloat(parseFloat($("#qua1").val(), 10) * 100) / parseFloat($("#qua").val(), 10);
  function frame() {
    if (width >= total) {
      clearInterval(id);
    } else {
      width++; 
      elem.style.width = width + '%'; 
      if(width>='100')
      {
      document.getElementById("demo").innerHTML = "COMPLETE";
      elem.style.width= 100 +'%';
      }
      else
      {
      document.getElementById("demo").innerHTML = width * 1  + '%';
      }
     
    }
  }
});
