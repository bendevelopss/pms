 $(document).ready(function() {
  var elem = document.getElementById("myBar1"); 
  var width = 0;
  var nga= (parseFloat(parseFloat($("#ngayon").val(),10)));
  var tot= (parseFloat(parseFloat($("#totaldate").val(),10)));
  var d1=$("#d1").val();
  var d2=$("#d2").val();
  var id = setInterval(frame, 10);
  var total = (parseFloat(parseFloat($("#ngayon").val(), 10) / (parseFloat($("#totaldate").val(), 10)+nga))) * 100;
  function frame() {
    if (width >= total) {
      clearInterval(id);
    } 
    else {
      width++; 
      elem.style.width = width + '%'; 
      //document.getElementById("demo1").innerHTML = width * 1  + '%';
       if(width=='100')
      {
      document.getElementById("demo1").innerHTML = "COMPLETE";
      elem.style.width= 100 +'%';
      $("#re_date").show();
      $("#dates").show();
      }
      else if(total<=.90)
      {
      document.getElementById("demo1").innerHTML = "COMPLETE";
      elem.style.width= 100 +'%';
      $("#re_date").show();
      $("#dates").show();
      }
      else if(d1>d2)
      {
      document.getElementById("demo1").innerHTML = "COMPLETE";
      elem.style.width= 100 +'%';
      $("#re_date").show();
      $("#dates").show();
      }
      else
      {
      document.getElementById("demo1").innerHTML = width * 1  + '%';
      $("#re_date").hide();
      $("#dates").hide();

      }
    }
  }
});
