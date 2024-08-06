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
            padding : 5px 5px !important;
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
            .container-radio {
                    display: inline-block;
                    position: relative;
                    padding-left: 35px;
                    margin: 0 10px 0 0; /* Adjusts spacing between radio buttons */
                    cursor: pointer;
                    /* font-size: 18px; Adjust font size if needed */
                    user-select: none;
                    vertical-align: middle; /* Aligns with the text in the <p> tag */
                }

                .container-radio input {
                    position: absolute;
                    opacity: 0;
                    cursor: pointer;
                }

                .checkmark {
                    position: absolute;
                    top: 0;
                    left: 0;
                    height: 20px;
                    width: 20px;
                    background-color: #eee;
                    border-radius: 50%;
                }

                .container-radio:hover input ~ .checkmark {
                    background-color: #ccc;
                }

                .container-radio input:checked ~ .checkmark {
                    background-color: #2196F3;
                }

                .checkmark:after {
                    content: "";
                    position: absolute;
                    display: none;
                }

                .container-radio input:checked ~ .checkmark:after {
                    display: block;
                }

                .container-radio .checkmark:after {
                    top: 7px;
                    left: 7px;
                    width: 6px;
                    height: 6px;
                    border-radius: 50%;
                    background: white;
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
				   right:-10px !important;
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
					margin-left:-75px !important;
				}
        }
			@media only screen and (min-width: 768px) and (max-width: 991px) {
			.btn_class{
					margin-left:-82px !important;
				}
				.datemedia{
				   position:relative !important;
					right: 30px !important;
        			width: 125% !important;
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
                    <h3 style="text-align:center;">Hair Colour Services Customer Consent Form (Eyebrow tint , Lash tint)</h3>
                </div>
                <div class="col-sm-4" style="color:white;margin-top:15px;">
                    <h4 style="text-align:center;">Visit No: <br> <?= (isset($_SESSION['visit_no'])) ? $_SESSION['visit_no'] : ''; ?></h4>
                </div>
            </div>
        </div>
        <form action="" method="post" name="consent_forms" id="consent_forms" onsubmit="return data_protection_policy();">
            <input type="hidden" id="hdn_plugin_url" class="form-control" name="hdn_plugin_url" value="<?= SC_PLUGIN_DIR_URL ?>">
            <div class="" style="background-color:#f7f7f7 !important;">
            <div class="row">
               <div class="col-sm-12">
                  <div class="col-sm-6 col-md-6 col-lg-6">
                    <h3 style="font-weight:700 !important;"><?php echo (isset($_SESSION['customer_name'])) ? $_SESSION['customer_name'] : ''; ?></h3>
                  </div>
                  <div class="col-sm-1 col-md-1 col-lg-1"></div>
                  <div class="col-sm-2 lblmedia" style="margin-top:20px;">
                        <label>Date : </label>
                    </div>
                    <div class="col-sm-3" style="margin-top:20px;margin-bottom:10px;">
                        <input type="date" id="main_date" name="main_date" class="form-control datemedia" value="<?php echo date('Y-m-d'); ?>">
                    </div>
               </div>
            </div>
      </div>

            <div class="section" style="margin-top:0px !important;">
                <div class="row last-div-padding bgcolor">
                <div class="col-sm-12" style="display:flex;padding-left:20px;">
                    <p>I accept a patch test :</p>
                    <label class="container-radio center-align" style="margin-left:15px;">Yes
                        <input type="radio" id="patch_yes" name="patch_test" value="yes">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container-radio center-align" style="margin-left:15px;">No
                        <input type="radio" id="patch_no" name="patch_test" value="no">
                        <span class="checkmark"></span>
                    </label>
                </div>
                </div>
                <div class="row last-div-padding bgcolor" style="margin-top: 10px;">
                    <div class="col-sm-12" style="padding-left:20px;">
                        <label>I am fully aware and understand that receiving that receiving any hair colour service can, in some individuals, cause an allergic reaction.</label>
                    </div>
                    <div class="col-sm-12" style="padding-left:20px;">
                        <label>(Please specify which hair colour treatment you are having e.g. eyebrow tint, lash tint)</label>
                    </div>
                    <!-- <div class="col-sm-12"> -->
                    <div class="col-sm-3" style="padding-left:20px;">
                        <input type="text" id="txt_hair_colour" name="txt_hair_colour" class="form-control">
                    </div>
                    <!-- </div> -->
                </div>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-sm-11" style="padding-left:20px;">
                        <p>I fully understand that a reaction can occur at any time even if I have received his service on previous occasions, I further understand that it is standard policy to perform a skin patch test 24 hours prior to all colour services, I also understand that a negative skin patch test does not mean that a reaction will not occur.</p>
                    </div>
                </div>
                <div class="row last-div-padding bgcolor">
                    <div class="col-sm-12" style="padding-left:20px;">
                        <p>Have you received an allergic reaction to the treatment you have mentioned above before ?</p>
                    </div>
                    <div class="col-sm-6" style="display:flex;">
                    <label class="container-radio center-align" style="margin-left:15px;">Yes
                        <input type="radio" id="allergic_yes" name="allergic" value="yes">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container-radio center-align" style="margin-left:15px;">No
                        <input type="radio" id="allergic_no" name="allergic" value="no">
                        <span class="checkmark"></span>
                    </label>
                    </div>
                </div>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-sm-12" style="padding-left:20px;">
                        <p>I understand these rules and if I have any concern I will seek medical advice prior to any colour service.</p>
                    </div>
                </div>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-sm-12" style="padding-left:20px;">
                        <p>Further, I grant Brow-Art and it's employee and representatives, permission to colour my hair and not hold them responsible for any and all adverse health reaction from this service.</p>
                    </div>
                </div>

                <div style="margin-top:10px !important;">
            <div class="row">
               <div class="col-sm-12">
                  <div class="col-sm-11" style="padding-left:3px;">
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
                            <span class="checkmark" style="border-radius:0% !important;margin-left:-35px;"></span>
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
                        </div>
                    </div>
                </div>
                <div class="section">
                    <div class="row" style="margin-top:30px; padding:20px 0px !important;">
                        <div class="col-sm-12">
                            <div class="col-sm-2">
                                <label>Therapist Name</label>
                            </div>
                            <div class="col-sm-5 col-md-5 col-lg-4">
                                <input type="text" id="txt_therapist_name" class="form-control" name="txt_therapist_name">
                            </div>
                        </div>
                        <div class="col-sm-12" style="margin-top:10px !important;">
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
        fetchjsondata('<?= $_SESSION['customer_id'] ?>', '<?php echo HAIRCOLOR ?>', sign_file_path);
    </script>
</html>