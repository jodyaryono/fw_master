<form  method="post">
  <?php echo modules::run('adminlte/widget/box_open', 'Anggota'); ?>
  <div class="row">

    <div class="col-md-12">
      Kode Anggota <input type="text" name="cari" id="cari"><button type="submit" name="button-cari" value="cari"> Cari</button>
    </div>
    <div class="col-md-12">
      <table>
        <tr>
          <td>Kode</td>
          <td> :</td>
          <td>Maksimum</td>
          <td>:</td>
          <td>Jenis</td>
          <td>: Umum</td>
        </tr>
        <tr>
          <td>Nama</td>
          <td>:</td>
          <td>Tanggungan</td>
          <td></td>
        </tr>
        <tr>
          <td > Alamat </td>
          <td colspan="4">:</td>
        </tr>
      </table>
    </div>
  </div>
  <?php echo modules::run('adminlte/widget/box_close'); ?>
</form>
