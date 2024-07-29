<?php
global $serviceconfig;
global $wpdb;
?>
<div class="alert alert-danger" id="displaymsg" style="display:none;margin-top:20px;margin-right:20px;">
</div>
<div class="container section">
    <form action="" method="post" onsubmit="return validateMainForm();">
        <input type="hidden" id="hdn_plugin_url" class="form-control" name="hdn_plugin_url" value="<?= SC_PLUGIN_DIR_URL ?>">
        <div class="row" style="margin-top:30px !important;">
            <div class="col-sm-12">
                <h4 style="text-align: left;font-weight: 700;">Customer Consent</h4>
            </div>
        </div>

        <div class="row" style="margin-top: 10px;">
            <div class="col-sm-12">
                <div class="col-sm-2 textalign">
                    <label>Branch</label>
                </div>
                <div class="col-sm-4">
                    <select name="select_branch" id="select_branch" class="form-control">
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
                <div class="col-sm-2 textalign">
                    <label>Customer Phone No.</label><span style="color:red"> *</span>
                    <input type="hidden" name="hdn_customer_id" id="hdn_customer_id" class="form-control">
                </div>
                <div class="col-sm-4">
                    <input type="text" name="txt_phone" id="txt_phone" class="form-control">
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 10px;">
            <div class="col-sm-12">
                <div class="col-sm-2 textalign">
                    <label>Customer Name</label><span style="color:red"> *</span>
                </div>
                <div class="col-sm-4">
                    <input type="text" name="txt_name" id="txt_name" class="form-control">
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 10px;">
            <div class="col-sm-12">
                <div class="col-sm-2 textalign">
                    <label>Customer Email</label>
                </div>
                <div class="col-sm-4">
                    <input type="email" name="txt_email" id="txt_email" class="form-control">
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 10px;">
            <div class="col-sm-12">
                <div class="col-sm-2 textalign">
                    <label>Visit No.</label><span style="color:red"> *</span>
                </div>
                <div class="col-sm-4">
                    <input type="text" name="txt_visit_no" id="txt_visit_no" class="form-control" readonly>
                </div>
            </div>
        </div>
        <script>
//            function generateClientNo() {
//                let lastNumber = localStorage.getItem('lastClientNumber');
//                if (!lastNumber) {
//                    lastNumber = 0; // Starting point
//                }
//                lastNumber++;
//                let clientNo = 'CL' + String(lastNumber).padStart(3, '0');
//                localStorage.setItem('lastClientNumber', lastNumber);
//                document.getElementById('txt_customer_no').value = clientNo;
//            }
//            generateClientNo();
        </script>

        <?php
        $table_name = $wpdb->prefix . "service_master";
        $ret = $wpdb->get_results("SELECT * FROM $table_name");
        ?>
        <div class="row" style="margin-top: 10px;">
            <div class="col-sm-12">
                <div class="col-sm-6">
                    <h4>Select Service Form</h4>
                </div>
            </div>
            <div class="col-sm-12" >
                <div class="col-sm-2"></div>
                <div class="col-sm-10" style="display: flex; flex-wrap: wrap;">
                    <?php foreach ($ret as $record) { ?>
                        <div class="col-sm-4">
                            <input type="checkbox" name="chk_service[]" id="chk_<?= $record->service_form_id; ?>" value="<?= $record->service_form_id; ?>" class="chk_height_width">
                            <?= $record->service_form_display_title; ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-sm-12" style="margin-bottom: 10px;margin-top:10px;">
                <div class="col-sm-2"></div>
                <div class="col-sm-2">
                    <button type="submit" name="main_btn_save" id="main_btn_save" class="form-control btn-primary" value="submit">Save & Next</button>
                </div>
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
                                    $('#hdn_customer_id').val(data.customer_id);
                                    $('#txt_visit_no').val(data.visit_no);
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
