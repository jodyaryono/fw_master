<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Qrcode_app extends Admin_Controller
{
  function __construct()
  {
    // Call the Model constructor
    parent::__construct();
    $this->load->model('Qrcode_m');
    $this->load->library('form_builder');
    $this->load->library('ciqrcode');
  }

  public function data()
  {
    $crud = $this->generate_crud('qr_data');
    $crud->set_relation('batch', 'qr_batch', 'name');
    $crud->unset_add();
    $crud->unset_delete();
    $this->mPageTitle = 'QR Data Scanned';
    $this->render_crud();
  }

  public function belum_scan()
  {
    $crud = $this->generate_crud('qr_data');
    $crud->set_relation('batch', 'qr_batch', 'name');
    $crud->where('entry_datetime is null');
    $crud->where('qr_data.aktif', 'Y');
    $crud->unset_add();
    $crud->unset_delete();
    $crud->unset_edit();
    $this->mPageTitle = 'QR Data Belum Scanned';
    $this->render_crud();
  }

  public function sudah_scan()
  {
    $crud = $this->generate_crud('qr_data');
    $crud->set_relation('batch', 'qr_batch', 'name');
    $crud->where('entry_datetime is not null');
    $crud->where('qr_data.aktif', 'Y');
    $crud->unset_add();
    $crud->unset_delete();
    $crud->unset_edit();
    $this->mPageTitle = 'QR Data Belum Scanned';
    $this->render_crud();
  }



  function test()
  {

    $form = $this->form_builder->create_form();
    $this->session->flashdata('');
    $qrcode = "";
    $qrimage = "";
    $nama = "";
    $alamat = "";
    $tgllahir = "";
    $identitas = "";
    $filename = "";
    $attempt = 0;
    $detail_attempt = null;
    $ktp = "";
    $rt = "";
    $rw = "";
    $provinsi = "";
    $kabupaten = "";
    $kelurahan = "";
    $kecamatan = "";
    $score = "0";
    $surveyor = "";
    $jenis_kelamin = "";

    if ($form->validate()) {
      // passed validation
      $qrcode = $this->input->post('qrcode');


      // proceed to create user
      $user = $this->ion_auth->user()->row();
      $data1 = $this->Qrcode_m->getApimustahik($qrcode);

      //var_dump($data1);

      if ($data1) {
        //Cek Apakah pernah Scan/Entry
        $nama = $data1['nama'];
        $tgllahir = $data1['tgl_lahir'];
        $alamat = $data1['alamat'];
        $qrcode = $data1['nik'];
        $jenis_kelamin = $data1['jenis_kelamin'];
        $ktp = $data1['foto_ktp'];
        $rt = $data1['rt'];
        $rw = $data1['rw'];
        $provinsi = $data1['provinsi'];
        $kabupaten = $data1['kabupaten'];
        $kelurahan = $data1['kelurahan'];
        $kecamatan = $data1['kecamatan'];
        $score = $data1['score'];
        $surveyor = $data1['surveyor'];
        $entry_method = 'TYPE';
        $msg = "Data Ditemukan";
        $this->system_message->set_success($msg);
      } else {
        $errors = "Subhanallah QRCode tidak terdaftar di System";
        $this->system_message->set_error($errors);
      }
    }

    // get list of Frontend user groups
    $this->mPageTitle = 'Enty NIK/QRCODE';
    $this->mViewData['form'] = $form;
    $this->mViewData['qrcode'] = $qrcode;
    $this->mViewData['nama'] = $nama;
    $this->mViewData['jenis_kelamin'] = $jenis_kelamin;
    $this->mViewData['ktp'] = $ktp;
    $this->mViewData['alamat'] = $alamat;
    $this->mViewData['identitas'] = $identitas;
    $this->mViewData['tgllahir'] = $tgllahir;
    $this->mViewData['detail_attempt'] = $detail_attempt;
    $this->mViewData['rt'] = $rt;
    $this->mViewData['rw'] = $rw;
    $this->mViewData['provinsi'] = $provinsi;
    $this->mViewData['kabupaten'] = $kabupaten;
    $this->mViewData['kelurahan'] = $kelurahan;
    $this->mViewData['kecamatan'] = $kecamatan;
    $this->mViewData['score'] = $score;
    $this->mViewData['surveyor'] = $surveyor;
    $this->render('entry');
  }



  function entry()
  {
    $form = $this->form_builder->create_form();
    $this->session->flashdata('');

    $qrcode = "";
    $qrimage = "";
    $nama = "";
    $alamat = "";
    $tgllahir = "";
    $identitas = "";
    $filename = "";
    $attempt = 0;
    $detail_attempt = null;
    $ktp = "";
    $rt = "";
    $rw = "";
    $provinsi = "";
    $kabupaten = "";
    $kelurahan = "";
    $kecamatan = "";
    $score = "0";
    $surveyor = "";
    $jenis_kelamin = "";
    if ($form->validate()) {
      // passed validation
      $qrcode = $this->input->post('qrcode');
      // proceed to create user
      $user = $this->ion_auth->user()->row();
      $entry_user = $user->id;
      //Get Active Event
      $this->db->where('TRIM(qrcode)', $qrcode);
      $data = $this->db->get('qr_data')->row_array();

      //echo $this->db->last_query();die;
      if ($data) {
        //Cek Apakah pernah Scan/Entry
        $nama = $data['nama'];
        $tgllahir = $data['tgl_lahir'];
        $alamat = $data['alamat'];
        $qrcode = $data['qrcode'];
        $jenis_kelamin = $data['jenis_kelamin'];
        $active_event = $data['batch'];
        $ktp = $data['foto_ktp'];
        $rt = $data['rt'];
        $rw = $data['rw'];
        $provinsi = $data['provinsi'];
        $kabupaten = $data['kabupaten'];
        $kelurahan = $data['kelurahan'];
        $kecamatan = $data['kecamatan'];
        $score = $data['score'];
        $surveyor = $data['surveyor'];
        $entry_method = 'TYPE';

        if ($data['entry_datetime'] == null) {
          // success
          if ($data['aktif'] != 'Y') {
            $attempt = $data['fraud_attempt'] + 1;
            $this->db->where('qrcode', $qrcode);
            $this->db->update('qr_data', array('fraud_attempt' => $attempt));
            $messages = " Subhanallah " . $qrcode . " Anda tidak Aktif di sistem";
            $this->db->insert('qr_transaction', array('txn_datetime' => date('Y-m-d H:i:s'), 'user' => $entry_user, 'batch' => $active_event, 'qrcode' => $qrcode, 'status' => 'N', 'entry_method' => $entry_method));
            //echo $this->db->last_query();die;
            $this->system_message->set_error($messages);
          } else {
            //apakah event sudah buka?
            $this->db->where('aktif', 1);
            $this->db->where('id', $data['batch']);
            $hsl = $this->db->get('qr_batch')->num_rows();

            if ($hsl > 0) {
              $this->db->where('qrcode', $qrcode);
              $this->db->update('qr_data', array('entry_datetime' => date('Y-m-d H:i:s'), 'entry_user' => $entry_user, 'entry_method' => $entry_method));
              $messages = "Berhasil Scan Allhamdullilah";
              //Add Transaction
              $this->db->insert('qr_transaction', array('txn_datetime' => date('Y-m-d H:i:s'), 'user' => $entry_user, 'batch' => $active_event, 'qrcode' => $qrcode, 'status' => 'Y', 'entry_method' => $entry_method));
              $this->system_message->set_success($messages);
            } else {
              $attempt = $data['fraud_attempt'] + 1;
              $this->db->where('qrcode', $qrcode);
              $this->db->update('qr_data', array('fraud_attempt' => $attempt));
              $messages = " Subhanallah " . $qrcode . " Batch anda belum dibuka";
              $this->db->insert('qr_transaction', array('txn_datetime' => date('Y-m-d H:i:s'), 'user' => $entry_user, 'batch' => $active_event, 'qrcode' => $qrcode, 'status' => 'N', 'entry_method' => $entry_method));
              $this->system_message->set_error($messages);
            }
          }
        } else {
          $attempt = $data['fraud_attempt'] + 1;
          $this->db->where('qrcode', $qrcode);
          $this->db->update('qr_data', array('fraud_attempt' => $attempt));
          $messages = " Subhanallah " . $data['nama'] . " Sudah Berhasil melakukan Scan Pada : " . date('d-m-Y H:i:s', strtotime($data['entry_datetime'])) . " Dan Sudah melakukan <h2>$attempt Kali</h2> Percobaan";
          //Add Transaction
          $this->db->insert('qr_transaction', array('txn_datetime' => date('Y-m-d H:i:s'), 'user' => $entry_user, 'batch' => $active_event, 'qrcode' => $qrcode, 'status' => 'N', 'entry_method' => $entry_method));

          $this->system_message->set_error($messages);
          if ($attempt > 0) {
            $this->db->where('qrcode', $qrcode);
            $this->db->where('batch', $active_event);
            $this->db->join('admin_users', 'admin_users.id = qr_transaction.user');
            $this->db->from('qr_transaction');
            $this->db->order_by("txn_datetime", "desc");
            $detail_attempt = $this->db->get()->result();
          }
        }
      } else {
        $errors = "Subhanallah QRCode tidak terdaftar di System Atau Batch Belum aktif";
        //Add Transaction
        $entry_method = "TYPE";
        $this->db->insert('qr_transaction', array('txn_datetime' => date('Y-m-d H:i:s'), 'user' => $entry_user, 'qrcode' => $qrcode, 'status' => 'N', 'entry_method' => $entry_method));
        $this->system_message->set_error($errors);
      }
    }

    // get list of Frontend user groups
    $this->mPageTitle = 'Enty NIK/QRCODE';
    $this->mViewData['form'] = $form;
    $this->mViewData['qrcode'] = $qrcode;
    $this->mViewData['nama'] = $nama;
    $this->mViewData['jenis_kelamin'] = $jenis_kelamin;
    $this->mViewData['ktp'] = $ktp;
    $this->mViewData['alamat'] = $alamat;
    $this->mViewData['identitas'] = $identitas;
    $this->mViewData['tgllahir'] = $tgllahir;
    $this->mViewData['detail_attempt'] = $detail_attempt;
    $this->mViewData['rt'] = $rt;
    $this->mViewData['rw'] = $rw;
    $this->mViewData['provinsi'] = $provinsi;
    $this->mViewData['kabupaten'] = $kabupaten;
    $this->mViewData['kelurahan'] = $kelurahan;
    $this->mViewData['kecamatan'] = $kecamatan;
    $this->mViewData['score'] = $score;
    $this->mViewData['surveyor'] = $surveyor;
    $this->render('entry');
  }

  function scan()
  {
    $form = $this->form_builder->create_form();
    $this->session->flashdata('');
    $batch = "";
    $qrcode = "";
    $qrimage = "";
    $nama = "";
    $alamat = "";
    $tgllahir = "";
    $identitas = "";
    $filename = "";
    $attempt = 0;
    $detail_attempt = null;
    $ktp = "";
    $rt = "";
    $rw = "";
    $provinsi = "";
    $kabupaten = "";
    $kelurahan = "";
    $kecamatan = "";
    $score = "0";
    $surveyor = "";
    $jenis_kelamin = "";
    if ($form->validate()) {
      // passed validation
      $qrcode = $this->input->post('qrcode');
      // proceed to create user
      $user = $this->ion_auth->user()->row();
      $entry_user = $user->id;
      //Get Active Event
      $this->db->where('TRIM(qrcode)', $qrcode);
      $data = $this->db->get('qr_data')->row_array();

      //echo $this->db->last_query();die;
      if ($data) {
        //Cek Apakah pernah Scan/Entry
        $nama = $data['nama'];
        $tgllahir = $data['tgl_lahir'];
        $alamat = $data['alamat'];
        $qrcode = $data['qrcode'];
        $jenis_kelamin = $data['jenis_kelamin'];
        $active_event = $data['batch'];
        $ktp = $data['foto_ktp'];
        $rt = $data['rt'];
        $rw = $data['rw'];
        $provinsi = $data['provinsi'];
        $kabupaten = $data['kabupaten'];
        $kelurahan = $data['kelurahan'];
        $kecamatan = $data['kecamatan'];
        $score = $data['score'];
        $batch = $data['batch'];
        $surveyor = $data['surveyor'];
        $entry_method = 'SCAN';

        if ($data['entry_datetime'] == null) {
          // success
          if ($data['aktif'] != 'Y') {
            $attempt = $data['fraud_attempt'] + 1;
            $this->db->where('qrcode', $qrcode);
            $this->db->update('qr_data', array('fraud_attempt' => $attempt));
            $messages = " Subhanallah " . $qrcode . " Anda tidak Aktif di sistem";
            $this->db->insert('qr_transaction', array('txn_datetime' => date('Y-m-d H:i:s'), 'user' => $entry_user, 'batch' => $active_event, 'qrcode' => $qrcode, 'status' => 'N', 'entry_method' => $entry_method));
            //echo $this->db->last_query();die;
            $this->system_message->set_error($messages);
          } else {
            //apakah event sudah buka?
            $this->db->where('aktif', 1);
            $this->db->where('id', $data['batch']);
            $hsl = $this->db->get('qr_batch')->num_rows();

            if ($hsl > 0) {
              $this->db->where('qrcode', $qrcode);
              $this->db->update('qr_data', array('entry_datetime' => date('Y-m-d H:i:s'), 'entry_user' => $entry_user, 'entry_method' => $entry_method));
              $messages = "Berhasil Scan Allhamdullilah";
              //Add Transaction
              $this->db->insert('qr_transaction', array('txn_datetime' => date('Y-m-d H:i:s'), 'user' => $entry_user, 'batch' => $active_event, 'qrcode' => $qrcode, 'status' => 'Y', 'entry_method' => $entry_method));
              $this->system_message->set_success($messages);
            } else {
              $attempt = $data['fraud_attempt'] + 1;
              $this->db->where('qrcode', $qrcode);
              $this->db->update('qr_data', array('fraud_attempt' => $attempt));
              $messages = " Subhanallah " . $qrcode . " Batch anda belum dibuka";
              $this->db->insert('qr_transaction', array('txn_datetime' => date('Y-m-d H:i:s'), 'user' => $entry_user, 'batch' => $active_event, 'qrcode' => $qrcode, 'status' => 'N', 'entry_method' => $entry_method));
              $this->system_message->set_error($messages);
            }
          }
        } else {
          $attempt = $data['fraud_attempt'] + 1;
          $this->db->where('qrcode', $qrcode);
          $this->db->update('qr_data', array('fraud_attempt' => $attempt));
          $messages = " Subhanallah " . $data['nama'] . " Sudah Berhasil melakukan Scan Pada : " . date('d-m-Y H:i:s', strtotime($data['entry_datetime'])) . " Dan Sudah melakukan <h2>$attempt Kali</h2> Percobaan";
          //Add Transaction
          $this->db->insert('qr_transaction', array('txn_datetime' => date('Y-m-d H:i:s'), 'user' => $entry_user, 'batch' => $active_event, 'qrcode' => $qrcode, 'status' => 'N', 'entry_method' => $entry_method));

          $this->system_message->set_error($messages);
          if ($attempt > 0) {
            $this->db->where('qrcode', $qrcode);
            $this->db->where('batch', $active_event);
            $this->db->join('admin_users', 'admin_users.id = qr_transaction.user');
            $this->db->from('qr_transaction');
            $this->db->order_by("txn_datetime", "desc");
            $detail_attempt = $this->db->get()->result();
          }
        }
      } else {
        $errors = "Subhanallah QRCode tidak terdaftar di System Atau Batch Belum aktif";
        //Add Transaction
        $entry_method = "SCAN";
        $this->db->insert('qr_transaction', array('txn_datetime' => date('Y-m-d H:i:s'), 'user' => $entry_user, 'qrcode' => $qrcode, 'status' => 'N', 'entry_method' => $entry_method));
        $this->system_message->set_error($errors);
      }
    }

    // get list of Frontend user groups
    $this->mPageTitle = 'Scan QRCode';
    $this->mViewData['form'] = $form;
    $this->mViewData['qrcode'] = $qrcode;
    $this->mViewData['nama'] = $nama;
    $this->mViewData['jenis_kelamin'] = $jenis_kelamin;
    $this->mViewData['ktp'] = $ktp;
    $this->mViewData['alamat'] = $alamat;
    $this->mViewData['identitas'] = $identitas;
    $this->mViewData['tgllahir'] = $tgllahir;
    $this->mViewData['detail_attempt'] = $detail_attempt;
    $this->mViewData['rt'] = $rt;
    $this->mViewData['rw'] = $rw;
    $this->mViewData['provinsi'] = $provinsi;
    $this->mViewData['kabupaten'] = $kabupaten;
    $this->mViewData['kelurahan'] = $kelurahan;
    $this->mViewData['kecamatan'] = $kecamatan;
    $this->mViewData['score'] = $score;
    $this->mViewData['surveyor'] = $surveyor;
    $this->render('scan');
  }


  function batch()
  {
    $crud = $this->generate_crud('qr_batch');
    $this->mPageTitle = 'QR Batch';
    $this->render_crud();
  }
  function transaction()
  {
    $crud = $this->generate_crud('qr_data');
    $crud->WHERE('scanned is not null');
    $this->mPageTitle = 'QR Data Scanned';
    $this->render_crud();
  }
  function list_mustahik()
  {
    $crud = $this->generate_crud('qr_mustahik');
    $this->mPageTitle = 'QR Mustahik';
    $this->render_crud();
  }
  function batch_mustahik()
  {
    $crud = $this->generate_crud('qr_batch');
    $this->mPageTitle = 'QR Batch';
    $this->render_crud();
  }
  function scanner()
  {
    $crud = $this->generate_crud('qr_scanner');
    $this->mPageTitle = 'QR Scanner';
    $crud->set_relation('user_id', 'admin_users', 'username');
    $this->render_crud();
  }
  function list_scanned()
  {
    $crud = $this->generate_crud('qr_scanned');
    $crud->set_relation("id_user", "admin_users", "username");
    $crud->set_relation("id_scanner", "qr_scanner", "name");
    $this->mPageTitle = 'QR Scanned';
    $this->render_crud();
  }
  function generator()
  {
    $post = $this->input->post();
    $form = $this->form_builder->create_form();

    $len = 0;
    $start = 0;
    $end = 0;
    $event = 0;
    if ($post) {
      //process

      $event = $post['event'];
      $start = $post['start'];
      $end = $post['end'];
      $len = $post['len'];
      $this->db->where('aktif', 1);
      $active_event = $this->db->get('qr_batch')->row()->id;

      $config['cacheable']    = true; //boolean, the default is true
      $config['cachedir']     = './assets/'; //string, the default is application/cache/
      $config['errorlog']     = './assets/'; //string, the default is application/logs/
      $config['imagedir']     = './assets/qrcode/'; //direktori penyimpanan qr code
      $config['quality']      = true; //boolean, the default is true
      $config['size']         = '1024'; //interger, the default is 1024
      $config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
      $config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
      $this->ciqrcode->initialize($config);
      $len = 5;
      $start = 1;
      $end = 100 + 1;
      $filename = "";
      for ($i = $start; $i < $end; $i++) {
        // code...
        $ext = "QMZ1908";
        $strlen = strlen($i);
        $qdata = str_repeat("0", $len - $strlen) . $i;
        $qrcode = $ext . $qdata;
        $filename = preg_replace('/[^a-z0-9]+/', '-', strtolower($qrcode));
        $image_name = $filename . '.png'; //buat name dari qr code sesuai dengan qr
        $params['data'] = $qrcode; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 5;
        $params['savename'] = FCPATH . $config['imagedir'] . $image_name;
        $qrimage = base_url() . "assets/qrcode/" . $qrcode . ".png";
        $this->ciqrcode->generate($params);
        $this->db->insert('qr_data', array('qrcode' => $qrcode, 'batch' => $active_event));
      }
    } else {
      $len = 5;
      $start = 1;
      $end = 1;
    }
    $this->mViewData['form'] = $form;
    $this->mViewData['event'] = $event;
    $this->mViewData['start'] = $start;
    $this->mViewData['end'] = $end;
    $this->mViewData['len'] = $len;
    $this->render('zis/data_generator');
  }

  function generate_data_bi()
  {
    $data = $this->db->get('qr_bankinfaq')->result();

    $config['cacheable']    = true; //boolean, the default is true
    $config['cachedir']     = './assets/'; //string, the default is application/cache/
    $config['errorlog']     = './assets/'; //string, the default is application/logs/
    $config['imagedir']     = './assets/qrcode/'; //direktori penyimpanan qr code
    $config['quality']      = true; //boolean, the default is true
    $config['size']         = '1024'; //interger, the default is 1024
    $config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
    $config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
    $this->ciqrcode->initialize($config);

    $i = 0;

    foreach ($data as $key => $value) {
      $i++;
      $filename = preg_replace('/[^a-z0-9]+/', '-', strtolower($value->qrcode));
      $image_name = $filename . '.png'; //buat name dari qr code sesuai dengan qr
      $params['data'] =  $value->qrcode; //data yang akan di jadikan QR CODE
      $params['level'] = 'H'; //H=High
      $params['size'] = 5;
      $params['savename'] = FCPATH . $config['imagedir'] . $image_name;
      $qrimage = base_url() . "assets/qrcode/" . $value->qrcode . ".png";
      $this->ciqrcode->generate($params);
    }

    $this->mViewData['i'] = $i;
    $this->render('generate');
  }

  function generate_data()
  {
    $this->db->where('aktif', 1);
    $active_event = $this->db->get('qr_batch')->row()->id;

    $config['cacheable']    = true; //boolean, the default is true
    $config['cachedir']     = './assets/'; //string, the default is application/cache/
    $config['errorlog']     = './assets/'; //string, the default is application/logs/
    $config['imagedir']     = './assets/qrcode/'; //direktori penyimpanan qr code
    $config['quality']      = true; //boolean, the default is true
    $config['size']         = '1024'; //interger, the default is 1024
    $config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
    $config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
    $this->ciqrcode->initialize($config);
    $len = 4;
    $start = 3000;
    $end = 3500 + 1;
    for ($i = $start; $i < $end; $i++) {
      // code...
      $ext = "QMZ1908";
      $strlen = strlen($i);
      $qdata = str_repeat("0", $len - $strlen) . $i;
      $qrcode = $ext . $qdata;
      $filename = preg_replace('/[^a-z0-9]+/', '-', strtolower($qrcode));
      $image_name = $filename . '.png'; //buat name dari qr code sesuai dengan qr
      $params['data'] = $qrcode; //data yang akan di jadikan QR CODE
      $params['level'] = 'H'; //H=High
      $params['size'] = 5;
      $params['savename'] = FCPATH . $config['imagedir'] . $image_name;
      $qrimage = base_url() . "assets/qrcode/" . $qrcode . ".png";
      $this->ciqrcode->generate($params);
      $this->db->insert('qr_data', array('qrcode' => $qrcode, 'batch' => $active_event, 'aktif' => 1, 'tipe_qr' => 2));
    }
    $this->mViewData['i'] = $i;
    $this->render('generate');
  }

  function cetak($last = 100, $start = 0)
  {
    $data = $this->db->get('qr_bankinfaq')->result();
    $this->mViewData['data'] = $data;
    $this->render('zis/print_qrcode');
  }
}