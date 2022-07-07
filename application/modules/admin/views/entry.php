<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Ketik Kode yg dimasukan:</h3>
                    </div>
                    <div class="box-body">
                        <?php echo $form->open(); ?>
                        <table>
                            <tr>
                                <td>
                                    <input max="16" min="16" type="text" id="qrcode" name="qrcode" value=""
                                        class="form-control" style="text-align:center;font-size:36px;" required>
                                </td>
                            </tr>
                        </table>
                        <?php echo $form->close(); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <td colspan="3" style="align:center"><?php echo $form->messages(); ?></td>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Hasil Test Scan</h3>
                    </div>
                    <div class="box-body">
                        <?php echo $form->open(); ?>
                        <div class="row">
                            <div class="col-md-6 text-center">
                                <img class="img-responsive"
                                    src="https://mrbjtangsel.org/mrbj_web/assets/uploads/zis/1/foto_ktp/<?= $ktp ?>"
                                    alt="">
                            </div>
                            <div class="col-md-6 center">
                                <table cellpadding="5">
                                    <tr>
                                        <td>QR Code / NIK</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td><strong><?php echo $qrcode ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td><strong><?php echo $jenis_kelamin ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Nama</td>
                                        <td>&nbsp;: </td>
                                        <td> <strong><?php echo $nama ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Skor</td>
                                        <td>&nbsp;: </td>
                                        <td> <strong><?php echo $score ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Surveyor</td>
                                        <td>&nbsp;: </td>
                                        <td> <strong><?php echo $surveyor ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Tgl Lahir</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td><strong><?php echo $tgllahir ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td><strong><?php echo $alamat ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>RT</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td><strong><?php echo $rt ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>RW</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td><strong><?php echo $rw ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Provinsi</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td><strong><?php echo $provinsi ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Kabupaten</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td><strong><?php echo $kabupaten ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Kecamatan</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td><strong><?php echo $kecamatan ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Kelurahan</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td><strong><?php echo $kelurahan ?></strong></td>
                                    </tr>


                                </table>
                            </div>
                        </div>
                        <?php echo $form->close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <?php if ($detail_attempt) : ?>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Data Transaksi Scan</h3>
                    </div>
                    <div class="box-body">
                        <table id="tbl_txn" class="table table-striped table-bordered table-responsive-md display"
                            style="width:100%">
                            <thead>
                                <th>
                                    No.
                                </th>
                                <th>
                                    Tanggal/Jam
                                </th>
                                <th>
                                    Workstation
                                </th>
                                <th>
                                    Status
                                </th>
                            </thead>
                            <tbody>
                                <?php $no = 0; ?>
                                <?php foreach ($detail_attempt as $dt) : ?>
                                <?php $no += 1;  ?>
                                <tr>
                                    <td><?php echo $no ?></td>
                                    <td> <?php echo date('d-m-Y H:i:s', strtotime($dt->txn_datetime)) ?></td>
                                    <td> <?php echo $dt->first_name ?></td>
                                    <td> <?php if ($dt->status == 'N') {
														echo "<span class='label label-danger'> Gagal</span>";
													} else {
														echo "<span class='label label-success'> Berhasil</span>";
													} ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>

</div>

<script type="text/javascript">
$("#qrcode").focus();
//$('#tbl_txn').DataTable();

$("form").submit(function() {
    //alert("Submitted");
    $.LoadingOverlay("show");
});
</script>