<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Eyelashes Form</title>
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
					margin-left:0px !important;
				}
        }
		   @media only screen and (min-width: 768px) and (max-width: 991px) {
			.btn_class{
					margin-left:-12px !important;
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
               <h3 style="text-align:center;">Lash Extension</h3>
            </div>
            <div class="col-sm-4" style="color:white;margin-top:15px;">
               <h4 style="text-align:right;">Visit No.:  <?= (isset($_SESSION['visit_no'])) ? $_SESSION['visit_no'] : ''; ?></h4>
            </div>
         </div>
      </div>
      <form action="" method="post" onsubmit="return data_protection_policy();">
         <input type="hidden" id="hdn_plugin_url" class="form-control" name="hdn_plugin_url" value="<?= SC_PLUGIN_DIR_URL ?>">
         <div class="row bgcolor last-div-padding" >
            <div class="col-sm-12">
               <p style="margin-top: 10px;"> I agree I have had an eye test. 1 or 2 lashes have been applied up to 24 hours prior to application to help eliminate any reactions to adhesives, pads and tapes.</p>
               <p>I agreed to have semi-permanent lashes applied to and/or removed from my eye lashes</p>
               <p>I understand that I must complete this agreement and provide my informed consent by signing and dating where indicated.</p>
               <p>I understand that there are risks associated with having artificial eyelashes applied to and/or removed from my existing eyelashes.</p>
               <p>I understand that a certain amount of eyelashes adhesives material will be used to attach the artificial semi-permanent lashes to my existing eyelashes. I will expect some fall of these lashes due to the nature of the natural lash coming to the end of its natural life, which  the therapist has no control over.</p>
               <p>I will be expected to return to the therapist of replacement lashes on a regular basis agreed with the therapist. This infill treatment will occur a charge already agreed.</p>
               <p>I understand that adhesives material may become dislodged even though the professional may apply or remove my semi-permanent lashes properly.</p>
               <p>I understand there is no more than one technique for applying extensions onto my eyelashes, and | will not attribute any liability to my therapist.</p>
               <p>I agree to follow the care and maintenance instructions provided by my therapist.</p>
               <p>I understand that if I do any of the following, it may result in damage to my semi-permanent lashes or may cause my lashes to fall off prematurely, knowing this | agree to follow these tips for the best results:</p>
               <p>Please Note No Refunds are given on treatments</p>
               <ul style="font-size:13px;">
                  <li>I will avoid oil based eye products.</li>
                  <li>I will avoid getting my lashes wet within the first 24 hours after application.</li>
                  <li>I will avoid swimming, saunas or steam rooms for the next 24 hours after application.</li>
                  <li>I agree to contact my Professional immediately to have the lashes extensions removed if | experience any itching Or irritation.</li>
                  <li>I agree to avoid using waterproof mascara.</li>
                  <li>I agree not to use an eyelash curler, perm, or tint my semi-permanent lashes.</li>
                  <li>I agree to not pick, pull or rub my semi-permanent lashes.</li>
                  <li>I understand that I should not attempt to remove my lash extensions on my own or with any product.</li>
                  <li>I understand the procedure requires that my lash extensions be professionally removed.</li>
               </ul>
               <p>I understand that the adhesives and adhesive remover are a skin, eye and mucus membrane irritant and that in rare cases persons may be allergic or have hypersensitivity to synthetics, Cyanoacrolate or Formaldehyde.</p>
               <p>I understand that the procedure requires that | lay still for up to 2 hours or longer with my eyes shut.</p>
               <p>I must remove my contact lenses (if applicable) for the duration of the lash extension application or removal</p>
               <p>I confirm that | have no known medical condition that might be aggravating the procedure.</p>
               <p>I confirm that the therapist has supplied a post procedure sheet to me.</p>
               <p>I have the right to enter this agreement, or if | am under 18 years of age, | have had my parent or legal guardian consent to this agreement, and his or her relationship to me is as follows: <input type="text" id="txt_follow" name="txt_follow"> by his or her signature below, he or she consents to this procedure under these terms.</p>
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

         <div class="section" style="padding:20px 0px;">
            <div class="row bgcolor last-div-padding">
               <div class="col-sm-12">
                  <div class="col-sm-2" >
                     <label>Client Name:</label>
                  </div>
                  <div class="col-sm-5 col-md-5 col-lg-3">
                     <input type="text"  class="form-control" value="<?php echo (isset($_SESSION['customer_name'])) ? $_SESSION['customer_name'] : ''; ?>">
                  </div>
                  <div class="col-sm-1 col-lg-1">
                     <label>Date</label>
                  </div>
                  <div class="col-sm-3 col-lg-3 col-md-3">
                     <input type="date" id="client_date" class="form-control" name="client_date" value="<?php echo date('Y-m-d'); ?>">
                  </div>
               </div>
            </div>
            <div class="row bgcolor last-div-padding">
               <div class="col-sm-12 col-md-12 col-lg-12">
                  <div class="col-sm-2 col-md-2 col-lg-2">
                     <label>Client Signature</label>
                  </div>
                  <div class="col-sm-5 col-md-5 col-lg-5 position-relative">
                     <input type="hidden" id="hdn_customer_signature" class="form-control" name="hdn_customer_signature">
                     <canvas id="customer_signature" class="therapist_signature" name="customer_signature" width="400" height="160"></canvas>
                     <button class="btn btn-primary clear-btn" id="btn_customer_cancel" name="btn_customer_cancel">Clear Signature</button>
                  </div>
               </div>
            </div>
         </div>
         <div class="section" style="padding:20px 0px;">
            <div class="row bgcolor last-div-padding" style="margin-top: 10px;">
               <div class="col-sm-12">
                  <div class="col-sm-2">
                     <label>Therapist Name</label>
                  </div>
                  <div class="col-sm-5 col-md-5 col-lg-3">
                     <input type="text" id="txt_therapist_name" class="form-control" name="txt_therapist_name">
                  </div>
                  <div class="col-sm-1">
                     <label>Date</label>
                  </div>
                  <div class="col-sm-3">
                     <input type="date" id="therapist_date" class="form-control" name="therapist_date" value="<?php echo date('Y-m-d'); ?>">
                  </div>
               </div>
            </div>
            <div class="row bgcolor last-div-padding">
               <div class="col-sm-12">
                  <div class="col-sm-2">
                     <label>Therapist Signature</label>
                  </div>
                  <div class="col-sm-5 position-relative">
                     <input type="hidden" id="hdn_therapist_signature" class="form-control" name="hdn_therapist_signature">
                     <canvas id="therapist_signature" class="therapist_signature" name="therapist_signature" width="400" height="160"></canvas>
                     <button class="btn btn-primary clear-btn" id="btn_therapist_cancel" name="btn_therapist_cancel">Clear Signature</button>
                  </div>
               </div>
            </div>
         </div>
         <div class="row" style="margin-top: 10px;">
            <div class="col-sm-12 col-md-12 col-lg-12">
               <div class="col-sm-10 col-md-10 col-lg-10">
               </div>
               <div class="col-sm-2 col-lg-2 col-md-2">
                  <button type="submit" name="other_btn_save" id="other_btn_save" class="btn btn-primary btn_class" value="submit">Save & Continue</button>
               </div>
            </div>
         </div>
      </form>
   </body>
</html>