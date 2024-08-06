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
            margin-top: 10px !important;
            border-radius:10px;
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
			 @media only screen and (min-width: 993px) and (max-width: 1470px) {
			 .clear-btn {
    			position: absolute;
    			bottom: 10px;
    			right: -135px !important;
			}
			   .difference-two-label{
        		margin-top:10px !important;
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
		  	@media only screen and (min-width: 993px) {
			 .clear-btn {
    			position: absolute;
    			bottom: 10px;
    			right: -135px !important;
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
        }
        </style>
    </head>
    <body>
        <div class="section">
            <div class="col-sm-12" style="margin-top:10px;background:black;border-top-right-radius: 10px;border-top-left-radius: 10px;">
                <div class="col-sm-3">
                    <img src="<?php echo esc_url( plugins_url( 'brow.png', dirname(__FILE__) ) ); ?>" height="50" width="100" style="margin-top:10px">
                </div>
                <div class="col-sm-4" style="color:white;">
                    <h3 style="text-align:center;">Manicure / Pedicure</h3>
                </div>
                <div class="col-sm-4" style="color:white;margin-top:15px;">
                    <h4 style="text-align:right;">Visit No.:  <?= (isset($_SESSION['visit_no'])) ? $_SESSION['visit_no'] : ''; ?></h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="col-sm-3">
                    <h3 style="font-weight:700 !important;"><?php echo (isset($_SESSION['customer_name'])) ? $_SESSION['customer_name'] : ''; ?></h3>
                </div>
            </div>
        </div>
        <form action="" method="post" onsubmit="return data_protection_policy();">
            <input type="hidden" id="hdn_plugin_url" class="form-control" name="hdn_plugin_url" value="<?= SC_PLUGIN_DIR_URL ?>">
            <div class="section form-group">
                <div class="row section-title">
                    <div class="col-sm-12">
                        <div class="col-sm-3" style="margin-top:20px !important">
                            <p>Contra - Indications:</p>
                        </div>
                    </div>
                </div>
                <div class="row container-checkbox">
                    <div class="col-sm-10">
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label class="chk_height_width" for="chk_eczema">Eczema
                            <input type="checkbox" id="chk_eczema" class="" value="Eczema" name="contra_indications[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label for="chk_onychomycosis" class="chk_height_width">Onychomycosis
                            <input type="checkbox" id="chk_onychomycosis"  value="Onychomycosis" name="contra_indications[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label for="chk_allergic_reactions" class="chk_height_width">Allergic Reactions
                            <input type="checkbox" id="chk_allergic_reactions"  value="Allergic Reactions" name="contra_indications[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                            <label for="chk_open_wounds" class="chk_height_width">Open Wounds
                            <input type="checkbox" id="chk_open_wounds"  value="Open Wounds" name="contra_indications[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                            <label for="chk_psofiasis" class="chk_height_width">Psofiasis
                            <input type = "checkbox" id="chk_psofiasis"  value="Psofiasis" name="contra_indications[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                            <label for="chk_pseudomonas" class="chk_height_width">Pseudomonas
                            <input type = "checkbox" id="chk_pseudomonas"  value="Pseudomonas" name="contra_indications[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row container-checkbox" style="margin-top:10px;">
                    <div class="col-sm-10">
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label for="chk_irritated_skin" class="chk_height_width">Irritated Skin
                            <input type = "checkbox" id="chk_irritated_skin"  value="Irritated Skin" name="contra_indications[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label for="chk_cuts_abrasions" class="chk_height_width">Cuts / Abrasions
                            <input type = "checkbox" id="chk_cuts_abrasions"  value="Cuts / Abrasions" name="contra_indications[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label for="chk_bitten_nails" class="chk_height_width">Bitten Nails
                            <input type = "checkbox" id="chk_bitten_nails"  value="Bitten Nails" name="contra_indications[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                            <label for="chk_paranychias" class="chk_height_width">Paranychias
                            <input type = "checkbox" id="chk_paranychias"  value="Paranychias" name="contra_indications[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                            <label for="chk_itchy_skin" class="chk_height_width">Itchy Skin
                            <input type = "checkbox" id="chk_itchy_skin"  value="Itchy Skin" name="contra_indications[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                            <label for="chk_onycholysis" class="chk_height_width">Onycholysis
                            <input type = "checkbox" id="chk_onycholysis"  value="Onycholysis" name="contra_indications[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row container-checkbox" style="margin-top:10px;">
                    <div class="col-sm-10">
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label for="chk_skin_infections" class="chk_height_width"> Skin Infections
                            <input type = "checkbox" id="chk_skin_infections"  value="Skin Infections" name="contra_indications[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label for="chk_onychia" class="chk_height_width">Onychia
                            <input type = "checkbox" id="chk_onychia"  value="Onychia" name="contra_indications[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label for="chk_sore_skin_tissue" class="chk_height_width">Sore Skin Tissue
                            <input type = "checkbox" id="chk_sore_skin_tissue"  value="Sore Skin Tissue" name="contra_indications[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                            <label for="chk_onychocryptosis" class="chk_height_width">Onychocryptosis
                            <input type = "checkbox" id="chk_onychocryptosis"  value="Onychocryptosis" name="contra_indications[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                            <label for="chk_nail_infections" class="chk_height_width">Nail Infections
                            <input type = "checkbox" id="chk_nail_infections"  value="Nail Infections" name="contra_indications[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                            <label for="chk_verucca_vulgaris" class="chk_height_width">Verucca Vulgaris
                            <input type = "checkbox" id="chk_verucca_vulgaris"  value="Verucca Vulgaris" name="contra_indications[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row container-checkbox" style="margin-top:10px;">
                    <div class="col-sm-10">
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label for="chk_white_patchy_nails" class="chk_height_width">White Patchy Nails
                            <input type = "checkbox" id="chk_white_patchy_nails"  value="White Patchy Nails" name="contra_indications[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label for="chk_bruised_nails" class="chk_height_width">Bruised Nails
                            <input type = "checkbox" id="chk_bruised_nails" c value="Bruised Nails" name="contra_indications[]">
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
                            <p>Range 1</p>
                        </div>
                    </div>
                </div>
                <div class="row last-div-padding">
                    <div class="col-sm-10">
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label for="chk_questioning" class="chk_height_width">Questioning
                            <input type="checkbox" id="chk_questioning"  value="Questioning" name="range_1[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label for="chk_visual" class="chk_height_width">Visual
                            <input type="checkbox" id="chk_visual"  value="Visual" name="range_1[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label for="chk_manual" class="chk_height_width">Manual
                            <input type="checkbox" id="chk_manual"  value="Manual" name="range_1[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                            <label for="chk_ref_client_record" class="chk_height_width">Ref. Client Record
                            <input type="checkbox" id="chk_ref_client_record"  value="Ref. Client Record" name="range_1[]">
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
                            <p>Range 2</p>
                        </div>
                    </div>
                </div>
                <div class="row last-div-padding">
                    <div class="col-sm-10 col-md-10">
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label for="chk_file_and_polish" class="chk_height_width">File and Polish
                            <input type = "checkbox" id="chk_file_and_polish"  value="File and Polish" name="range_2[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label for="chk_mini_madicure_padicure" class="chk_height_width">Mini Manicure / Padicure
                            <input type = "checkbox" id="chk_mini_madicure_padicure"  value="Mini Manicure / Padicure" name="range_2[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label for="chk_spa_manicure_padicure" class="chk_height_width">Spa Manicure / Padicure
                            <input type = "checkbox" id="chk_spa_manicure_padicure"  value="Spa Manicure / Padicure" name="range_2[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-3 col-md-4 difference-two-label">
                            <label for="chk_parrafin_mask_manicure_padicure" class="chk_height_width">Parrafin mask Manicure / Padicure
                            <input type = "checkbox" id="chk_parrafin_mask_manicure_padicure"  value="Parrafin mask Manicure / Padicure" name="range_2[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-3 col-md-4 difference-two-label">
                            <label for="chk_brow_art_signature_padicure" class="chk_height_width">Brow art signature padicure
                            <input type = "checkbox" id="chk_brow_art_signature_padicure"  value="Brow art signature padicure" name="range_2[]">
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
                            <p>Range 3</p>
                        </div>
                    </div>
                </div>
                <div class="row last-div-padding">
                    <div class="col-sm-10">
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label for="chk_parafin_wax" class="chk_height_width">Parafin Wax
                            <input type = "checkbox" id="chk_parafin_wax"  value="Parafin Wax" name="range_3[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label for="chk_hand_mask" class="chk_height_width">Hand Mask
                            <input type = "checkbox" id="chk_hand_mask"  value="Hand Mask" name="range_3[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label for="chk_thermal_mitts" class="chk_height_width">Thermal Mitts
                            <input type = "checkbox" id="chk_thermal_mitts"  value="Thermal Mitts" name="range_3[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                            <label for="chk_extoliate" class="chk_height_width">Extoliate
                            <input type = "checkbox" id="chk_extoliate"  value="Extoliate" name="range_3[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                            <label for="chk_warm_oil" class="chk_height_width">Warm Oil
                            <input type = "checkbox" id="chk_warm_oil"  value="Warm Oil" name="range_3[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section last-div-padding container-checkbox ">
                <div class="row section-title">
                    <div class="col-sm-12">
                        <div class="col-sm-3" style="margin-top:20px !important">
                            <p>Range 4</p>
                        </div>
                    </div>
                </div>
                <div class="row last-div-padding">
                    <div class="col-sm-10">
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label for="chk_dark_colour" class="chk_height_width">Dark Colour
                            <input type = "checkbox" id="chk_dark_colour"  value="Dark Colour" name="range_4[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label for="chk_french" class="chk_height_width">French
                            <input type = "checkbox" id="chk_french"  value="French" name="range_4[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label for="chk_buuffed" class="chk_height_width">Buuffed
                            <input type = "checkbox" id="chk_buuffed" value="Buuffed" name="range_4[]">
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
                            <p>Skin & Nail Analysis:</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10">
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label for="chk_dry_nail" class="chk_height_width">Dry Nail
                            <input type = "checkbox" id="chk_dry_nail"  value="Dry Nail" name="skin_nail_analysis[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label for="chk_strong" class="chk_height_width">Strong
                            <input type = "checkbox" id="chk_strong" value="Strong" name="skin_nail_analysis[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label for="chk_foot_hand_cream" class="chk_height_width">Foot / Hand Cream
                            <input type = "checkbox" id="chk_foot_hand_cream"  value="Foot / Hand Cream" name="skin_nail_analysis[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                            <label for="chk_effeurage" class="chk_height_width">Effeurage
                            <input type = "checkbox" id="chk_effeurage"  value="Effeurage" name="skin_nail_analysis[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                            <label for="chk_week_bitten" class="chk_height_width">Weak & Bitten
                            <input type = "checkbox" id="chk_week_bitten"  value="Weak & Bitten" name="skin_nail_analysis[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                            <label for="chk_brittle" class="chk_height_width">Brittle
                            <input type = "checkbox" id="chk_brittle"  value="Brittle" name="skin_nail_analysis[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top:10px;">
                    <div class="col-sm-10">
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label for="chk_oil" class="chk_height_width" >Oil
                            <input type = "checkbox" id="chk_oil" value="Oil" name="skin_nail_analysis[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label for="chk_topotement" class="chk_height_width">Topotement
                            <input type = "checkbox" id="chk_topotement"  value="Topotement" name="skin_nail_analysis[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label for="chk_dry_cuticles" class="chk_height_width">Dry Cuticles
                            <input type = "checkbox" id="chk_dry_cuticles"  value="Dry Cuticles" name="skin_nail_analysis[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                            <label for="chk_ridge_furrows" class="chk_height_width">Ridge & Furrows
                            <input type = "checkbox" id="chk_ridge_furrows"  value="Ridge & Furrows" name="skin_nail_analysis[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                            <label for="chk_cream" class="chk_height_width" >Cream
                            <input type = "checkbox" id="chk_cream" value="Cream" name="skin_nail_analysis[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                            <label for="chk_petrissoge" class="chk_height_width">Petrissoge
                            <input type = "checkbox" id="chk_petrissoge"  value="Petrissoge" name="skin_nail_analysis[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                </div>
                <diV class="row" style="margin-top:10px;">
                    <div class="col-sm-10">
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label for="chk_split" class="chk_height_width">Split
                            <input type = "checkbox" id="chk_split" value="Split" name="skin_nail_analysis[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label for="chk_hangnails" class="chk_height_width">Hangnails
                            <input type = "checkbox" id="chk_hangnails" value="Hangnails" name="skin_nail_analysis[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label for="chk_hard_skin" class="chk_height_width">Hard Skin
                            <input type = "checkbox" id="chk_hard_skin" value="Hard Skin" name="skin_nail_analysis[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                            <label for="chk_friction" class="chk_height_width">Friction
                            <input type = "checkbox" id="chk_friction"  value="Friction" name="skin_nail_analysis[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                            <label class="last-div-padding chk_height_width" for="chk_overgrown_cuticles">Overgrown Cuticles
                            <input type = "checkbox" id="chk_overgrown_cuticles" value="Overgrown Cuticles" name="skin_nail_analysis[]">
                            <span class="checkmark"></span>
                            </label>
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
            <div class="section last-div-padding container-checkbox">
                <div class="row section-title">
                    <div class="col-sm-12">
                        <div class="col-sm-3" style="margin-top:20px !important">
                            <p>Future Treatments:</p>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-sm-10">
                        <div class="col-sm-4 col-lg-3 col-md-4">
                            <label for="chk_specialised_manicure_pedicure" class="chk_height_width">Specialised Manicure / Pedicure
                            <input type="checkbox" id="chk_specialised_manicure_pedicure"  value="Specialised Manicure / Pedicure" name="future_treatments[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-3 col-md-4">
                            <label for="chk_improve_nail_condition" class="chk_height_width">Improve Nail Condition
                            <input type="checkbox" id="chk_improve_nail_condition"  value="Improve Nail Condition" name="future_treatments[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-3 col-md-4">
                            <label for="chk_improve_skin_condition" class="chk_height_width">Improve Skin Condition
                            <input type="checkbox" id="chk_improve_skin_condition"  value="Improve Skin Condition" name="future_treatments[]">
                            <span class="checkmark"></span>
                            </label>
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
         <div style="margin-top:10px !important;">
            <div class="row">
                <div class="col-sm-12">
                    <div class="col-sm-6">
                        <label class="form-check-label chk_height_width container-checkbox" for="chk_data_protection_policy">
                            Agree <a href="#" id="termsLink" data-toggle="modal" data-target="#termsModal">Data Protection Policy</a>
                            <input type="checkbox" id="chk_data_protection_policy" class="" value="checked" name="chk_data_protection_policy">
                            <span class="checkmark"></span>
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
                        <button type="submit" name="other_btn_save" id="other_btn_save" class="btn btn-primary btn_class" style="margin-left: -40px;" value="submit" >Save & Continue</button>
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>