function showEditBox(editobj,id) {
  $('#frmAdd').hide();
  var currentMessage = $("#message_" + id + " .message-content").html();
  var editMarkUp = '<textarea rows="5" cols="80" id="txtmessage_'+id+'">'+currentMessage+'</textarea><button name="ok" onClick="callCrudAction(\'edit\','+id+')">Save</button><button name="cancel" onClick="cancelEdit(\''+currentMessage+'\','+id+')">Cancel</button>';
  $("#message_" + id + " .message-content").html(editMarkUp);
}
function cancelEdit(message,id) {
  $("#message_" + id + " .message-content").html(message);
  $('#frmAdd').show();
}
function cartAction(action,product_code) {
  var qty, qty2, qty1, qty3;
  qty = $("#qty_"+product_code).val();
  qty2= $("#qty2_"+product_code).val();
  qty1= parseInt(qty);
  qty3= parseInt(qty2);
  var queryString = "";
  if(action != "") {
    switch(action) {
      case "add":
      if(qty1>qty3)
      {
       alert("The quantity should not be  higher than the quantity needed");
      break;
      }  
       if(qty1<=0)
      {
        alert("Quantity cannot be zero or negative values");
      break;
      }
      else
      if(qty1==null)
      {
        alert("Quantity cannot be blank");
      break;
      }
      else
      {
        queryString = 'action='+action+'&code='+ product_code+'&quantity='+$("#qty_"+product_code).val()+'&po_no='+$("#samp").val(); 
      break;
      }
      case "remove":
        queryString = 'action='+action+'&code='+ product_code;
      break;
      case "empty":
        queryString = 'action='+action;
      break;
    }  
  }
  jQuery.ajax({
  url: "pullout2_action.php",
  data:queryString,
  type: "POST",
  success:function(data){
    $("#cart-item").html(data);
    if(action != "") {
      switch(action) {
        /*case "add":
          $("#add_"+product_code).hide();
          "#added_"+product_code).show();
        break;*/
        case "remove":
          $("#add_"+product_code).show();
          $("#added_"+product_code).hide();
        break;
        case "empty":
          $(".btnAddAction").show();
          $(".btnAdded").hide();
        break;
      }  
    }
  },
  error:function (){}
  });
}