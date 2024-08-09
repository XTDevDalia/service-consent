$(function () {
    window.requestAnimFrame = (function (callback) {
        return window.requestAnimationFrame ||
                window.webkitRequestAnimationFrame ||
                window.mozRequestAnimationFrame ||
                window.oRequestAnimationFrame ||
                window.msRequestAnimationFrame ||
                function (callback) {
                    window.setTimeout(callback, 1000 / 60);
                };
    })();

    var customer_canvas = document.getElementById("customer_signature");
    var therapist_canvas = document.getElementById("therapist_signature");
    var customer_clearBtn = document.getElementById("btn_customer_cancel");
    var therapist_clearBtn = document.getElementById("btn_therapist_cancel");

    canvasOperations(customer_canvas, customer_clearBtn);
    canvasOperations(therapist_canvas,therapist_clearBtn);

    function canvasOperations(canvas, clearBtn) {
        // var canvas = $(".signatureclass");
        var ctx = canvas.getContext("2d");
        ctx.strokeStyle = "#222222";
        ctx.lineWidth = 2;

        var drawing = false;
        var mousePos = {x: 0, y: 0};
        var lastPos = mousePos;

        canvas.addEventListener("mousedown", function (e) {
            drawing = true;
            lastPos = getMousePos(canvas, e);
        }, false);

        canvas.addEventListener("mouseup", function (e) {
            drawing = false;
        }, false);

        canvas.addEventListener("mousemove", function (e) {
            mousePos = getMousePos(canvas, e);
        }, false);

        // Add touch event support for mobile
        canvas.addEventListener("touchstart", function (e) { }, false);
        canvas.addEventListener("touchmove", function (e) {
            var touch = e.touches[0];
            var me = new MouseEvent("mousemove", {
                clientX: touch.clientX,
                clientY: touch.clientY
            });
            canvas.dispatchEvent(me);
        }, false);
        canvas.addEventListener("touchstart", function (e) {
            mousePos = getTouchPos(canvas, e);
            var touch = e.touches[0];
            var me = new MouseEvent("mousedown", {
                clientX: touch.clientX,
                clientY: touch.clientY
            });
            canvas.dispatchEvent(me);
        }, false);
        canvas.addEventListener("touchend", function (e) {
            var me = new MouseEvent("mouseup", {});
            canvas.dispatchEvent(me);
        }, false);

        function getMousePos(canvasDom, mouseEvent) {
            var rect = canvasDom.getBoundingClientRect();
            return {
                x: mouseEvent.clientX - rect.left,
                y: mouseEvent.clientY - rect.top
            };
        }

        function getTouchPos(canvasDom, touchEvent) {
            var rect = canvasDom.getBoundingClientRect();
            return {
                x: touchEvent.touches[0].clientX - rect.left,
                y: touchEvent.touches[0].clientY - rect.top
            };
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
        document.body.addEventListener("touchstart", function (e) {
            if (e.target == canvas) {
                e.preventDefault();
            }
        }, false);
        document.body.addEventListener("touchend", function (e) {
            if (e.target == canvas) {
                e.preventDefault();
            }
        }, false);
        document.body.addEventListener("touchmove", function (e) {
            if (e.target == canvas) {
                e.preventDefault();
            }
        }, false);

        (function drawLoop() {
            requestAnimFrame(drawLoop);
            renderCanvas();
        })();
    }
    therapist_clearBtn.addEventListener("click", function (e) {
        therapist_canvas.width = therapist_canvas.width;
        e.preventDefault();
    }, false);

    customer_clearBtn.addEventListener("click", function (e) {
        customer_canvas.width = customer_canvas.width;
        e.preventDefault();
    }, false);


    var submitBtn = document.getElementById("other_btn_save");
    submitBtn.addEventListener("click", function (e) {
        if (!$("#chk_data_protection_policy").prop('checked')) {
            alert('You must agree to the Data Protection Policy before submitting.');
            e.preventDefault();
            return false;
        }
        var dataUrl = customer_canvas.toDataURL();
        var xhr = new XMLHttpRequest();
        var sign_file_path = $('#hdn_plugin_url').val();
        xhr.open("POST", sign_file_path + "save_signature.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var sig_details = JSON.parse(xhr.response);
                $('#hdn_customer_signature').val(sig_details.signature_name);
            }
        };
        xhr.send("imgData=" + encodeURIComponent(dataUrl));

        var dataUrl1 = therapist_canvas.toDataURL();
        var xhr1 = new XMLHttpRequest();
        var sign_file_path1 = $('#hdn_plugin_url').val();
        xhr1.open("POST", sign_file_path1 + "save_signature.php", false);
        xhr1.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr1.onreadystatechange = function () {
            if (xhr1.readyState == 4 && xhr1.status == 200) {
                var sig_details = JSON.parse(xhr1.response);
                $('#hdn_therapist_signature').val(sig_details.signature_name);
                $("#consent_forms").submit();
            }
        };
        xhr1.send("imgData=" + encodeURIComponent(dataUrl1));
    }, false);
    return true;
});