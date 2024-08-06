<?php
    global $serviceconfig;
    global $wpdb;
    $table_name = $wpdb->prefix . "customer_master";
    $result = $wpdb->get_row("SELECT * FROM $table_name ORDER BY customer_id DESC limit 0,1");
    $custid = 1;
    $v_no = "VS" . sprintf("%06d", 1);
    if($result){
        $custid= $result->customer_id + 1;
    }
    $table_name = $wpdb->prefix . "service_consent";
    $ret = $wpdb->get_row("SELECT * FROM $table_name ORDER BY customer_service_date DESC limit 0,1");
    if ($ret) {
        $count = $ret->consent_id + 1;
        $v_no = "VS" . sprintf("%06d", $custid) . $count;
    }
    ?>
<div class="col-sm-12 section" style="border-bottom-left-radius:10px;border-bottom-right-radius:10px;">
    <form action="" method="post" onsubmit="return validateMainForm();">
        <input type="hidden" id="hdn_plugin_url" class="form-control" name="hdn_plugin_url" value="<?= SC_PLUGIN_DIR_URL ?>">
        <div class="row" style="margin-top:10px !important;background:black;border-top-right-radius: 10px;border-top-left-radius: 10px;">
            <div class="col-sm-12">
                <div class="col-sm-4">
                    <img src="<?php echo esc_url( plugins_url( 'brow.png', dirname(__FILE__) ) ); ?>" height="50" width="100" style="margin-top:10px">
                </div>
                <div class="col-sm-6 wrap">
                    <h2 style="color:white;">Customer Consents</h2>
                </div>
            </div>
        </div>
        <div class="alert alert-danger" id="displaymsg" style="display:none;margin-top:20px;margin-right:20px;">
        </div>
        <div class="row" style="margin-top: 20px;">
            <div class="col-sm-12">
                <div class="col-sm-3 col-lg-2 col-md-3 textalign">
                    <label>Branch</label>
                </div>
                <div class="col-sm-8 col-md-6 col-lg-4">
                    <select name="select_branch" id="select_branch" class="form-control dropdown-width">
                        <?php
                            foreach ($serviceconfig['branch'] as $key => $val) {
                                ?>
                        <option value="<?= $key ?>"><?= $val ?></option>
                        <?php
                            }
                            ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 10px;">
            <div class="col-sm-12">
                <div class="col-sm-3 col-lg-2 col-md-3 textalign">
                    <label>Customer Phone No.</label><span style="color:red"> *</span>
                    <input type="hidden" name="hdn_customer_id" id="hdn_customer_id" class="form-control">
                </div>
                <div class="col-sm-8 col-md-6 col-lg-4">
                    <input type="text" name="txt_phone" id="txt_phone" class="form-control">
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 10px;">
            <div class="col-sm-12">
                <div class="col-sm-3 col-lg-2 col-md-3 textalign">
                    <label>Customer Name</label><span style="color:red"> *</span>
                </div>
                <div class="col-sm-8 col-md-6 col-lg-4">
                    <input type="text" name="txt_name" id="txt_name" class="form-control">
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 10px;">
            <div class="col-sm-12">
                <div class="col-sm-3 col-lg-2 col-md-3 textalign">
                    <label>Customer Email</label><span style="color:red"> *</span>
                </div>
                <div class="col-sm-8 col-md-6 col-lg-4">
                    <input type="email" name="txt_email" id="txt_email" class="form-control">
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 10px;">
            <div class="col-sm-12">
                <div class="col-sm-3 col-lg-2 col-md-3 textalign">
                    <label>Visit No.</label><span style="color:red"> *</span>
                </div>
                <div class="col-sm-8 col-md-6 col-lg-4">
                    <input type="text" name="txt_visit_no" id="txt_visit_no" value="<?=$v_no?>" class="form-control" readonly>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 10px;">
            <div class="col-sm-12" id="patch_test_div" style="display: none;">
                <div class="col-sm-6">
                    <label>Patch Test was Done on :</label>
                    <span id="patch_test_date_value" style="margin-left:48px;color:green;font-weight:bold;"></span>
                </div>
            </div>
        </div>
        <?php
            $table_name = $wpdb->prefix . "service_master";
            $ret = $wpdb->get_results("SELECT * FROM $table_name");
            ?>
        <div class="row" style="margin-top: 10px;">
            <div class="col-sm-12" style="display: flex; align-items: flex-start;">
                <div class="col-sm-3 col-md-3 col-lg-2">
                    <label>Select Service Form</label>
                </div>
                <div class="col-sm-10 container-checkbox" style="display: flex; flex-wrap: wrap;">
                    <?php foreach ($ret as $record) { ?>
                    <div class="col-sm-6 col-md-6 col-lg-4" style="display: flex; align-items: center;margin-top:10px;">
                        <label for="chk_<?= $record->service_form_id; ?>" style="font-weight: normal; margin-left: 20px;"><?= $record->service_form_display_title; ?>    
                        <input type="checkbox" name="chk_service[]" id="chk_<?= $record->service_form_id; ?>" value="<?= $record->service_form_id; ?>" class="chk_height_width">
                        <span class="checkmark"></span>
                        </label>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="col-sm-12" style="margin-bottom: 10px;margin-top:10px;">
            <div class="col-sm-2 col-md-3 col-lg-2"></div>
            <div class="col-sm-4 col-md-4 col-lg-2" style="margin-left:-10px;">
                <button type="submit" name="main_btn_save" id="main_btn_save" class="form-control btn-primary" value="submit">Save & Next</button>
            </div>
        </div>
    </form>
</div>
<script>
    $(document).ready(function () {
        $('#txt_phone').on('change', function () {
            let phone = $(this).val();
            var sign_file_path = $('#hdn_plugin_url').val();
            if (phone) {
                $.ajax({
                    url: sign_file_path + 'fetch_customer.php',
                    type: 'POST',
                    data: {phone: phone},
                    dataType: 'json',
                    success: function (data) {
                        //console.log("Response data:", data);
                        if (data.success) {
                            $('#txt_name').val(data.name);
                            $('#txt_email').val(data.email);
                            $('#txt_patch_test').val(data.patch_test_date);
                            $('#hdn_customer_id').val(data.customer_id);
    
                            if (data.patch_test_date) {
                                // Show the div and set its content
                                $('#patch_test_div').show();
                                $('#patch_test_date_value').append(data.patch_test_date);
                            } else {
                                // Hide the div
                                $('#patch_test_div').hide();
                            }
                        } else {
                             //alert(data.message);
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.error('AJAX Error:', textStatus, errorThrown);
                        console.log('Response Text:', jqXHR.responseText); // Added for debugging
                            //alert('Error fetching data.');
                    }
                });
            }
        });
    });
</script>