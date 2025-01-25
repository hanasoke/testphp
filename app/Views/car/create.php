<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="mt-3">Add New Car</h1>
            <?php if (isset($validation)) : ?>
                <div class="alert alert-danger alert-dismissible fade show my-4" role="alert">
                    <?= $validation->listErrors(); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <form action="/car/save" method="post">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control <?= (isset($validation) && $validation->hasError('name')) ? 'is-invalid' : ''; ?>" id="name" name="name"  value="<?= old('name'); ?>">
                    <div class="invalid-feedback">
                        <?= isset($validation) ? $validation->getError('name') : ''; ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="brand" class="form-label">Brand</label>
                    <input type="text" class="form-control <?= (isset($validation) && $validation->hasError('brand')) ? 'is-invalid' : ''; ?>" id="brand" name="brand"  value="<?= old('brand'); ?>">
                    <div class="invalid-feedback">
                        <?= isset($validation) ? $validation->getError('brand') : ''; ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <select class="form-select" id="type" name="type">
                        <option selected value="<?= old('type'); ?>" >Select the Type</option>
                        <option value="Manual">Manual</option>
                        <option value="Matic">Matic</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" id="price" name="price" value="<?= old('price'); ?>">
                </div>
                <div class="mb-3">
                    <label for="manufacture" class="form-label">Manufacture</label>
                    <input type="date" class="form-control" id="manufacture" name="manufacture"  value="<?= old('manufacture'); ?>">
                </div>
                <button type="submit" class="btn btn-success float-end">Save</button>
            </form>
            <a href="/" class="btn btn-secondary float-start">Back</a>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
