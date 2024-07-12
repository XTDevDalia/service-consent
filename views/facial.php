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
                /*     background: #f7f7f7; */
                margin-top: 20px !important;
            }
            #customer_signature {
                border: 2px dotted #CCCCCC;
                border-radius: 15px;
                cursor: crosshair;
            }
            #therapist_signature{
                border: 2px dotted #CCCCCC;
                border-radius: 15px;
                cursor: crosshair;
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
        <div class="row" style="margin-top:30px;">
            <div class="col-sm-12">
                <div class="col-sm-3"><h4 style="font-weight: 600;">Facial Therapy</h4></div>
                <div class="col-sm-3"></div>
                <div class="col-sm-3"></div>
                <div class="col-sm-3">
                    <p class="textalign">No.:  <?= (isset($_SESSION['customer_no'])) ? $_SESSION['customer_no'] : ''; ?></p>
                </div>
            </div>
        </div>

        <div class="row" style="margin-top:30px !important;">
            <div class="col-sm-12">
                <div class="col-sm-1">
                    <p class="textalign">Name</p>
                </div>
                <div class="col-sm-3">
                    <?php echo (isset($_SESSION['customer_name'])) ? $_SESSION['customer_name'] : ''; ?>
                </div>

            </div>
        </div>
        <form action="" method="post" name="consent_forms" id="consent_forms" >
            <div class="section">
                <div class="row section-title">
                    <div class="col-sm-12" style="margin-top:20px !important">
                        <div class="col-sm-3">
                            <p>Contra - Indications:</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-10">
                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type="checkbox" id="chk_skin_disorders" class="chk_height_width" value="Skin Disorders" name="contra_indications[]">
                            <label for="chk_skin_disorders">Skin Disorders</label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type="checkbox" id="chk_eye_infections" class="chk_height_width" value="Eye Infections" name="contra_indications[]">
                            <label class="remove-bold" for="chk_eye_infections">Eye Infections</label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-3 ">
                            <input type="checkbox" id="chk_conjuctivitis" class="chk_height_width" value="Conjuctivitis" name="contra_indications[]">
                            <label class="form-check-label" for="chk_conjuctivitis">Conjuctivitis</label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type="checkbox" id="chk_bacterial_infections" class="chk_height_width" value="Bacterial Infection" name="contra_indications[]">
                            <label class="form-check-label" for="chk_bacterial_infections">Bacterial Infection</label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_inflammation" class="chk_height_width" value="Inflammation" name="contra_indications[]">
                            <label class="form-check-label" for="chk_inflammation">Inflammation</label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_Swelling" class="chk_height_width" value="Swelling" name="contra_indications[]"> 
                            <label class="form-check-label" for="chk_Swelling">Swelling</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-10">
                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_eye_diseases" class="chk_height_width" value="Eye Diseases" name="contra_indications[]">
                            <label class="form-check-label" for="chk_eye_diseases">Eye Diseases</label>
                        </div>

                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_eye_disorders" class="chk_height_width" value="Eye Disorders" name="contra_indications[]">
                            <label class="form-check-label" for="chk_eye_disorders">Eye Disorders</label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_positive_patch_test" class="chk_height_width" value="Positive Patch Test" name="contra_indications[]">
                            <label class="form-check-label" for="chk_positive_patch_test">Positive Patch Test</label>
                        </div>

                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_styes" class="chk_height_width" value="Styes" name="contra_indications[]">
                            <label class="form-check-label" for="chk_styes">Styes</label>
                        </div>

                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_blepharitis" class="chk_height_width" value="Blepharitis" name="contra_indications[]">
                            <label class="form-check-label" for="chk_blepharitis">Blepharitis</label>
                        </div>

                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_watey_eye" class="chk_height_width" value="Watey Eye" name="contra_indications[]">
                            <label class="form-check-label" for="chk_watey_eye">Watey Eye</label>
                        </div> 
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-10">
                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_hyper_sensitive_skin" class="chk_height_width" value="Hyper Sensitive Skin" name="contra_indications[]">
                            <label class="form-check-label" for="chk_hyper_sensitive_skin">Hyper Sensitive Skin</label>
                        </div>

                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_bruising" class="chk_height_width" value="Bruising" name="contra_indications[]">
                            <label class="form-check-label" for="chk_bruising">Bruising</label>
                        </div>

                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_cuts" class="chk_height_width" value="Cuts" name="contra_indications[]">
                            <label class="form-check-label" for="chk_cuts">Cuts</label>
                        </div>

                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_abrasions" class="chk_height_width" value="Abrasions" name="contra_indications[]">
                            <label class="form-check-label" for="chk_abrasions">Abrasions</label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_recent_scar_tissue" class="chk_height_width" value="Recent Scar Tissue" name="contra_indications[]">
                            <label class="form-check-label" for="chk_recent_scar_tissue">Recent Scar Tissue</label>
                        </div>

                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_nervous_clients" class="chk_height_width" value="Nervous Clients" name="contra_indications[]">
                            <label class="form-check-label" for="chk_nervous_clients">Nervous Clients</label>
                        </div>
                    </div>
                </div>

                <div class="row last-div-padding">
                    <div class="col-sm-10">


                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_facial_plercing" class="chk_height_width" value="Facial Plercing" name="contra_indications[]">
                            <label class="form-check-label" for="chk_facial_plercing">Facial Plercing</label>
                        </div>

                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_eczema_psoriasis" class="chk_height_width" value="Eczema / Psoriasis" name="contra_indications[]">
                            <label class="form-check-label" for="chk_eczema_psoriasis">Eczema / Psoriasis</label>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Repeat similar structure for other contra-indications -->
            <div class="section">
                <div class="row section-title">
                    <div class="col-sm-12">
                        <div class="col-sm-3">
                            <p>Skin Type :</p>
                        </div>
                    </div>
                </div>

                <div class="row last-div-padding">
                    <div class="col-sm-10">
                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type="checkbox" id="chk_normal" class="chk_height_width" value="Normal" name="skin_type[]">
                            <label class="form-check-label" for="chk_normal">Normal</label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type="checkbox" id="chk_oily" class="chk_height_width" value="Oily" name="skin_type[]">
                            <label class="form-check-label" for="chk_oily">Oily</label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type="checkbox" id="chk_dry" class="chk_height_width" value="Dry" name="skin_type[]">
                            <label class="form-check-label" for="chk_dry">Dry</label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type="checkbox" id="chk_mature" class="chk_height_width" value="Mature" name="skin_type[]">
                            <label class="form-check-label" for="chk_mature">Mature</label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type="checkbox" id="chk_sensitive" class="chk_height_width" value="Sensitive" name="skin_type[]">
                            <label class="form-check-label" for="chk_sensitive">Sensitive</label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type="checkbox" id="chk_dehydrated" class="chk_height_width" value="Dehydrated" name="skin_type[]">
                            <label class="form-check-label" for="chk_dehydrated">Dehydrated</label>
                        </div>
                    </div>
                </div>
                <div class="row last-div-padding">
                    <div class="col-sm-10">
                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type="checkbox" id="chk_combination" class="chk_height_width" value="Combination" name="skin_type[]">
                            <label class="form-check-label" for="chk_combination">Combination</label>
                        </div>

                    </div>
                </div>
            </div>
            <div class="section">
                <div class="row section-title">
                    <div class="col-sm-12">
                        <div class="col-sm-3">
                            <p>Massage :</p>
                        </div>
                    </div>
                </div>

                <div class="row last-div-padding">
                    <div class="col-sm-10">
                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_effeurage" class="chk_height_width" value="Effeurage" name="massage[]">
                            <label class="form-check-label" for="chk_effeurage">Effeurage</label>
                        </div>

                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_pertrissage" class="chk_height_width" value="Pertrissage" name="massage[]">
                            <label class="form-check-label" for="chk_pertrissage">Pertrissage</label>
                        </div>

                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_tapotement" class="chk_height_width" value="Tapotement" name="massage[]">
                            <label class="form-check-label" for="chk_tapotement">Tapotement</label>
                        </div>

                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_vibration" class="chk_height_width" value="Vibration" name="massage[]">
                            <label class="form-check-label" for="chk_vibration">Vibration</label>
                        </div>

                    </div>
                </div>
            </div>
            <div class="section">
                <div class="row section-title">
                    <div class="col-sm-12">
                        <div class="col-sm-3">
                            <p>Massage Medium :</p>
                        </div>
                    </div>
                </div>

                <div class="row last-div-padding">
                    <div class="col-sm-10">
                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_oil" class="chk_height_width" value="Oil" name="massage_medium[]">
                            <label class="form-check-label" for="chk_oil">Oil</label>
                        </div>

                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_cream" class="chk_height_width" value="Cream" name="massage_medium[]">
                            <label class="form-check-label" for="chk_cream">Cream</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section last-div-padding">
                <div class="row section-title">
                    <div class="col-sm-12">
                        <div class="col-sm-3">
                            <p>Skin Texture :</p>
                        </div>
                    </div>
                </div>

        <div class="row last-div-padding">
            <div class="col-sm-10">
                <div class="col-sm-4 col-lg-2 col-md-3">
                    <input type = "radio" id="skin_texture_poor" class="chk_height_width" value="Poor" name="skin_teture_type[]">
                    <label class="form-check-label" for="skin_textrure_poor">Poor</label>
                </div>

                <div class="col-sm-4 col-lg-2 col-md-3">
                    <input type = "radio" id="skin_texture_average" class="chk_height_width" value="Average" name="skin_teture_type[]">
                    <label class="form-check-label" for="skin_textrure_average">Average</label>
                </div>

                <div class="col-sm-4 col-lg-2 col-md-3">
                    <input type = "radio" id="skin_textrure_good" class="chk_height_width" value="Good" name="skin_teture_type[]">
                    <label class="form-check-label" for="skin_textrure_good">Good</label>
                </div>
            </div>
        </div>

    </div>
    <div class="section last-div-padding">
        <div class="row section-title">
            <div class="col-sm-12">
                <div class="col-sm-3">
                    <p>Si Elasticity :</p>
                </div>
            </div>
        </div>
        <div class="row last-div-padding">
            <div class="col-sm-10">
                <div class="col-sm-4 col-lg-2 col-md-3">
                    <input type = "radio" id="si_elasticity_poor" class="chk_height_width" value="Poor" name="si_elasticity[]">
                    <label class="form-check-label" for="si_elasticity_poor">Poor</label>
                </div>

                <div class="col-sm-4 col-lg-2 col-md-3">
                    <input type = "radio" id="si_elasticity_average" class="chk_height_width" value="Average" name="si_elasticity[]">
                    <label class="form-check-label" for="si_elasticity_average">Average</label>
                </div>

                <div class="col-sm-4 col-lg-2 col-md-3">
                    <input type = "radio" id="si_elasticity_good" class="chk_height_width" value="Good" name="si_elasticity[]">
                    <label class="form-check-label" for="si_elasticity_good">Good</label>
                </div>
            </div>
        </div>
    </div>
    <div class=
    "section last-div-padding">
        <div class="row section-title">
            <div class="col-sm-12">
                <div class="col-sm-3">
                    <p>Muscle Tone :</p>
                </div>
            </div>
        </div>
        <div class="row last-div-padding">
            <div class="col-sm-10">
                <div class="col-sm-4 col-lg-2 col-md-3">
                    <input type = "radio" id="muscle_tone_poor" class="chk_height_width" value="Poor" name="muscle_tone[]">
                    <label class="form-check-label" for="muscle_tone_poor">Poor</label>
                </div>

                <div class="col-sm-4 col-lg-2 col-md-3">
                    <input type = "radio" id="muscle_tone_average" class="chk_height_width" value="Average" name="muscle_tone[]">
                    <label class="form-check-label" for="muscle_tone_average">Average</label>
                </div>

                <div class="col-sm-4 col-lg-2 col-md-3">
                    <input type = "radio" id="muscle_tone_good" class="chk_height_width" value="Good" name="muscle_tone[]">
                    <label class="form-check-label" for="muscle_tone_good">Good</label>
                </div>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="row section-title">
            <div class="col-sm-12">
                <div class="col-sm-3">
                    <!-- <p>Skin & Nail Analysis:</p> -->
                </div>
            </div>
        </div>

                <div class="row">
                    <div class="col-sm-10">
                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_cleanser" class="chk_height_width" value="Cleanser" name="muscle_tone_other[]">
                            <label class="form-check-label" for="chk_cleanser">Cleanser</label>
                        </div>

                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_not_setting_mask" class="chk_height_width" value="Not Setting Mask" name="muscle_tone_other[]">
                            <label class="form-check-label" for="chk_not_setting_mask">Not Setting Mask</label>
                        </div>

                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_exfoliators" class="chk_height_width" value="Exfoliators" name="muscle_tone_other[]">
                            <label class="form-check-label" for="chk_exfoliators">Exfoliators</label>
                        </div>

                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_specialised_mask" class="chk_height_width" value="Specialised Mask" name="muscle_tone_other[]">
                            <label class="form-check-label" for="chk_specialised_mask">Specialised Mask</label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_massage_media" class="chk_height_width" value="Massage Media" name="muscle_tone_other[]">
                            <label class="form-check-label" for="chk_massage_media">Massage Media</label>
                        </div>

                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_toning_lotion" class="chk_height_width" value="Toning Lotion" name="muscle_tone_other[]">
                            <label class="form-check-label" for="chk_toning_lotion">Toning Lotion</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-10">
                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_moisturiser" class="chk_height_width" value="Moisturiser" name="muscle_tone_other[]">
                            <label class="form-check-label" for="chk_moisturiser">Moisturiser</label>
                        </div>

                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_setting_mask" class="chk_height_width" value="Setting Mask" name="muscle_tone_other[]">
                            <label class="form-check-label" for="chk_setting_mask">Setting Mask</label>
                        </div>

                    </div>
                </div>
            </div>

            <div class="section">
                <div class="row section-title">
                    <div class="col-sm-12">
                        <div class="col-sm-3">
                            <p>Aftercare:</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-10">
                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_aftercare_cleanser" class="chk_height_width" value="Cleanser" name="aftercare[]">
                            <label class="form-check-label" for="chk_aftercare_cleanser">Cleanser</label>
                        </div>

                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_aftercare_mask" class="chk_height_width" value="Mask" name="aftercare[]">
                            <label class="form-check-label" for="chk_aftercare_mask">Mask</label>
                        </div>

                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_aftercare_toning" class="chk_height_width" value="Toning" name="aftercare[]">
                            <label class="form-check-label" for="chk_aftercare_toning">Toning</label>
                        </div>

                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_aftercare_eye_cream" class="chk_height_width" value="Eye Cream" name="aftercare[]">
                            <label class="form-check-label" for="chk_aftercare_eye_cream">Eye Cream</label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_aftercare_neck_cream" class="chk_height_width" value="Neck Cream" name="aftercare[]">
                            <label class="form-check-label" for="chk_aftercare_neck_cream">Neck Cream</label>
                        </div>

                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_aftercare_exfoliate" class="chk_height_width" value="Exfoliate" name="aftercare[]">
                            <label class="form-check-label" for="chk_aftercare_exfoliate">Exfoliate</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-10">
                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_aftercare_diet_water_intake" class="chk_height_width" value="Diet / Water Intake" name="aftercare[]">
                            <label class="form-check-label" for="chk_aftercare_diet_water_intake">Diet / Water Intake</label>
                        </div>

                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_aftercare_setting_mask" class="chk_height_width" value="Setting Mask" name="aftercare[]">
                            <label class="form-check-label" for="chk_aftercare_setting_mask">Setting Mask</label>
                        </div>

                    </div>
                </div>
            </div>

            <div class="section">
                <div class="row section-title">
                    <div class="col-sm-12">
                        <div class="col-sm-3">
                            <!-- <p>Aftercare:</p> -->
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-10">
                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_contra_action" class="chk_height_width" value="Contra Action" name="aftercare_other[]">
                            <label class="form-check-label" for="chk_contra_action">Contra-Action</label>
                        </div>

                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_skin_blemishes" class="chk_height_width" value="Skin Blemishes" name="aftercare_other[]">
                            <label class="form-check-label" for="chk_skin_blemishes">Skin Blemishes</label>
                        </div>

                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_erythema" class="chk_height_width" value="Erythema" name="aftercare_other[]">
                            <label class="form-check-label" for="chk_erythema">Erythema</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section" style="margin-top:50px !important;">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-11">
                            <p style="font-size:14px !important;">I have read the information and if I have any concern, I will address these with my therapist. I give permission to my therapist to perform the procedure we have discussed, and will not hold her or her staff liable for any adverse reactions to the treatment. I have given an accurate account of the questions asked including all known allergies or prescription drugs or products I am currently  ingesting or using topically. I understand my esthetician will take every precaution to minimise negative reactions as much as possible.</p>
                        </div>
                        <div class="col-sm-1">
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-top:30px;">
                    <div class="col-sm-10">
                        <div class="col-sm-2">
                            <label>Client Signature</label>
                        </div>
                        <div class="col-sm-4">
                            <input type="hidden" id="hdn_customer_signature" class="form-control" name="hdn_customer_signature">
                            <input type="hidden" id="hdn_plugin_url" class="form-control" name="hdn_plugin_url" value="<?=SC_PLUGIN_DIR_URL?>">
                            <canvas id="customer_signature" name= "customer_signature" width="320" height="160"></canvas>
                        </div>
                        <div class="col-sm-1">
                            <label style="text-align: right;">Date</label>
                        </div>
                        <div class="col-sm-2">
                            <input type="date" id="customer_signature_date" class="form-control" name="customer_signature_date">
                        </div>
                        <div class="col-sm-1">
                        </div>
                    </div> 
                </div>
<!--                <div class="row" style="margin-top:30px;">
                    <div class="col-sm-10">
                        <div class="col-sm-2">
                            <label>Therapist Signature</label>
                        </div>
                        <div class="col-sm-4">
                            <input type="hidden" id="hdn_therapist_signature" class="form-control" name="hdn_therapist_signature">
                            <canvas id="therapist_signature" name= "therapist_signature" width="320" height="160"></canvas>
                        </div>
                        <div class="col-sm-1">
                            <label style="text-align: right;">Date</label>
                        </div>
                        <div class="col-sm-2">
                            <input type="date" id="therapist_signature_date" class="form-control" name="therapist_signature_date">
                        </div>
                        <div class="col-sm-1">
                        </div>
                    </div> 
                </div>-->
                <div class="row" style="margin-top: 10px;">
                    <div class="col-sm-10">
                        <div class="col-sm-7">
                        </div>
                        <div class="col-sm-1">
                            <button type="submit" name="other_btn_save" id="other_btn_save" class="btn btn-primary" style="margin-left: -25px;" value="submit" >Save Data</button>
                        </div>
                        <div class="col-sm-1">
                            <button class="btn btn-default" id="btn_cancel" name="btn_cancel">Cancel</button>
                        </div>
                        <!-- <button class="btn btn-primary" id="sig-submitBtn">Submit Signature</button>
                        <button class="btn btn-default" id="sig-clearBtn">Clear Signature</button> -->
                    </div>    
                </div>

            </div>
        </form>
    </body>
</html>