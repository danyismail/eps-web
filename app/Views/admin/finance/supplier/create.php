<?php $this->extend('admin/layout/template_finance_new') ?>
<?php $this->Section('content') ?>
<div class="pr-5 pl-5 mt-2">
    <div class="table-responsive bg-white p-3">
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-8">
                <form action="<?=base_url('/supplier/create')?>" method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="db">Pilih Database</label>
                            <select name="db" class="form-control">
                                <option value="">-- Choose --</option>
                                <option value="da" <?=@$_GET['db'] === "da" ? "selected" : ''?>>Digipos Amazone</option>
                                <option value="de" <?=@$_GET['db'] === "de" ? "selected" : ''?>>Digipos EPS</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row mt-3">
                        <div class="form-group col-md-6">
                            <label for="formGroupExampleInput">Name</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Name"
                                name="name">
                        </div>
                    </div>
                    <div class="form-row mt-3">
                        <div class="form-group col-md-6">
                            <label for="inputState">Status</label>
                            <select id="inputState" class="form-control" name="status">
                                <option value="">-- Choose --</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection() ?>