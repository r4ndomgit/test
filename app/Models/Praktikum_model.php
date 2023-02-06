<?php 
namespace App\Models;
use CodeIgniter\Model;
 
class Praktikum_model extends Model
{
    protected $table = 'tbl_praktikum';
     
    public function getPraktikum($id = false)
    {
        if($id === false){
            return $this->findAll();
        }else{
            return $this->getWhere(['id_praktikum' => $id]);
        }   
    }
 
    public function savePraktikum($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }

    public function editPraktikum($data,$id)
    {
        $builder = $this->db->table($this->table);
        $builder->where('id_praktikum', $id);
        return $builder->update($data);
    }

    public function hapusPraktikum($id)
    {
        $builder = $this->db->table($this->table);
        return $builder->delete(['id_praktikum' => $id]);
    }

}