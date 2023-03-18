<style>
    body {
        /* background-image: url('<//?= base_url('assets/dist/images/bg.png') ?>'); */
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
    }

    @font-face {
        font-family: DigitalDismay;
        src: url("<?= base_url('assets/dist/fonts/DS-DIGIB.TTF') ?>") format("opentype");
    }

    .digital {
        font-family: DigitalDismay;
        font-size: 54px;
    }

    .digital-sm {
        font-family: DigitalDismay;
        font-size: 40px;
    }

    .progress-bar {
        background-color: #28a745 !important;
    }
</style>
<div class="row" style="margin:10px;">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <table width="100%">
                    <tr>
                        <td align="left" style="width:15%">

                            <img src="<?= REMOTE_URL ?>/assets/dist/images/mrkr_logo.png" style="width:250px;padding-left:10px;padding-right:10px;" alt="">
                        </td>
                        <td align="center" style="width:70%">
                            <strong>
                                <div style="font-size:28px;">Monitoring Status Penyaluran Sembako
                                    <br>
                                </div>
                                <div style="font-size:32px;">MASJID RAYA KEBAYORAN RESIDENCE(MRKR)
                                    <br>www.mrkr.org
                                </div>
                            </strong>

                        </td>
                        <td align="right" style="width:15%">

                            <img src=" https://zis.mrbjtangsel.org/assets/dist/images/coresystem_mrbj.png" style="width:200px;padding-left:10px;padding-right:10px;" alt="">
                        </td>

                    </tr>
                </table>
            </div>

            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header" style="background-color:black;color:greenyellow;">
                        <center>
                            <h1 class="box-title" style="font-family:DigitalDismay;font-size:54px">
                                <span id="timestamp"></span>
                                update in <span style="background-color:red;color:white" id="time"></span>&nbsp;Second(s)

                        </center>
                    </div>
                    <div class="box-body">
                        <font size="5" face="digital">
                            <table class="table table-lg" border="2">
                                <thead>
                                    <tr style="background-color:greenyellow">
                                        <th style="width: 10px">#</th>

                                        <th>
                                            <center>
                                                Jenis
                                            </center>
                                        </th>
                                        <th>
                                            <center>
                                                Progress
                                            </center>
                                        </th>
                                        <th>
                                            <center>
                                                Kupon
                                            </center>
                                        </th>

                                        <th>
                                            <center>
                                                Pendaftaran
                                            </center>
                                        </th>
                                        <th>
                                            <center>
                                                Pengambilan
                                            </center>
                                        </th>
                                        <th>
                                            <center>
                                                Sisa
                                            </center>
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $total = 0;
                                    $i = 0;
                                    $kupon = 0;
                                    $pendaftaran = 0;
                                    $pengambilan = 0;
                                    $digunakan_kantong = 0;
                                    $progress = 0;
                                    $sisa = 0;
                                    $lokasi = "";
                                    $kantong = 0;
                                    $sisa_kantong = 0;
                                    $it = 0;
                                    ?>
                                    <?php foreach ($d as $r) : ?>
                                        <?php

                                        $kupon += $r->kupon;
                                        //$kantong += $r->kantong;
                                        $pendaftaran += $r->pendaftaran;
                                        $pengambilan += $r->pengambilan;
                                        //$digunakan_kantong += $r->digunakan_kantong;
                                        $progress += $r->progress;
                                        $sisa += $r->kupon - $r->pengambilan;

                                        //$sisa_kantong += $r->kantong - $r->digunakan_kantong;
                                        $it++;



                                        ?>
                                        <tr>

                                            <td>
                                                <?= $it ?>
                                            </td>
                                            <td>
                                                <?= $r->source ?>
                                            </td>

                                            <td>
                                                <?= "( <span class='digital'><b>" . number_format(floatval($r->progress), 2) . "%</b></span>) " ?>
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar progress-bar-primary progress-bar-striped" style="width: <?= $r->progress ?>%">
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <center>
                                                    <span class="digital">
                                                        <b> <?= $r->kupon ?> </b>
                                                    </span>

                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                    <span class="digital">
                                                        <b> <?= $r->pendaftaran ?> </b>
                                                    </span>

                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                    <span class="digital">
                                                        <b>
                                                            <?= $r->pengambilan ?>

                                                        </b>
                                                    </span>
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                    <span class="digital">
                                                        <b>
                                                            <?= $r->sisa ?>

                                                        </b>
                                                    </span>

                                                </center>

                                            </td>

                                        </tr>

                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr style="background-color:black;color:greenyellow">

                                        <td></td>
                                        <td>
                                            <center>
                                                <span class=" digital">
                                                    <b>
                                                        TOTAL:</b>
                                                </span>

                                            </center>


                                        </td>
                                        <td>
                                            <center>
                                                <span class=" digital">
                                                    <b><?= number_format(floatval($pengambilan / $kupon) * 100, 2) ?>%</b>
                                                </span>

                                            </center>


                                        </td>

                                        <td>
                                            <center>
                                                <span class=" digital">
                                                    <b> <?= $kupon ?></b>
                                                </span>

                                            </center>

                                        </td>
                                        <td>
                                            <center>
                                                <span class="digital">
                                                    <b> <?= $pendaftaran ?> </b>
                                                </span>

                                            </center>

                                        </td>
                                        <td>
                                            <center>
                                                <span class="digital">
                                                    <b> <?= $pengambilan ?> </b>
                                                </span>

                                            </center>

                                        </td>
                                        <td>
                                            <center>
                                                <span class="digital">
                                                    <b> <?= $sisa ?>
                                                    </b>
                                                </span>
                                            </center>

                                        </td>
                                    </tr>
                                </tfoot>
                            </table>

                            <center>
                                <!-- <img src="<//?= base_url('assets/dist/images/qurban.jpg') ?>" height="150" alt=""> -->
                            </center>
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