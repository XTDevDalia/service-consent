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
                    <div class="col-sm-3">
                        <h4 style="font-weight: 600;">Lash Extension</h4>
                    </div>
                    <div class="col-sm-3"></div>
                    <div class="col-sm-3"></div>
                    <div class="col-sm-3">
                        <p class="textalign">No.: 0398</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="col-sm-3">

                    </div>
                </div>
            </div>
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

            <div class="row bgcolor last-div-padding" style="margin-top: 30px;">
                <div class="col-sm-12">
                    <div class="col-sm-2" >
                        <label>Name</label>
                    </div>
                    <div class="col-sm-3">
                        <input type="text" id="txt_client_name" class="form-control" name="txt_client_name">
                    </div>
                    <div class="col-sm-2">
                        <label>Client Signature</label>
                    </div>
                    <div class="col-sm-3">
                        <input type="hidden" id="hdn_customer_signature" class="form-control" name="hdn_customer_signature">
                        <canvas id="customer_signature" name= "customer_signature" width="320" height="160"></canvas>
                    </div>
                    <div class="col-sm-1">
                                    <button class="btn btn-default" id="btn_customer_cancel" name="btn_customer_cancel">Clear</button>
                                </div>
                </div>
            </div>
            <div class="row bgcolor last-div-padding">
                <div class="col-sm-10">
                    <div class="col-sm-2">
                        <label>Date</label>
                    </div>
                    <div class="col-sm-2">
                        <input type="date" id="client_date" class="form-control" name="client_date">
                    </div>
                </div>
            </div>

            <div class="row bgcolor last-div-padding" style="margin-top: 10px;">
                <div class="col-sm-12">
                    <div class="col-sm-2">
                        <label>Therapist Name</label>
                    </div>
                    <div class="col-sm-3">
                        <input type="text" id="txt_therapist_name" class="form-control" name="txt_therapist_name">
                    </div>
                    <div class="col-sm-2">
                        <label>Therapist Signature</label>
                    </div>
                    <div class="col-sm-3">
                    <input type="hidden" id="hdn_therapist_signature" class="form-control" name="hdn_therapist_signature">
                    <canvas id="therapist_signature" name= "therapist_signature" width="320" height="160"></canvas>
                    </div>
                    <div class="col-sm-1">
                                    <button class="btn btn-default" id="btn_therapist_cancel" name="btn_therapist_cancel">Clear</button>
                                </div>
                </div>
            </div>
            <div class="row bgcolor last-div-padding">
                <div class="col-sm-10">
                    <div class="col-sm-2">
                        <label>Date</label>
                    </div>
                    <div class="col-sm-2">
                        <input type="date" id="therapist_date" class="form-control" name="therapist_date">
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
                    </div>
                </div>    
            </div>
        </form>
    </body>
</html>