<?php


// -----------------------------------------------------------------------

/**
 * varDebug () - Add this method to a CodeIgniter Helper.
 * I named mine - debug_helper.php
 * -----------------------------------------------------------------------
 *
 * Formatted output of var_dump() etc;
 */
if ( ! function_exists('varDebug'))
{
    /**
     * Debug Helper
     * -------------------------------------------------------------------
     * Outputs the given variable(s) with color formatting and location
     *
     * @param    mixed    - variables to be output
     */
    function varDebug()
    {
        list($callee) = debug_backtrace();

        $arguments = func_get_args();

        $total_arguments = func_num_args();

        echo '<div><fieldset style="background: #fefefe !important; border:1px red solid; padding:15px">';
        echo '<legend style="background:lightgrey; padding:5px;">'.$callee['file'].' @line: '.
             $callee['line'].'</legend><pre><code>';

        $i = 0;
        foreach ($arguments as $argument) {
            echo '<strong>Debug #'.++$i.' of '.$total_arguments.'</strong>: '.'<br>';
            var_dump($argument);
        }

        echo "</code></pre></fieldset><div><br>";

        exit;
    }
}

/**
 * -----------------------------------------------------------------------
 * Filename: debug_helper.php
 * Location: ./app/Helpers/debug_helper.php
 * -----------------------------------------------------------------------
 */
function date_dsp($dateval)
{
  if(date('d/m/Y', strtotime($dateval))=='01/01/1970'){
    return "";
  }else{
    return date('d/m/Y', strtotime($dateval));
  }
}

function left($str, $length) {
  return substr($str, 0, $length);
}

function right($str, $length) {
  return substr($str, -$length);
}

function date_db($dateval)
{
  date_default_timezone_set("Asia/Bangkok");
  $yy=right($dateval,4);
  $dd=left($dateval,2);
  $mm=substr($dateval,3,2);

  $datevalx=$yy.'-'.$mm.'-'.$dd;
  $timestamp = strtotime($datevalx);
  if ($timestamp === FALSE) {
    $timestamp = strtotime(str_replace('/', '-', $dateval));
  }
  $date = date('Y-m-d', $timestamp);
  if($date){
    return $date;
  }else{
    return null;
  }

}
function generate_date_total($data)
{

}
function curr_date(){
  date_default_timezone_set('Asia/Jakarta');
  $dt = date('Y-m-d H:i:s');
  return $dt;
}

function id_date($dt)
{
  $hari=date("d",strtotime($dt));
  $bulan=date("n",strtotime($dt));
  $tahun=date("Y",strtotime($dt));
  $bulan=bulan_indonesia($bulan);
  //return date_format(new DateTime($dt),'d F Y');
  return $hari." ".$bulan." ".$tahun;
}

function bulan_indonesia($month)
{
  switch ($month) {
    case 1:
    return "JANUARI";
    break;
    case 2:
    return "FEBRUARI";
    break;
    case 3:
    return "MARET";
    break;
    case 4:
    return "APRIL";
    break;
    case 5:
    return "MEI";
    break;
    case 6:
    return "JUNI";
    break;
    case 7:
    return "JULI";
    break;
    case 8:
    return "AGUSTUS";
    break;
    case 9:
    return "SEPTEMBER";
    break;
    case 10:
    return "OKTOBER";
    break;
    case 11:
    return "NOVEMBER";
    break;
    case 12:
    return "DESEMBER";
    break;

  }
}

function redirect_window($url)
{
  echo "<script>";
  echo "function openInNewTab(url) {
    var win = window.open(url, '_blank');
    win.focus();
  }
  openInNewTab('$url');
  ";
  echo "</script>";
}

function generate_no_register(){
  $CI =& get_instance();
  $CI->load->model(array('Admin_user_model','Skck_model'));
  $_reg=$CI->Skck_model->get_numbering('REGISTER');
  $_register_format=$CI->Admin_user_model->get_settings('REGISTER_FORMAT');
  $_kode_penerbit=$CI->Admin_user_model->get_settings('KODE_PENERBIT');
  $_reg_digit=$_reg->digit_length;
  $_reg_last_number=$_reg->last_number;
  $_reg_fill_blank=$_reg->fill_blank;
  $reg=str_repeat($_reg_fill_blank,($_reg_digit-strlen($_reg_last_number))).(string)$_reg_last_number;
  //echo $reg;
  $_register_format=str_replace("{kode_penerbit}",$_kode_penerbit,$_register_format);
  $_register_format=str_replace("{running_number}",$reg,$_register_format);
  return $_register_format;
}
function generate_no_register2($publisher_id){
  $CI =& get_instance();
  $CI->load->model(array('Admin_user_model','Skck_model'));
  $_reg=$CI->Skck_model->get_numbering('REGISTER');
  $_register_format=$CI->Admin_user_model->get_settings('REGISTER_FORMAT');
  $_kode_penerbit=$publisher_id;
  $_reg_digit=$_reg->digit_length;
  $_reg_last_number=$_reg->last_number;
  $_reg_fill_blank=$_reg->fill_blank;
  $reg=str_repeat($_reg_fill_blank,($_reg_digit-strlen($_reg_last_number))).(string)$_reg_last_number;
  //echo $reg;
  $_register_format=str_replace("{kode_penerbit}",$_kode_penerbit,$_register_format);
  $_register_format=str_replace("{running_number}",$reg,$_register_format);
  return $_register_format;
}

function generate_no_skck($nomor_skck,$auto=0){
  $CI =& get_instance();
  $CI->load->model(array('Admin_user_model','Skck_model'));
  $_skck_format=$CI->Skck_model->get_publisher_setting('SKCK_FORMAT');
  $_auto_num_skck=$CI->Skck_model->get_publisher_setting('_AUTO_NUM_SKCK');

  $_digit_num_skck=$CI->Skck_model->get_publisher_setting('_DIGIT_NUM_SKCK');

  if($_auto_num_skck==1){
    //update running number
    $CI->Skck_model->update_publisher_setting('_LAST_NUM_SKCK');
    $_last_num_skck=$CI->Skck_model->get_publisher_setting('_LAST_NUM_SKCK');
    $nomor_skck=str_repeat("0",($_digit_num_skck-strlen($_last_num_skck))).(string)$_last_num_skck;
    $_skck_format=str_replace("{SKCK}",$nomor_skck,$_skck_format);
  }else{
    if($nomor_skck==""){
      $_skck_format=str_replace("{SKCK}","                 ",$_skck_format);
    }else{
      $_skck_format=str_replace("{SKCK}",$nomor_skck,$_skck_format);
    }
  }
  //var_dump($nomor_skck);
  //var_dump($_skck);
  $romawi_bulan=get_romawi_bulan();
  $_skck_format=str_replace("{bulan_rom_2}",$romawi_bulan,$_skck_format);
  $_skck_format=str_replace("{tahun_4}",date('Y'),$_skck_format);

  return $_skck_format;
}

function generate_no_skck2($nomor_skck,$publisher){
  $CI =& get_instance();
  $CI->load->model(array('Admin_user_model','Skck_model'));
  $_skck_format=$CI->Skck_model->get_publisher_setting2('SKCK_FORMAT',$publisher);
  $_auto_num_skck=$CI->Skck_model->get_publisher_setting2('_AUTO_NUM_SKCK',$publisher);

  $_digit_num_skck=$CI->Skck_model->get_publisher_setting2('_DIGIT_NUM_SKCK',$publisher);

  if($_auto_num_skck==1){
    //update running number
    $CI->Skck_model->update_publisher_setting2('_LAST_NUM_SKCK',$publisher);
    $_last_num_skck=$CI->Skck_model->get_publisher_setting2('_LAST_NUM_SKCK',$publisher);
    $nomor_skck=str_repeat("0",($_digit_num_skck-strlen($_last_num_skck))).(string)$_last_num_skck;
    $_skck_format=str_replace("{SKCK}",$nomor_skck,$_skck_format);
  }else{
    if($nomor_skck==""){
      $_skck_format=str_replace("{SKCK}","                 ",$_skck_format);
    }else{
      $_skck_format=str_replace("{SKCK}",$nomor_skck,$_skck_format);
    }
  }
  //var_dump($nomor_skck);
  //var_dump($_skck);
  $romawi_bulan=get_romawi_bulan();
  $_skck_format=str_replace("{bulan_rom_2}",$romawi_bulan,$_skck_format);
  $_skck_format=str_replace("{tahun_4}",date('Y'),$_skck_format);

  return $_skck_format;
}

function show_nomor_skck($nomor_skck){
  $CI =& get_instance();
  $CI->load->model(array('Admin_user_model','Skck_model'));
  $_skck_format=$CI->Skck_model->get_publisher_setting('SKCK_FORMAT');
  $_auto_num_skck=$CI->Skck_model->get_publisher_setting('_AUTO_NUM_SKCK');
  $_digit_num_skck=$CI->Skck_model->get_publisher_setting('_DIGIT_NUM_SKCK');

  if($nomor_skck!==""){
    if(($_digit_num_skck-strlen($nomor_skck))>0){
      $nomor_skck=str_repeat("0",($_digit_num_skck-strlen($nomor_skck))).(string)$nomor_skck;
    }
      $_skck_format=str_replace("{SKCK}",$nomor_skck,$_skck_format);
  }else{
    $_skck_format=str_replace("{SKCK}","                 ",$_skck_format);
  }
  //var_dump($nomor_skck);
  //var_dump($_skck);
  $romawi_bulan=get_romawi_bulan();
  $_skck_format=str_replace("{bulan_rom_2}",$romawi_bulan,$_skck_format);
  $_skck_format=str_replace("{tahun_4}",date('Y'),$_skck_format);

  return $_skck_format;
}



function get_current_auto_skck(){
  $CI =& get_instance();
  $_last_num_skck=$CI->Skck_model->get_publisher_setting('_LAST_NUM_SKCK');
  $_digit_num_skck=$CI->Skck_model->get_publisher_setting('_DIGIT_NUM_SKCK');
  $nomor_skck=str_repeat("0",($_digit_num_skck-strlen($_last_num_skck))).(string)$_last_num_skck;
  return $nomor_skck;
}

function get_romawi_bulan()
{
  switch (date('m')) {
    case 1:
    return 'I';
    break;
    case 2:
    return 'II';
    break;
    case 3:
    return 'III';
    break;
    case 4:
    return 'IV';
    break;
    case 5:
    return 'V';
    break;
    case 6:
    return 'VI';
    break;
    case 7:
    return 'VII';
    break;
    case 8:
    return 'VIII';
    break;
    case 9:
    return 'IX';
    break;
    case 10:
    return 'X';
    break;
    case 11:
    return 'XI';
    break;
    case 12:
    return 'XII';
    break;
  }
}
function upload_file($upload_name,$config){
  $CI =& get_instance();
  $CI->load->library('upload', $config);
  $CI->upload->initialize($config);

  if ( ! $CI->upload->do_upload($upload_name))
  {
    $error = array('error' => $CI->upload->display_errors());
    return $error;
  }
  else
  {
    $data = array('upload_data' => $CI->upload->data());
    return $data;
  }
}


function groups_admin(){
  return array('webmaster', 'admin');
}


function is_pk($primary_key){
  if($primary_key){
    return $primary_key;
  }else{
    return null;
  }
}

function capitalize_post($postarray){

  foreach ($postarray as $key_name => $key_value) {
    $postarray[$key_name] = strtoupper($key_value);
    if($key_name=='email'){
      $postarray[$key_name] = strtolower($key_value);
    }
  }
  return $postarray;
}

function range_date()
{
  return "'Hari ini': [moment(), moment()],
  'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
  '7 Hari terakhir': [moment().subtract(6, 'days'), moment()],
  '30 hari terakhir': [moment().subtract(29, 'days'), moment()],
  'Bulan ini': [moment().startOf('month'), moment().endOf('month')],
  'Bulan lalu': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
  'Sampai Saat ini': [moment().subtract(10, 'year').startOf('month'), moment()],
  'Tahun lalu': [moment().subtract(1, 'year').startOf('month'), moment().subtract(1, 'year').endOf('year')]";

}
function format_number_html($number)
{
  return "<div align='right'>" . number_format($value) . '</div>';
}
function penyebut($nilai)
{
  $nilai = abs($nilai);
  $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
  $temp = "";
  if ($nilai < 12) {
    $temp = " " . $huruf[$nilai];
  } else if ($nilai < 20) {
    $temp = penyebut($nilai - 10) . " belas";
  } else if ($nilai < 100) {
    $temp = penyebut($nilai / 10) . " puluh" . penyebut($nilai % 10);
  } else if ($nilai < 200) {
    $temp = " seratus" . penyebut($nilai - 100);
  } else if ($nilai < 1000) {
    $temp = penyebut($nilai / 100) . " ratus" . penyebut($nilai % 100);
  } else if ($nilai < 2000) {
    $temp = " seribu" . penyebut($nilai - 1000);
  } else if ($nilai < 1000000) {
    $temp = penyebut($nilai / 1000) . " ribu" . penyebut($nilai % 1000);
  } else if ($nilai < 1000000000) {
    $temp = penyebut($nilai / 1000000) . " juta" . penyebut($nilai % 1000000);
  } else if ($nilai < 1000000000000) {
    $temp = penyebut($nilai / 1000000000) . " milyar" . penyebut(fmod($nilai, 1000000000));
  } else if ($nilai < 1000000000000000) {
    $temp = penyebut($nilai / 1000000000000) . " trilyun" . penyebut(fmod($nilai, 1000000000000));
  }
  return $temp;
}

function terbilang($nilai)
{
  if ($nilai < 0) {
    $hasil = "minus " . trim(penyebut($nilai));
  } else {
    $hasil = trim(penyebut($nilai));
  }
  return ucfirst($hasil)." rupiah";
}
function buatrp($angka)
{
  $jadi = "Rp. " . number_format($angka, 2, ',', '.');
  return $jadi;
}
function pfl($text1,$text2="",$text3="",$text4=""){
  //Function to print text return length
  return sprintf("%' 6s", $text1);
}
function objectToArray($d)
{
  if (is_object($d)) {
    // Gets the properties of the given object
    // with get_object_vars function
    $d = get_object_vars($d);
  }

  if (is_array($d)) {
    /*
    * Return array converted to object
    * Using __FUNCTION__ (Magic constant)
    * for recursive call
    */
    return array_map(__FUNCTION__, $d);
  } else {
    // Return array
    return $d;
  }
}

function list_type_bayar(){
  $data =array(
    array(1,'Cash'),
    array(2,'EDC'),
    array(3,'Transfer'),
  );
  return $data;
}

function list_tindak_lanjut(){
  $data =array(
    array(1,'Monitoring'),
    array(2,'Tidak')
  );
  return $data;
}

function validateDate($str){
  return (bool)strtotime($str);
}


function list_sifat_bantuan(){
  $data =array(
    array(1,'Rutin'),
    array(2,'Isidentil'),
    array(3,'Pemberdayaan'),
    array(4,'Biasa')
  );
  return $data;
}


function list_bentuk_bantuan(){
  $data =array(
    array(1,'Uang'),
    array(2,'Barang'),
  );
  return $data;
}


function list_kelayakan(){
  $layak =array(
    array(1,'Perlu perhatian khusus'),
    array(2,'Layak dibantu'),
    array(3,'Tidak layak dibantu')
  );
  return $layak;
}

function list_ashnaf(){
  $ashnaf =array(
    array(1,'Fakir Miskin'),
    array(2,'Mualaf'),
    array(3,'Gharim'),
    array(4,'Ibnu Sabil'),
    array(5,'Fisabillilah'),
  );
  return $ashnaf;
}

function list_days()
{
  $day = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31);
  return $day;
}
function list_months(){
  $month =array(
    array(1,'Jan'),
    array(2,'Feb'),
    array(3,'Mar'),
    array(4,'Apr'),
    array(5,'Mei'),
    array(6,'Jun'),
    array(7,'Jul'),
    array(8,'Ags'),
    array(9,'Sep'),
    array(10,'Okt'),
    array(11,'Nov'),
    array(12,'Des'),
  );
  return $month;
}
function list_years(){
  $year=array(
    1930,
    1931,
    1932,
    1933,
    1934,
    1935,
    1936,
    1937,
    1938,
    1939,
    1940,
    1941,
    1942,
    1943,
    1944,
    1945,
    1946,
    1947,
    1948,
    1949,
    1950,
    1951,
    1952,
    1953,
    1954,
    1955,
    1956,
    1957,
    1958,
    1959,
    1960,
    1961,
    1962,
    1963,
    1964,
    1965,
    1966,
    1967,
    1968,
    1969,
    1970,
    1971,
    1972,
    1973,
    1974,
    1975,
    1976,
    1977,
    1978,
    1979,
    1980,
    1981,
    1982,
    1983,
    1984,
    1985,
    1986,
    1987,
    1988,
    1989,
    1990,
    1991,
    1992,
    1993,
    1994,
    1995,
    1996,
    1997,
    1998,
    1999,
    2000,
    2001,
    2002,
    2003,
    2004,
    2005,
    2006,
    2007,
    2008,
    2009,
    2010,
    2011,
    2012,
    2013,
    2014,
    2015,
    2016,
    2017,
    2018,
    2019,
    2020,
    2021,
    2022,
    2023,
    2024,
    2025,
    2026,
    2027,
    2028,
    2029,
    2030,
    2031,
    2032,
    2033,
    2034,
    2035,
    2036,
    2037,
    2038,
    2039,
    2040,
    2041,
    2042,
    2043,
    2044,
    2045,
    2046,
    2047,
    2048,
    2049,
    2050,
    2051
  );
  return $year;
}
