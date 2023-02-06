<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Mahasiswa_model;

class Mahasiswa extends Controller
{
    public function index()
    {
        $model = new Mahasiswa_model;
        $data['title']     = 'Data Mahasiswa';
        $data['getMahasiswa'] = $model->getMahasiswa();
        echo view('header_view', $data);
        echo view('mahasiswa_view', $data);
        echo view('footer_view', $data);
    }

    public function tambahmhs()
    {
        $data['title']     = 'Tambah Mahasiswa';
        echo view('header_view', $data);
        echo view('tambahmhs_view', $data);
        echo view('footer_view', $data);
    }

    public function addmhs()
    {
        $model = new Mahasiswa_model;
        $data = array(
            'nama' => $this->request->getPost('namamhs'),
            'nim'         => $this->request->getPost('nim'),
        );
        $model->saveMahasiswa($data);
        echo '<script>
                alert("Sukses Menambahkan Mahasiswa");
                window.location="'.base_url('/public/index.php/mahasiswa').'"
            </script>';

    }

    public function editmhs($id)
    {
        $model = new Mahasiswa_model;
        $getMahasiswa = $model->getMahasiswa($id)->getRow();
        if(isset($getMahasiswa))
        {
            $data['mahasiswa'] = $getMahasiswa;
            $data['title']  = 'Edit '.$getMahasiswa->nama;

            echo view('header_view', $data);
            echo view('editmhs_view', $data);
            echo view('footer_view', $data);

        }else{

            echo '<script>
                    alert("ID Mahasiswa '.$id.' Tidak ditemukan");
                    window.location="'.base_url('/public/index.php/mahasiswa').'"
                </script>';
        }
    }

    public function update()
    {
        $model = new Mahasiswa_model;
        $id = $this->request->getPost('id_mahasiswa');
        $data = array(
            'nama' => $this->request->getPost('nama'),
            'nim'         => $this->request->getPost('nim'),
        );
        $model->editMahasiswa($data,$id);
        echo '<script>
                alert("Sukses Edit Data Mahasiswa");
                window.location="'.base_url('/public/index.php/mahasiswa').'"
            </script>';

    }

    public function hapus($id)
    {
        $model = new Mahasiswa_model;
        $getMahasiswa = $model->getMahasiswa($id)->getRow();
        if(isset($getMahasiswa))
        {
            $model->hapusMahasiswa($id);
            echo '<script>
                    alert("Hapus Data Mahasiswa Sukses");
                    window.location="'.base_url('/public/index.php/mahasiswa').'"
                </script>';

        }else{

            echo '<script>
                    alert("Hapus Gagal !, ID mahasiswa '.$id.' Tidak ditemukan");
                    window.location="'.base_url('/public/index.php/mahasiswa').'"
                </script>';
        }
    }

}