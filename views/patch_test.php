<?php
    global $wpdb;
    global $patch_test_id; 
    $patch_test_id = isset($_GET['patch_test_id']) ? $_GET['patch_test_id'] : null;
    $customer_name = "";
    $patch_test_date_time = "";
    $patch_test_notes = "";
    
    if ($patch_test_id) {
        $table_name_patch_test = $wpdb->prefix . 'patch_test';
        $table_name_cust = $wpdb->prefix . 'customer_master';
        $results = $wpdb->get_row("SELECT c.customer_name , p.* from $table_name_patch_test as p 
                                left join $table_name_cust as c
                                on c.customer_id = p.customer_id 
                                WHERE patch_test_id = $patch_test_id");
        if ($results) {
            $customer_name = $results->customer_name;
            $patch_test_date_time = $results->patch_test_date_time;
            $patch_test_notes = $results->patch_test_notes;
        }
    }
    
    $table_name_customer = $wpdb->prefix . "customer_master";
    $customers = $wpdb->get_results("SELECT * FROM $table_name_customer");
    // print_r($customers);
    //exit;
    ?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<!-- jQuery (required for Select2) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<div class="alert alert-danger" id="displaymsg" style="display:none;margin-top:20px;margin-right:20px;"></div>
<div class="section">
    <div class="col-sm-12" style="margin-top:10px;background:black;border-top-right-radius: 10px;border-top-left-radius: 10px;">
        <div class="col-sm-3">
            <img src="<?php echo esc_url( plugins_url( 'brow.png', dirname(__FILE__) ) ); ?>" height="50" width="100" style="margin-top:10px">
        </div>
        <div class="col-sm-4" style="color:white;">
            <h3 style="text-align:center;">Patch Test</h3>
        </div>
    </div>
    <form action="" method="post" onsubmit="return validatePatchTestForm();">
        <input type="hidden" id="hdn_plugin_url" class="form-control" name="hdn_plugin_url" value="<?= SC_PLUGIN_DIR_URL ?>">
        <div class="row" style="margin-top: 10px;">
            <div class="col-sm-12" style="margin-top:20px;">
                <div class="col-sm-4 col-md-3 col-lg-3 textalign">
                    <label>Customer Name</label>
                </div>
                <div class="col-sm-4">
                    <select name="patch_test_customer" id="patch_test_customer" class="form-control dropdown-width">
                        <option value="-1"><?= 'Select Customer' ?></option>
                        <?php foreach ($customers as $record) { ?>
                        <option value="<?= $record->customer_id ?>" <?= $record->customer_name == $customer_name ? 'selected' : '' ?>>
                            <?= $record->customer_name ?> - <?= $record->customer_phone ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 10px;">
            <div class="col-sm-12">
                <div class="col-sm-2 textalign">
                    <label>Patch Test Date Time</label><span style="color:red"> </span>
                </div>
                <div class="col-sm-4">
                    <input type="datetime-local" name="patch_test_datetime" id="patch_test_datetime" class="form-control" value="<?= date('Y-m-d\TH:i') ?>">
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 10px;">
            <div class="col-sm-12">
                <div class="col-sm-2 textalign">
                    <label for="patch_test_notes">Patch Test Notes</label><span style="color:red"> *</span>
                </div>
                <div class="col-sm-4">
                    <textarea name="patch_test_notes" id="patch_test_notes" class="form-control" rows="4"><?= $patch_test_notes ?></textarea>
                </div>
            </div>
        </div>
        <div class="col-sm-12" style="margin-bottom: 10px;margin-top:10px;">
            <div class="col-sm-2"></div>
            <div class="col-sm-2">
                <button type="submit" name="patch_test_btn_save" id="patch_test_btn_save" class="form-control btn-primary" value="submit"><?= $patch_test_id ? 'Update' : 'Save' ?></button>
            </div>
        </div>
    </form>
</div>
<script>
    $(document).ready(function() {
        $('#patch_test_customer').select2({
            placeholder: 'Select Customer',
            allowClear: true
        });
    });
</script>