<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">

                    <div class="box-header">
                        <h3 class="box-title">KELOLA DATA OBAT ALKES BHP</h3>
                    </div>

                    <div class="box-body">
                        <div class='row'>
                            <div class='col-md-9'>
                                <div style="padding-bottom: 10px;">
        <?php echo anchor(base_url('dataobat/create'), '<i class="fa fa-plus" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
		<?php echo anchor(base_url('dataobat/excel'), '<i class="fa fa-file-excel" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-success btn-sm"'); ?>
		<?php echo anchor(base_url('dataobat/word'), '<i class="fa fa-file-word" aria-hidden="true"></i> Export Ms Word', 'class="btn btn-primary btn-sm"'); ?></div>
            </div>
            <div class=' col-md-3'>
                                    <form action="<?php echo base_url('dataobat/index'); ?>" class="form-inline" method="get">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                                            <span class="input-group-btn">
                                                <?php
                                                if ($q <> '') {
                                                ?>
                                                    <a href="<?php echo base_url('dataobat'); ?>" class="btn btn-default">Reset</a>
                                                <?php
                                                }
                                                ?>
                                                <button class="btn btn-primary" type="submit">Search</button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>


                            <?= $callout ?>
                            <table class="table table-bordered" style="margin-bottom: 10px">
                                <tr>
                                    <th>No</th>
                                    <th>Kode Obat</th>
                                    <th>Nama Obat</th>
                                    <th>Kategori Barang</th>
                                    <th>Satuan</th>
                                    <th>Harga</th>
                                    <th>Jenis Harga</th>
                                    <th>Action</th>
                                </tr><?php
                                        foreach ($dataobat_data as $dataobat) {
                                        ?>
                                    <tr>
                                        <td width="10px"><?php echo ++$start ?></td>
                                        <td><?php echo $dataobat->kode_barang ?></td>
                                        <td><?php echo $dataobat->nama_barang ?></td>
                                        <td><?php echo $dataobat->nama_kategori ?></td>
                                        <td><?php echo $dataobat->nama_satuan ?></td>
                                        <td><?php echo rupiah($dataobat->harga) ?></td>
                                        <td><?php echo $dataobat->nama_kategori_harga_brg ?></td>
                                        <td style="text-align:center" width="100px">
                                            <?php
                                            echo anchor(base_url('dataobat/update/' . $dataobat->kode_barang), '<i class="fa fa-pen" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm"');
                                            echo '  ';
                                            echo anchor(base_url('dataobat/delete/' . $dataobat->kode_barang), '<i class="fa fa-trash-alt" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm" Delete', 'onclick="javascript: return confirm(\'Apakah Anda yakin?\')"');
                                            ?>
                                        </td>
                                    </tr>
                                <?php
                                        }
                                ?>
                            </table>
                            <div class="row">
                                <div class="col-md-6">

                                </div>
                                <div class="col-md-6 text-right">
                                    <?php echo $pagination ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>