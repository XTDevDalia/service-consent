<?php
global $serviceconfig;
/*unset($_SESSION['customer_id']);
unset($_SESSION['customer_name']);
unset($_SESSION['customer_no']);
unset($_SESSION['selected_forms']);
unset($_SESSION['form_index']);*/
?>
<div class="alert alert-danger" id="displaymsg" style="display:none;margin-top:20px;margin-right:20px;">
</div>
<div class="container section">
    <form action="" method="post" onsubmit="return validateMainForm();">
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
                    <label>Name</label><span style="color:red"> *</span>
                </div>
                <div class="col-sm-4">
                    <input type="text" name="txt_name" id="txt_name" class="form-control">
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 10px;">
            <div class="col-sm-12">
                <div class="col-sm-2 textalign">
                    <label>Email</label>
                </div>
                <div class="col-sm-4">
                    <input type="email" name="txt_email" id="txt_email" class="form-control">
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 10px;">
            <div class="col-sm-12">
                <div class="col-sm-2 textalign">
                    <label>Phone No.</label><span style="color:red"> *</span>
                </div>
                <div class="col-sm-4">
                    <input type="text" name="txt_phone" id="txt_phone" class="form-control">
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 10px;">
            <div class="col-sm-12">
                <div class="col-sm-2 textalign">
                    <label>Client No.</label><span style="color:red"> *</span>
                </div>
                <div class="col-sm-4">
                    <input type="text" name="txt_customer_no" id="txt_customer_no" class="form-control" readonly>
                </div>
            </div>
        </div>
        <script>
            function generateClientNo() {
                let lastNumber = localStorage.getItem('lastClientNumber');
                if (!lastNumber) {
                    lastNumber = 0; // Starting point
                }
                lastNumber++;
                let clientNo = 'CL' + String(lastNumber).padStart(3, '0');
                localStorage.setItem('lastClientNumber', lastNumber);
                document.getElementById('txt_customer_no').value = clientNo;
            }
            generateClientNo();
        </script>

        <?php
        global $wpdb;
        $table_name = $wpdb->prefix . "service_master";
        $ret = $wpdb->get_results("SELECT * FROM $table_name");
        ?>
        <div class="row" style="margin-top: 10px;">
            <div class="col-sm-12">
                <div class="col-sm-6">
                    <h4>Select Service Form</h4>
                </div>
            </div>
            <?php foreach ($ret as $record) { ?>
                <div class="col-sm-12">
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-4" style="margin:3px 0px;">
                        <input type="checkbox" name="chk_service[]" id="chk_<?= $record->service_form_id; ?>" value="<?= $record->service_form_id; ?>" class="chk_height_width">
                        <?= $record->service_form_display_title; ?>
                    </div>
                </div>
            <?php } ?>
            <div class="col-sm-12" style="margin-bottom: 10px;">
                <div class="col-sm-4">
                </div>
                <div class="col-sm-2">
                    <button type="submit" name="main_btn_save" id="main_btn_save" class="form-control btn-primary" value="submit">Save & Next</button>
                </div>
            </div>
        </div>
    </form>
</div>
