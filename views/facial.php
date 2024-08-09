<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Facial Form</title>
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
            border-radius:10px;
            /* border-top-right-radius:10px; */
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
            @media only screen and (min-width: 993px) and (max-width: 1470px) {
            .clear-btn {
            position: absolute;
            bottom: 10px;
            right: -135px !important;
            }
            .difference-two-label{
            margin-top:20px !important;
            }
            .lblmedia{
            position:relative !important;
            right:-60px !important;
            }
            .datemedia{
            position:relative !important;
            right:-50px !important;
            }
            }
            @media only screen and (min-width: 993px) and (max-width: 1185px) {
            .clear-btn {
            position: absolute;
            bottom: 10px;
            right: -200px !important;
            }
            }
            @media only screen and (min-width: 992px) and (max-width: 1350px) {
            .btn_class{
            margin-left:-65px !important;
            }
            }
            @media only screen and (min-width: 768px) and (max-width: 991px) {
            .btn_class{
            margin-left:-82px !important;
            }
            .difference-two-label{
            margin-top:20px !important;
            }
            }
        </style>
    </head>
    <body>
        <div class="section">
            <div class="col-sm-12" style="margin-top:10px;background:black;border-top-right-radius: 10px;border-top-left-radius: 10px;">
                <div class="col-sm-3">
                    <img src="<?php echo esc_url( plugins_url( 'brow.png', dirname(__FILE__) ) ); ?>" height="50" width="100" style="margin-top:10px">
                </div>
                <div class="col-sm-5" style="color:white;">
                    <h3 style="text-align:center;">Facial Therapy</h3>
                </div>
                <div class="col-sm-2"></div>
                <div class="col-sm-2" style="color:white;margin-top:15px;">
                    <h4 style="text-align:center;">Visit No: <br> <?= (isset($_SESSION['visit_no'])) ? $_SESSION['visit_no'] : ''; ?></h4>
                </div>
            </div>
        </div>
        <div class="" style="background-color:#f7f7f7 !important;">
            <div class="row">
                <div class="col-sm-10">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <h3 style="font-weight:700 !important;"><?php echo (isset($_SESSION['customer_name'])) ? $_SESSION['customer_name'] : ''; ?></h3>
                    </div>
                </div>
            </div>
        </div>
      <form action="" method="post" name="consent_forms" id="consent_forms" onsubmit="return process_form();">
            <input type="hidden" id="hdn_plugin_url" class="form-control" name="hdn_plugin_url" value="<?= SC_PLUGIN_DIR_URL ?>">
            <div class="section" style="margin-top:0px !important;border-top-left-radius: 0px !important;border-top-right-radius: 0px !important;">
                <div class="row section-title">
                    <div class="col-sm-10" style="margin-top:20px !important">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <p>Contra - Indications:</p>
                        </div>
                    </div>
                </div>
                <div class="row container-checkbox" style="padding-left:10px !important;margin-top:10px;">
                    <div class="col-sm-12">
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label for="chk_skin_disorders" class="chk_height_width center-align">Skin Disorders
                            <input type="checkbox" id="chk_skin_disorders"  value="Skin Disorders" name="contra_indications[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label class="remove-bold chk_height_width center-align" for="chk_eye_infections">Eye Infections
                            <input type="checkbox" id="chk_eye_infections"  value="Eye Infections" name="contra_indications[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4 ">
                            <label class="form-check-label chk_height_width center-align" for="chk_conjuctivitis">Conjuctivitis
                            <input type="checkbox" id="chk_conjuctivitis" value="Conjuctivitis" name="contra_indications[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                            <label class="form-check-label chk_height_width center-align" for="chk_bacterial_infections">Bacterial Infection
                            <input type="checkbox" id="chk_bacterial_infections" value="Bacterial Infection" name="contra_indications[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                            <label class="form-check-label chk_height_width center-align" for="chk_inflammation">Inflammation
                            <input type = "checkbox" id="chk_inflammation" class="" value="Inflammation" name="contra_indications[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                            <label class="form-check-label chk_height_width center-align" for="chk_Swelling">Swelling
                            <input type = "checkbox" id="chk_Swelling" class="" value="Swelling" name="contra_indications[]"> 
                            <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row container-checkbox" style="margin-top:20px;padding-left:10px !important;">
                    <div class="col-sm-12 mtclass">
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label class="form-check-label chk_height_width center-align" for="chk_eye_diseases">Eye Diseases
                            <input type = "checkbox" id="chk_eye_diseases" class="" value="Eye Diseases" name="contra_indications[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label class="form-check-label chk_height_width center-align" for="chk_eye_disorders">Eye Disorders
                            <input type = "checkbox" id="chk_eye_disorders" class="" value="Eye Disorders" name="contra_indications[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label class="form-check-label chk_height_width center-align" for="chk_positive_patch_test">Positive Patch Test
                            <input type = "checkbox" id="chk_positive_patch_test" class="" value="Positive Patch Test" name="contra_indications[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                            <label class="form-check-label chk_height_width center-align" for="chk_styes">Styes
                            <input type = "checkbox" id="chk_styes" class="" value="Styes" name="contra_indications[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                            <label class="form-check-label chk_height_width center-align" for="chk_blepharitis">Blepharitis
                            <input type = "checkbox" id="chk_blepharitis" class="" value="Blepharitis" name="contra_indications[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                            <label class="form-check-label chk_height_width center-align" for="chk_watey_eye">Watey Eye
                            <input type = "checkbox" id="chk_watey_eye" class="" value="Watey Eye" name="contra_indications[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row container-checkbox" style="margin-top:20px;padding-left:10px !important;">
                    <div class="col-sm-12 mtclass">
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label class="form-check-label chk_height_width center-align" for="chk_facial_plercing">Facial Plercing
                            <input type = "checkbox" id="chk_facial_plercing" class="" value="Facial Plercing" name="contra_indications[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label class="form-check-label chk_height_width center-align" for="chk_bruising">Bruising
                            <input type = "checkbox" id="chk_bruising" class="" value="Bruising" name="contra_indications[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label class="form-check-label chk_height_width center-align" for="chk_cuts">Cuts
                            <input type = "checkbox" id="chk_cuts" class="" value="Cuts" name="contra_indications[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label removeclassformargin">
                            <label class="form-check-label chk_height_width center-align" for="chk_abrasions">Abrasions
                            <input type = "checkbox" id="chk_abrasions" class="" value="Abrasions" name="contra_indications[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                            <label class="form-check-label chk_height_width center-align" for="chk_recent_scar_tissue">Recent Scar Tissue
                            <input type = "checkbox" id="chk_recent_scar_tissue" class="" value="Recent Scar Tissue" name="contra_indications[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                            <label class="form-check-label chk_height_width center-align" for="chk_nervous_clients">Nervous Clients
                            <input type = "checkbox" id="chk_nervous_clients" class="" value="Nervous Clients" name="contra_indications[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row last-div-padding container-checkbox" style="margin-top:20px;padding-left:10px !important;">
                    <div class="col-sm-12 mtclass">
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label class="form-check-label chk_height_width center-align" for="chk_hyper_sensitive_skin">Hyper Sensitive Skin
                            <input type = "checkbox" id="chk_hyper_sensitive_skin" class="" value="Hyper Sensitive Skin" name="contra_indications[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label class="form-check-label chk_height_width center-align" for="chk_eczema_psoriasis">Eczema / Psoriasis
                            <input type = "checkbox" id="chk_eczema_psoriasis" class="" value="Eczema / Psoriasis" name="contra_indications[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Repeat similar structure for other contra-indications -->
            <div class="section container-checkbox">
                <div class="row section-title">
                    <div class="col-sm-12">
                        <div class="col-sm-3" style="margin-top:20px !important">
                            <p>Skin Type :</p>
                        </div>
                    </div>
                </div>
                <div class="row last-div-padding" style="padding-left:10px !important;margin-top:10px;">
                    <div class="col-sm-12">
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label class="form-check-label chk_height_width center-align" for="chk_normal">Normal
                            <input type="checkbox" id="chk_normal" class="" value="Normal" name="skin_type[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label class="form-check-label chk_height_width center-align" for="chk_oily">Oily
                            <input type="checkbox" id="chk_oily" class="" value="Oily" name="skin_type[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label class="form-check-label chk_height_width center-align" for="chk_dry">Dry
                            <input type="checkbox" id="chk_dry" class="" value="Dry" name="skin_type[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                            <label class="form-check-label chk_height_width center-align" for="chk_mature">Mature
                            <input type="checkbox" id="chk_mature" class="" value="Mature" name="skin_type[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                            <label class="form-check-label chk_height_width center-align" for="chk_sensitive">Sensitive
                            <input type="checkbox" id="chk_sensitive" class="" value="Sensitive" name="skin_type[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                            <label class="form-check-label chk_height_width center-align" for="chk_dehydrated">Dehydrated
                            <input type="checkbox" id="chk_dehydrated" class="" value="Dehydrated" name="skin_type[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row last-div-padding" style="margin-bottom:10px !important;padding-left:10px !important;">
                    <div class="col-sm-10">
                        <div class="col-sm-4 col-lg-2 col-md-4" style="margin-top:10px">
                            <label class="form-check-label chk_height_width center-align" for="chk_combination">Combination
                            <input type="checkbox" id="chk_combination" class="" value="Combination" name="skin_type[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section container-checkbox">
                <div class="row section-title">
                    <div class="col-sm-12">
                        <div class="col-sm-3" style="margin-top:20px !important">
                            <p>Massage :</p>
                        </div>
                    </div>
                </div>
                <div class="row last-div-padding" style="margin-bottom:10px !important;padding-left:10px !important;margin-top:10px;">
                    <div class="col-sm-12">
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label class="form-check-label chk_height_width center-align" for="chk_effeurage">Effeurage
                            <input type = "checkbox" id="chk_effeurage" class="" value="Effeurage" name="massage[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label class="form-check-label chk_height_width center-align" for="chk_pertrissage">Pertrissage
                            <input type = "checkbox" id="chk_pertrissage" class="" value="Pertrissage" name="massage[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label class="form-check-label chk_height_width center-align" for="chk_tapotement">Tapotement
                            <input type = "checkbox" id="chk_tapotement" class="" value="Tapotement" name="massage[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                            <label class="form-check-label chk_height_width center-align" for="chk_vibration">Vibration
                            <input type = "checkbox" id="chk_vibration" class="" value="Vibration" name="massage[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section container-checkbox">
                <div class="row section-title">
                    <div class="col-sm-12">
                        <div class="col-sm-3" style="margin-top:20px !important">
                            <p>Massage Medium :</p>
                        </div>
                    </div>
                </div>
                <div class="row last-div-padding" style="margin-bottom:10px !important;padding-left:10px !important;margin-top:10px;">
                    <div class="col-sm-12">
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label class="form-check-label chk_height_width center-align" for="chk_oil">Oil
                            <input type = "checkbox" id="chk_oil" class="" value="Oil" name="massage_medium[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label class="form-check-label chk_height_width center-align" for="chk_cream">Cream
                            <input type = "checkbox" id="chk_cream" class="" value="Cream" name="massage_medium[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section last-div-padding ">
                <div class="row section-title">
                    <div class="col-sm-12">
                        <div class="col-sm-3" style="margin-top:20px !important">
                            <p>Skin Texture :</p>
                        </div>
                    </div>
                </div>
                <div class="row last-div-padding" style="margin-top:10px;">
                    <div class="col-sm-12 ">
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label class="container-radio center-align" for="skin_texture_poor">Poor
                            <input type = "radio" id="skin_texture_poor" value="Poor" name="skin_texture[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label class="form-check-label container-radio center-align" for="skin_texture_average">Average
                            <input type = "radio" id="skin_texture_average" value="Average" name="skin_texture[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label class="form-check-label container-radio center-align" for="skin_texture_good">Good
                            <input type = "radio" id="skin_texture_good" value="Good" name="skin_texture[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section last-div-padding">
                <div class="row section-title">
                    <div class="col-sm-12">
                        <div class="col-sm-3" style="margin-top:20px !important">
                            <p>Si Elasticity :</p>
                        </div>
                    </div>
                </div>
                <div class="row last-div-padding" style="margin-top:10px;">
                    <div class="col-sm-12">
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label class="form-check-label container-radio center-align" for="si_elasticity_poor">Poor
                            <input type = "radio" id="si_elasticity_poor" value="Poor" name="si_elasticity[]">
                            <span class="checkmark"></span>
                                <input type = "radio" id="si_elasticity_poor" value="Poor" name="si_elasticity[]">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label class="form-check-label container-radio center-align" for="si_elasticity_average">Average
                            <input type = "radio" id="si_elasticity_average" value="Average" name="si_elasticity[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label class="form-check-label container-radio center-align" for="si_elasticity_good">Good
                            <input type = "radio" id="si_elasticity_good" value="Good" name="si_elasticity[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section last-div-padding">
                <div class="row section-title">
                    <div class="col-sm-12">
                        <div class="col-sm-3" style="margin-top:20px !important">
                            <p>Muscle Tone :</p>
                        </div>
                    </div>
                </div>
                <div class="row last-div-padding" style="margin-top:10px;">
                    <div class="col-sm-12">
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label class="form-check-label container-radio center-align" for="muscle_tone_poor">Poor
                            <input type = "radio" value="Poor" id="muscle_tone_poor" name="muscle_tone[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label class="form-check-label container-radio center-align" for="muscle_tone_avg">Average
                            <input type = "radio" value="Average" id="muscle_tone_avg" name="muscle_tone[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label class="form-check-label container-radio center-align" for="muscle_tone_good">Good
                            <input type = "radio" value="Good" id="muscle_tone_good" name="muscle_tone[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section container-checkbox" style="padding-left:10px !important;">
                <div class="row" style="padding:12px 0px 0px 0px;">
                    <div class="col-sm-12">
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label class="form-check-label chk_height_width center-align" for="chk_cleanser">Cleanser
                            <input type = "checkbox" id="chk_cleanser" class="" value="Cleanser" name="muscle_tone_other[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label class="form-check-label chk_height_width center-align" for="chk_not_setting_mask">Not Setting Mask
                            <input type = "checkbox" id="chk_not_setting_mask" class="" value="Not Setting Mask" name="muscle_tone_other[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label class="form-check-label chk_height_width center-align" for="chk_exfoliators">Exfoliators
                            <input type = "checkbox" id="chk_exfoliators" class="" value="Exfoliators" name="muscle_tone_other[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                            <label class="form-check-label chk_height_width center-align" for="chk_specialised_mask">Specialised Mask
                            <input type = "checkbox" id="chk_specialised_mask" class="" value="Specialised Mask" name="muscle_tone_other[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                            <label class="form-check-label chk_height_width center-align" for="chk_massage_media">Massage Media
                            <input type = "checkbox" id="chk_massage_media" class="" value="Massage Media" name="muscle_tone_other[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                            <label class="form-check-label chk_height_width center-align" for="chk_toning_lotion">Toning Lotion
                            <input type = "checkbox" id="chk_toning_lotion" class="" value="Toning Lotion" name="muscle_tone_other[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row container-checkbox" style="padding: 0px 0px 7px 0px !important;margin-top:20px;">
                    <div class="col-sm-12">
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label class="form-check-label chk_height_width center-align" for="chk_moisturiser">Moisturiser
                            <input type = "checkbox" id="chk_moisturiser" class="" value="Moisturiser" name="muscle_tone_other[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label class="form-check-label chk_height_width center-align" for="chk_setting_mask">Setting Mask
                            <input type = "checkbox" id="chk_setting_mask" class="" value="Setting Mask" name="muscle_tone_other[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section">
                <div class="row section-title">
                    <div class="col-sm-12">
                        <div class="col-sm-3" style="margin-top:20px !important">
                            <p>Aftercare:</p>
                        </div>
                    </div>
                </div>
                <div class="row container-checkbox" style="padding-left:10px !important;margin-top:10px;">
                    <div class="col-sm-12">
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label class="form-check-label chk_height_width center-align" for="chk_aftercare_cleanser">Cleanser
                            <input type = "checkbox" id="chk_aftercare_cleanser" class="" value="Cleanser" name="aftercare[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label class="form-check-label chk_height_width center-align" for="chk_aftercare_mask">Mask
                            <input type = "checkbox" id="chk_aftercare_mask" class="" value="Mask" name="aftercare[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label class="form-check-label chk_height_width center-align" for="chk_aftercare_toning">Toning
                            <input type = "checkbox" id="chk_aftercare_toning" class="" value="Toning" name="aftercare[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                            <label class="form-check-label chk_height_width center-align" for="chk_aftercare_eye_cream">Eye Cream
                            <input type = "checkbox" id="chk_aftercare_eye_cream" class="" value="Eye Cream" name="aftercare[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                            <label class="form-check-label chk_height_width center-align" for="chk_aftercare_neck_cream">Neck Cream
                            <input type = "checkbox" id="chk_aftercare_neck_cream" class="" value="Neck Cream" name="aftercare[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                            <label class="form-check-label chk_height_width center-align" for="chk_aftercare_exfoliate">Exfoliate
                            <input type = "checkbox" id="chk_aftercare_exfoliate" class="" value="Exfoliate" name="aftercare[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row container-checkbox" style="padding: 0px 0px 7px 0px !important;margin-top:20px;padding-left:10px !important;">
                    <div class="col-sm-12">
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label class="form-check-label chk_height_width center-align" for="chk_aftercare_diet_water_intake">Diet / Water Intake
                            <input type = "checkbox" id="chk_aftercare_diet_water_intake" class="" value="Diet / Water Intake" name="aftercare[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label class="form-check-label chk_height_width center-align" for="chk_aftercare_setting_mask">Setting Mask
                            <input type = "checkbox" id="chk_aftercare_setting_mask" class="" value="Setting Mask" name="aftercare[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section container-checkbox" style="padding-left:10px !important;margin-bottom:10px;">
                <div class="row" style="padding:7px 0px 0px 0px;">
                    <div class="col-sm-12" style="margin-top:5px;">
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label class="form-check-label chk_height_width center-align" for="chk_contra_action">Contra-Action
                            <input type = "checkbox" id="chk_contra_action" class="" value="Contra-Action" name="aftercare_other[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label class="form-check-label chk_height_width center-align" for="chk_skin_blemishes">Skin Blemishes
                            <input type = "checkbox" id="chk_skin_blemishes" class="" value="Skin Blemishes" name="aftercare_other[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label class="form-check-label chk_height_width center-align" for="chk_erythema">Erythema
                            <input type = "checkbox" id="chk_erythema" class="" value="Erythema" name="aftercare_other[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div style="margin-top:10px !important;">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-11">
                            <p style="font-size:14px !important;">I have read the information and if I have any concern, I will address these with my therapist. I give permission to my therapist to perform the procedure we have discussed, and will not hold her or her staff liable for any adverse reactions to the treatment. I have given an accurate account of the questions asked including all known allergies or prescription drugs or products I am currently  ingesting or using topically. I understand my esthetician will take every precaution to minimise negative reactions as much as possible.</p>
                        </div>
                        <div class="col-sm-1">
                        </div>
                    </div>
                </div>
            </div>
            <div style="margin-top:10px !important;padding-left:10px !important;">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-6">
                            <label class="form-check-label chk_height_width container-checkbox" for="chk_data_protection_policy">
                            Agree <a href="#" id="termsLink" data-toggle="modal" data-target="#termsModal">Data Protection Policy</a>
                                <input type="checkbox" id="chk_data_protection_policy" name="chk_data_protection_policy">
                            <span class="checkmark" style="margin-left:-35px;"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="termsModal" tabindex="-1" role="dialog" aria-labelledby="termsModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="termsModalLabel">Data Protection Policy</h4>
                        </div>
                        <div class="modal-body">
                            <p style="font-size:14px !important;">The General Data Protection Regulation (GDPR) has been implemented in the UK under the Data Protection Act of 2018. GDPR mandates that everyone who uses personal data abide by stringent guidelines known as "data protection principles." They have to ensure that the data is:</p>
                            <ul style="list-style-type: disc;margin: 0;padding: 0 0 0 20px;">
                                <li>Used fairly, lawfully, and transparently</li>
                                <li>Used for specified, explicit purposes</li>
                                <li>Used in a way that is adequate, relevant, and limited to only what is necessary</li>
                                <li>Accurate and, where necessary, kept up to date</li>
                                <li>Kept for no longer than is necessary</li>
                            </ul>
                            <p style="font-size:14px !important;">Our goal at Brow Art Beauty Salon is to uphold the highest privacy standards in order to comply with the new GDPR regulations that went into effect on May 25, 2018. Whichever way you choose to communicate with us, we will only gather information that is necessary for us to deliver the best possible service to you. This Privacy Policy provides detailed information on when and why we collect your personal information and how we use it.</p>
                            <p style="font-size:14px !important;">I understand that you might keep sensitive personal information about me such as my medical history, highly personal details, and the outcomes of any tests or treatments deemed essential for my health.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
                            <canvas id="customer_signature" class="therapist_signature" name="customer_signature" width="400" height="160"></canvas>
                            <button class="btn btn-primary clear-btn" id="btn_customer_cancel" name="btn_customer_cancel">Clear Signature</button>
                        </div>
                        <div class="col-sm-1 col-md-1 col-lg-1 lblmedia">
                            <label style="text-align: right;">Date</label>
                        </div>
                        <div class="col-sm-2 col-md-2 col-lg-2 datemedia">
                            <input type="date" id="customer_signature_date" class="form-control date_class" name="customer_signature_date" value="<?php echo date('Y-m-d'); ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="section">
                <div class="row" style="margin-top:30px; padding:20px 0px !important;">
                    <div class="col-sm-12">
                        <div class="col-sm-2">
                            <label>Therapist Signature</label>
                        </div>
                        <div class="col-sm-5 position-relative">
                            <input type="hidden" id="hdn_therapist_signature" class="form-control" name="hdn_therapist_signature">
                            <canvas id="therapist_signature" class="therapist_signature" name="therapist_signature" width="400" height="160"></canvas>
                            <button class="btn btn-primary clear-btn" id="btn_therapist_cancel" name="btn_therapist_cancel">Clear Signature</button>
                        </div>
                        <div class="col-sm-1 lblmedia">
                            <label style="text-align: right;">Date</label>
                        </div>
                        <div class="col-sm-2 datemedia">
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
                        <button type="submit" name="other_btn_save" id="other_btn_save" class="btn btn-primary btn_class" style="margin-left: -45px;" value="submit" >Save & Continue</button>
                    </div>
                </div>
            </div>
        </form>
    </body>
    <script>
        var sign_file_path = $('#hdn_plugin_url').val();
        fetchjsondata('<?= $_SESSION['customer_id'] ?>', '<?php echo FACIAL ?>', sign_file_path);
    </script>
</html>