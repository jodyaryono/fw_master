<?php



class Qrcode_m extends MY_Model

{

  public function monitoringNonMRBJ()

  {

    $sql = "SELECT zl.lokasi,zs.source,COUNT(zs.id)kupon,active,IFNULL(lc.digunakan,0)digunakan,(COUNT(zs.id)- IFNULL(lc.digunakan,0))sisa

    ,IFNULL(lc.digunakan,0)/COUNT(zs.id)*100 AS progress,

    sum(kantong) kantong,

    IFNULL(digunakan_kantong,0)digunakan_kantong

     FROM zis_allowscan zs LEFT JOIN zis_location zl ON zs.lokasi=zl.id 

    

    LEFT JOIN (

    SELECT source,lokasi,count(*)digunakan,SUM(kantong)digunakan_kantong FROM zis_distribution

    GROUP BY source,lokasi

    )lc ON  lc.lokasi=zl.id AND zs.source = lc.source 

    

    WHERE zl.id<>1

    

    GROUP BY zl.lokasi,zs.source,source ORDER BY zl.id";


    return $this->db->query($sql)->result();
  }

  public function monitoring()

  {

    $sql = "SELECT
    zl.lokasi,
    zs.source,
    COUNT(zs.id) kupon,
    active,
    COUNT(IF(status='PENDAFTARAN', 0, NULL)) pendaftaran,
    COUNT(IF(status='PENGAMBILAN', 0, NULL)) pengambilan,
    (COUNT(zs.id) - COUNT(IF(status='PENGAMBILAN', 0, NULL))) sisa ,
    IFNULL(COUNT(IF(status='PENGAMBILAN', 0, NULL)), 0) / COUNT(zs.id) * 100 AS progress
FROM
    zis_allowscan zs
LEFT JOIN zis_location zl ON
    zs.lokasi = zl.id

GROUP BY
    zl.lokasi,
    zs.source,
    source
ORDER BY
    zl.id
";


    return $this->db->query($sql)->result();
  }

  public function isAllowed($qrcode)

  {

    $sql = "SELECT *,zl.id id_lokasi FROM zis_allowscan zs JOIN zis_location zl ON zs.lokasi=zl.id WHERE qrcode='$qrcode'";

    return $this->db->query($sql)->row();
  }



  public function updateScan($qrcode, $totscan)
  {
    $arr = array(
      'jumlah_scan' => $totscan,
      'last_scan' => date('Y-m-d H:i:s')
    );

    $this->db->where('qrcode', $qrcode);
    $this->db->update('zis_allowscan', $arr);
  }



  public function updateScanOld($qrcode, $totscan)

  {

    $arr = array(

      'scan' => $totscan,

      'last_scan' => date('Y-m-d H:i:s')

    );

    $this->db->where('qrcode', $qrcode);

    $this->db->update('zis_distribution', $arr);
  }


  public function useCouponPengambilan($qrcode)

  {

    $user = $this->ion_auth->user()->row();

    $this->db->where('qrcode', $qrcode);
    $dat = $this->db->get('zis_allowscan')->row();

    $arr = array(

      'tgljam_pengambilan' => date('Y-m-d H:i:s'),

      'status' => 'PENGAMBILAN',

      'petugas_pengambilan' => $user->id,

      'jumlah_scan' => $dat->jumlah_scan + 1,

      'last_scan' => date('Y-m-d H:i:s'),

    );

    $this->db->where('qrcode', $qrcode);
    $this->db->update('zis_allowscan', $arr);
  }
  public function useCoupon($qrcode)

  {

    $user = $this->ion_auth->user()->row();

    $this->db->where('qrcode', $qrcode);
    $dat = $this->db->get('zis_allowscan')->row();

    $arr = array(

      'tgljam_pendaftaran' => date('Y-m-d H:i:s'),

      'status' => 'PENDAFTARAN',

      'petugas_pendaftaran' => $user->id,

      'jumlah_scan' => $dat->jumlah_scan + 1,

      'last_scan' => date('Y-m-d H:i:s'),

    );

    $this->db->where('qrcode', $qrcode);
    $this->db->update('zis_allowscan', $arr);
  }


  public function useCouponOld($qrcode, $source, $lokasi, $kantong)

  {

    $user = $this->ion_auth->user()->row();

    $arr = array(

      'txn_datetime' => date('Y-m-d H:i:s'),

      'qrcode' => $qrcode,

      'source' => $source,

      'user_id' => $user->id,

      'jumlah_scan' => 1,

      'lokasi' => $lokasi,

      'last_scan' => date('Y-m-d H:i:s'),

      'kantong' => $kantong

    );

    $this->db->insert('zis_distribution', $arr);
  }





  public function isCouponUsedPendaftaran($qrcode)

  {

    $sql = "SELECT * FROM zis_allowscan WHERE qrcode='$qrcode' AND status='PENDAFTARAN'";

    return $this->db->query($sql)->row_array();
  }
  public function isCouponUsed($qrcode)

  {

    $sql = "SELECT * FROM zis_allowscan WHERE qrcode='$qrcode'";

    return $this->db->query($sql)->row_array();
  }

  public function isCouponUsed_old($qrcode)

  {

    $sql = "SELECT * FROM zis_distribution WHERE qrcode='$qrcode'";

    return $this->db->query($sql)->row_array();
  }



  public function getApiOneMustahik($nik)

  {

    $url = REMOTE_URL . '/api/zis_api/get_mustahik/' . $nik;



    //echo $url;

    // $ch = curl_init($url);

    // $result = curl_exec($ch);

    // curl_close($ch);

    //echo json_decode($result, true);;

    $json = file_get_contents($url);

    $json = json_decode($json, true);

    return $json;
  }

  public function getApiListMustahik()

  {

    $url = REMOTE_URL . '/api/zis_api/list_mustahik/';

    $json = file_get_contents($url);

    $json = json_decode($json, true);

    return $json;
  }

  public function getApiCountMustahik()

  {

    $url = REMOTE_URL . '/api/zis_api/count_mustahik/';

    $json = file_get_contents($url);

    $json = json_decode($json, true);

    return $json;
  }



  public function getApiGetOneCouponMuzakih($qrcode)

  {

    $url = REMOTE_URL . '/api/zis_api/get_one_coupon/' . $qrcode;

    $json = file_get_contents($url);

    $json = json_decode($json, true);

    return $json;
  }



  public function getApiGetAllCouponMuzakih()

  {

    $url = REMOTE_URL . '/api/zis_api/get_alll_coupon/';

    $json = file_get_contents($url);

    $json = json_decode($json, true);

    return $json;
  }



  public function getApiGetCountAllCouponMuzakih()

  {

    $url = REMOTE_URL . '/api/zis_api/get_count_alll_coupon/';

    $json = file_get_contents($url);

    $json = json_decode($json, true);

    return $json;
  }



  public function getApiGetCouponQr($qrcode)

  {

    $url = REMOTE_URL . '/api/zis_api/get_coupon_qr/' . $qrcode;

    $json = file_get_contents($url);

    $json = json_decode($json, true);

    return $json;
  }



  public function getApiGetAllCouponQr()

  {

    $url = REMOTE_URL . 'api/zis_api/get_alll_coupon_qr/';

    $json = file_get_contents($url);

    $json = json_decode($json, true);

    return $json;
  }



  public function getApiGetAllCountCouponQr()

  {

    $url = REMOTE_URL . 'api/zis_api/get_all_count_coupon_qr/';

    $json = file_get_contents($url);

    $json = json_decode($json, true);

    return $json;
  }



  public function get_batch()

  {

    $sql = "SELECT tbl_a.id,tbl_a.name,tbl_a.total,IFNULL(tbl_b.total,0) scan,tbl_a.total-IFNULL(tbl_b.total,0) sisa

    FROM(

      SELECT a.id,a.name,COUNT(b.id)total

      FROM qr_batch a JOIN qr_data b

      ON a.id=b.batch

      WHERE a.id IS NOT null

      GROUP BY a.name

    )tbl_a LEFT JOIN

    (

      SELECT a.id,a.name,IFNULL(COUNT(b.id),0)total

      FROM qr_batch a LEFT JOIN qr_data b

      ON a.id=b.batch

      WHERE b.entry_datetime IS NOT NULL

      GROUP BY a.name) tbl_b

      ON tbl_a.id=tbl_b.id ORDER BY tbl_a.id";

    return $this->db->query($sql)->result();
  }



  public function get_scanner($userid)

  {

    $qry = "SELECT * FROM qr_scanner WHERE user_id=$userid";

    return $this->db->query($qry)->row_array();
  }

  public function get_scanned($qrcode)

  {

    $qry = 'SELECT qr_scanned.id,

      qr_scanned.id_mustahik,

      qr_scanned.id_scanner,

      qr_scanned.`datetime`,

      qr_scanned.id_user,

      qr_scanned.qrcode,

      qr_scanned.id_batch,

      qr_mustahik.nama

      FROM qr_scanned qr_scanned

      INNER JOIN qr_mustahik qr_mustahik

      ON (qr_scanned.id_mustahik = qr_mustahik.id)

      WHERE qr_scanned.qrcode="' . $qrcode . '"';

    return $this->db->query($qry)->row_array();
  }

  public function get_scanned_user($id_user)

  {

    $qry = 'SELECT qr_scanned.id,

      qr_scanned.id_mustahik,

      qr_scanned.id_scanner,

      qr_scanned.`datetime`,

      qr_scanned.id_user,

      qr_scanned.qrcode,

      qr_scanned.id_batch,

      qr_mustahik.nama

      FROM qr_scanned qr_scanned

      INNER JOIN qr_mustahik qr_mustahik

      ON (qr_scanned.id_mustahik = qr_mustahik.id)

      WHERE qr_scanned.id_user=' . $id_user;

    return $this->db->query($qry)->result_array();
  }
}
