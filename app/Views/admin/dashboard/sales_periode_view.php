<?php $this->extend('layout/template') ?>
<?php $this->Section('content') ?>
<div class="pr-5 pl-5 mt-2">
    <div class="row">
        <div class="col-md-12">
            <form method="GET" action="<?=base_url('/penjualan/periode')?>" class="mb-5">
                <div class="row mb-2">
                    <div class="form-group col-md-3">
                        <label for="db">Pilih Database</label>
                        <select name="db" class="form-control">
                            <option value="">-- Choose --</option>

                            <?php $session = session(); ?>
                            <?php if(in_array($session->get('data')['role'], ['amazone', 'superadmin'] )) {?>
                            <option value="ra" <?=@$_GET['db'] === "ra" ? "selected" : ''?>>Amazone</option>
                            <?php } ?>

                            <?php if(in_array($session->get('data')['role'], ['eps', 'superadmin'] )) {?>
                            <option value="re" <?=@$_GET['db'] === "re" ? "selected" : ''?>>EPS</option>
                            <?php } ?>

                            <?php if(in_array($session->get('data')['role'], ['amazone', 'eps', 'superadmin'] )) {?>
                            <option value="de" <?=@$_GET['db'] === "de" ? "selected" : ''?>>Digipos</option>
                            <?php } ?>

                            <?php if(in_array($session->get('data')['role'], ['superadmin'] )) {?>
                            <option value="od" <?=@$_GET['db'] === "od" ? "selected" : ''?>>Connexion</option>
                            <?php } ?>
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
                    <th>PPH 22</th>
                    <th>Laba Net</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data as $row): ?>
                <tr>
                    <td><?=FormatNumber($row['trx'])?></td>
                    <td><?=FormatNumber($row['pembelian'])?></td>
                    <td><?=FormatNumber($row['penjualan'])?></td>
                    <td><?=FormatNumber($row['laba'])?></td>
                    <td><?=FormatNumberWithComma($row['pph'])?></td>
                    <td><?=FormatNumberWithComma($row['laba_net'])?></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>

    </div>
</div>
<?php $this->endSection() ?>