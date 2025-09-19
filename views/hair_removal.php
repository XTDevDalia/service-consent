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
            touch-action: none !important;
            }
            #therapist_signature{
            border: 2px dotted #CCCCCC;
            border-radius: 15px;
            cursor: crosshair;
            background:white;
            touch-action: none !important;
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
				   /* right:-60px !important; */
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
    			right: -130px !important;
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
                <div class="col-sm-5" style="color:white;">
                    <h3 style="text-align:center;">Hair Removal</h3>
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
        <form method="post" name="consent_forms" id="consent_forms">
            <input type="hidden" id="hdn_plugin_url" class="form-control" name="hdn_plugin_url" value="<?= SC_PLUGIN_DIR_URL ?>">
            <div class="section form-group" style="margin-top:0px !important;border-top-left-radius: 0px !important;border-top-right-radius: 0px !important;">
                <div class="row last-div-padding bgcolor">
                    <div class="col-sm-12" style="display:flex;padding-left:30px;margin-top:10px;">
                        <p>I accept a patch test :</p>
                        <label class="container-radio center-align" style="margin-left:15px;">Yes
                            <input type="radio" id="patch_yes" name="patch_test" value="Yes">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container-radio center-align" style="margin-left:15px;">No
                            <input type="radio" id="patch_no" name="patch_test" value="No">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
                <div class="row section-title">
                    <div class="col-sm-12">
                        <div class="col-sm-3" style="margin-top:20px !important">
                            <p>Contra - Indications:</p>
                        </div>
                    </div>
                </div>
                <div class="row container-checkbox"style="padding-left:10px !important;margin-top:10px;">
                    <div class="col-sm-12">
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label class="chk_height_width center-align" for="chk_sti">STI
                            <input type="checkbox" id="chk_sti" class="" value="STI" name="contra_indications[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label for="chk_warts" class="chk_height_width center-align">Warts
                            <input type="checkbox" id="chk_warts"  value="Warts" name="contra_indications[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label for="chk_product_allergy" class="chk_height_width center-align">Product Allergy
                            <input type="checkbox" id="chk_product_allergy"  value="Product Allergy" name="contra_indications[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                            <label for="chk_heat_rash" class="chk_height_width center-align">Heat Rash
                            <input type="checkbox" id="chk_heat_rash"  value="Heat Rash" name="contra_indications[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                            <label for="chk_hairly_moels" class="chk_height_width center-align">Hairly Moels
                            <input type = "checkbox" id="chk_hairly_moels"  value="Hairly Moels" name="contra_indications[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                            <label for="chk_oedem" class="chk_height_width center-align">Oedem
                            <input type = "checkbox" id="chk_oedem"  value="Oedem" name="contra_indications[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row container-checkbox" style="margin-top:20px;padding-left:10px !important;">
                    <div class="col-sm-12">
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label for="chk_bruises" class="chk_height_width center-align">Bruises
                            <input type = "checkbox" id="chk_bruises"  value="Bruises" name="contra_indications[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label for="chk_skin_disorders" class="chk_height_width center-align">Skin Disorders
                            <input type = "checkbox" id="chk_skin_disorders"  value="Skin Disorders" name="contra_indications[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label for="chk_excessive_surface_veins" class="chk_height_width center-align">Excessive Surface Veins
                            <input type = "checkbox" id="chk_excessive_surface_veins"  value="Excessive Surface Veins" name="contra_indications[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                            <label for="chk_sunburn" class="chk_height_width center-align">Sunburn
                            <input type = "checkbox" id="chk_sunburn"  value="Sunburn" name="contra_indications[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                            <label for="chk_recent_scar_tissue" class="chk_height_width center-align">Recent Scar Tissue
                            <input type = "checkbox" id="chk_recent_scar_tissue"  value="Recent Scar Tissue" name="contra_indications[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                            <label for="chk_varicose_veins" class="chk_height_width center-align">Varicose Veins
                            <input type = "checkbox" id="chk_varicose_veins"  value="Varicose Veins" name="contra_indications[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row container-checkbox" style="margin-top:20px;padding-left:10px !important;">
                    <div class="col-sm-12">
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label for="chk_prickly_heat" class="chk_height_width center-align"> Prickly Heat
                            <input type = "checkbox" id="chk_prickly_heat"  value="Prickly Heat" name="contra_indications[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label for="chk_steroid_cream" class="chk_height_width center-align">Steroid Cream
                            <input type = "checkbox" id="chk_steroid_cream"  value="Steroid Cream" name="contra_indications[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label for="chk_derma_abrassion" class="chk_height_width center-align">Derma Abrassion
                            <input type = "checkbox" id="chk_derma_abrassion"  value="Derma Abrassion" name="contra_indications[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                            <label for="chk_skin_tag" class="chk_height_width center-align">Skin Tag
                            <input type = "checkbox" id="chk_skin_tag"  value="Skin Tag" name="contra_indications[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                            <label for="chk_cold_sores" class="chk_height_width center-align">Cold Sores
                            <input type = "checkbox" id="chk_cold_sores"  value="Cold Sores" name="contra_indications[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                            <label for="chk_infections" class="chk_height_width center-align">Infections
                            <input type = "checkbox" id="chk_infections"  value="Infections" name="contra_indications[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row container-checkbox" style="margin-top:20px;padding-left:10px !important;margin-bottom:10px;">
                    <div class="col-sm-12">
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label for="chk_self_tan" class="chk_height_width center-align">Self Tan
                            <input type = "checkbox" id="chk_self_tan"  value="Self Tan" name="contra_indications[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label for="chk_undiagnosed_lumps" class="chk_height_width center-align">Undiagnosed Lumps
                            <input type = "checkbox" id="chk_undiagnosed_lumps" value="Undiagnosed Lumps" name="contra_indications[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label for="chk_blood_disorders" class="chk_height_width center-align">Blood Disorders
                            <input type = "checkbox" id="chk_blood_disorders" value="Blood Disorders" name="contra_indications[]">
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
                <div class="row last-div-padding" style="padding-left:10px !important;margin-top:10px;margin-bottom:10px;">
                    <div class="col-sm-12">
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label for="chk_questioning" class="chk_height_width center-align">Questioning
                            <input type="checkbox" id="chk_questioning"  value="Questioning" name="range_1[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label for="chk_visual" class="chk_height_width center-align">Visual
                            <input type="checkbox" id="chk_visual"  value="Visual" name="range_1[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label for="chk_manual" class="chk_height_width center-align">Manual
                            <input type="checkbox" id="chk_manual"  value="Manual" name="range_1[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                            <label for="chk_ref_client_record" class="chk_height_width center-align">Ref. Client Record
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
                <div class="row last-div-padding" style="padding-left:10px !important;margin-top:10px;margin-bottom:10px;">
                    <div class="col-sm-12 col-md-12">
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label for="chk_full_arms" class="chk_height_width center-align">Full Arms
                            <input type = "checkbox" id="chk_full_arms"  value="Full Arms" name="range_2[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label for="chk_half_arms" class="chk_height_width center-align">Half Arms
                            <input type = "checkbox" id="chk_half_arms"  value="Half Arms" name="range_2[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label for="chk_underarms" class="chk_height_width center-align">Underarms
                            <input type = "checkbox" id="chk_underarms"  value="Underarms" name="range_2[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                            <label for="chk_full_legs" class="chk_height_width center-align">Full Legs
                            <input type = "checkbox" id="chk_full_legs"  value="Full Legs" name="range_2[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                            <label for="chk_half_legs" class="chk_height_width center-align">Half Legs
                            <input type = "checkbox" id="chk_half_legs"  value="Half Legs" name="range_2[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                            <label for="chk_full_back" class="chk_height_width center-align">Full Back
                            <input type = "checkbox" id="chk_full_back"  value="Full Back" name="range_2[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    
                </div>
                <div class="row last-div-padding" style="padding-left:10px !important;margin-top:10px;margin-bottom:10px;">
                    <div class="col-sm-12 col-md-12">
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label for="chk_full_chest" class="chk_height_width center-align">Full Chest
                            <input type = "checkbox" id="chk_full_chest"  value="Full chest" name="range_2[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label for="chk_full_stomach" class="chk_height_width center-align">Full Stomach
                            <input type = "checkbox" id="chk_full_stomach"  value="Full Stomach" name="range_2[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label for="chk_bikini_line" class="chk_height_width center-align">Bikini Line
                            <input type = "checkbox" id="chk_bikini_line"  value="Bikini Line" name="range_2[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                            <label for="chk_buttock" class="chk_height_width center-align">Buttock
                            <input type = "checkbox" id="chk_buttock"  value="Buttock" name="range_2[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                            <label for="chk_brazillian_wax" class="chk_height_width center-align">Brazillian Wax
                            <input type = "checkbox" id="chk_brazillian_wax"  value="Brazillian Wax" name="range_2[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                            <label for="chk_hollywood_wax" class="chk_height_width center-align">Hollywood Wax
                            <input type = "checkbox" id="chk_hollywood_wax"  value="Hollywood Wax" name="range_2[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    
                </div>
                                <div class="row last-div-padding" style="padding-left:10px !important;margin-top:10px;margin-bottom:10px;">
                    <div class="col-sm-12 col-md-12">
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label for="chk_full_body_wax" class="chk_height_width center-align">Full Body Wax
                            <input type = "checkbox" id="chk_full_body_wax"  value="Full Body Wax" name="range_2[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label for="chk_full_face" class="chk_height_width center-align">Full Face
                            <input type = "checkbox" id="chk_full_face"  value="Full Face" name="range_2[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label for="chk_nose_Wax" class="chk_height_width center-align">Nose Wax
                            <input type = "checkbox" id="chk_nose_Wax"  value="Nose Wax" name="range_2[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                            <label for="chk_eyebrow_wax" class="chk_height_width center-align">Eyebrow Wax
                            <input type = "checkbox" id="chk_eyebrow_wax"  value="Eyebrow Wax" name="range_2[]">
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
                <div class="row last-div-padding" style="padding-left:10px !important;margin-top:10px;margin-bottom:10px;">
                    <div class="col-sm-12">
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label for="chk_seek_gp_advice" class="chk_height_width center-align">Seek GP Advice
                            <input type = "checkbox" id="chk_seek_gp_advice"  value="Seek GP Advice" name="range_3[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-4 col-md-4">
                            <label for="chk_explain_why_service_cannot_be_carried" class="chk_height_width center-align">Explain Why Service Cannot Be Carried
                            <input type = "checkbox" id="chk_explain_why_service_cannot_be_carried"  value="Explain Why Service Cannot Be Carried" name="range_3[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label for="chk_modify" class="chk_height_width center-align">Modify
                            <input type = "checkbox" id="chk_modify"  value="Modify" name="range_3[]">
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
                <div class="row last-div-padding" style="padding-left:10px !important;margin-top:10px;margin-bottom:10px;">
                    <div class="col-sm-12">
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label for="chk_dark_colour" class="chk_height_width center-align">Treatment Type:
                            <!-- <input type = "checkbox" id="chk_dark_colour"  value="Dark Colour" name="range_4[]">
                            <span class="checkmark"></span> -->
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label for="chk_warm_wax" class="chk_height_width center-align">Warm Wax
                            <input type = "checkbox" id="chk_warm_wax"  value="Warm Wax" name="range_4[]">
                            <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-sm-4 col-lg-2 col-md-4">
                            <label for="chk_hot_wax" class="chk_height_width center-align">Hot Wax
                            <input type = "checkbox" id="chk_hot_wax" value="Hot Wax" name="range_4[]">
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
                            <p>Aftercare Advice:</p>
                        </div>
                        <div class="col-sm-9">
                        </div>
                    </div>
                </div>
                <textarea cols="150" rows="10" class="form-control" style="margin-bottom:10px;width:98%;margin-left:13px;"></textarea>
            </div>
            <div class="row" style="margin-top: 20px !important;">
                <div class="col-sm-12">
                    <div class="col-sm-11">
                        <p style="font-size:14px !important;">I confirm to the best of my knowledge, that the answers I have given are correct and that I have not withheld any information that may be relevant to my treatment.</p>
                    </div>
                </div>
            </div>
            <div style="margin-top:10px !important;">
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
                        <button type="submit" name="other_btn_save" id="other_btn_save" class="btn btn-primary btn_class" style="margin-left: -40px;" value="submit" >Save & Continue</button>
                    </div>
                </div>
            </div>
        </form>
    </body>
    <script>
        var sign_file_path = $('#hdn_plugin_url').val();
        fetchjsondata('<?= $_SESSION['customer_id'] ?>', '<?php echo HAIRREMOVAL ?>', sign_file_path);
    </script>
</html>