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
            searchJSON(value, searchString,inpname,key);
        } else if (value === searchString){ // inpname.search(key) !== -1) {
            if(matchkey != "" && inpname.search(matchkey) !== -1)
           // alert(inpname + "--" + key);
            found = true;
            return false; // Break the loop
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
            console.log(data);
            $('form#consent_forms :input').each(function () {
                var input = $(this);
                // Check if the input is a checkbox
                if (input.is(':checkbox') || input.is(':radio')) {
                    // Get the label associated with the checkbox
                    var label = $('label[for="' + input.attr('id') + '"]').text();
                    var inpname = input.attr('name');
                    found = false;
                    searchJSON(data, label, inpname,'');
                    //alert(found);
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
