<html>
    <head>
        <style>
            #customer_signature {
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
            .section{
            background: #f7f7f7;
            margin-top: 10px !important;
            }
            .container-radio {
            display: flex;
            align-items: center;
            position: relative;
            padding-left: 35px; /* Adjust padding to position text properly */
            margin-bottom: 12px;
            cursor: pointer;
            /* font-size: 18px; */
            user-select: none;
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
            .chkmediamedium{
            margin-left:3px;
            }
            .chkmedialow{
            margin-left:2px;
            }
            .chkmediastrip{
            margin-right:-11px;
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
                    <h3 style="text-align:center;">Counsultation Card</h3>
                </div>
                <div class="col-sm-4" style="color:white;margin-top:15px;">
                    <h4 style="text-align:center;">Visit No: <br> <?= (isset($_SESSION['visit_no'])) ? $_SESSION['visit_no'] : ''; ?></h4>
                </div>
            </div>
        </div>
        <form method="post" name="consent_forms" id="consent_forms">
        <input type="hidden" id="hdn_plugin_url" class="form-control" name="hdn_plugin_url" value="<?= SC_PLUGIN_DIR_URL ?>">        
        <div class="" style="background-color:#f7f7f7 !important;">
            <div class="row">
                <div class="col-sm-12">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <h3 style="font-weight:700 !important;"><?php echo (isset($_SESSION['customer_name'])) ? $_SESSION['customer_name'] : ''; ?></h3>
                    </div>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-2" style="margin-top:10px;">
                        <label>Tel No. Work</label>
                    </div>
                    <div class="col-sm-3" style="margin-top:10px;">
                        <input type="text" id="txt_tel_no_work" name="txt_tel_no_work" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="section" style="padding:10px 10px;margin-top:0px !important;">
            <div class="row last-div-padding bgcolor">
                <div class="col-sm-6 col-md-6 col-lg-3 mb-3" style="display:flex;">
                    <label>Scar Tissue:</label> 
                    <label class="container-radio" style="margin-left:15px;">Yes
                    <input type="radio" id="scar_tissue_yes" name="scar_tissue" value="Yes">
                    <span class="checkmark"></span>
                    </label>
                    <label class="container-radio" style="margin-left:15px;"><span style="margin-top:10px;">No</span>
                    <input type="radio" id="scar_tissue_no" name="scar_tissue" value="No">
                    <span class="checkmark"></span>
                    </label>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3 mb-3" style="display:flex;">
                    <label>Eye Infection:</label> 
                    <label class="container-radio" style="margin-left:15px;">Yes
                    <input type="radio" id="eye_infection_yes" name="eye_infection" value="Yes">
                    <span class="checkmark"></span>
                    </label>
                    <label class="container-radio" style="margin-left:15px;"><span style="margin-top:10px;">No</span>
                    <input type="radio" id="eye_infection_no" name="eye_infection" value="No">
                    <span class="checkmark"></span>
                    </label>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3 mb-3" style="display:flex;">
                    <label>Skin Disorders:</label> 
                    <label class="container-radio" style="margin-left:15px;">Yes
                    <input type="radio" id="skin_disorders_yes" name="skin_disorders" value="Yes">
                    <span class="checkmark"></span>
                    </label>
                    <label class="container-radio" style="margin-left:15px;"><span style="margin-top:10px;">No</span>
                    <input type="radio" id="skin_disorders_no" name="skin_disorders" value="No">
                    <span class="checkmark"></span>
                    </label>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3 mb-3 difference-two-label" style="display:flex;">
                    <label>Contact Lenses:</label> 
                    <label class="container-radio" style="margin-left:15px;">Yes
                    <input type="radio" id="contact_lenses_yes" name="contact_lenses" value="Yes">
                    <span class="checkmark"></span>
                    </label>
                    <label class="container-radio" style="margin-left:15px;"><span style="margin-top:10px;">No</span>
                    <input type="radio" id="contact_lenses_no" name="contact_lenses" value="No">
                    <span class="checkmark"></span>
                    </label>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3 mb-3 difference-two-label" style="display:flex;">
                    <label>Hyper Skin:</label> 
                    <label class="container-radio" style="margin-left:15px;">Yes
                    <input type="radio" id="hyper_skin_yes" name="hyper_skin" value="Yes">
                    <span class="checkmark"></span>
                    </label>
                    <label class="container-radio" style="margin-left:15px;"><span style="margin-top:10px;">No</span>
                    <input type="radio" id="hyper_skin_no" name="hyper_skin" value="No">
                    <span class="checkmark"></span>
                    </label>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3 mb-3 difference-two-label" style="display:flex;">
                    <label>Nervous Disorder:</label> 
                    <label class="container-radio" style="margin-left:15px;">Yes
                    <input type="radio" id="nervous_disorders_yes" name="nervous_disorders" value="Yes">
                    <span class="checkmark"></span>
                    </label>
                    <label class="container-radio" style="margin-left:15px;"><span style="margin-top:10px;">No</span>
                    <input type="radio" id="nervous_disorders_no" name="nervous_disorders" value="No">
                    <span class="checkmark"></span>
                    </label>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3 mb-3 difference-two-label" style="display:flex;">
                    <label>Allergies:</label> 
                    <label class="container-radio" style="margin-left:15px;">Yes
                    <input type="radio" id="allergies_yes" name="allergies" value="Yes">
                    <span class="checkmark"></span>
                    </label>
                    <label class="container-radio" style="margin-left:15px;"><span style="margin-top:10px;">No</span>
                    <input type="radio" id="allergies_no" name="allergies" value="No">
                    <span class="checkmark"></span>
                    </label>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3 mb-3 difference-two-label" style="display:flex;">
                    <label>Cuts / Bruising:</label> 
                    <label class="container-radio" style="margin-left:15px;">Yes
                    <input type="radio" id="cuts_yes" name="cuts" value="Yes">
                    <span class="checkmark"></span>
                    </label>
                    <label class="container-radio" style="margin-left:15px;"><span style="margin-top:10px;">No</span>
                    <input type="radio" id="cuts_no" name="cuts" value="No">
                    <span class="checkmark"></span>
                    </label>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3 mb-3 difference-two-label" style="display:flex;">
                    <label>Skin Infection:</label> 
                    <label class="container-radio" style="margin-left:15px;">Yes
                    <input type="radio" id="skin_infection_yes" name="skin_infection" value="Yes">
                    <span class="checkmark"></span>
                    </label>
                    <label class="container-radio" style="margin-left:15px;"><span style="margin-top:10px;">No</span>
                    <input type="radio" id="skin_infection_no" name="skin_infection" value="No">
                    <span class="checkmark"></span>
                    </label>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3 mb-3 difference-two-label" style="display:flex;">
                    <label>Swelling:</label> 
                    <label class="container-radio" style="margin-left:15px;">Yes
                    <input type="radio" id="swelling_yes" name="swelling" value="Yes">
                    <span class="checkmark"></span>
                    </label>
                    <label class="container-radio" style="margin-left:15px;"><span style="margin-top:10px;">No</span>
                    <input type="radio" id="swelling_no" name="swelling" value="No">
                    <span class="checkmark"></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 10px;">
            <div class="col-sm-10">
                <div class="col-sm-4">
                    <h5>Details of Above</h5>
                    <h5>Refferal Action</h5>
                </div>
            </div>
        </div>
        <div class="section" style="padding:20px 0;">
            <div class="row container-checkbox">
                <div class="col-sm-10" style="display:flex;">
                    <div class="col-sm-6 col-lg-2 col-md-4">
                        <label>Client Characteristics:</label>
                    </div>
                    <div class="col-sm-3 col-lg-2 col-md-3">
                        <label for="chk_fair" class="remove-bold chk_height_width">Fair
                        <input type="checkbox" id="chk_fair"  value="Fair">
                        <span class="checkmark" style="border-radius:0% !important;"></span>
                        </label>
                    </div>
                    <div class="col-sm-3 col-lg-2 col-md-3 ">
                        <label class="remove-bold form-check-label chk_height_width" for="chk_dark">Dark
                        <input type="checkbox" id="chk_dark" value="Dark">
                        <span class="checkmark" style="border-radius:0% !important;"></span>
                        </label>
                    </div>
                    <div class="col-sm-3 col-lg-2 col-md-3">
                        <label class="remove-bold form-check-label chk_height_width" for="chk_greay">Greay
                        <input type="checkbox" id="chk_greay" value="Greay">
                        <span class="checkmark" style="border-radius:0% !important;"></span>
                        </label>
                    </div>
                    <div class="col-sm-5 col-lg-2 col-md-3">
                        <label class="remove-bold chk_height_width" for="chk_red">Red / aubum
                        <input type="checkbox" id="chk_red"  value="Red / aubum" >
                        <span class="checkmark" style="border-radius:0% !important;"></span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="row container-checkbox" style="margin-top:10px;">
                <div class="col-sm-10" style="display:flex;">
                    <div class="col-sm-6 col-lg-2 col-md-4">
                        <label>Tint Colour:</label>
                    </div>
                    <div class="col-sm-3 col-lg-2 col-md-3">
                        <label for="chk_brown" class="remove-bold chk_height_width">Brown
                        <input type="checkbox" id="chk_brown"  value="Brown">
                        <span class="checkmark" style="border-radius:0% !important;"></span>
                        </label>
                    </div>
                    <div class="col-sm-3 col-lg-2 col-md-3">
                        <label class="remove-bold chk_height_width" for="chk_Black">Black
                        <input type="checkbox" id="chk_Black"  value="Black" >
                        <span class="checkmark" style="border-radius:0% !important;"></span>
                        </label>
                    </div>
                    <div class="col-sm-3 col-lg-2 col-md-3">
                        <label class="remove-bold form-check-label chk_height_width" for="chk_Blue">Blue
                        <input type="checkbox" id="chk_Blue" value="Blue">
                        <span class="checkmark" style="border-radius:0% !important;"></span>
                        </label>
                    </div>
                    <div class="col-sm-5 col-lg-2 col-md-3">
                        <label class="remove-bold form-check-label chk_height_width" for="chk_Blue_Black">Blue / Black
                        <input type="checkbox" id="chk_Blue_Black" value="Blue / Black">
                        <span class="checkmark" style="border-radius:0% !important;"></span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="row container-checkbox" style="margin-top:10px;">
                <div class="col-sm-10" style="display:flex;">
                    <div class="col-sm-6 col-lg-2 col-md-4">
                        <label>Perming :</label>
                    </div>
                    <div class="col-sm-3 col-lg-2 col-md-3 ">
                        <label for="chk_low" class="remove-bold chk_height_width">Low
                        <input type="checkbox" id="chk_low"  value="Low">
                        <span class="checkmark chkmedialow" style="border-radius:0% !important;"></span>
                        </label>
                    </div>
                    <div class="col-sm-3 col-lg-2 col-md-3 chkmediamedium">
                        <label class="remove-bold chk_height_width" for="chk_medium">Medium
                        <input type="checkbox" id="chk_medium"  value="Medium" >
                        <span class="checkmark" style="border-radius:0% !important;"></span>
                        </label>
                    </div>
                    <div class="col-sm-3 col-lg-2 col-md-3 chkmediahigh">
                        <label class="remove-bold form-check-label chk_height_width" for="chk_high">High
                        <input type="checkbox" id="chk_high"  value="High" >
                        <span class="checkmark" style="border-radius:0% !important;"></span>
                        </label>
                    </div>
                    <div class="col-sm-5 col-lg-2 col-md-3">
                    </div>
                </div>
            </div>
            <div class="row container-checkbox" style="margin-top:10px;">
                <div class="col-sm-10" style="display:flex;">
                    <div class="col-sm-6 col-lg-2 col-md-4">
                        <label>Lash Type:</label>
                    </div>
                    <div class="col-sm-3 col-lg-2 col-md-3">
                        <label for="chk_strip" class="remove-bold chk_height_width">Strip
                        <input type="checkbox" id="chk_strip"  value="Strip">
                        <span class="checkmark" style="border-radius:0% !important;"></span>
                        </label>
                    </div>
                    <div class="col-sm-3 col-lg-2 col-md-3 chkmediastrip">
                        <label class="remove-bold chk_height_width" for="chk_individual">Individual
                        <input type="checkbox" id="chk_individual"  value="Individual" >
                        <span class="checkmark" style="border-radius:0% !important;"></span>
                        </label>
                    </div>
                    <div class="col-sm-3 col-lg-2 col-md-3 chkmediahigh">
                    </div>
                    <div class="col-sm-5 col-lg-2 col-md-3">
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 10px;">
                <div class="col-sm-12">
                    <div class="col-sm-4">
                        <h5>Indemnity</h5>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 10px;">
                <div class="col-sm-12">
                    <div class="col-sm-11">
                        <p>I confirm that a skin patch test has been carried out no more that 24 hours before the treatment of eyelashes / eyebrow tinting artificial lashes or perming of lashes.</p>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 10px;">
                <div class="col-sm-12">
                    <div class="col-sm-11">
                        <p>I am familiar with the treatments and I agree to use the equipments / products at my own risk, I understand that Brow Art Beauty salon makes no warranties or representation regarding medical, therapeutic or cosmetic benefits either expressed or implied, I hereby release Brow Art Beauty salon and it's employee from all claims now or in the future from any injury or damages in connection with the use of the equipment. I confirm inform Brow Art Beauty salon of any changes in circumstances relevant to the above questions.</p>
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
                        <label class="form-check-label chk_height_width container-checkbox remove-bold" for="chk_data_protection_policy">
                                Agree <a href="#" id="termsLink" data-toggle="modal" data-target="#termsModal">Data Protection Policy</a>
                                <input type="checkbox" id="chk_data_protection_policy" name="chk_data_protection_policy">
                                <span class="checkmark" style="margin-left:-35px;border-radius:0% !important;"></span>
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
            <!-- we have put this whole div as a patch for this page because we used generic logic to all forms .  -->
            <div class="section" style="display:none">
                <div class="row" style="margin-top:30px;padding:20px 0px !important;">
                    <div class="col-sm-11">
                        <div class="col-sm-5">
                            <input type="hidden" id="hdn_therapist_signature" class="form-control" name="hdn_therapist_signature" value="">
                            <canvas id="therapist_signature" name= "therapist_signature" width="400" height="160"></canvas>
                        </div>
                        <div class="col-sm-1">
                            <button class="btn btn-default" id="btn_therapist_cancel" name="btn_therapist_cancel">Clear</button>
                        </div>
                        <div class="col-sm-2">
                            <input type="date" id="therapist_signature_date" class="form-control" name="therapist_signature_date" value="<?php echo date('Y-m-d'); ?>">
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
    </body>
    <script>
        var sign_file_path = $('#hdn_plugin_url').val();
        fetchjsondata('<?= $_SESSION['customer_id'] ?>', '<?php echo CONSULTATION ?>', sign_file_path);
    </script>
</html>