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
                        <?php $this->load->view('header_scan'); ?>
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
                        <h3 class="box-title">Hasil Scan</h3>
                    </div>
                    <div class="box-body">
                        <?php echo $form->open(); ?>
                        <div class="row">
                            <?php if ($jenis == "MUSTAHIK") : ?>
                            <div class="col-md-6 text-center">
                                <img class="img-responsive"
                                    src="https://mrbjtangsel.org/mrbj_web/assets/uploads/zis/1/foto_ktp/<?= $d['foto_ktp'] ?>"
                                    alt="">
                            </div>
                            <div class="col-md-6 center">
                                <table cellpadding="5">
                                    <tr>
                                        <td>QR Code / NIK</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td><strong><?php echo $d['nik'] ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td><strong><?php echo $d['jenis_kelamin'] ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Nama</td>
                                        <td>&nbsp;: </td>
                                        <td> <strong><?php echo $d['nama'] ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Skor</td>
                                        <td>&nbsp;: </td>
                                        <td> <strong><?php echo $d['score'] ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Surveyor</td>
                                        <td>&nbsp;: </td>
                                        <td> <strong><?php echo $d['surveyor'] ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Tgl Lahir</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td><strong><?php echo $d['tgl_lahir'] ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td><strong><?php echo $d['alamat'] ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>RT</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td><strong><?php echo $d['rt'] ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>RW</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td><strong><?php echo $d['rw'] ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Provinsi</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td><strong><?php echo $d['provinsi'] ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Kabupaten</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td><strong><?php echo $d['kabupaten'] ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Kecamatan</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td><strong><?php echo $d['kecamatan'] ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Kelurahan</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td><strong><?php echo $d['kelurahan'] ?></strong></td>
                                    </tr>

                                </table>
                            </div>
                            <?php elseif ($jenis == "MUDHOHI") : ?>

                            <div class="col-md-12">
                                <table cellpadding="5">
                                    <tr>
                                        <td>Nama Mudhohi </td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td><b><?= $d['nama'] ?></b></td>
                                    </tr>

                                    <tr>
                                        <td>Tanggal Transaksi </td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td><b><?= $d['tgl_transaksi'] ?></b></td>
                                    </tr>
                                    <tr>
                                        <td>No Transaksi </td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td><b><?= $d['no_transaction'] ?></b></td>
                                    </tr>
                                    <tr>
                                        <td>Cara Penjualan </td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td><b><?= $d['cara_penjualan'] ?></b></td>
                                    </tr>

                                    <tr>
                                        <td>Code </td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td><b><?= $d['code'] ?></b></td>
                                    </tr>
                                    <tr>
                                        <td>Atas Nama </td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td><b><?= $d['atasnama'] ?></b></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Qurban</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td><b><?= $d['type'] ?></b></td>
                                    </tr>
                                    <tr>
                                        <td>keterangan</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td><b><?= $d['keterangan'] ?></b></td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Bungkus/Kantong</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td>
                                            <h1><b>
                                                    <?= $d['jumlah_bungkus'] ?></b></h1>
                                        </td>
                                    </tr>


                                </table>
                            </div>

                            <?php elseif ($jenis == "KUPON") : ?>
                            <div class="col-md-12">
                                <table cellpadding="5">
                                    <tr>
                                        <td>Nama Penerima </td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td><b><?= $d['nama'] ?></b></td>
                                    </tr>
                                    <tr>
                                        <td>Campaign </td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td><b><?= $d['nama'] ?></b></td>
                                    </tr>
                                    <tr>
                                        <td>No HP </td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td><b><?= $d['nohp'] ?></b></td>
                                    </tr>
                                    <tr>
                                        <td>QR </td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td><b><?= $d['qr'] ?></b></td>
                                    </tr>
                                    <tr>
                                        <td>Special1 </td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td><b><?= $d['special1'] ?></b></td>
                                    </tr>
                                    <tr>
                                        <td>Special2 </td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td><b><?= $d['special2'] ?></b></td>
                                    </tr>
                                    <tr>
                                        <td>Special3 </td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td><b><?= $d['special3'] ?></b></td>
                                    </tr>
                                    <tr>
                                        <td>Special4 </td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td><b><?= $d['special4'] ?></b></td>
                                    </tr>
                                    <tr>
                                        <td>Special5 </td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td><b><?= $d['special5'] ?></b></td>
                                    </tr>
                            </div>

                            <?php endif; ?>
                            <?php echo $form->close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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