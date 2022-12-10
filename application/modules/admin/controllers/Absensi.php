<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends Admin_Controller {

	public function index()
	{
		$crud = $this->generate_crud('absensi');
		$crud->columns('tgl_absensi','catatan','peserta');
		 $crud->set_relation_n_n('peserta', 'absensi_mahasiswa', 'mahasiswa', 'id_absensi', 'id_siswa', 'nama');
		$this->mPageTitle = 'Absensi';
		$this->render_crud();
	}
	public function absensi_list($value='')
	{
		$this->load->model('Admin_user_model');
		$kolom=$this->db->get('absensi')->result();
		$baris=$this->Admin_user_model->getSiswa();
		$kolc=0;
		$data="";
		foreach ($kolom as $kol) {
			$kolc+=1;
		}

		$data.="<table class='table table-bordered'>";
		$data.="<thead>";
		$data.="<tr><th rowspan='2' valign='top'>No.</th><th rowspan='2' valign='top' >Nama</th><th class='text-center' colspan='$kolc'>Pertemuan</th></tr>";
		$data.="<tr>";
		foreach ($kolom as $kol) {
			$data.="<th class='text-center'>".$kol->id."</th>";
		}
		$data.="<th>Total</th>";
		$data.="</tr></thead><tbody>";

		$no=0;
		foreach ($baris as $bar) {
			$no+=1;
			$data.="<td>".$no."</td>";
			$data.="<td>".$bar->nama."</td>";
			$hdr=0;
			foreach ($kolom as $kol) {
				$dt=$this->Admin_user_model->getAbsensi($bar->id,$kol->id);
				//var_dump($dt);
				if($dt){
						//hadir
						$hdr+=1;
						$data.="<td style='background-color:green' class='text-center'>X</td>";
				}else{
						$data.="<td style='background-color:red'></td>";
				}

			}
			$data.="<td>".$hdr."</td>";
			$data.="</tr>";
		}
		$data.="</tbody></table>";

		$this->mViewData['data']=$data;
		$this->render('absensi_list');
	}
}
