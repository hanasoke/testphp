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
        ];

        // mengarahkan untuk ke halaman pengguna
        return view('car/create', $data);
    }

    // menjalankan function untuk menambahkan data
    public function save()
    {
        // list data yang ditambahkan
        $this->carModel->save([
            'name' => $this->request->getPost('name'),
            'brand' => $this->request->getPost('brand'),
            'type' => $this->request->getPost('type'),
            'price' => $this->request->getPost('price'),
            'manufacture' => $this->request->getPost('manufacture'),
        ]);

        // kembali ke halaman utama
        return redirect()->to('/');
    }

    // menuju halaman edit car & mengirimkan data mobil sebelumnya
    public function edit($id)
    {
        // menemukan id car
        $car = $this->carModel->find($id);

        // menampung data car & judul halaman
        $data = [
            'title' => 'Edit Car',
            'car' => $car,
        ];
        
        // menuju halaman edit car
        return view('car/edit', $data);
    }

    // menjalankan fungsi update car
    public function update($id)
    {
        // menampung data yang diubah
        $data = [
            'name' => $this->request->getPost('name'),
            'brand' => $this->request->getPost('brand'),
            'type' => $this->request->getPost('type'),
            'price' => $this->request->getPost('price'),
            'manufacture' => $this->request->getPost('manufacture'),
        ];

        // melakukan updated data 
        $this->carModel->update($id, $data);
        // mengarahkan ke halaman utama
        return redirect()->to('/');
    }

    public function delete($id)
    {
        $this->carModel->delete($id);
        return redirect()->to('/');
    }


}



?>