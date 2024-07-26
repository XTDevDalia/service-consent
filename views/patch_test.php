<?php
    global $wpdb;
    global $patch_test_id; 
    $patch_test_id = isset($_GET['patch_test_id']) ? $_GET['patch_test_id'] : null;
    $customer_name = "";
    $patch_test_date_time = "";
    $patch_test_notes = "";

    if ($patch_test_id) {
        $table_name_patch_test = $wpdb->prefix . 'patch_test';
        $results = $wpdb->get_row("SELECT * from $table_name_patch_test WHERE patch_test_id = $patch_test_id");
        if ($results) {
            $customer_name = $results->customer_name;
            $patch_test_date_time = $results->patch_test_date_time;
            $patch_test_notes = $results->patch_test_notes;
        }
    }

    $table_name_customer = $wpdb->prefix . "customer_master";
    $customers = $wpdb->get_results("SELECT * FROM $table_name_customer");
    //print_r($customers);
?>

<div class="alert alert-danger" id="displaymsg" style="display:none;margin-top:20px;margin-right:20px;">
</div>
<div class="container section">
    <form action="" method="post" onsubmit="return validatePatchTestForm();">
        <input type="hidden" id="hdn_plugin_url" class="form-control" name="hdn_plugin_url" value="<?= SC_PLUGIN_DIR_URL ?>">
        <div class="row" style="margin-top:30px !important;">
            <div class="col-sm-12">
                <h4 style="text-align: left;font-weight: 700;"><?= $patch_test_id ? 'Edit Patch Test' : 'Patch Test' ?></h4>
            </div>
        </div>
        <div class="row" style="margin-top: 10px;">
            <div class="col-sm-12">
                <div class="col-sm-2 textalign">
                    <label>Customer Name</label>
                </div>
                <div class="col-sm-4">
                    <select name="patch_test_customer" id="patch_test_customer" class="form-control">
                        <option value="-1"><?= 'Select Customer' ?></option>
                        <?php foreach ($customers as $record) { ?>
                            <option value="<?= $record->customer_name ?>" <?= $record->customer_name == $customer_name ? 'selected' : '' ?>><?= $record->customer_name ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 10px;">
            <div class="col-sm-12">
                <div class="col-sm-2 textalign">
                    <label>Patch Test Date & Time</label><span style="color:red"> </span>
                </div>
                <div class="col-sm-4">
                    <input type="datetime-local" name="patch_test_datetime" id="patch_test_datetime" class="form-control" value="<?= $patch_test_date_time ?>">
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