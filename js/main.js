function validateMainForm() {
    var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    if ($('#txt_phone').val() == "") {
        $('#displaymsg').html("Enter Customer Phone Number");
        $('#displaymsg').show();
        return false;
    }
    if ($('#txt_name').val() == "") {
        $('#displaymsg').html("Enter Customer Name");
        $('#displaymsg').show();
        return false;
    }
    if ($('#txt_email').val() == "") {
        $('#displaymsg').html("Enter Customer Email");
        $('#displaymsg').show();
        return false;
    }
    if ($('#txt_email').val() != "" && !emailPattern.test($('#txt_email').val())) {
        $('#displaymsg').html("Enter a valid Email ID");
        $('#displaymsg').show();
        return false;
    }
    if ($('#txt_customer_no').val() == "") {
        $('#displaymsg').html("Enter Client No.");
        $('#displaymsg').show();
        return false;
    }
    if ($('input[name="chk_service[]"]:checked').length <= 0) {
        $('#displaymsg').html("Select at least one checkbox");
        $('#displaymsg').show();
        return false;
    }
    return true;
}
 function data_protection_policy(){
    var dataProtectionPolicyCheckbox = document.getElementById('chk_data_protection_policy');
    if (!dataProtectionPolicyCheckbox.checked) {
        alert('You must agree to the Data Protection Policy before submitting.');
        return false;
    }
    return true;
 }