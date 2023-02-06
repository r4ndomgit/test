<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Praktikum_model;

class Praktikum extends Controller
{
    public function index()
    {
        $model = new Praktikum_model;
        $data['title']     = 'Data Praktikum';
        $data['getPraktikum'] = $model->getPraktikum();
        echo view('header_view', $data);
        echo view('praktikum_view', $data);
        echo view('footer_view', $data);
    }

    public function tambah()
    {
        $data['title']     = 'Tambah Praktikum';
        echo view('header_view', $data);
        echo view('tambahpraktikum_view', $data);
        echo view('footer_view', $data);
    }

    public function add()
    {
        $model = new Praktikum_model;
        $data = array(
            'nama_praktikum' => $this->request->getPost('nama_praktikum'),
        );
        $model->savePraktikum($data);
        echo '<script>
                alert("Sukses Menambahkan Praktikum");
                window.location="'.base_url('/public/index.php/praktikum').'"
            </script>';

    }

    public function edit($id)
    {
        $model = new Praktikum_model;
        $getPraktikum = $model->getPraktikum($id)->getRow();
        if(isset($getPraktikum))
        {
            $data['praktikum'] = $getPraktikum;
            $data['title']  = 'Edit '.$getPraktikum->nama_praktikum;

            echo view('header_view', $data);
            echo view('editpraktikum_view', $data);
            echo view('footer_view', $data);

        }else{

            echo '<script>
                    alert("ID Praktikum '.$id.' Tidak ditemukan");
                    window.location="'.base_url('/public/index.php/praktikum').'"
                </script>';
        }
    }

    public function update()
    {
        $model = new Praktikum_model;
        $id = $this->request->getPost('id_praktikum');
        $data = array(
            'nama_praktikum' => $this->request->getPost('nama_praktikum'),
        );
        $model->editPraktikum($data,$id);
        echo '<script>
                alert("Sukses Edit Data Praktikum");
                window.location="'.base_url('/public/index.php/praktikum').'"
            </script>';

    }

    public function hapus($id)
    {
        $model = new Praktikum_model;
        $getPraktikum = $model->getPraktikum($id)->getRow();
        if(isset($getPraktikum))
        {
            $model->hapusPraktikum($id);
            echo '<script>
                    alert("Hapus Data Praktikum Sukses");
                    window.location="'.base_url('/public/index.php/praktikum').'"
                </script>';

        }else{

            echo '<script>
                    alert("Hapus Gagal !, ID praktikum '.$id.' Tidak ditemukan");
                    window.location="'.base_url('/public/index.php/praktikum').'"
                </script>';
        }
    }

}