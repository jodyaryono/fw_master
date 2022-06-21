<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tester extends Admin_Controller {

  public function __construct()
  {
    parent::__construct();
    require_once 'vendor/autoload.php';
  }

  public function fake_name($num)
  {
    $faker = Faker\Factory::create('id_ID');
    for ($i=0; $i < $num ; $i++) {
      echo $faker->randomDigit."-".$faker->name;
      echo "<br>";

      //echo $faker->shuffle('hello, world').'<br>';
    }
  }

  public function num_rnd($num)
  {
    for ($i=0; $i <$num ; $i++) {

      $arr_data=array('apple','banana','anggur','jambu');
      $hasil=$this->rnd_data($arr_data);
      echo $arr_data[$hasil];
      echo "<br>";
      echo $this->rnd_number(0,5);
      echo "<br>";
    }
  }

  function generateRandomString($length = 10) {
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i = 0; $i < $length; $i++) {
          $randomString .= $characters[rand(0, $charactersLength - 1)];
      }
      return $randomString;
  }



  function rand_date($min_date, $max_date) {
    /* Gets 2 dates as string, earlier and later date.
    Returns date in between them.
    */

    $min_epoch = strtotime($min_date);
    $max_epoch = strtotime($max_date);

    $rand_epoch = rand($min_epoch, $max_epoch);

    return date('Y-m-d H:i:s', $rand_epoch);
  }

  public function generate_table_id($table_name,$kelurahan_id="")
  {
    if ($kelurahan_id!=="") {
      $sql="select id from $table_name where kelurahan=$kelurahan_id";
    }else{
      $sql="select id from $table_name ";
    }
    $data=$this->db->query($sql);

    if ($data) {
      $data=$data->result();
      $arr = array();
      foreach ($data as $key => $value) {
        array_push($arr,$value->id);
      }
      return $arr;
    }
    else{
      return array();
    }
  }

  public function generate_surat_masuk($num,$kelurahan_id)
  {
    $faker = Faker\Factory::create('id_ID');
    for ($i=0; $i <$num ; $i++) {
      $tanggal_surat=$this->rand_date('2021-01-01','2021-09-01');
      $nomor_surat=$faker->numberBetween(1000,9999);
      $judul_surat="Surat ".$this->rnd_string();
      $pengirim_surat=$this->rnd_data($this->generate_table_id('surat_pengirim',$kelurahan_id));
      $perihal_surat=$this->rnd_data($this->generate_table_id('surat_perihal',$kelurahan_id));
      $tujuan_surat=$this->rnd_data($this->generate_table_id('surat_tujuan',$kelurahan_id));
      $tipe_surat=$this->rnd_data($this->generate_table_id('surat_tipe',$kelurahan_id));
      $jenis_surat=$this->rnd_data($this->generate_table_id('surat_jenis',$kelurahan_id));
      $sifat_surat=$this->rnd_data($this->generate_table_id('surat_sifat'));
      $status_surat=$this->rnd_data($this->generate_table_id('surat_status'));
      $ringkasan_surat="";
      $created_by=10;
      $created_datetime=$tanggal_surat;

      $sql="INSERT INTO surat";
      $sql.="(tanggal_surat, nomor, judul_surat, perihal_surat, pengirim_surat, tujuan_surat, tipe_surat, jenis_surat, sifat_surat, status_surat, ringkasan_surat, created_by, created_datetime, id_kelurahan)";
      $sql.="VALUES('$tanggal_surat', '$nomor_surat', '$judul_surat', $perihal_surat, $pengirim_surat, $tujuan_surat, $tipe_surat, $jenis_surat, $sifat_surat, $status_surat, '$ringkasan_surat',  $created_by, '$created_datetime', $kelurahan_id);";
      //echo $sql;die;
      $this->db->query($sql);
    }
    echo "generate data berhasil";
  }

  public function rnd_number($min,$max)
  {
    return rand($min,$max);
  }

  public function rnd_string()
  {
    $arr = array(
      'Pengumuman','Penunjukan','Undangan Rapat','Disposisi','Undangan Penunjukan','Laporan Antara','Pengumuman Menteri','Pengumuman Dirjen'
    );
    return $this->rnd_data($arr);
  }

  public function rnd_data($arr_data,$num_arr=1)
  {
    $random_keys=array_rand($arr_data,$num_arr);
    return $arr_data[$random_keys];
  }




}
