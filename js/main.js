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
var found = false;
function searchJSON(obj, searchString, inpname, matchkey) {
    $.each(obj, function (key, value) {
        //alert(value + "------" + searchString + "-----" + inpname + " -----" + key + ":::" + inpname.search(key));
        if (typeof value === 'object') {
            searchJSON(value, searchString, inpname, key);
        } else {
            let tempvar1 = value.trim();
            let tempvar2 = searchString.trim();
            //console.log(tempvar1 + "::" + tempvar2);
            // console.log(tempvar1 == tempvar2);
            if (tempvar1 === tempvar2) { // inpname.search(key) !== -1) {
               // console.log(matchkey + " -- " + inpname + "--" + inpname.search(matchkey));
                if (matchkey !== "" && inpname.search(matchkey) !== -1) { // match only while it is object
                   // console.log(inpname + "--" + key);
                    found = true;
                    return false; // Break the loop
                }
            }
        }
    });
}
function fetchjsondata(custid, formid, filepath) {
    $.ajax({
        url: filepath + 'fetch_form_json.php',
        type: 'POST',
        data: {cust_id: custid, form_id: formid},
        dataType: 'json',
        success: function (data) {
            $('form#consent_forms :input').each(function () {
                var input = $(this);
                // Check if the input is a checkbox
                if (input.is(':checkbox') || input.is(':radio')) {
                    // Get the label associated with the checkbox
                    var label = $('label[for="' + input.attr('id') + '"]').text();
                    //  alert(label);
                    var inpname = input.attr('name');
                    found = false;
                    searchJSON(data, label, inpname, '');
                    if (found) {
                        input.prop('checked', true);
                    }
                    //console.log('Checkbox Label: ' + label + ', Value: ' + input.val() + ', Checked: ' + input.is(':checked'));
                }
            });

        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.error('AJAX Error:', textStatus, errorThrown);
            console.log('Response Text:', jqXHR.responseText); // Added for debugging
            //alert('Error fetching data.');
        }
    });
}
function validatePatchTestForm(){
    var customerSelect = document.getElementById('patch_test_customer');
    if (customerSelect.value === "-1") {
        $('#displaymsg').html("Please Select Customer Name.");
        $('#displaymsg').show();
        return false;
    }
    return true;
}