<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitoring extends Admin_Controller {
  function __construct()
  {
    // Call the Model constructor
    parent::__construct();
    $this->load->model('Qrcode_m');
    $this->load->library('form_builder');
    $this->load->library('ciqrcode');
  }

  function index(){

    $this->db->where('aktif',1);
    $even=$this->db->get('qr_batch')->row()->id;

    $this->db->limit(15);
    $this->db->order_by('txn_datetime','desc');
    $this->db->join('admin_users','admin_users.id=user');
    $query = $this->db->get('qr_transaction');
    $data5 = $query->result();

    $this->db->limit(15);
    $this->db->order_by('fraud_attempt','desc');
    $this->db->where('fraud_attempt>0');
    $query = $this->db->get('qr_data');
    $fraud5 = $query->result();

    $this->db->where('status','N');
    $gagal=$this->db->get('qr_transaction')->num_rows();

    $this->mPageTitle="Monitoring QR Code";
    $this->mViewData['data5']=$data5;
    $this->mViewData['batches']=$this->Qrcode_m->get_batch();
    $this->mViewData['fraud5']=$fraud5;

    $this->render('zis/qr_monitoring','empty');
  }


  function monitoring_iduladha14140(){

    $this->db->where('aktif',1);
    $even=$this->db->get('qr_batch')->row()->id;

    $this->db->limit(5);
    $this->db->order_by('txn_datetime','desc');
    $this->db->where('batch',$even);
    $this->db->join('admin_users','admin_users.id=user');
    $query = $this->db->get('qr_transaction');
    $data5 = $query->result();

    $this->db->limit(5);
    $this->db->order_by('fraud_attempt','desc');
    $this->db->where('fraud_attempt>0');
    $this->db->where('batch',$even);
    $query = $this->db->get('qr_data');
    $fraud5 = $query->result();

    $this->db->where('batch',$even);
    $this->db->where('aktif',1);
    //$this->db->where('tipe_qr',1);
    $kartu_aktif=$this->db->get('qr_data')->num_rows();

    $this->db->where('batch',$even);
    $this->db->where('aktif',1);
    //$this->db->where('tipe_qr',2);
    $kupon_aktif=$this->db->get('qr_data')->num_rows();

    $this->db->where('batch',$even);
    $this->db->where('status',1);
    $berhasil=$this->db->get('qr_transaction')->num_rows();

    $this->db->where('batch',$even);
    $this->db->where('aktif',1);
    //$this->db->where('tipe_qr',2);
    $this->db->where('entry_user>0');
    $berhasil_kupon=$this->db->get('qr_data')->num_rows();


    $this->db->where('batch',$even);
    $this->db->where('aktif',1);
    //$this->db->where('tipe_qr',1);
    $this->db->where('entry_user>0');
    $berhasil_kartu=$this->db->get('qr_data')->num_rows();

    $sisa_kupon=$kupon_aktif-$berhasil_kupon;
    $sisa_kartu=$kartu_aktif-$berhasil_kartu;
    $sisa_total=$sisa_kupon+$sisa_kartu;

    $this->db->where('batch',$even);
    $this->db->where('status',0);
    $gagal=$this->db->get('qr_transaction')->num_rows();

    $transaksi_total=$berhasil+$gagal;
    $total=$kartu_aktif+$kupon_aktif;

    //Workstation
    $this->db->where('batch',$even);
    $this->db->where('status',1);
    $this->db->where('user',144);
    $qr1_berhasil=$this->db->get('qr_transaction')->num_rows();

    $this->db->where('batch',$even);
    $this->db->where('status',0);
    $this->db->where('user',144);
    $qr1_gagal=$this->db->get('qr_transaction')->num_rows();

    //Workstation
    $this->db->where('batch',$even);
    $this->db->where('status',1);
    $this->db->where('user',145);
    $qr2_berhasil=$this->db->get('qr_transaction')->num_rows();

    $this->db->where('batch',$even);
    $this->db->where('status',0);
    $this->db->where('user',145);
    $qr2_gagal=$this->db->get('qr_transaction')->num_rows();

    //Workstation
    $this->db->where('batch',$even);
    $this->db->where('status',1);
    $this->db->where('user',146);
    $qr3_berhasil=$this->db->get('qr_transaction')->num_rows();

    $this->db->where('batch',$even);
    $this->db->where('status',0);
    $this->db->where('user',146);
    $qr3_gagal=$this->db->get('qr_transaction')->num_rows();


    //Workstation
    $this->db->where('batch',$even);
    $this->db->where('status',1);
    $this->db->where('user',147);
    $qr4_berhasil=$this->db->get('qr_transaction')->num_rows();

    $this->db->where('batch',$even);
    $this->db->where('status',0);
    $this->db->where('user',147);
    $qr4_gagal=$this->db->get('qr_transaction')->num_rows();

    //Workstation
    $this->db->where('batch',$even);
    $this->db->where('status',1);
    $this->db->where('user',149);
    $qr5_berhasil=$this->db->get('qr_transaction')->num_rows();

    $this->db->where('batch',$even);
    $this->db->where('status',0);
    $this->db->where('user',149);
    $qr5_gagal=$this->db->get('qr_transaction')->num_rows();

    //Workstation
    $this->db->where('batch',$even);
    $this->db->where('status',1);
    $this->db->where('user',148);
    $kb1_berhasil=$this->db->get('qr_transaction')->num_rows();

    $this->db->where('batch',$even);
    $this->db->where('status',0);
    $this->db->where('user',148);
    $kb1_gagal=$this->db->get('qr_transaction')->num_rows();


    $this->mPageTitle="Monitoring Qurban MRBJ";
    $this->mViewData['data5']=$data5;
    $this->mViewData['fraud5']=$fraud5;
    $this->mViewData['kupon_aktif']=$kupon_aktif;
    $this->mViewData['kartu_aktif']=$kartu_aktif;
    $this->mViewData['total']=$total;
    $this->mViewData['berhasil']=$berhasil;
    $this->mViewData['gagal']=$gagal;
    $this->mViewData['transaksi_total']=$transaksi_total;
    $this->mViewData['sisa_kupon']=$sisa_kupon;
    $this->mViewData['sisa_kartu']=$sisa_kartu;
    $this->mViewData['sisa_total']=$sisa_total;

    $this->mViewData['qr1']=$qr1_berhasil."/".$qr1_gagal;
    $this->mViewData['qr2']=$qr2_berhasil."/".$qr2_gagal;
    $this->mViewData['qr3']=$qr3_berhasil."/".$qr3_gagal;
    $this->mViewData['qr4']=$qr4_berhasil."/".$qr4_gagal;
    $this->mViewData['qr5']=$qr5_berhasil."/".$qr5_gagal;
    $this->mViewData['kb1']=$kb1_berhasil."/".$kb1_gagal;

    $this->render('zis/qr_monitoring','empty');
  }
}
