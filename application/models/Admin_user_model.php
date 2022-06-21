<?php

class Admin_user_model extends MY_Model {

  public function getFileName($identier)
  {
    $this->db->where('identifier',$identier);
    return $this->db->get('media')->row();
  }
  public function dataMahasiswa()
  {
    return $this->db->get('mahasiswa')->result();
  }
  public function getSiswa($value='')
  {
    $sql="SELECT
    DISTINCT
    mahasiswa.id,
    mahasiswa.nama
    FROM
    absensi
    INNER JOIN absensi_mahasiswa ON absensi_mahasiswa.id_absensi = absensi.id
    INNER JOIN mahasiswa ON absensi_mahasiswa.id_siswa = mahasiswa.id
    Order By nama
    ";
    return $this->db->query($sql)->result();
  }

  public function getAbsensi($id_siswa,$id_absensi)
  {
    $sql="SELECT
    mahasiswa.id,
    mahasiswa.nama,
    absensi_mahasiswa.id_absensi
    FROM
    absensi
    INNER JOIN absensi_mahasiswa ON absensi_mahasiswa.id_absensi = absensi.id
    INNER JOIN mahasiswa ON absensi_mahasiswa.id_siswa = mahasiswa.id
    WHERE mahasiswa.id=$id_siswa
    AND absensi_mahasiswa.id_absensi=$id_absensi";
    return $this->db->query($sql)->result();
  }
}
