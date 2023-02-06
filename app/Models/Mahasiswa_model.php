<?php 
namespace App\Models;
use CodeIgniter\Model;
 
class Mahasiswa_model extends Model
{
    protected $table = 'tbl_mahasiswa';
     
    public function getMahasiswa($id = false)
    {
        if($id === false){
            return $this->findAll();
        }else{
            return $this->getWhere(['id_mahasiswa' => $id]);
        }   
    }
 
    public function saveMahasiswa($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }

    public function editMahasiswa($data,$id)
    {
        $builder = $this->db->table($this->table);
        $builder->where('id_mahasiswa', $id);
        return $builder->update($data);
    }

    public function hapusMahasiswa($id)
    {
        $builder = $this->db->table($this->table);
        return $builder->delete(['id_mahasiswa' => $id]);
    }

}