<div class="row">

    <div class="col-md-4">
        <?php echo modules::run('adminlte/widget/box_open', 'Shortcuts'); ?>
        <?php echo modules::run('adminlte/widget/app_btn', 'fa fa-user', 'Account', 'panel/account'); ?>
        <?php echo modules::run('adminlte/widget/app_btn', 'fa fa-sign-out', 'Logout', 'panel/logout'); ?>
        <a class="btn btn-app" id="btn-scan-webcam"><i class="fa fa-camera"></i>Webcam</a>
        <?php echo modules::run('adminlte/widget/box_close'); ?>
    </div>

    <div class="col-md-4">
        <?php echo modules::run('adminlte/widget/info_box', 'yellow', $count, 'Users', 'fa fa-users', 'user'); ?>
    </div>
    <div class="col-md-4">
        <div id="reader">
        </div>
    </div>

</div>
<script>
$(function() {
    $('#btn-scan-webcam').click(function() {
        $.LoadingOverlay("show");
        Html5Qrcode.getCameras().then(devices => {
            /**
             * devices would be an array of objects of type:
             * { id: "id", label: "label" }
             */
            if (devices && devices.length) {
                var cameraId = devices[0].id;
                // .. use this to start scanning.
                const html5QrCode = new Html5Qrcode( /* element id */ "reader");
                $.LoadingOverlay("hide");
                html5QrCode.start(
                        cameraId, {
                            fps: 10, // Optional frame per seconds for qr code scanning
                            qrbox: 250 // Optional if you want bounded box UI
                        },
                        qrCodeMessage => {
                            // do something when code is read
                            //console.log(qrCodeMessage);
                            //alert(qrCodeMessage);
                            html5QrCode.stop().then(ignore => {
                                // QR Code scanning is stopped.
                            }).catch(err => {
                                // Stop failed, handle it.
                            });
                            //alert(qrCodeMessage);
                            $.LoadingOverlay("show");

                            $.LoadingOverlay("show");
                            $('#qrcode').val(qrCodeMessage);
                            $('form').submit();
                        },
                        errorMessage => {
                            // parse error, ignore it.
                            //console.log(errorMessage);
                            $.LoadingOverlay("hide");
                            //alert(errorMessage);
                        })
                    .catch(err => {
                        // Start failed, handle it.
                        $.LoadingOverlay("hide");
                        console.log(err);
                    });
            } else {
                $.LoadingOverlay("hide");
            }
        }).catch(err => {
            // handle err
            $.LoadingOverlay("hide");
            console.log(err);
        });
    });
});
</script>