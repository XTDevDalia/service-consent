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
      </style>
   </head>
   <body>
      <div class="section">
         <div class="col-sm-12" style="margin-top:10px;background:black;border-top-right-radius: 10px;border-top-left-radius: 10px;">
            <div class="col-sm-3">
               <img src="<?php echo esc_url( plugins_url( 'brow.png', dirname(__FILE__) ) ); ?>" height="50" width="100" style="margin-top:10px">
            </div>
            <div class="col-sm-4" style="color:white;">
               <h3 style="text-align:center;">Counsultation Card</h3>
            </div>
            <div class="col-sm-4" style="color:white;margin-top:15px;">
               <h4 style="text-align:right;">Visit No.:  <?= (isset($_SESSION['visit_no'])) ? $_SESSION['visit_no'] : ''; ?></h4>
            </div>
         </div>
      </div>
      <form action="" method="post" name="consent_forms" id="consent_forms" >
      <input type="hidden" id="hdn_plugin_url" class="form-control" name="hdn_plugin_url" value="<?= SC_PLUGIN_DIR_URL ?>">        
      <div class="row last-div-padding bgcolor" >
         <div class="col-sm-12" style="margin-top:10px;">
            <div class="col-sm-3">
               <p style="font-weight:600;font-size:20px !important;"><?php echo (isset($_SESSION['customer_name'])) ? $_SESSION['customer_name'] : ''; ?></p>
            </div>
            <div class="col-sm-4">
            </div>
            <div class="col-sm-2">
               <label>Tel No. Work</label>
            </div>
            <div class="col-sm-3">
               <input type="text" id="txt_tel_no_work" name="txt_tel_no_work" class="form-control">
            </div>
         </div>
      </div>
      <div class="section" style="padding:10px 10px;">
         <div class="row last-div-padding bgcolor">
            <div class="col-12 col-md-4 col-lg-3 mb-3" style="display:flex;">
               <label>Scar Tissue:</label> 
               <label class="container-radio" style="margin-left:15px;">Yes
               <input type="radio" id="scar_tissue_yes" name="scar_tissue" value="yes">
               <span class="checkmark"></span>
               </label>
               <label class="container-radio" style="margin-left:15px;"><span style="margin-top:10px;">No</span>
               <input type="radio" id="scar_tissue_no" name="scar_tissue" value="no">
               <span class="checkmark"></span>
               </label>
            </div>
            <div class="col-12 col-md-4 col-lg-3 mb-3" style="display:flex;">
               <label>Eye Infection:</label> 
               <label class="container-radio" style="margin-left:15px;">Yes
               <input type="radio" id="eye_infection_yes" name="eye_infection" value="yes">
               <span class="checkmark"></span>
               </label>
               <label class="container-radio" style="margin-left:15px;"><span style="margin-top:10px;">No</span>
               <input type="radio" id="eye_infection_no" name="eye_infection" value="no">
               <span class="checkmark"></span>
               </label>
            </div>
            <div class="col-12 col-md-4 col-lg-3 mb-3" style="display:flex;">
               <label>Skin Disorders:</label> 
               <label class="container-radio" style="margin-left:15px;">Yes
               <input type="radio" id="skin_disorders_yes" name="skin_disorders" value="yes">
               <span class="checkmark"></span>
               </label>
               <label class="container-radio" style="margin-left:15px;"><span style="margin-top:10px;">No</span>
               <input type="radio" id="skin_disorders_no" name="skin_disorders" value="no">
               <span class="checkmark"></span>
               </label>
            </div>
            <div class="col-12 col-md-4 col-lg-3 mb-3 difference-two-label" style="display:flex;">
               <label>Contact Lenses:</label> 
               <label class="container-radio" style="margin-left:15px;">Yes
               <input type="radio" id="contact_lenses_yes" name="contact_lenses" value="yes">
               <span class="checkmark"></span>
               </label>
               <label class="container-radio" style="margin-left:15px;"><span style="margin-top:10px;">No</span>
               <input type="radio" id="contact_lenses_no" name="contact_lenses" value="no">
               <span class="checkmark"></span>
               </label>
            </div>
            <div class="col-12 col-md-4 col-lg-3 mb-3 difference-two-label" style="display:flex;">
               <label>Hyper Skin:</label> 
               <label class="container-radio" style="margin-left:15px;">Yes
               <input type="radio" id="hyper_skin_yes" name="hyper_skin" value="yes">
               <span class="checkmark"></span>
               </label>
               <label class="container-radio" style="margin-left:15px;"><span style="margin-top:10px;">No</span>
               <input type="radio" id="hyper_skin_no" name="hyper_skin" value="no">
               <span class="checkmark"></span>
               </label>
            </div>
            <div class="col-12 col-md-4 col-lg-3 mb-3 difference-two-label" style="display:flex;">
               <label>Nervous Disorder:</label> 
               <label class="container-radio" style="margin-left:15px;">Yes
               <input type="radio" id="nervous_disorders_yes" name="nervous_disorders" value="yes">
               <span class="checkmark"></span>
               </label>
               <label class="container-radio" style="margin-left:15px;"><span style="margin-top:10px;">No</span>
               <input type="radio" id="nervous_disorders_no" name="nervous_disorders" value="no">
               <span class="checkmark"></span>
               </label>
            </div>
            <div class="col-12 col-md-4 col-lg-3 mb-3 difference-two-label" style="display:flex;">
               <label>Allergies:</label> 
               <label class="container-radio" style="margin-left:15px;">Yes
               <input type="radio" id="allergies_yes" name="allergies" value="yes">
               <span class="checkmark"></span>
               </label>
               <label class="container-radio" style="margin-left:15px;"><span style="margin-top:10px;">No</span>
               <input type="radio" id="allergies_no" name="allergies" value="no">
               <span class="checkmark"></span>
               </label>
            </div>
            <div class="col-12 col-md-4 col-lg-3 mb-3 difference-two-label" style="display:flex;">
               <label>Cuts / Bruising:</label> 
               <label class="container-radio" style="margin-left:15px;">Yes
               <input type="radio" id="cuts_yes" name="cuts" value="yes">
               <span class="checkmark"></span>
               </label>
               <label class="container-radio" style="margin-left:15px;"><span style="margin-top:10px;">No</span>
               <input type="radio" id="cuts_no" name="cuts" value="no">
               <span class="checkmark"></span>
               </label>
            </div>
            <div class="col-12 col-md-4 col-lg-3 mb-3 difference-two-label" style="display:flex;">
               <label>Skin Infection:</label> 
               <label class="container-radio" style="margin-left:15px;">Yes
               <input type="radio" id="skin_infection_yes" name="skin_infection" value="yes">
               <span class="checkmark"></span>
               </label>
               <label class="container-radio" style="margin-left:15px;"><span style="margin-top:10px;">No</span>
               <input type="radio" id="skin_infection_no" name="skin_infection" value="no">
               <span class="checkmark"></span>
               </label>
            </div>
            <div class="col-12 col-md-4 col-lg-3 mb-3 difference-two-label" style="display:flex;">
               <label>Swelling:</label> 
               <label class="container-radio" style="margin-left:15px;">Yes
               <input type="radio" id="swelling_yes" name="swelling" value="yes">
               <span class="checkmark"></span>
               </label>
               <label class="container-radio" style="margin-left:15px;"><span style="margin-top:10px;">No</span>
               <input type="radio" id="swelling_no" name="swelling" value="no">
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
               <div class="col-sm-4 col-lg-2 col-md-3">
                  <label>Client Characteristics:</label>
               </div>
               <div class="col-sm-4 col-lg-2 col-md-3">
                  <label for="chk_fair" class="remove-bold chk_height_width">Fair
                  <input type="checkbox" id="chk_fair"  value="Fair">
                  <span class="checkmark" style="border-radius:0% !important;"></span>
                  </label>
               </div>
               <div class="col-sm-4 col-lg-2 col-md-3">
                  <label class="remove-bold chk_height_width" for="chk_red">Red / aubum
                  <input type="checkbox" id="chk_red"  value="Red / aubum" >
                  <span class="checkmark" style="border-radius:0% !important;"></span>
                  </label>
               </div>
               <div class="col-sm-4 col-lg-2 col-md-3 ">
                  <label class="remove-bold form-check-label chk_height_width" for="chk_dark">Dark
                  <input type="checkbox" id="chk_dark" value="Dark">
                  <span class="checkmark" style="border-radius:0% !important;"></span>
                  </label>
               </div>
               <div class="col-sm-4 col-lg-2 col-md-3 difference-two-label">
                  <label class="remove-bold form-check-label chk_height_width" for="chk_greay">Greay
                  <input type="checkbox" id="chk_greay" value="Greay">
                  <span class="checkmark" style="border-radius:0% !important;"></span>
                  </label>
               </div>
            </div>
         </div>
         <div class="row container-checkbox" style="margin-top:10px;">
            <div class="col-sm-10" style="display:flex;">
               <div class="col-sm-4 col-lg-2 col-md-3">
                  <label>Tint Colour:</label>
               </div>
               <div class="col-sm-4 col-lg-2 col-md-3">
                  <label for="chk_brown" class="remove-bold chk_height_width">Brown
                  <input type="checkbox" id="chk_brown"  value="Brown">
                  <span class="checkmark" style="border-radius:0% !important;"></span>
                  </label>
               </div>
               <div class="col-sm-4 col-lg-2 col-md-3">
                  <label class="remove-bold chk_height_width" for="chk_Black">Black
                  <input type="checkbox" id="chk_Black"  value="Black" >
                  <span class="checkmark" style="border-radius:0% !important;"></span>
                  </label>
               </div>
               <div class="col-sm-4 col-lg-2 col-md-3 ">
                  <label class="remove-bold form-check-label chk_height_width" for="chk_Blue">Blue
                  <input type="checkbox" id="chk_Blue" value="Blue">
                  <span class="checkmark" style="border-radius:0% !important;"></span>
                  </label>
               </div>
               <div class="col-sm-4 col-lg-2 col-md-3 difference-two-label">
                  <label class="remove-bold form-check-label chk_height_width" for="chk_Blue_Black">Blue / Black
                  <input type="checkbox" id="chk_Blue_Black" value="Blue / Black">
                  <span class="checkmark" style="border-radius:0% !important;"></span>
                  </label>
               </div>
            </div>
         </div>
         <div class="row container-checkbox" style="margin-top:10px;">
            <div class="col-sm-10" style="display:flex;">
               <div class="col-sm-4 col-lg-2 col-md-3">
                  <label>Perming:</label>
               </div>
               <div class="col-sm-4 col-lg-2 col-md-3">
                  <label for="chk_low" class="remove-bold chk_height_width">Low
                  <input type="checkbox" id="chk_low"  value="Low">
                  <span class="checkmark" style="border-radius:0% !important;"></span>
                  </label>
               </div>
               <div class="col-sm-4 col-lg-2 col-md-3">
                  <label class="remove-bold chk_height_width" for="chk_medium">Medium
                  <input type="checkbox" id="chk_medium"  value="Medium" >
                  <span class="checkmark" style="border-radius:0% !important;"></span>
                  </label>
               </div>
               <div class="col-sm-4 col-lg-2 col-md-3">
                  <label class="remove-bold chk_height_width" for="chk_high">High
                  <input type="checkbox" id="chk_high"  value="High" >
                  <span class="checkmark" style="border-radius:0% !important;"></span>
                  </label>
               </div>
            </div>
         </div>
         <div class="row container-checkbox" style="margin-top:10px;">
            <div class="col-sm-10" style="display:flex;">
               <div class="col-sm-4 col-lg-2 col-md-3">
                  <label>Lash Type:</label>
               </div>
               <div class="col-sm-4 col-lg-2 col-md-3">
                  <label for="chk_strip" class="remove-bold chk_height_width">Strip
                  <input type="checkbox" id="chk_strip"  value="Strip">
                  <span class="checkmark" style="border-radius:0% !important;"></span>
                  </label>
               </div>
               <div class="col-sm-4 col-lg-2 col-md-3">
                  <label class="remove-bold chk_height_width" for="chk_individual">Individual
                  <input type="checkbox" id="chk_individual"  value="Individual" >
                  <span class="checkmark" style="border-radius:0% !important;"></span>
                  </label>
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
               <p>I am familiar with the treatments and I agree to use the equipments / products at my own risk, I understand that Brow Art Beauty salon makes no warranties or representation regarding medical, therapeutic or cosmetic benefits either expressed or implied, I hereby release Brow Art Beauty salon and it's employee from all claims now or in the future from any injury or damages in connection with the use of the equipment. I confirm inform Brow Art Beauty salon of any changes in circumstances relevant to the above questions.</p>
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
      <div class="row" style="margin-top: 10px;">
         <div class="col-sm-12">
            <div class="col-sm-11">
            </div>
            <div class="col-sm-1">
               <button type="submit" name="other_btn_save" style="margin-left:-35px !important;" id="other_btn_save" class="btn btn-primary" value="submit" >Save & Continue</button>
            </div>
         </div>
      </div>
   </body>
</html>