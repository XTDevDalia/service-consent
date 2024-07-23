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
                margin-top: 20px !important;
            }
         </style>
    </head>
    <body>
        <form action="" method="post" name="consent_forms" id="consent_forms" >
            <input type="hidden" id="hdn_plugin_url" class="form-control" name="hdn_plugin_url" value="<?= SC_PLUGIN_DIR_URL ?>">        
            <div class="row" style="margin-top:30px;">
                <div class="col-sm-12">
                    <!-- <div class="col-sm-4"></div> -->
                    <div class="col-sm-4">
                        <p style="font-weight: 700;text-decoration: underline;font-size:20px !important;">Counsultation Card</p>
                    </div>
                    <!-- <div class="col-sm-4"></div> -->
                </div>
            </div>

            <div class="row last-div-padding bgcolor">
                <div class="col-sm-10" style="margin-top: 10px;">
                    <div class="col-sm-3">
                        <h3 style="font-weight:700"><?php echo (isset($_SESSION['customer_name'])) ? $_SESSION['customer_name'] : ''; ?></h3>
                    </div>
                    <div class="col-sm-1">
                    </div>
                    <div class="col-sm-2">
                        <label>Tel No. Work</label>
                    </div>
                    <div class="col-sm-3">
                        <input type="text" id="txt_tel_no_work" name="txt_tel_no_work" class="form-control">
                    </div>  
                </div> 
            </div>
            <div class="section" style="padding:20px 0;">
    <div class="row last-div-padding bgcolor">
        <div class="col-12 col-md-4 col-lg-3 mb-3">
            <label>Scar Tissue:</label> 
            Yes <input type="radio" id="scar_tissue_yes" class="chk_height_width" name="scar_tissue" value="yes">
            No <input type="radio" id="scar_tissue_no" class="chk_height_width" name="scar_tissue" value="no">
        </div>
        <div class="col-12 col-md-4 col-lg-3 mb-3">
            <label>Eye Infection:</label> 
            Yes <input type="radio" id="eye_infection_yes" class="chk_height_width" name="eye_infection" value="yes">
            No <input type="radio" id="eye_infection_no" class="chk_height_width" name="eye_infection" value="no">
        </div>
        <div class="col-12 col-md-4 col-lg-3 mb-3">
            <label>Skin Disorders:</label> 
            Yes <input type="radio" id="skin_disorders_yes" class="chk_height_width" name="skin_disorders" value="yes">
            No <input type="radio" id="skin_disorders_no" class="chk_height_width" name="skin_disorders" value="no">
        </div>
        <div class="col-12 col-md-4 col-lg-3 mb-3 difference-two-label">
            <label>Contact Lenses:</label> 
            Yes <input type="radio" id="contact_lenses_yes" class="chk_height_width" name="contact_lenses" value="yes">
            No <input type="radio" id="contact_lenses_no" class="chk_height_width" name="contact_lenses" value="no">
        </div>
        <div class="col-12 col-md-4 col-lg-3 mb-3 difference-two-label">
            <label>Hyper Skin:</label> 
            Yes <input type="radio" id="hyper_skin_yes" class="chk_height_width" name="hyper_skin" value="yes">
            No <input type="radio" id="hyper_skin_no" class="chk_height_width" name="hyper_skin" value="no">
        </div>
        <div class="col-12 col-md-4 col-lg-3 mb-3 difference-two-label">
            <label>Nervous Disorder:</label> 
            Yes <input type="radio" id="nervous_disorders_yes" class="chk_height_width" name="nervous_disorders" value="yes">
            No <input type="radio" id="nervous_disorders_no" class="chk_height_width" name="nervous_disorders" value="no">
        </div>
        <div class="col-12 col-md-4 col-lg-3 mb-3 difference-two-label">
            <label>Allergies:</label> 
            Yes <input type="radio" id="allergies_yes" class="chk_height_width" name="allergies" value="yes">
            No <input type="radio" id="allergies_no" class="chk_height_width" name="allergies" value="no">
        </div>
        <div class="col-12 col-md-4 col-lg-3 mb-3 difference-two-label">
            <label>Cuts / Bruising:</label> 
            Yes <input type="radio" id="cuts_yes" class="chk_height_width" name="cuts" value="yes">
            No <input type="radio" id="cuts_no" class="chk_height_width" name="cuts" value="no">
        </div>
        <div class="col-12 col-md-4 col-lg-3 mb-3 difference-two-label">
            <label>Skin Infection:</label> 
            Yes <input type="radio" id="skin_infection_yes" class="chk_height_width" name="skin_infection" value="yes">
            No <input type="radio" id="skin_infection_no" class="chk_height_width" name="skin_infection" value="no">
        </div>
        <div class="col-12 col-md-4 col-lg-3 mb-3 difference-two-label">
            <label>Swelling:</label> 
            Yes <input type="radio" id="swelling_yes" class="chk_height_width" name="swelling" value="yes">
            No <input type="radio" id="swelling_no" class="chk_height_width" name="swelling" value="no">
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
    <div class="row last-div-padding bgcolor">
        <div class="col-12 col-sm-12">
            <div class="col-12 col-md-8 col-lg-6">
                <label class="pr-3">Client Characteristics:</label>
                <input type="checkbox" id="chk_fair" class="chk_height_width" value="Fair">
                <label class="remove-bold">Fair</label>&nbsp;&nbsp;&nbsp;
                <input type="checkbox" id="chk_red" class="chk_height_width" value="Red / aubum">
                <label class="remove-bold">Red / aubum</label>&nbsp;&nbsp;&nbsp;
                <input type="checkbox" id="chk_dark" class="chk_height_width" value="Dark">
                <label class="remove-bold">Dark</label>&nbsp;&nbsp;&nbsp;
                <input type="checkbox" id="chk_greay" class="chk_height_width" value="Greay">
                <label class="remove-bold">Greay</label>
                <br><br>

                <label class="pr-3">Tint Colour:</label>
                <input type="checkbox" id="chk_brown" class="chk_height_width" value="Brown">
                <label class="remove-bold">Brown</label>&nbsp;&nbsp;&nbsp;
                <input type="checkbox" id="chk_black" class="chk_height_width" value="Black">
                <label class="remove-bold">Black</label>&nbsp;&nbsp;&nbsp;
                <input type="checkbox" id="chk_blue" class="chk_height_width" value="Blue">
                <label class="remove-bold">Blue</label>&nbsp;&nbsp;&nbsp;
                <input type="checkbox" id="chk_blue_black" class="chk_height_width" value="Blue / Black">
                <label class="remove-bold">Blue / Black</label>
                <br><br>

                <label class="pr-3">Perming:</label>
                <input type="checkbox" id="chk_low" class="chk_height_width" value="Low">
                <label class="remove-bold">Low</label>&nbsp;&nbsp;&nbsp;
                <input type="checkbox" id="chk_medium" class="chk_height_width" value="Medium">
                <label class="remove-bold">Medium</label>&nbsp;&nbsp;&nbsp;
                <input type="checkbox" id="chk_high" class="chk_height_width" value="High">
                <label class="remove-bold">High</label>
                <br><br>

                <label class="pr-3">Lash type:</label>
                <input type="checkbox" id="chk_strip" class="chk_height_width" value="Strip">
                <label class="remove-bold">Strip</label>&nbsp;&nbsp;&nbsp;
                <input type="checkbox" id="chk_individual" class="chk_height_width" value="Individual">
                <label class="remove-bold">Individual</label>
            </div>
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
                        <p>I am familier with the treatments and I agree to use the equipments / products at my own risk, I understand that Brow Art Beauty salon makes no warranties or representation regarding medical, therapeutic or cosmetic benefits either expressed or implied, I hereby release Brow Art Beauty salon and it's employee from all claims now or in the future from any injury or damages in connection with the use of the equipment. I confirm inform Brow Art Beauty salon of any changes in circumstances relevant to the above questions.</p>
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
                            <canvas id="customer_signature" class="therapist_signature" name="customer_signature" width="500" height="160"></canvas>
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
            <!-- we have put this whole div as a patch for this page because we used generic logic to all forms .  -->
            <div class="section" style="display:none">
                <div class="row" style="margin-top:30px;padding:20px 0px !important;">
                    <div class="col-sm-11">
                        <div class="col-sm-5">
                            <input type="hidden" id="hdn_therapist_signature" class="form-control" name="hdn_therapist_signature" value="">
                            <canvas id="therapist_signature" name= "therapist_signature" width="500" height="160"></canvas>
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
            <div class="row" style="margin-top: 10px;">
                <div class="col-sm-12">
                    <div class="col-sm-11">
                    </div>
                    <div class="col-sm-1">
                        <button type="submit" name="other_btn_save" id="other_btn_save" class="btn btn-primary btn_class" style="margin-left: 0px;" value="submit" >Save Data</button>
                    </div>
                </div>
            </div>
    </body>
</html>