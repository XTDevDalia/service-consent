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
                    <h4 style="text-align:right;">Visit No.:  <?= (isset($_SESSION['visit_no'])) ? $_SESSION['visit_no'] : ''; ?></h4>
                </div>
            </div>
        </div>
        <form action="" method="post" name="consent_forms" id="consent_forms" >
            <input type="hidden" id="hdn_plugin_url" class="form-control" name="hdn_plugin_url" value="<?= SC_PLUGIN_DIR_URL ?>">
            <div class="row last-div-padding bgcolor">
                <div class="col-sm-12">
                    <div class="col-sm-3">
                        <h3 style="font-weight:700 !important;"><?php echo (isset($_SESSION['customer_name'])) ? $_SESSION['customer_name'] : ''; ?></h3>
                    </div>
                    <div class="col-sm-5">
                    </div>
                    <div class="col-sm-2" style="margin-top:20px;">
                        <label>Date : </label>
                    </div>
                    <div class="col-sm-2" style="margin-top:20px;">
                        <input type="date" id="main_date" name="main_date" class="form-control" value="<?php echo date('Y-m-d'); ?>">
                    </div>
                </div>
            </div>
            <div class="section">
                <div class="row last-div-padding bgcolor" style="margin-top: 10px;">
                <div class="col-sm-12" style="display:flex;">
                    <p>I accept a patch test :</p>
                    <label class="container-radio" style="margin-left:15px;">Yes
                        <input type="radio" id="patch_yes" name="patch_test" value="yes">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container-radio" style="margin-left:15px;">No
                        <input type="radio" id="patch_no" name="patch_test" value="no">
                        <span class="checkmark"></span>
                    </label>
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
                    <div class="col-sm-6" style="display:flex;">
                    <label class="container-radio" style="margin-left:15px;">Yes
                        <input type="radio" id="allergic_yes" name="allergic" value="yes">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container-radio" style="margin-left:15px;">No
                        <input type="radio" id="allergic_no" name="allergic" value="no">
                        <span class="checkmark"></span>
                    </label>
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
                                <label style="text-align: right;">Therapist Name</label>
                            </div>
                            <div class="col-sm-4">
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
                        <button type="submit" name="other_btn_save" id="other_btn_save" class="btn btn-primary btn_class" style="margin-left: -40px;" value="submit" >Save & Continue</button>
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>