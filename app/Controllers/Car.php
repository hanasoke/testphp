<?php 

namespace App\Controllers;

use App\Models\CarModel;

class Car extends BaseController 
{
    protected $carModel;
    public function __construct()
    {
        $this->carModel = new CarModel();
    }

    public function index()
    {
        $cars = $this->carModel->findAll();
        // menampung judul halaman & jumlah unit car
        $data = [
            'title' => 'Car Lists',
            'cars' => $cars  
        ];

        // mengarahkan ke halaman utama
        return view('car/index', $data);
    }

    public function create()
    {   
        // menampung judul halaman
        $data = [
            'title' => 'Add New Car',       
            'validation' => \Config\Services::validation() // kirim validasi ke view
        ];

        // mengarahkan untuk ke halaman pengguna
        return view('car/create', $data);
    }

    // menjalankan function untuk menambahkan data
    public function save()
    {
        // Validasi input 
        if(!$this->validate([
            'name' => 'required|min_length[3]',
            'brand' => 'required',
            'type' => 'required',
            'price' => 'required|numeric',
            'brand' => 'required',  
        ])) {
            // dd($this->validator->getErrors());
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        // list data yang ditambahkan & data berhasil divalidasi
        $this->carModel->save([
            'name' => $this->request->getPost('name'),
            'brand' => $this->request->getPost('brand'),
            'type' => $this->request->getPost('type'),
            'price' => $this->request->getPost('price'),
            'manufacture' => $this->request->getPost('manufacture'),
        ]);

        // kembali ke halaman utama & notifikasi sukses
        return redirect()->to('/')->with('message', 'Data Berhasil ditambahkan!');

        
    }

    // menuju halaman edit car & mengirimkan data mobil sebelumnya
    public function edit($id)
    {
        // menemukan id car
        $car = $this->carModel->find($id);

        // menampung data car & judul halaman
        $data = [
            // menampung judul halaman
            'title' => 'Edit Car',
            // menampung data car
            'car' => $car,
            // validasi car
            'validation' => \Config\Services::validation() // kirim validasi ke view
        ];
        
        // menuju halaman edit car
        return view('car/edit', $data);
    }

    // menjalankan fungsi update car
    public function update($id)
    {
        // Validasi input 
        if(!$this->validate([
            'name' => 'required|min_length[3]',
            'brand' => 'required',
            'type' => 'required',
            'price' => 'required|numeric',
            'brand' => 'required',  
        ])) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }
        
        // menampung data yang diubah & validasi berhasil
        $data = [
            'name' => $this->request->getPost('name'),
            'brand' => $this->request->getPost('brand'),
            'type' => $this->request->getPost('type'),
            'price' => $this->request->getPost('price'),
            'manufacture' => $this->request->getPost('manufacture'),
        ];

        // melakukan updated data 
        $this->carModel->update($id, $data);
        // mengarahkan ke halaman utama & notifikasi sukses
        return redirect()->to('/')->with('message', 'Data berhasil diperbarui!');
        
    }

    public function delete($id)
    {
        // Hapus data berdasarkan ID
        $this->carModel->delete($id);

        // Notifikasi sukses
        return redirect()->to('/')->with('message', 'Data berhasil dihapus!');
    }
}



?>