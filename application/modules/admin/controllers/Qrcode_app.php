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
    $crud = $this->generate_crud('zis_allowscan');
    $crud->set_relation('lokasi', 'zis_location', 'lokasi');
    $crud->unset_add();
    $crud->unset_delete();
    $crud->unset_edit();
    $this->mPageTitle = 'QR Data Belum Scanned';
    $this->render_crud();
  }

  public function sudah_scan()
  {
    $crud = $this->generate_crud('zis_distribution');
    $crud->set_relation('lokasi', 'zis_location', 'lokasi');
    $crud->unset_add();
    $crud->unset_delete();
    $crud->unset_edit();
    $this->mPageTitle = 'QR Data Sudah Scanned';
    $this->render_crud();
  }



  function entry_webcam()
  {

    $form = $this->form_builder->create_form();
    $this->session->flashdata('');
    $qrcode = "";
    $detail_attempt = null;
    $data = null;
    $jenis = "";

    if ($form->validate()) {
      // passed validation
      $qrcode = $this->input->post('qrcode');

      // proceed to create user
      $user = $this->ion_auth->user()->row();
      $data1 = $this->Qrcode_m->getApiOneMustahik($qrcode);
      $data2 = $this->Qrcode_m->getApiGetOneCouponMuzakih($qrcode);
      $data3 = $this->Qrcode_m->getApiGetCouponQr($qrcode);
      $isAllowedList = $this->Qrcode_m->isAllowed($qrcode);
      $lokasi = $isAllowedList->id_lokasi ?? "";


      if ($data1) {
        //Cek Apakah pernah Scan/Entry
        $data = $data1;
        $jenis = "MUSTAHIK";
        $useCoupon = $this->Qrcode_m->isCouponUsed($qrcode);


        if ($isAllowedList) {
          $current = date('Y-m-d H:i:s');
          $now = strtotime($current);
          $allowed = strtotime($isAllowedList->start_datetime);


          if ($now < $allowed) {
            $errors = "Subhanallah Afawan, Anda belum waktunya Scan Anda dapat mulai scan $isAllowedList->start_datetime";
            $this->system_message->set_error($errors);
          } elseif ($isAllowedList->block == 'Y') {
            $errors = "Subhanallah Afwan, QR anda Terblokir Pastikan jam dan Lokasi Sesuai";
            $this->system_message->set_error($errors);
          } elseif ($isAllowedList->active == 'N'  || $isAllowedList->active == null) {
            $errors = "Subhanallah Afwan, lokasi anda <h1>$isAllowedList->lokasi</h1> belum di aktivasi";
            $this->system_message->set_error($errors);
          } else {
            if (!$useCoupon) {
              $this->Qrcode_m->useCoupon($qrcode, $jenis, $lokasi, $isAllowedList->kantong);
              $msg = "Kupon berhasil digunakan";
              $this->system_message->set_success($msg);
            } else {
              $totscan = $useCoupon['scan'];
              $last_scan = $useCoupon['last_scan'];
              $totscan++;
              $this->Qrcode_m->updateScan($qrcode, $totscan);
              $msg = "Scan ke <h1>$totscan</h1> Coupon sudah digunakan pada <h1>$last_scan</h1>";
              $this->system_message->set_error($msg);
            }
          }
        } else {
          $errors = "Subhanallah Afwan, QR anda terdaftar tetapi belum diijinkan scan";
          $this->system_message->set_error($errors);
        }
      } elseif ($data2) {
        $data = $data2;
        $jenis = "MUDHOHI";
        $useCoupon = $this->Qrcode_m->isCouponUsed($qrcode);


        if ($isAllowedList) {
          $current = date('Y-m-d H:i:s');
          $now = strtotime($current);
          $allowed = strtotime($isAllowedList->start_datetime);

          if ($now < $allowed) {
            $errors = "Subhanallah Afawan, Anda belum waktunya Scan Anda dapat mulai scan $isAllowedList->start_datetime";
            $this->system_message->set_error($errors);
          } elseif ($isAllowedList->block == 'Y') {
            $errors = "Subhanallah Afwan, QR anda Terblokir Pastikan jam dan Lokasi Sesuai";
            $this->system_message->set_error($errors);
          } elseif ($isAllowedList->active == 'N'  || $isAllowedList->active == null) {
            $errors = "Subhanallah Afwan, lokasi anda <h1>$isAllowedList->lokasi</h1> belum di aktivasi";
            $this->system_message->set_error($errors);
          } else {
            if (!$useCoupon) {
              $this->Qrcode_m->useCoupon($qrcode, $jenis, $lokasi, $isAllowedList->kantong);
              $msg = "Kupon berhasil digunakan";
              $this->system_message->set_success($msg);
            } else {
              $totscan = $useCoupon['scan'];
              $last_scan = $useCoupon['last_scan'];
              $totscan++;
              $this->Qrcode_m->updateScan($qrcode, $totscan);
              $msg = "Scan ke <h1>$totscan</h1> Coupon sudah digunakan pada <h1>$last_scan</h1>";
              $this->system_message->set_error($msg);
            }
          }
        } else {
          $errors = "Subhanallah Afawan, QR anda terdaftar tetapi belum diijinkan scan";
          $this->system_message->set_error($errors);
        }
      } elseif ($data3) {
        $data = $data3;
        $jenis = "KUPON";
        $msg = "Kupon berhasil digunakan";
        $useCoupon = $this->Qrcode_m->isCouponUsed($qrcode);

        if ($isAllowedList) {
          $current = date('Y-m-d H:i:s');
          $now = strtotime($current);
          $allowed = strtotime($isAllowedList->start_datetime);
          $jenis = $isAllowedList->source;

          if ($now < $allowed) {
            $errors = "Subhanallah Afawan, Anda belum waktunya Scan Anda dapat mulai scan $isAllowedList->start_datetime";
            $this->system_message->set_error($errors);
          } elseif ($isAllowedList->block == 'Y') {
            $errors = "Subhanallah Afwan, QR anda Terblokir Pastikan jam dan Lokasi Sesuai";
            $this->system_message->set_error($errors);
          } elseif ($isAllowedList->active == 'N'  || $isAllowedList->active == null) {
            $errors = "Subhanallah Afwan, lokasi anda <h1>$isAllowedList->lokasi</h1> belum di aktivasi";
            $this->system_message->set_error($errors);
          } else {
            if (!$useCoupon) {
              $this->Qrcode_m->useCoupon($qrcode, $jenis, $lokasi, $isAllowedList->kantong);
              $msg = "Kupon berhasil Digunakan";
              $this->system_message->set_success($msg);
            } else {
              $totscan = $useCoupon['scan'];
              $last_scan = $useCoupon['last_scan'];
              $totscan++;
              $this->Qrcode_m->updateScan($qrcode, $totscan);
              $msg = "Scan ke <h1>$totscan</h1> Coupon sudah digunakan pada <h1>$last_scan</h1>";
              $this->system_message->set_error($msg);
            }
          }
        } else {
          $errors = "Subhanallah Afawan, QR anda terdaftar tetapi belum diijinkan scan";
          $this->system_message->set_error($errors);
        }
      } else {
        $errors = "Subhanallah Afawan, QRCode tidak terdaftar di System";
        $this->system_message->set_error($errors);
      }
    }


    // get list of Frontend user groups
    $this->mPageTitle = 'Enty NIK/QRCODE';
    $this->mViewData['form'] = $form;
    $this->mViewData['qrcode'] = $qrcode;
    $this->mViewData['d'] = $data;
    $this->mViewData['jenis'] = $jenis;
    $this->mViewData['detail_attempt'] = $detail_attempt;
    $this->render('entry_webcam');
  }
  function entry()
  {

    $form = $this->form_builder->create_form();
    $this->session->flashdata('');
    $qrcode = "";
    $detail_attempt = null;
    $data = null;
    $jenis = "";

    if ($form->validate()) {
      // passed validation
      $qrcode = $this->input->post('qrcode');

      // proceed to create user
      $user = $this->ion_auth->user()->row();
      $data1 = $this->Qrcode_m->getApiOneMustahik($qrcode);
      $data2 = $this->Qrcode_m->getApiGetOneCouponMuzakih($qrcode);
      $data3 = $this->Qrcode_m->getApiGetCouponQr($qrcode);
      $isAllowedList = $this->Qrcode_m->isAllowed($qrcode);
      $lokasi = $isAllowedList->id_lokasi;


      if ($data1) {
        //Cek Apakah pernah Scan/Entry
        $data = $data1;
        $jenis = "MUSTAHIK";
        $useCoupon = $this->Qrcode_m->isCouponUsed($qrcode);


        if ($isAllowedList) {
          $current = date('Y-m-d H:i:s');
          $now = strtotime($current);
          $allowed = strtotime($isAllowedList->start_datetime);


          if ($now < $allowed) {
            $errors = "Subhanallah Afawan, Anda belum waktunya Scan Anda dapat mulai scan $isAllowedList->start_datetime";
            $this->system_message->set_error($errors);
          } elseif ($isAllowedList->block == 'Y') {
            $errors = "Subhanallah Afwan, QR anda Terblokir Pastikan jam dan Lokasi Sesuai";
            $this->system_message->set_error($errors);
          } elseif ($isAllowedList->active == 'N'  || $isAllowedList->active == null) {
            $errors = "Subhanallah Afwan, lokasi anda <h1>$isAllowedList->lokasi</h1> belum di aktivasi";
            $this->system_message->set_error($errors);
          } else {
            if (!$useCoupon) {
              $this->Qrcode_m->useCoupon($qrcode, $jenis, $lokasi, $isAllowedList->kantong);
              $msg = "Kupon berhasil digunakan";
              $this->system_message->set_success($msg);
            } else {
              $totscan = $useCoupon['scan'];
              $last_scan = $useCoupon['last_scan'];
              $totscan++;
              $this->Qrcode_m->updateScan($qrcode, $totscan);
              $msg = "Scan ke <h1>$totscan</h1> Coupon sudah digunakan pada <h1>$last_scan</h1>";
              $this->system_message->set_error($msg);
            }
          }
        } else {
          $errors = "Subhanallah Afwan, QR anda terdaftar tetapi belum diijinkan scan";
          $this->system_message->set_error($errors);
        }
      } elseif ($data2) {
        $data = $data2;
        $jenis = "MUDHOHI";
        $useCoupon = $this->Qrcode_m->isCouponUsed($qrcode);


        if ($isAllowedList) {
          $current = date('Y-m-d H:i:s');
          $now = strtotime($current);
          $allowed = strtotime($isAllowedList->start_datetime);

          if ($now < $allowed) {
            $errors = "Subhanallah Afawan, Anda belum waktunya Scan Anda dapat mulai scan $isAllowedList->start_datetime";
            $this->system_message->set_error($errors);
          } elseif ($isAllowedList->block == 'Y') {
            $errors = "Subhanallah Afwan, QR anda Terblokir Pastikan jam dan Lokasi Sesuai";
            $this->system_message->set_error($errors);
          } elseif ($isAllowedList->active == 'N'  || $isAllowedList->active == null) {
            $errors = "Subhanallah Afwan, lokasi anda <h1>$isAllowedList->lokasi</h1> belum di aktivasi";
            $this->system_message->set_error($errors);
          } else {
            if (!$useCoupon) {
              $this->Qrcode_m->useCoupon($qrcode, $jenis, $lokasi, $isAllowedList->kantong);
              $msg = "Kupon berhasil digunakan";
              $this->system_message->set_success($msg);
            } else {
              $totscan = $useCoupon['scan'];
              $last_scan = $useCoupon['last_scan'];
              $totscan++;
              $this->Qrcode_m->updateScan($qrcode, $totscan);
              $msg = "Scan ke <h1>$totscan</h1> Coupon sudah digunakan pada <h1>$last_scan</h1>";
              $this->system_message->set_error($msg);
            }
          }
        } else {
          $errors = "Subhanallah Afawan, QR anda terdaftar tetapi belum diijinkan scan";
          $this->system_message->set_error($errors);
        }
      } elseif ($data3) {
        $data = $data3;
        $jenis = "KUPON";
        $msg = "Kupon berhasil digunakan";
        $useCoupon = $this->Qrcode_m->isCouponUsed($qrcode);

        if ($isAllowedList) {
          $current = date('Y-m-d H:i:s');
          $now = strtotime($current);
          $allowed = strtotime($isAllowedList->start_datetime);
          $jenis = $isAllowedList->source;

          if ($now < $allowed) {
            $errors = "Subhanallah Afawan, Anda belum waktunya Scan Anda dapat mulai scan $isAllowedList->start_datetime";
            $this->system_message->set_error($errors);
          } elseif ($isAllowedList->block == 'Y') {
            $errors = "Subhanallah Afwan, QR anda Terblokir Pastikan jam dan Lokasi Sesuai";
            $this->system_message->set_error($errors);
          } elseif ($isAllowedList->active == 'N'  || $isAllowedList->active == null) {
            $errors = "Subhanallah Afwan, lokasi anda <h1>$isAllowedList->lokasi</h1> belum di aktivasi";
            $this->system_message->set_error($errors);
          } else {
            if (!$useCoupon) {
              $this->Qrcode_m->useCoupon($qrcode, $jenis, $lokasi, $isAllowedList->kantong);
              $msg = "Kupon berhasil Digunakan";
              $this->system_message->set_success($msg);
            } else {
              $totscan = $useCoupon['scan'];
              $last_scan = $useCoupon['last_scan'];
              $totscan++;
              $this->Qrcode_m->updateScan($qrcode, $totscan);
              $msg = "Scan ke <h1>$totscan</h1> Coupon sudah digunakan pada <h1>$last_scan</h1>";
              $this->system_message->set_error($msg);
            }
          }
        } else {
          $errors = "Subhanallah Afawan, QR anda terdaftar tetapi belum diijinkan scan";
          $this->system_message->set_error($errors);
        }
      } else {
        $errors = "Subhanallah Afawan, QRCode tidak terdaftar di System";
        $this->system_message->set_error($errors);
      }
    }


    // get list of Frontend user groups
    $this->mPageTitle = 'Enty NIK/QRCODE';
    $this->mViewData['form'] = $form;
    $this->mViewData['qrcode'] = $qrcode;
    $this->mViewData['d'] = $data;
    $this->mViewData['jenis'] = $jenis;
    $this->mViewData['detail_attempt'] = $detail_attempt;
    $this->render('entry');
  }

  function test()
  {

    $form = $this->form_builder->create_form();
    $this->session->flashdata('');
    $qrcode = "";
    $detail_attempt = null;
    $data = null;
    $jenis = "";


    if ($form->validate()) {
      // passed validation
      $qrcode = $this->input->post('qrcode');
      $isAllowedList = $this->Qrcode_m->isAllowed($qrcode);
      // proceed to create user
      $user = $this->ion_auth->user()->row();
      $data1 = $this->Qrcode_m->getApiOneMustahik($qrcode);
      $data2 = $this->Qrcode_m->getApiGetOneCouponMuzakih($qrcode);
      $data3 = $this->Qrcode_m->getApiGetCouponQr($qrcode);

      //var_dump($data1);

      if ($data1) {
        //Cek Apakah pernah Scan/Entry
        $data = $data1;
        $jenis = "MUSTAHIK";
        if ($isAllowedList) {
          if ($isAllowedList->block == 'Y') {
            $errors = "Subhanallah Afwan, QR anda Terblokir/Lokasi anda Menggunakna Sistem Manual Pengambilan : $isAllowedList->lokasi";
            $this->system_message->set_error($errors);
          } else {
            $msg = "Data Mustahik Ditemukan Pengambilan  : $isAllowedList->lokasi Tangal/Jam : $isAllowedList->start_datetime";
            $this->system_message->set_success($msg);
          }
        } else {
          $msg = "Data Mustahik Ditemukan Pengambilan  : BELUM DIJADWALKAN";
          $this->system_message->set_success($msg);
        }
      } elseif ($data2) {
        $data = $data2;
        $jenis = "MUDHOHI";
        $msg = "Data Mudhohi Ditemukan";
        $this->system_message->set_success($msg);
      } elseif ($data3) {
        $data = $data3;
        $jenis = "KUPON";
        if ($isAllowedList) {
          $msg = "Data Kupon Ditemukan Pengambilan  : $isAllowedList->lokasi Tangal/Jam : $isAllowedList->start_datetime";
        } else {
          $msg = "Data Kupon Ditemukan Pengambilan  : BELUM DIJADWALKAN";
        }
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
    $this->mViewData['d'] = $data;
    $this->mViewData['jenis'] = $jenis;
    $this->mViewData['detail_attempt'] = $detail_attempt;
    $this->render('entry');
  }


  function test_webcam()
  {

    $form = $this->form_builder->create_form();
    $this->session->flashdata('');
    $qrcode = "";
    $detail_attempt = null;
    $data = null;
    $jenis = "";


    if ($form->validate()) {
      // passed validation
      $qrcode = $this->input->post('qrcode');
      $isAllowedList = $this->Qrcode_m->isAllowed($qrcode);
      // proceed to create user
      $user = $this->ion_auth->user()->row();
      $data1 = $this->Qrcode_m->getApiOneMustahik($qrcode);
      $data2 = $this->Qrcode_m->getApiGetOneCouponMuzakih($qrcode);
      $data3 = $this->Qrcode_m->getApiGetCouponQr($qrcode);

      //var_dump($data1);

      if ($data1) {
        //Cek Apakah pernah Scan/Entry
        $data = $data1;
        $jenis = "MUSTAHIK";
        if ($isAllowedList) {
          if ($isAllowedList->block == 'Y') {
            $errors = "Subhanallah Afwan, QR anda Terblokir/Lokasi anda Menggunakna Sistem Manual Pengambilan : $isAllowedList->lokasi";
            $this->system_message->set_error($errors);
          } else {
            $msg = "Data Mustahik Ditemukan Pengambilan  : $isAllowedList->lokasi Tangal/Jam : $isAllowedList->start_datetime";
            $this->system_message->set_success($msg);
          }
        } else {
          $msg = "Data Mustahik Ditemukan Pengambilan  : BELUM DIJADWALKAN";
          $this->system_message->set_success($msg);
        }
      } elseif ($data2) {
        $data = $data2;
        $jenis = "MUDHOHI";
        $msg = "Data Mudhohi Ditemukan";
        $this->system_message->set_success($msg);
      } elseif ($data3) {
        $data = $data3;
        $jenis = "KUPON";
        if ($isAllowedList) {
          $msg = "Data Kupon Ditemukan Pengambilan  : $isAllowedList->lokasi Tangal/Jam : $isAllowedList->start_datetime";
        } else {
          $msg = "Data Kupon Ditemukan Pengambilan  : BELUM DIJADWALKAN";
        }
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
    $this->mViewData['d'] = $data;
    $this->mViewData['jenis'] = $jenis;
    $this->mViewData['detail_attempt'] = $detail_attempt;
    $this->render('entry_webcam');
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