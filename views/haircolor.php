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
        <form action="" method="post" name="consent_forms" id="consent_forms" >
            <input type="hidden" id="hdn_plugin_url" class="form-control" name="hdn_plugin_url" value="<?= SC_PLUGIN_DIR_URL ?>">
            <div class="row" style="margin-top:30px;">
                        <div class="col-sm-12">
                            <div class="col-sm-6"><h4 style="font-weight: 600;">Hair Colour Services Customer Consent Form:</h4></div>
                            <div class="col-sm-3"></div>
                            <div class="col-sm-3">
                                <p class="textalign">No.: 1647</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="col-sm-6">
                                
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="col-sm-6" style="margin-top: -10px;">
                                <h5 style="font-weight: 600;">(Eyebrow tint , Lash tint)</h5>
                            </div>
                        </div>
                    </div>
                    <div class="row last-div-padding bgcolor">
                        <div class="col-sm-10">
                            <div class="col-sm-1">
                                <label>Date : </label>
                            </div>
                            <div class="col-sm-3">
                                <input type="date" id="main_date" name="main_date" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-10" style="margin-top: 10px;">
                            <div class="col-sm-1">
                                <label>Name : </label>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" id="txt_name" name="txt_name" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row last-div-padding bgcolor" style="margin-top: 10px;">
                        <div class="col-sm-12">
                                <p>I accept a patch test :&nbsp;
                                    Yes&nbsp; <input type="radio" id="patch_yes" name="patch_test" value="yes">&nbsp;&nbsp;
                                    No&nbsp; <input type="radio" id="patch_no" name="patch_test" value="no"> 
                                </p>

                        </div>
                    </div>

                    <div class="row last-div-padding bgcolor" style="margin-top: 10px;">
                        <div class="col-sm-10">
                            <label>I am fully aware and understand that receiving that receiving any hair colour service can, in some individuals, cause an allergic reaction.</label>
                        </div>

                        <div class="col-sm-10">
                            <label>(Please specify which hair colour treatment you are having e.g. eyebrow tint, lash tint)</label>
                        </div>
                        <!-- <div class="col-sm-12"> -->
                            <div class="col-sm-3">
                                <input type="text" id="txt_hair_colour" name="txt_hair_colour" class="form-control">
                            </div>
                        <!-- </div> -->
                    </div>

                    <div class="row" style="margin-top: 10px;">
                        <div class="col-sm-11">
                                <p>I fully understand that a reaction can occur at any time even if I have received his service on previous occasions, I further understand that it is standard policy to perform a skin patch test 24 hours prior to all colour services, I also understand that a negative skin patch test does not mean that a reaction will not occur.</p>         
                        </div>
                    </div>

                    <div class="row last-div-padding bgcolor">
                        <div class="col-sm-12">
                            <p>Have you received an allergic reaction to the treatment you have mentioned above before ?</p>
                        </div>
                        <div class="col-sm-6">
                                Yes&nbsp; <input type="radio" id="allergic_yes" name="allergic" value="yes">&nbsp;&nbsp;
                                No&nbsp; <input type="radio" id="allergic_no" name="allergic" value="no"> 
                        </div>
                    </div>

                    <div class="row" style="margin-top: 10px;">
                        <div class="col-sm-12">
                            <p>I understand these rules and if I have any concern I will seek medical advice prior to any colour service.</p>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 10px;">
                        <div class="col-sm-12">
                            <p>Further, I grant Brow-Art and it's employee and representatives, permission to colour my hair and not hold them responsible for any and all adverse health reaction from this service.</p>
                        </div>
                    </div>
                    <div class="row bgcolor last-div-padding" style="margin-top: 30px;">
                        <div class="col-sm-10">
                            <div class="col-sm-2">
                                <label>Client Signature</label>
                            </div>
                            <div class="col-sm-3">
                                <input type="hidden" id="hdn_customer_signature" class="form-control" name="hdn_customer_signature">
                                <canvas id="customer_signature" name= "customer_signature" width="320" height="160"></canvas>
                            </div>
                            <div class="col-sm-1">
                            </div>
                            <div class="col-sm-1">
                                <button class="btn btn-default" id="btn_customer_cancel" name="btn_customer_cancel">Clear</button>
                            </div>
                        </div>
                        <div class="col-sm-10" style="margin-top: 10px;">
                            <div class="col-sm-2">
                                <label style="text-align: right;">Therapist Name</label>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" id="txt_therapist_name" class="form-control" name="txt_therapist_name">
                            </div>
                        </div>
                        <div class="col-sm-10" style="margin-top: 10px;">
                            <div class="col-sm-2">
                                <label>Therapist Signature</label>
                            </div>
                            <div class="col-sm-3">
                            <input type="hidden" id="hdn_therapist_signature" class="form-control" name="hdn_therapist_signature">
                            <canvas id="therapist_signature" name= "therapist_signature" width="320" height="160"></canvas>
                            </div>
                            <div class="col-sm-1">
                            </div>
                            <div class="col-sm-1">
                                <button class="btn btn-default" id="btn_therapist_cancel" name="btn_therapist_cancel">Clear</button>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 10px;">
                    <div class="col-sm-10">
                        <div class="col-sm-8">
                        </div>
                        <div class="col-sm-1">
                            <button type="submit" name="other_btn_save" id="other_btn_save" class="btn btn-primary" style="margin-left: -25px;" value="submit" >Save Data</button>
                        </div>
                        <div class="col-sm-1">
                            <button class="btn btn-default" id="btn_customer_cancel" name="btn_customer_cancel">Cancel</button>
                        </div>
                    </div>      
                </div>
        </form>
    </body>
</html>