<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
  <div class="row">
    <div class="col">
      <h1 class="my-3 float-start">Daftar Mobil</h1>
      <a class="btn btn-success float-end my-3" href="/car/create">Tambah Mobil</a>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Name</th>
            <th scope="col">Brand</th>
            <th scope="col">Type</th>
            <th scope="col">Price</th>
            <th scope="col">Manufacture</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach($cars as $car) : ?>
          <tr>
            <th scope="row">
              <?= $i++; ?>
            </th>
            <td>
              <?= $car['name']; ?>
            </td>
             <td>
              <?= $car['brand']; ?>
            </td>
             <td>
              <?= $car['type']; ?>
            </td>
             <td>
              <?= $car['price']; ?>
            </td>
             <td>
              <?= $car['manufacture']; ?>
            </td>
            <td>
                <a href="/car/edit/<?= $car['id']; ?>" class="btn btn-warning">Edit</a>
                <form action="car/delete/<?= $car['id']; ?>" method="post" style="display:inline;">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>