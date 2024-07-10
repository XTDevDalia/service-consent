<style>
        #sig-canvas {
            border: 2px dotted #CCCCCC;
            border-radius: 15px;
            cursor: crosshair;
        }
    </style>        
        <div class="row" style="margin-top:30px;">
            <div class="col-sm-12">
                <!-- <div class="col-sm-4"></div> -->
                 <div class="col-sm-4">
                    <h4 style="font-weight: 700;text-decoration: underline;">Counsultation Card</h4>
                </div>
                <!-- <div class="col-sm-4"></div> -->
            </div>
        </div>

        <div class="row last-div-padding bgcolor">
            <div class="col-sm-10" style="margin-top: 10px;">
                <div class="col-sm-1">
                    <label>Name : </label>
                </div>
                <div class="col-sm-3">
                    <input type="text" id="txt_name" name="txt_name" class="form-control">
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

        <div class="row last-div-padding bgcolor" style="margin-top: 10px;">
            <div class="col-sm-12">
                <div class="col-sm-4 col-lg-3 col-md-3">
                    <label>Scar Tissue:</label> &nbsp;&nbsp;
                    Yes&nbsp; <input type="radio" id="scar_tissue_yes" name="scar_tissue" value="yes">&nbsp;&nbsp;
                    No&nbsp; <input type="radio" id="scar_tissue_no" name="scar_tissue" value="no"> 
                </div>
                <div class="col-sm-4 col-lg-3 col-md-3">
                    <label>Eye Infection:</label> &nbsp;&nbsp;
                    Yes&nbsp; <input type="radio" id="eye_infection_yes" name="eye_infection" value="yes">&nbsp;&nbsp;
                    No&nbsp; <input type="radio" id="eye_infection_no" name="eye_infection" value="no">
                </div>
                <div class="col-sm-4 col-lg-3 col-md-3">
                    <label>Skin Disorders:</label> &nbsp;&nbsp;
                    Yes&nbsp; <input type="radio" id="skin_disorders_yes" name="skin_disorders" value="yes">&nbsp;&nbsp;
                    No&nbsp; <input type="radio" id="skin_disorders_no" name="skin_disorders" value="no">
                </div>
                <div class="col-sm-4 col-lg-3 col-md-3">
                    <label>Contact Lenses:</label> &nbsp;&nbsp;
                    Yes&nbsp; <input type="radio" id="contatc_lenses_yes" name="contact_lenses" value="yes">&nbsp;&nbsp;
                    No&nbsp; <input type="radio" id="contact_lenses_no" name="contact_lenses" value="no">
                </div>
            </div>
            <div class="col-sm-12" style="padding-top: 10px;">
                <div class="col-sm-4 col-lg-3 col-md-3">
                    <label>Hyper Skin:</label> &nbsp;&nbsp;&nbsp;&nbsp;
                    Yes&nbsp; <input type="radio" id="hyper_skin_yes" name="hyper_skin" value="yes">&nbsp;&nbsp;
                    No&nbsp; <input type="radio" id="hyper_skin_no" name="hyper_skin" value="no"> 
                </div>
                <div class="col-sm-4 col-lg-3 col-md-3">
                    <label>Nervous Disorder:</label> &nbsp;&nbsp;
                    Yes&nbsp; <input type="radio" id="nervous_disorders_yes" name="nervous_disorders" value="yes">&nbsp;&nbsp;
                    No&nbsp; <input type="radio" id="nervous_disorders_no" name="nervous_disorders" value="no">
                </div>
                <div class="col-sm-4 col-lg-3 col-md-3">
                    <label>allergies:</label> &nbsp;&nbsp;
                    Yes&nbsp; <input type="radio" id="allergies_yes" name="allergies" value="yes">&nbsp;&nbsp;
                    No&nbsp; <input type="radio" id="allergies_no" name="allergies" value="no">
                </div>
                <div class="col-sm-4 col-lg-3 col-md-3">
                    <label>Cuts / Bruising:</label> &nbsp;&nbsp;
                    Yes&nbsp; <input type="radio" id="cuts_yes" name="cuts" value="yes">&nbsp;&nbsp;
                    No&nbsp; <input type="radio" id="cuts_no" name="cuts" value="no">
                </div>
            </div>
            <div class="col-sm-12" style="padding-top: 10px;">
                <div class="col-sm-4 col-lg-3 col-md-3">
                    <label>Skin Infection:</label> &nbsp;&nbsp;&nbsp;&nbsp;
                    Yes&nbsp; <input type="radio" id="skin_infection_yes" name="skin_infection" value="yes">&nbsp;&nbsp;
                    No&nbsp; <input type="radio" id="skin_infection_no" name="skin_infection" value="no"> 
                </div>
                <div class="col-sm-4 col-lg-3 col-md-3">
                    <label>Swelling:</label> &nbsp;&nbsp;
                    Yes&nbsp; <input type="radio" id="swelling_yes" name="nervous_disorders" value="yes">&nbsp;&nbsp;
                    No&nbsp; <input type="radio" id="swelling_no" name="nervous_disorders" value="no">
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

        <div class="row last-div-padding bgcolor">
            <div class="col-sm-12">
                <div class="col-sm-4 col-lg-5 col-md-3">
                    <label>Client Characteristics : </label> &nbsp;&nbsp;&nbsp;
                    <input type = "checkbox" id="chk_fair" class="chk_height_width" value="Fair">
                    <label class="not-bold">Fair</label>&nbsp;&nbsp;&nbsp;
                    <input type = "checkbox" id="chk_red" class="chk_height_width" value="Red / aubum">
                    <label class="not-bold">Red / aubum</label>&nbsp;&nbsp;&nbsp;
                    <input type = "checkbox" id="chk_dark" class="chk_height_width" value="Dark">
                    <label class="not-bold">Dark</label>&nbsp;&nbsp;&nbsp;
                    <input type = "checkbox" id="chk_greay" class="chk_height_width" value="Greay">
                    <label class="not-bold">Greay</label>
                    <br>
                    <br>
                    <label>Tint Colour : </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type = "checkbox" id="chk_brown" class="chk_height_width" value="Brown">
                    <label class="not-bold">Brown</label>&nbsp;&nbsp;&nbsp;
                    <input type = "checkbox" id="chk_black" class="chk_height_width" value="Black">
                    <label class="not-bold">Black</label>&nbsp;&nbsp;&nbsp;
                    <input type = "checkbox" id="chk_blue" class="chk_height_width" value="Blue">
                    <label class="not-bold">Blue</label>&nbsp;&nbsp;&nbsp;
                    <input type = "checkbox" id="chk_blue_black" class="chk_height_width" value="Blue / Black">
                    <label class="not-bold">Blue / Black</label>
                    <br>
                    <br>
                    <label>Perming : </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type = "checkbox" id="chk_low" class="chk_height_width" value="Low">
                    <label class="not-bold">Low</label>&nbsp;&nbsp;&nbsp;
                    <input type = "checkbox" id="chk_medium" class="chk_height_width" value="Medium">
                    <label class="not-bold">Medium</label>&nbsp;&nbsp;&nbsp;
                    <input type = "checkbox" id="chk_high" class="chk_height_width" value="High">
                    <label class="not-bold">High</label>&nbsp;&nbsp;&nbsp;
                    <br>
                    <br>
                    <label>Lash type : </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type = "checkbox" id="chk_strip" class="chk_height_width" value="Strip">
                    <label class="not-bold">Strip</label>&nbsp;&nbsp;&nbsp;
                    <input type = "checkbox" id="chk_individual" class="chk_height_width" value="Individual">
                    <label class="not-bold">Individual</label>&nbsp;&nbsp;&nbsp;
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
        <div class="row bgcolor last-div-padding" style="margin-top: 10px;">
            <div class="col-sm-10">
                <div class="col-sm-2">
                    <label>Signature</label>
                </div>
                <div class="col-sm-3">
                    <!-- <input type="text" id="txt_client_signature" name="txt_client_signature" class="form-control"> -->

                    <canvas id="sig-canvas" width="160" height="160">
		 			Get a better browser, bro.
		 		</canvas>
                </div>
                <div class="col-sm-1">
                    <label>Date</label>
                </div>
                <div class="col-sm-3">
                    <input type="date" id="client_date" name="client_date" class="form-control">
                </div>
            </div>
        </div>

        <div class="row" style="margin-top: 10px;">
            <div class="col-sm-10">
                <div class="col-sm-8">
                </div>
                <div class="col-sm-1">
                    <button type="submit" id="btn_submit" name="btn_submit" class="btn btn-primary" style="margin-left: -25px;">Save Data</button>
                </div>
                <div class="col-sm-1">
                <button class="btn btn-default" id="btn_cancel" name="btn_cancel">Cancel</button>
                </div>
            </div>    
        </div>
        <script>
    (function() {
  window.requestAnimFrame = (function(callback) {
    return window.requestAnimationFrame ||
      window.webkitRequestAnimationFrame ||
      window.mozRequestAnimationFrame ||
      window.oRequestAnimationFrame ||
      window.msRequestAnimaitonFrame ||
      function(callback) {
        window.setTimeout(callback, 1000 / 60);
      };
  })();

  var canvas = document.getElementById("sig-canvas");
  var ctx = canvas.getContext("2d");
  ctx.strokeStyle = "#222222";
  ctx.lineWidth = 4;

  var drawing = false;
  var mousePos = {
    x: 0,
    y: 0
  };
  var lastPos = mousePos;

  canvas.addEventListener("mousedown", function(e) {
    drawing = true;
    lastPos = getMousePos(canvas, e);
  }, false);

  canvas.addEventListener("mouseup", function(e) {
    drawing = false;
  }, false);

  canvas.addEventListener("mousemove", function(e) {
    mousePos = getMousePos(canvas, e);
  }, false);

  // Add touch event support for mobile
  canvas.addEventListener("touchstart", function(e) {

  }, false);

  canvas.addEventListener("touchmove", function(e) {
    var touch = e.touches[0];
    var me = new MouseEvent("mousemove", {
      clientX: touch.clientX,
      clientY: touch.clientY
    });
    canvas.dispatchEvent(me);
  }, false);

  canvas.addEventListener("touchstart", function(e) {
    mousePos = getTouchPos(canvas, e);
    var touch = e.touches[0];
    var me = new MouseEvent("mousedown", {
      clientX: touch.clientX,
      clientY: touch.clientY
    });
    canvas.dispatchEvent(me);
  }, false);

  canvas.addEventListener("touchend", function(e) {
    var me = new MouseEvent("mouseup", {});
    canvas.dispatchEvent(me);
  }, false);

  function getMousePos(canvasDom, mouseEvent) {
    var rect = canvasDom.getBoundingClientRect();
    return {
      x: mouseEvent.clientX - rect.left,
      y: mouseEvent.clientY - rect.top
    }
  }

  function getTouchPos(canvasDom, touchEvent) {
    var rect = canvasDom.getBoundingClientRect();
    return {
      x: touchEvent.touches[0].clientX - rect.left,
      y: touchEvent.touches[0].clientY - rect.top
    }
  }

  function renderCanvas() {
    if (drawing) {
      ctx.moveTo(lastPos.x, lastPos.y);
      ctx.lineTo(mousePos.x, mousePos.y);
      ctx.stroke();
      lastPos = mousePos;
    }
  }

  // Prevent scrolling when touching the canvas
  document.body.addEventListener("touchstart", function(e) {
    if (e.target == canvas) {
      e.preventDefault();
    }
  }, false);
  document.body.addEventListener("touchend", function(e) {
    if (e.target == canvas) {
      e.preventDefault();
    }
  }, false);
  document.body.addEventListener("touchmove", function(e) {
    if (e.target == canvas) {
      e.preventDefault();
    }
  }, false);

  (function drawLoop() {
    requestAnimFrame(drawLoop);
    renderCanvas();
  })();

  function clearCanvas() {
    canvas.width = canvas.width;
  }

  // Set up the UI
  var sigText = document.getElementById("sig-dataUrl");
  var sigImage = document.getElementById("sig-image");
  var clearBtn = document.getElementById("btn_cancel");
  var submitBtn = document.getElementById("btn_submit");
  clearBtn.addEventListener("click", function(e) {
    clearCanvas();
    sigText.innerHTML = "Data URL for your signature will go here!";
    sigImage.setAttribute("src", "");
  }, false);
  submitBtn.addEventListener("click", function(e) {
    var dataUrl = canvas.toDataURL();
    sigText.innerHTML = dataUrl;
    sigImage.setAttribute("src", dataUrl);
  }, false);

})();

</script>