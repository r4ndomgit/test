<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Pendaftaran_model;

class Pendaftaran extends Controller
{
    protected $modelpendaftaran;
    public function __construct()
    {
        $this->modelpendaftaran = new Pendaftaran_model();
    }

    public function index()
    {
        $model = new Pendaftaran_model;
        $data['title']     = 'Data Pendaftaran Praktikum';
        $data['getPendaftaran'] = $model->getPendaftaran();
        echo view('header_view', $data);
        echo view('pendaftaran_view', $data);
        echo view('footer_view', $data);

        // $data_join = $this->modelpendaftaran->getPendaftaran()->getResult();
        // $data = array(
        //     'title' => 'Data Pendaftaran Praktikum',
        //     'join' => $data_join
        // );
        // echo view('header_view', $data);
        // echo view('pendaftaran_view', $data);
        // echo view('footer_view', $data);
    }

    public function tambah()
    {
        $data['title']     = 'Pendaftaran Praktikum';
        echo view('header_view', $data);
        echo view('tambahpendaftaran_view', $data);
        echo view('footer_view', $data);
    }

    public function add()
    {
        $model = new Pendaftaran_model;
        $data = array(
            'nim' => $this->request->getPost('nim'),
            'id_praktikum' => $this->request->getPost('id_praktikum'),
        );
        $model->savePendaftaran($data);
        echo '<script>
                alert("Sukses Mendaftarkan Praktikum");
                window.location="'.base_url('/public/index.php/pendaftaran').'"
            </script>';

    }

    public function edit($id)
    {
        $model = new Pendaftaran_model;
        $getPendaftaran = $model->getPendaftaran($id)->getRow();
        if(isset($getPendaftaran))
        {
            $data['pendaftaran'] = $getPendaftaran;
            $data['title']  = 'Edit '.$getPendaftaran->nim;

            echo view('header_view', $data);
            echo view('editppendaftaran_view', $data);
            echo view('footer_view', $data);

        }else{

            echo '<script>
                    alert("ID Pendaftaran '.$id.' Tidak ditemukan");
                    window.location="'.base_url('/public/index.php/pendaftaran').'"
                </script>';
        }
    }

    public function update()
    {
        $model = new Pendaftaran_model;
        $id = $this->request->getPost('id_pendaftaran');
        $data = array(
            'nim' => $this->request->getPost('nim'),
            'id_praktikum' => $this->request->getPost('id_praktikum'),
        );
        $model->editPendaftaran($data,$id);
        echo '<script>
                alert("Sukses Edit Data Pendaftaran Praktikum");
                window.location="'.base_url('/public/index.php/pendaftaran').'"
            </script>';

    }

    public function hapus($id)
    {
        $model = new Pendaftaran_model;
        $getPendaftaran = $model->getPendaftaran($id)->getRow();
        if(isset($getPendaftaran))
        {
            $model->hapusPendaftaran($id);
            echo '<script>
                    alert("Hapus Data Pendaftaran Praktikum Sukses");
                    window.location="'.base_url('/public/index.php/pendaftaran').'"
                </script>';

        }else{

            echo '<script>
                    alert("Hapus Gagal !, ID pendaftaran praktikum '.$id.' Tidak ditemukan");
                    window.location="'.base_url('/public/index.php/pendaftaran').'"
                </script>';
        }
    }

}