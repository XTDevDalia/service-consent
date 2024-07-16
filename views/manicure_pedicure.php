<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Manicure / Padicure Form</title>
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
                <div class="col-sm-3"><h4 style="font-weight: 600;">Manicure / Pedicure</h4></div>
                <div class="col-sm-3"></div>
                <div class="col-sm-3"></div>
                <div class="col-sm-3">
                    <p class="textalign">No.: <?= (isset($_SESSION['customer_no'])) ? $_SESSION['customer_no'] : ''; ?></p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="col-sm-1">
                    <p class="textalign">Name</p>
                </div>
                <div class="col-sm-3">
                    <?php echo (isset($_SESSION['customer_name'])) ? $_SESSION['customer_name'] : ''; ?>
                </div>
            </div>
        </div>
        <form action="" method="post" >
        <input type="hidden" id="hdn_plugin_url" class="form-control" name="hdn_plugin_url" value="<?= SC_PLUGIN_DIR_URL ?>">
            <div class="section">
                <div class="row section-title">
                    <div class="col-sm-12">
                        <div class="col-sm-3" style="margin-top:20px !important">
                            <p>Contra - Indications:</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-10">
                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type="checkbox" id="chk_eczema" class="chk_height_width" value="Eczema" name="contra_indications[]">
                            <label for="chk_eczema">Eczema</label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type="checkbox" id="chk_onychomycosis" class="chk_height_width" value="Onychomycosis" name="contra_indications[]">
                            <label for="chk_onychomycosis">Onychomycosis</label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type="checkbox" id="chk_allergic_reactions" class="chk_height_width" value="Allergic Reactions" name="contra_indications[]">
                            <label for="chk_allergic_reactions">Allergic Reactions</label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type="checkbox" id="chk_open_wounds" class="chk_height_width" value="Open Wounds" name="contra_indications[]">
                            <label for="chk_open_wounds">Open Wounds</label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_psofiasis" class="chk_height_width" value="Psofiasis" name="contra_indications[]">
                            <label for="chk_psofiasis">Psofiasis</label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_pseudomonas" class="chk_height_width" value="Pseudomonas" name="contra_indications[]">
                            <label for="chk_pseudomonas">Pseudomonas</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-10">
                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_irritated_skin" class="chk_height_width" value="Irritated Skin" name="contra_indications[]">
                            <label for="chk_irritated_skin">Irritated Skin</label>
                        </div>

                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_cuts_abrasions" class="chk_height_width" value="Cuts / Abrasions" name="contra_indications[]">
                            <label for="chk_cuts_abrasions">Cuts / Abrasions</label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_bitten_nails" class="chk_height_width" value="Bitten Nails" name="contra_indications[]">
                            <label for="chk_bitten_nails">Bitten Nails</label>
                        </div>

                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_paranychias" class="chk_height_width" value="Paranychias" name="contra_indications[]">
                            <label for="chk_paranychias">Paranychias</label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_itchy_skin" class="chk_height_width" value="Itchy Skin" name="contra_indications[]">
                            <label for="chk_itchy_skin">Itchy Skin</label>
                        </div>

                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_onycholysis" class="chk_height_width" value="Onycholysis" name="contra_indications[]">
                            <label for="chk_onycholysis">Onycholysis</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-10">

                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_skin_infections" class="chk_height_width" value="Skin Infections" name="contra_indications[]">
                            <label for="chk_skin_infections">Skin Infections</label>
                        </div>

                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_onychia" class="chk_height_width" value="Onychia" name="contra_indications[]">
                            <label for="chk_onychia">Onychia</label>
                        </div>

                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_sore_skin_tissue" class="chk_height_width" value="Sore Skin Tissue" name="contra_indications[]">
                            <label for="chk_sore_skin_tissue">Sore Skin Tissue</label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_onychocryptosis" class="chk_height_width" value="Onychocryptosis" name="contra_indications[]">
                            <label for="chk_onychocryptosis">Onychocryptosis</label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_nail_infections" class="chk_height_width" value="Nail Infections" name="contra_indications[]">
                            <label for="chk_nail_infections">Nail Infections</label>
                        </div>

                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_verucca_vulgaris" class="chk_height_width" value="Verucca Vulgaris" name="contra_indications[]">
                            <label for="chk_verucca_vulgaris">Verucca Vulgaris</label>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-10">
                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_white_patchy_nails" class="chk_height_width" value="White Patchy Nails" name="contra_indications[]">
                            <label for="chk_white_patchy_nails">White Patchy Nails</label>
                        </div>

                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_bruised_nails" class="chk_height_width" value="Bruised Nails" name="contra_indications[]">
                            <label for="chk_bruised_nails">Bruised Nails</label>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Repeat similar structure for other contra-indications -->
            <div class="section">
                <div class="row section-title">
                    <div class="col-sm-12">
                        <div class="col-sm-3" style="margin-top:20px !important">
                            <p>Range 1</p>
                        </div>
                    </div>
                </div>

                <div class="row last-div-padding">
                    <div class="col-sm-10">
                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type="checkbox" id="chk_questioning" class="chk_height_width" value="Questioning" name="range_1[]">
                            <label for="chk_questioning">Questioning</label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type="checkbox" id="chk_visual" class="chk_height_width" value="Visual" name="range_1[]">
                            <label for="chk_visual">Visual</label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type="checkbox" id="chk_manual" class="chk_height_width" value="Manual" name="range_1[]">
                            <label for="chk_manual">Manual</label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type="checkbox" id="chk_ref_client_record" class="chk_height_width" value="Ref. Client Record" name="range_1[]">
                            <label for="chk_ref_client_record">Ref. Client Record</label>
                        </div>

                    </div>
                </div>
            </div>
            <div class="section">
                <div class="row section-title">
                    <div class="col-sm-12">
                        <div class="col-sm-3" style="margin-top:20px !important">
                            <p>Range 2</p>
                        </div>
                    </div>
                </div>

                <div class="row last-div-padding">
                    <div class="col-sm-12 col-md-12">
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <input type = "checkbox" id="chk_file_and_polish" class="chk_height_width" value="File and Polish" name="range_2[]">
                            <label for="chk_file_and_polish">File and Polish</label>
                        </div>

                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <input type = "checkbox" id="chk_mini_madicure_padicure" class="chk_height_width" value="Mini Manicure / Padicure" name="range_2[]">
                            <label for="chk_mini_madicure_padicure">Mini Manicure / Padicure</label>
                        </div>

                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <input type = "checkbox" id="chk_spa_manicure_padicure" class="chk_height_width" value="Spa Manicure / Padicure" name="range_2[]">
                            <label for="chk_spa_manicure_padicure">Spa Manicure / Padicure</label>
                        </div>
                        <div class="col-sm-4 col-lg-3 col-md-4">
                            <input type = "checkbox" id="chk_parrafin_mask_manicure_padicure" class="chk_height_width" value="Parrafin mask Manicure / Padicure" name="range_2[]">
                            <label for="chk_parrafin_mask_manicure_padicure">Parrafin mask Manicure / Padicure</label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <input type = "checkbox" id="chk_brow_art_signature_padicure" class="chk_height_width" value="Brow art signature padicure" name="range_2[]">
                            <label for="chk_brow_art_signature_padicure">Brow art signature padicure</label>
                        </div>

                    </div>
                </div>
            </div>
            <div class="section">
                <div class="row section-title">
                    <div class="col-sm-12">
                        <div class="col-sm-3" style="margin-top:20px !important">
                            <p>Range 3</p>
                        </div>
                    </div>
                </div>

                <div class="row last-div-padding">
                    <div class="col-sm-10">
                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_parafin_wax" class="chk_height_width" value="Parafin Wax" name="range_3[]">
                            <label for="chk_parafin_wax">Parafin Wax</label>
                        </div>

                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_hand_mask" class="chk_height_width" value="Hand Mask" name="range_3[]">
                            <label for="chk_hand_mask">Hand Mask</label>
                        </div>

                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_thermal_mitts" class="chk_height_width" value="Thermal Mitts" name="range_3[]">
                            <label for="chk_thermal_mitts">Thermal Mitts</label>
                        </div>

                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_extoliate" class="chk_height_width" value="Extoliate" name="range_3[]">
                            <label for="chk_extoliate">Extoliate</label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_warm_oil" class="chk_height_width" value="Warm Oil" name="range_3[]">
                            <label for="chk_warm_oil">Warm Oil</label>
                        </div>

                    </div>
                </div>
            </div>
            <div class="section last-div-padding">
                <div class="row section-title">
                    <div class="col-sm-12">
                        <div class="col-sm-3" style="margin-top:20px !important">
                            <p>Range 4</p>
                        </div>
                    </div>
                </div>

                <div class="row last-div-padding">
                    <div class="col-sm-10">
                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_dark_colour" class="chk_height_width" value="Dark Colour" name="range_4[]">
                            <label for="chk_dark_colour">Dark Colour</label>
                        </div>

                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_french" class="chk_height_width" value="French" name="range_4[]">
                            <label for="chk_french">French</label>
                        </div>

                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_buuffed" class="chk_height_width" value="Buuffed" name="range_4[]">
                            <label for="chk_buuffed">Buuffed</label>
                        </div>


                    </div>
                </div>
            </div>
            <div class="section">
                <div class="row section-title">
                    <div class="col-sm-12">
                        <div class="col-sm-3" style="margin-top:20px !important">
                            <p>Skin & Nail Analysis:</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-10">
                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_dry_nail" class="chk_height_width" value="Dry Nail" name="skin_nail_analysis[]">
                            <label for="chk_dry_nail">Dry Nail</label>
                        </div>

                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_strong" class="chk_height_width" value="Strong" name="skin_nail_analysis[]">
                            <label for="chk_strong">Strong</label>
                        </div>

                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_foot_hand_cream" class="chk_height_width" value="Foot / Hand Cream" name="skin_nail_analysis[]">
                            <label for="chk_foot_hand_cream">Foot / Hand Cream</label>
                        </div>

                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_effeurage" class="chk_height_width" value="Effeurage" name="skin_nail_analysis[]">
                            <label for="chk_effeurage">Effeurage</label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_week_bitten" class="chk_height_width" value="Weak & Bitten" name="skin_nail_analysis[]">
                            <label for="chk_week_bitten">Weak & Bitten</label>
                        </div>

                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_brittle" class="chk_height_width" value="Brittle" name="skin_nail_analysis[]">
                            <label for="chk_brittle">Brittle</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-10">
                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_oil" class="chk_height_width" value="Oil" name="skin_nail_analysis[]">
                            <label for="chk_oil">Oil</label>
                        </div>

                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_topotement" class="chk_height_width" value="Topotement" name="skin_nail_analysis[]">
                            <label for="chk_topotement">Topotement</label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_dry_cuticles" class="chk_height_width" value="Dry Cuticles" name="skin_nail_analysis[]">
                            <label for="chk_dry_cuticles">Dry Cuticles</label>
                        </div>

                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_ridge_furrows" class="chk_height_width" value="Ridge & Furrows" name="skin_nail_analysis[]">
                            <label for="chk_ridge_furrows">Ridge & Furrows</label>
                        </div>

                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_cream" class="chk_height_width" value="Cream" name="skin_nail_analysis[]">
                            <label for="chk_cream">Cream</label>
                        </div>

                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_petrissoge" class="chk_height_width" value="Petrissoge" name="skin_nail_analysis[]">
                            <label for="chk_petrissoge">Petrissoge</label>
                        </div>
                    </div>
                </div>

                <diV class="row">
                    <div class="col-sm-10">
                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_split" class="chk_height_width" value="Split" name="skin_nail_analysis[]">
                            <label for="chk_split">Split</label>
                        </div>

                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_hangnails" class="chk_height_width" value="Hangnails" name="skin_nail_analysis[]">
                            <label for="chk_hangnails">Hangnails</label>
                        </div>

                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_hard_skin" class="chk_height_width" value="Hard Skin" name="skin_nail_analysis[]">
                            <label for="chk_hard_skin">Hard Skin</label>
                        </div>

                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_friction" class="chk_height_width" value="Friction" name="skin_nail_analysis[]">

                            <label for="chk_friction">Friction</label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-3">
                            <input type = "checkbox" id="chk_overgrown_cuticles" class="chk_height_width" value="Overgrown Cuticles" name="skin_nail_analysis[]">
                            <label class="last-div-padding" for="chk_overgrown_cuticles">Overgrown Cuticles</label>
                        </div>
                    </div>
                </diV>
            </div>


            <div class="section last-div-padding">
                <div class="row section-title">
                    <div class="col-sm-12">
                        <div class="col-sm-3" style="margin-top:20px !important">
                            <p>Aftercare Advice:</p>
                        </div>
                        <div class="col-sm-9">
                        </div>
                    </div>
                </div>
                <textarea cols="150" rows="10" class="form-control"></textarea>
            </div>

            <div class="section last-div-padding">
                <div class="row section-title">
                    <div class="col-sm-12">
                        <div class="col-sm-3" style="margin-top:20px !important">
                            <p>Future Treatments:</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-10">
                        <div class="col-sm-4 col-lg-3 col-md-3">
                            <input type="checkbox" id="chk_specialised_manicure_pedicure" class="chk_height_width" value="Specialised Manicure / Pedicure" name="future_treatments[]">
                            <label for="chk_specialised_manicure_pedicure">Specialised Manicure / Pedicure</label>
                        </div>
                        <div class="col-sm-4 col-lg-3 col-md-3">
                            <input type="checkbox" id="chk_improve_nail_condition" class="chk_height_width" value="Improve Nail Condition" name="future_treatments[]">
                            <label for="chk_improve_nail_condition">Improve Nail Condition</label>
                        </div>
                        <div class="col-sm-4 col-lg-3 col-md-3">
                            <input type="checkbox" id="chk_improve_skin_condition" class="chk_height_width" value="Improve Skin Condition" name="future_treatments[]">
                            <label for="chk_improve_skin_condition">Improve Skin Condition</label>
                        </div>

                    </div>
                </div>
            </div>


            <div class="row" style="margin-top: 20px !important;">
                <div class="col-sm-12">
                    <div class="col-sm-11">
                        <p style="font-size:14px !important;">I confirm to the best of my knowledge, that the answers I have given are correct and that I have not withheld any information that may be relevant to my treatment.</p>
                    </div>
                    <div class="col-sm-1">
                    </div>
                </div>    
            </div>


            <div class="row">
                <div class="col-sm-12">
                    <div class="col-sm-11">
                        <p style="font-size:14px !important;">I have read the information and if I have any concern, I will address these with my therapist. I give permission to my therapist to perform the procedure we have discussed, and will not hold her or her staff liable for any adverse reaction to the treatment. I have given an accurate account of the questions asked including all known allergies or prescription drugs or products I am currently ingesting or using topically. I understand my esthetician will take every precaution to minimize or eliminate negative reactions as much as possible.</p>
                    </div>
                    <div class="col-sm-1">
                    </div>
                </div>
            </div>
            <div class="section">
                <div class="row" style="margin-top:30px;padding:20px 0px;">
                    <div class="col-sm-11">
                        <div class="col-sm-2">
                            <label>Client Signature</label>
                        </div>
                        <div class="col-sm-5">
                            <input type="hidden" id="hdn_customer_signature" class="form-control" name="hdn_customer_signature">
                            <canvas id="customer_signature" name= "customer_signature" width="500" height="160"></canvas>
                        </div>
                        <div class="col-sm-1">
                            <button class="btn btn-default" id="btn_customer_cancel" name="btn_customer_cancel">Clear</button>
                        </div>
                        <div class="col-sm-1">
                            <label style="text-align: right;">Date</label>
                        </div>
                        <div class="col-sm-2">
                            <input type="date" id="customer_signature_date" class="form-control" name="customer_signature_date" value="<?php echo date('Y-m-d'); ?>">
                        </div>
                    </div> 
                </div>
            </div>
            <div class="section">
                        <div class="row" style="margin-top:30px;padding:20px 0px;">
                            <div class="col-sm-11">
                                <div class="col-sm-2">
                                    <label>Therapist Signature</label>
                                </div>
                                <div class="col-sm-5">
                                    <input type="hidden" id="hdn_therapist_signature" class="form-control" name="hdn_therapist_signature">
                                    <canvas id="therapist_signature" name= "therapist_signature" width="500" height="160"></canvas>
                                </div>
                                <div class="col-sm-1">
                                    <button class="btn btn-default" id="btn_therapist_cancel" name="btn_therapist_cancel">Clear</button>
                                </div>
                                <div class="col-sm-1">
                                    <label style="text-align: right;">Date</label>
                                </div>
                                <div class="col-sm-2">
                                    <input type="date" id="therapist_signature_date" class="form-control" name="therapist_signature_date" value="<?php echo date('Y-m-d'); ?>">
                                </div>
                            </div> 
                        </div>
            </div>
            <div class="row" style="margin-top: 10px;">
                <div class="col-sm-11">
                    <div class="col-sm-10">
                    </div>
                    <div class="col-sm-1">
                        <button type="submit" name="other_btn_save" id="other_btn_save" class="btn btn-primary" style="margin-left: -25px;" value="submit" >Save Data</button>
                    </div>
                </div>    
            </div>
        </form>
    </body>
</html>