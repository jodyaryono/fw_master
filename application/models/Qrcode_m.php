<?php

class Qrcode_m extends MY_Model
{

  public function getApiOneMustahik($nik)
  {
    $url = 'https://mrbjtangsel.org/mrbj_web/api/zis/get_mustahik/' . $nik;

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
    $url = 'https://mrbjtangsel.org/mrbj_web/api/zis/list_mustahik/';
    $json = file_get_contents($url);
    $json = json_decode($json, true);
    return $json;
  }
  public function getApiCountMustahik()
  {
    $url = 'https://mrbjtangsel.org/mrbj_web/api/zis/count_mustahik/';
    $json = file_get_contents($url);
    $json = json_decode($json, true);
    return $json;
  }

  public function getApiGetOneCouponMuzakih($qrcode)
  {
    $url = 'https://zis.mrbjtangsel.org/api/zis/get_one_coupon/' . $qrcode;
    $json = file_get_contents($url);
    $json = json_decode($json, true);
    return $json;
  }

  public function getApiGetAllCouponMuzakih()
  {
    $url = 'https://zis.mrbjtangsel.org/api/zis/get_alll_coupon/';
    $json = file_get_contents($url);
    $json = json_decode($json, true);
    return $json;
  }

  public function getApiGetCountAllCouponMuzakih()
  {
    $url = 'https://zis.mrbjtangsel.org/api/zis/get_count_alll_coupon/';
    $json = file_get_contents($url);
    $json = json_decode($json, true);
    return $json;
  }

  public function getApiGetCouponQr($qrcode)
  {
    $url = 'https://zis.mrbjtangsel.org/api/zis/get_coupon_qr_get/' . $qrcode;
    $json = file_get_contents($url);
    $json = json_decode($json, true);
    return $json;
  }

  public function getApiGetAllCouponQr()
  {
    $url = 'https://zis.mrbjtangsel.org/api/zis/get_alll_coupon_qr/';
    $json = file_get_contents($url);
    $json = json_decode($json, true);
    return $json;
  }

  public function getApiGetAllCountCouponQr()
  {
    $url = 'https://zis.mrbjtangsel.org/api/zis/get_all_count_coupon_qr/';
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