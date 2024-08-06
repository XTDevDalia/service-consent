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
				   right:-70px !important;
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
					margin-left:-25px !important;
				}
        }
		  @media only screen and (min-width: 768px) and (max-width: 992px) {
			.btn_saveclass{
					margin-left:-40px !important;
				}
			  .lblmedia{
				  margin-left:10px !important;
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
               <h3 style="text-align:center;">Lash Lift / Brow Lamination</h3>
            </div>
            <div class="col-sm-4" style="color:white;margin-top:15px;">
               <h4 style="text-align:right;">Visit No.:  <?= (isset($_SESSION['visit_no'])) ? $_SESSION['visit_no'] : ''; ?></h4>
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
      <form action="" method="post" onsubmit="return data_protection_policy();">
         <input type="hidden" id="hdn_plugin_url" class="form-control" name="hdn_plugin_url" value="<?= SC_PLUGIN_DIR_URL ?>">
         <div class="section" style="margin-top:0px !important;border-top-left-radius: 0px !important;border-top-right-radius: 0px !important;">
            <div class="row section-title">
               <div class="col-sm-10">
                  <div class="col-sm-6 col-md-6 col-lg-6">
                     <p>Please tick any of the below that may apply to you:</p>
                  </div>
               </div>
            </div>
            <div class="row container-checkbox" style="padding-left:10px !important;margin-top:10px;">
               <div class="col-sm-12">
                  <div class="col-sm-4 col-lg-2 col-md-4">
                     <label for="chk_open_wounds" class="chk_height_width">Open Wounds
                     <input type="checkbox" id="chk_open_wounds"  value="Open Wounds" name="brow_lamination[]">
                     <span class="checkmark"></span>
                     </label>
                  </div>
                  <div class="col-sm-4 col-lg-2 col-md-4">
                     <label class="remove-bold chk_height_width" for="chk_pregnancy">Pregnancy
                     <input type="checkbox" id="chk_pregnancy" class="" value="Pregnancy" name="brow_lamination[]">
                     <span class="checkmark"></span>
                     </label>
                  </div>
                  <div class="col-sm-4 col-lg-2 col-md-4 ">
                     <label class="form-check-label chk_height_width" for="chk_allergies">Allergies
                     <input type="checkbox" id="chk_allergies" class="" value="Allergies" name="brow_lamination[]">
                     <span class="checkmark"></span>
                     </label>
                  </div>
                  <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                     <label class="form-check-label chk_height_width" for="chk_asthma">Asthma
                     <input type="checkbox" id="chk_asthma" class="" value="Asthma" name="brow_lamination[]">
                     <span class="checkmark"></span>
                     </label>
                  </div>
                  <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                     <label class="form-check-label chk_height_width" for="chk_veruccas">Verucca's
                     <input type = "checkbox" id="chk_veruccas" class="" value="Veruccas" name="brow_lamination[]">
                     <span class="checkmark"></span>
                     </label>
                  </div>
                  <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                     <label class="form-check-label chk_height_width" for="chk_Eczema">Eczema
                     <input type = "checkbox" id="chk_Eczema" class="" value="Eczema" name="brow_lamination[]"> 
                     <span class="checkmark"></span>
                     </label>
                  </div>
               </div>
            </div>
            <div class="row container-checkbox" style="padding-left:10px !important;margin-top:20px;">
               <div class="col-sm-12">
                  <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                     <label class="form-check-label chk_height_width" for="chk_epilepsy">Epilepsy
                     <input type = "checkbox" id="chk_epilepsy" class="" value="Epilepsy" name="brow_lamination[]">
                     <span class="checkmark"></span>
                     </label>
                  </div>
                  <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                     <label class="form-check-label chk_height_width" for="chk_cold_sores">Cold Sores
                     <input type = "checkbox" id="chk_cold_sores" class="" value="Cold Sores" name="brow_lamination[]">
                     <span class="checkmark"></span>
                     </label>
                  </div>
                  <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                     <label class="form-check-label chk_height_width" for="chk_rashes">Rashes
                     <input type = "checkbox" id="chk_rashes" class="" value="Rashes" name="brow_lamination[]">
                     <span class="checkmark"></span>
                     </label>
                  </div>
                  <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                     <label class="form-check-label chk_height_width" for="chk_Psoriasis">Psoriasis
                     <input type = "checkbox" id="chk_Psoriasis" class="" value="Psoriasis" name="brow_lamination[]">
                     <span class="checkmark"></span>
                     </label>
                  </div>
                  <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                     <label class="form-check-label chk_height_width" for="chk_Sunburn">Sunburn
                     <input type = "checkbox" id="chk_Sunburn" class="" value="Sunburn" name="brow_lamination[]">
                     <span class="checkmark"></span>
                     </label>
                  </div>
                  <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                     <label class="form-check-label chk_height_width" for="chk_recent_scars">Recent Scars
                     <input type = "checkbox" id="chk_recent_scars" class="" value="Recent Scars" name="brow_lamination[]">
                     <span class="checkmark"></span>
                     </label>
                  </div>
               </div>
            </div>
            <div class="row container-checkbox" style="padding-left:10px !important;margin-top:20px;">
               <div class="col-sm-12">
                  <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                     <label class="form-check-label chk_height_width" for="chk_conjuctivitis">Conjuctivitis
                     <input type = "checkbox" id="chk_conjuctivitis" class="" value="Conjuctivitis" name="brow_lamination[]">
                     <span class="checkmark"></span>
                     </label>
                  </div>
                  <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                     <label class="form-check-label chk_height_width" for="chk_impetigo">Impetigo
                     <input type = "checkbox" id="chk_impetigo" class="" value="Impetigo" name="brow_lamination[]">
                     <span class="checkmark"></span>
                     </label>
                  </div>
                  <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                     <label class="form-check-label chk_height_width" for="chk_ringworm">Ringworm
                     <input type = "checkbox" id="chk_ringworm" class="" value="Ringworm" name="brow_lamination[]">
                     <span class="checkmark"></span>
                     </label>
                  </div>
                  <div class="col-sm-4 col-lg-2 col-md-4 difference-two-label">
                     <label class="form-check-label chk_height_width" for="chk_burns">Burns
                     <input type = "checkbox" id="chk_burns" class="" value="Burns" name="brow_lamination[]">
                     <span class="checkmark"></span>
                     </label>
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
                     <label>Therapist Name</label>
                  </div>
                  <div class="col-sm-5 col-lg-4 col-md-4">
                     <input type="text" id="txt_therapist_name" class="form-control" name="txt_therapist_name">
                  </div>
               </div>
               <div class="col-sm-12" style="margin-top:10px;">
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
                  <button type="submit" name="other_btn_save" id="other_btn_save" class="btn btn-primary btn_saveclass btn_class" value="submit" >Save Data</button>
               </div>
            </div>
         </div>
      </form>
   </body>
   <script>
        var sign_file_path = $('#hdn_plugin_url').val();
        fetchjsondata('<?= $_SESSION['customer_id'] ?>', '<?php echo BROWLAMINATION ?>', sign_file_path);
    </script>
</html>