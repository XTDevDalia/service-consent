<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Brow Lamination</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            label{
                font-weight:normal !important;
            }
            p{
                font-size:16px !important;
            }
            .section-title {
                /*     margin-top: 20px !important; */
                font-weight: bold;
                padding:0px 0px !important;
            }
            .section{
                    background: #f7f7f7;
                margin-top: 10px !important;
            }
            #customer_signature {
                border: 2px dotted #CCCCCC;
                border-radius: 15px;
                cursor: crosshair;
                background:white;
            }
            #therapist_signature{
                border: 2px dotted #CCCCCC;
                border-radius: 15px;
                cursor: crosshair;
                background:white;
            }
            input[type=radio]:checked::before {
                content: "";
                border-radius: 50%;
                width: .8rem !important;
                height: .8rem !important;
                margin: .1875rem;
                background-color: #3582c4;
                line-height: 1.14285714;
            }
        </style>
    </head>
    <body>
    <div class="row">
            <div class="col-sm-12">
                <center>
                    <img src="<?php echo esc_url( plugins_url( 'brow.png', dirname(__FILE__) ) ); ?>" height="50" width="100" style="margin-top:10px">
                </center>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="col-sm-3"><p style="font-weight: 600;font-size:20px !important;">Lash Lift / Brow Lamination</p></div>
                <div class="col-sm-3"></div>
                <div class="col-sm-3"></div>
                <div class="col-sm-3">
                    <p style="font-weight: 600;font-size:20px !important;text-align:right;">Visit No.:  <?= (isset($_SESSION['visit_no'])) ? $_SESSION['visit_no'] : ''; ?></p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12" style="margin-top:-20px;">
                <div class="col-sm-3">
                    <h3 style="font-weight:700 !important;"><?php echo (isset($_SESSION['customer_name'])) ? $_SESSION['customer_name'] : ''; ?></h3>
                </div>

            </div>
        </div>
        <form action="" method="post" name="consent_forms" id="consent_forms" >
            <input type="hidden" id="hdn_plugin_url" class="form-control" name="hdn_plugin_url" value="<?= SC_PLUGIN_DIR_URL ?>">
            <div class="section">
                <div class="row section-title">
                    <div class="col-sm-10" style="margin-top:20px !important">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <p>Please tick any of the below that may apply to you:</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-10">
                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type="checkbox" id="chk_open_wounds" class="chk_height_width" value="Open Wounds" name="brow_lamination[]">
                            <label for="chk_open_wounds">Open Wounds</label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type="checkbox" id="chk_pregnancy" class="chk_height_width" value="Pregnancy" name="brow_lamination[]">
                            <label class="remove-bold" for="chk_pregnancy">Pregnancy</label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-3 ">
                            <input type="checkbox" id="chk_allergies" class="chk_height_width" value="Allergies" name="brow_lamination[]">
                            <label class="form-check-label" for="chk_allergies">Allergies</label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-3 difference-two-label">
                            <input type="checkbox" id="chk_asthma" class="chk_height_width" value="Asthma" name="brow_lamination[]">
                            <label class="form-check-label" for="chk_asthma">Asthma</label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-3 difference-two-label">
                            <input type = "checkbox" id="chk_veruccas" class="chk_height_width" value="Veruccas" name="brow_lamination[]">
                            <label class="form-check-label" for="chk_veruccas">Verucca's</label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-3 difference-two-label">
                            <input type = "checkbox" id="chk_Eczema" class="chk_height_width" value="Eczema" name="brow_lamination[]"> 
                            <label class="form-check-label" for="chk_Eczema">Eczema</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-10">
                        <div class="col-sm-4 col-lg-2 col-md-3 difference-two-label">
                            <input type = "checkbox" id="chk_epilepsy" class="chk_height_width" value="Epilepsy" name="brow_lamination[]">
                            <label class="form-check-label" for="chk_epilepsy">Epilepsy</label>
                        </div>

                        <div class="col-sm-4 col-lg-2 col-md-3 difference-two-label">
                            <input type = "checkbox" id="chk_cold_sores" class="chk_height_width" value="Cold Sores" name="brow_lamination[]">
                            <label class="form-check-label" for="chk_cold_sores">Cold Sores</label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-3 difference-two-label">
                            <input type = "checkbox" id="chk_rashes" class="chk_height_width" value="Rashes" name="brow_lamination[]">
                            <label class="form-check-label" for="chk_rashes">Rashes</label>
                        </div>

                        <div class="col-sm-4 col-lg-2 col-md-3 difference-two-label">
                            <input type = "checkbox" id="chk_Psoriasis" class="chk_height_width" value="Psoriasis" name="brow_lamination[]">
                            <label class="form-check-label" for="chk_Psoriasis">Psoriasis</label>
                        </div>

                        <div class="col-sm-4 col-lg-2 col-md-3 difference-two-label">
                            <input type = "checkbox" id="chk_Sunburn" class="chk_height_width" value="Sunburn" name="brow_lamination[]">
                            <label class="form-check-label" for="chk_Sunburn">Sunburn</label>
                        </div>

                        <div class="col-sm-4 col-lg-2 col-md-3 difference-two-label">
                            <input type = "checkbox" id="chk_recent_scars" class="chk_height_width" value="Recent Scars" name="brow_lamination[]">
                            <label class="form-check-label" for="chk_recent_scars">Recent Scars</label>
                        </div> 
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-10">
                        <div class="col-sm-4 col-lg-2 col-md-3 difference-two-label">
                            <input type = "checkbox" id="chk_conjuctivitis" class="chk_height_width" value="Conjuctivitis" name="brow_lamination[]">
                            <label class="form-check-label" for="chk_conjuctivitis">Conjuctivitis</label>
                        </div>

                        <div class="col-sm-4 col-lg-2 col-md-3 difference-two-label">
                            <input type = "checkbox" id="chk_impetigo" class="chk_height_width" value="Impetigo" name="brow_lamination[]">
                            <label class="form-check-label" for="chk_impetigo">Impetigo</label>
                        </div>

                        <div class="col-sm-4 col-lg-2 col-md-3 difference-two-label">
                            <input type = "checkbox" id="chk_ringworm" class="chk_height_width" value="Ringworm" name="brow_lamination[]">
                            <label class="form-check-label" for="chk_ringworm">Ringworm</label>
                        </div>

                        <div class="col-sm-4 col-lg-2 col-md-3 difference-two-label">
                            <input type = "checkbox" id="chk_burms" class="chk_height_width" value="Burns" name="brow_lamination[]">
                            <label class="form-check-label" for="chk_burns">Burns</label>
                        </div>
                    </div>
                </div>
            </div>

            <div style="margin-top:10px !important;">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-12">
                            <p style="font-size:14px !important;">Doctor's permission must be sought before treatment if you have ticked any of the above boxes.</p>
                             <p style="font-size:14px !important;">Are you on any madication taken orally or applied topically ? If yes, please provide details.</p>
                             <p style="font-size:14px !important;">Have you had recent skin peel. Microdermabrasion or are you using Glycolic based skincare ? Or have you had any recent filter injection ?</p>
                             <p style="font-size:14px !important;">I confirm that the above information is true to the best of my knowledge and belief. I have been fully informed about the expected results and effects of waxing and agree to follow all aftercare advice provided by my therapist. I hereby give my consent to proceed with treatment.  
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section">
                <div class="row" style="padding:20px 0px !important;">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="col-sm-2 col-md-2 col-lg-2">
                            <label>Client Signature</label>
                        </div>
                        <div class="col-sm-5 col-md-5 col-lg-5 position-relative">
                            <input type="hidden" id="hdn_customer_signature" class="form-control" name="hdn_customer_signature">
                            <canvas id="customer_signature" class="therapist_signature" name="customer_signature" style="width:100% !important;"></canvas>
                            <button class="btn btn-primary clear-btn" id="btn_customer_cancel" name="btn_customer_cancel">Clear Signature</button>
                        </div>
                        <div class="col-sm-1 col-md-1 col-lg-1">
                            <label style="text-align: right;">Date</label>
                        </div>
                        <div class="col-sm-2 col-md-2 col-lg-2">
                            <input type="date" id="customer_signature_date" class="form-control date_class" name="customer_signature_date" value="<?php echo date('Y-m-d'); ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="section">
                <div class="row" style="margin-top:30px; padding:20px 0px !important;">
                <div class="col-sm-12">
                        <div class="col-sm-2">
                                <label style="text-align: right;">Therapist Name</label>
                        </div>
                        <div class="col-sm-3">
                            <input type="text" id="txt_therapist_name" class="form-control" name="txt_therapist_name">
                        </div>
                    </div>
                    <div class="col-sm-12" style="margin-top:10px;">
                        <div class="col-sm-2">
                            <label>Therapist Signature</label>
                        </div>
                        <div class="col-sm-5 position-relative">
                            <input type="hidden" id="hdn_therapist_signature" class="form-control" name="hdn_therapist_signature">
                            <canvas id="therapist_signature" class="therapist_signature" name="therapist_signature" style="width:100% !important;"></canvas>
                            <button class="btn btn-primary clear-btn" id="btn_therapist_cancel" name="btn_therapist_cancel">Clear Signature</button>
                        </div>
                        <div class="col-sm-1">
                            <label style="text-align: right;">Date</label>
                        </div>
                        <div class="col-sm-2">
                            <input type="date" id="therapist_signature_date" class="form-control date_class" name="therapist_signature_date" value="<?php echo date('Y-m-d'); ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 10px;">
                <div class="col-sm-12">
                    <div class="col-sm-11">
                    </div>
                    <div class="col-sm-1">
                        <button type="submit" name="other_btn_save" id="other_btn_save" class="btn btn-primary btn_class" style="margin-left: -45px;" value="submit" >Save Data</button>
                    </div>
                </div>    
            </div>
        </form>
    </body>
</html>