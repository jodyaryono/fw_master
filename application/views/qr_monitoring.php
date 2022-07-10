<div class="row" style="margin:20px;">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <table width="100%">
                    <tr>
                        <td align="left">
                            <img src="https://zis.mrbjtangsel.org/assets/dist/images/laz_mrbj.png"
                                style="width:180px;padding-left:10px;padding-right:10px;" alt="">
                        </td>
                        <td align="center">
                            <div style="font-size:48px;">Monitoring Status Penyaluran Zakat 1443 H <br></div>
                            <div style="font-size:32px;">MASJID RAYA BINTARO JAYA (MRBJ) www.mrbjtangsel.org</div>
                            <div style="font-size:16px;">Refresh in : &nbsp;<span
                                    style="background-color:red;color:white" id="time"></span>&nbsp;Second(s)</div>
                        </td>
                        <td align="right">
                            <img src=" https://zis.mrbjtangsel.org/assets/dist/images/coresystem_mrbj.png"
                                style="width:290px;padding-left:10px;padding-right:10px;" alt="">
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h2 class="box-title">Monitoring Dashboard <span id="timestamp"></span></h2>

                        <br>
                        <center>
                            <img src="<?= base_url('assets/dist/images/qurban.jpg') ?>" height="200" alt="">
                        </center>

                    </div>
                    <div class="box-body">
                        <font size="4" face="digital">
                            <table class="table table-lg" border="1">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Lokasi</th>
                                        <th>Jenis</th>
                                        <th>Jumlah Kupon</th>
                                        <th>Digunakan</th>
                                        <th>Progress</th>
                                        <th style="width: 40px">Label</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $total = 0;
                                    $i = 0;
                                    $kupon = 0;
                                    $digunakan = 0;
                                    $progress = 0;
                                    ?>
                                    <?php foreach ($d as $r) : ?>
                                    <?php
                                        $i++;
                                        $kupon += $r->kupon;
                                        $digunakan += $r->digunakan;
                                        $progress += $r->progress;
                                        ?>
                                    <tr>
                                        <td>
                                            <?= $i ?>
                                        </td>
                                        <td>
                                            <?= $r->lokasi ?>
                                        </td>
                                        <td><?= $r->source ?></td>
                                        <td><?= $r->kupon ?></td>
                                        <td><?= $r->digunakan ?></td>
                                        <td>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar progress-bar-primary"
                                                    style="width: <?= $r->progress ?>%">
                                                </div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-success"> <?= $r->progress ?> %</span></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td></td>
                                        <td>
                                            Total
                                        </td>
                                        <td>

                                        </td>

                                        <td>
                                            <?= $kupon ?>
                                        </td>
                                        <td>
                                            <?= $digunakan ?>
                                        </td>
                                        <td>
                                            <?= number_format($progress, 2) ?> %
                                        </td>
                                        <td>
                                            <span class="badge bg-success"> <?= $progress ?> %</span>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


<script type="text/javascript">
$(document).ready(function() {
    var time = 60
    setInterval(function() {
        time--;
        $('#time').html(time);
        if (time === 0) {
            $(document).ajaxStart(function() {
                $.LoadingOverlay("show");
            });
            location.reload()
        };

        $.ajax({
            url: '<?= base_url('monitoring/timestamp') ?>',
            success: function(data) {
                $('#timestamp').html(data);
            },
        });
    }, 1000);
});



function cache_clear() {
    window.location.reload(true);
    //window.location.reload(); use this if you do not remove cache
}
</script>