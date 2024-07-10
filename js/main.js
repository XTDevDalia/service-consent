function validateMainForm() {
    if($('#txt_name').val() == "" ){
        $('#displaymsg').html("Enter Name");
        $('#displaymsg').show();
        return false;
    }
//    if($('#txt_email').val() != "" && !validateEmail($('#txt_email').val())){
//        $('#displaymsg').html("Enter Valid Email ID");
//        $('#displaymsg').show();
//        return false;
//    }
    if($('#txt_phone').val() == "" ){
        $('#displaymsg').html("Enter Phone");
        $('#displaymsg').show();
        return false;
    }
    if($('#txt_customer_no').val() == "" ){
        $('#displaymsg').html("Enter Client No.");
        $('#displaymsg').show();
        return false;
    }
    if($('input[name="chk_service[]"]:checked').length <= 0){
        $('#displaymsg').html("Select at least one checkbox");
        $('#displaymsg').show();
        return false;
    }
    return true;
}
///////   Generic Functions  ///////////////////////
//function validateEmail(email) {
//  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/; 
//  return regex.test(email);
//}