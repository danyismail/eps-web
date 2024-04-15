<?php $this->extend('admin/layout/template') ?>
<?php $this->Section('content') ?>
<div class="pr-5 pl-5 mt-2">
    <div class="row">
        <div class="col-md-12">
            <form method="GET" action="<?=base_url('/penjualan/periode')?>" class="mb-5">
                <div class="row mb-4">
                    <div class="form-group col-md-3">
                        <label for="db">Pilih Database</label>
                        <select name="db" class="form-control">
                            <option value="">-- Choose --</option>
                            <option value="ra" <?=@$_GET['db'] === "ra" ? "selected" : ''?>>Replica Amazone</option>
                            <option value="re" <?=@$_GET['db'] === "re" ? "selected" : ''?>>Replica EPS</option>
                            <option value="da" <?=@$_GET['db'] === "da" ? "selected" : ''?>>Digipos Amazone</option>
                            <option value="de" <?=@$_GET['db'] === "de" ? "selected" : ''?>>Digipos EPS</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="form-group col-md-3">
                        <label for="StartDate">Start Date</label>
                        <input type="date" name="startDt" class="form-control" value="<?=@$_GET['startDt']?>" />
                    </div>
                    <div class="form-group col-md-3">
                        <label for="endDt">End Date</label>
                        <input type="date" name="endDt" class="form-control" value="<?=@$_GET['endDt']?>" />
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-1">Submit</button>
            </form>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr class="bg-info text-white">
                    <th>Trx</th>
                    <th>Pembelian</th>
                    <th>Penjualan</th>
                    <th>Laba</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data as $row): ?>
                <tr>
                    <td><?=$row['trx']?></td>
                    <td><?=number_format($row['pembelian'])?></td>
                    <td><?=number_format($row['penjualan'])?></td>
                    <td><?=number_format($row['laba'])?></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>

    </div>
</div>
<?php $this->endSection() ?>