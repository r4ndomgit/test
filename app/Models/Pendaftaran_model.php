<?php 
namespace App\Models;
use CodeIgniter\Model;
 
class Pendaftaran_model extends Model
{
    protected $table = 'tbl_pendaftaran';
     
    public function getPendaftaran($id = false)
    {
        $db      = \Config\Database::connect();
        
        $builder = $db->table('tbl_mahasiswa');
        $builder->select('tbl_pendaftaran.id_praktikum AS id_praktikum, tbl_mahasiswa.nama AS nama, tbl_praktikum.nama_praktikum AS nama_praktikum, tbl_mahasiswa.nim AS nim');
        $builder->join('tbl_pendaftaran', 'tbl_mahasiswa.nim = tbl_pendaftaran.nim');
        $builder->join('tbl_praktikum', 'tbl_pendaftaran.id_praktikum = tbl_praktikum.id_praktikum');
        $query = $builder->get()->getResultArray();

        return $query;

        // $this->db->select('tbl_mahasiswa.nama AS nama, tbl_praktikum.nama_praktikum AS praktikum');
        // $this->db->from('tbl_mahasiswa'); 
        // $this->db->join('tbl_pendaftaran', 'tbl_mahasiswa.nim = tbl_pendaftaran.nim');
        // $this->db->join('tbl_praktikum', 'tbl_pendaftaran.id_praktikum = tbl_praktikum.id_praktikum');
        // $query = $this->db->get(); 
        // print_r($this->db->last_query());
        // if($query->num_rows() != 0){
        //     return $query->result_array();
        // } else {
        //     return false;
        // }

        // if($id === false){
        //     return $this->findAll();
        // }else{
            // return $this->getWhere(['id_pendaftaran' => $id]);
            // return $this->db->table('pendaftaran')
            //     ->join('tbl_mahasiswa','tbl_mahasiswa.nim=tbl_pendaftaran.nim')
            //     ->join('tbl_praktikum', 'tbl_praktikum.id_praktikum=tbl_pendaftaran.id_praktikum')
            //     ->get()->getResultArray(); 

            // $this->db->select('tbl_mahasiswa.nama AS nama, tbl_praktikum.nama_praktikum AS praktikum');
            // $this->db->from('tbl_mahasiswa');
            // $this->db->join('tbl_pendaftaran', 'tbl_mahasiswa.nim = tbl_pendaftaran.nim');
            // $this->db->join('tbl_praktikum', 'tbl_pendaftaran.id_praktikum = tbl_praktikum.id_praktikum');
            // $query = $this->db->get();

            // $query =  $this->db->table('pendaftaran')
            //     ->join('tbl_mahasiswa','tbl_mahasiswa.nim=tbl_pendaftaran.nim')
            //     ->join('tbl_praktikum', 'tbl_praktikum.id_praktikum=tbl_pendaftaran.id_praktikum')
            //     ->get();  
            // return $query;

        // }   
    }
 
    public function savePendaftaran($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }

    public function editPendaftaran($data,$id)
    {
        $builder = $this->db->table($this->table);
        $builder->where('id_pendaftaran', $id);
        return $builder->update($data);
    }

    public function hapusPendaftaran($id)
    {
        $builder = $this->db->table($this->table);
        return $builder->delete(['id_pendaftaran' => $id]);
    }

}