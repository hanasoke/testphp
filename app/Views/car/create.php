<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="mt-3">Add New Car</h1>
            <form action="/car/save" method="post">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="brand" class="form-label">Brand</label>
                    <select class="form-select" id="brand" name="brand" required>
                        <option selected>Choose your Brand</option>
                        <option value="Honda">Honda</option>
                        <option value="Daihatsu">Daihatsu</option>
                        <option value="Mitsubishi">Mitsubishi</option>
                        <option value="BWD">BWD</option>
                        <option value="BMW">Mitsubishi</option>

                    </select>
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <select class="form-select" id="type" name="type" required>
                        <option selected>Choose your Type</option>
                        <option value="Manual">Manual</option>
                        <option value="Matic">Matic</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" id="price" name="price" required>
                </div>
                <div class="mb-3">
                    <label for="manufacture" class="form-label">Manufacture</label>
                    <input type="date" class="form-control" id="manufacture" name="manufacture" required>
                </div>
                <button type="submit" class="btn btn-success float-end">Save</button>
            </form>
            <a href="/" class="btn btn-secondary float-start mb-3">Back</a>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
