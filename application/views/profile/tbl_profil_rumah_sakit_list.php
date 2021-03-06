<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">
    
                    <div class="box-header">
                        <h3 class="box-title">KELOLA DATA TBL_PROFIL_RUMAH_SAKIT</h3>
                    </div>
        
        <div class="box-body">
            <div class='row'>
            <div class='col-md-9'>
            <div style="padding-bottom: 10px;">
        <?php echo anchor(base_url('profile/create'), '<i class="fa fa-plus" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?></div>
            </div>
            <div class='col-md-3'>
            <form action="<?php echo base_url('profile/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo base_url('profile'); ?>" class="btn btn-default">Reset</a>
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
		<th>Nama Rumah Sakit</th>
		<th>Alamat</th>
		<th>Propinsi</th>
		<th>Kabupaten</th>
		<th>No Telpon</th>
		<th>Logo</th>
		<th>Action</th>
            </tr><?php
            foreach ($profile_data as $profile)
            {
                ?>
                <tr>
			<td width="10px"><?php echo ++$start ?></td>
			<td><?php echo $profile->nama_rumah_sakit ?></td>
			<td><?php echo $profile->alamat ?></td>
			<td><?php echo $profile->propinsi ?></td>
			<td><?php echo $profile->kabupaten ?></td>
			<td><?php echo $profile->no_telpon ?></td>
			<td><?php echo $profile->logo ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(base_url('profile/read/'.$profile->id),'<i class="fa fa-eye" aria-hidden="true"></i>','class="btn btn-danger btn-sm"'); 
				echo '  '; 
				echo anchor(base_url('profile/update/'.$profile->id),'<i class="fa fa-pen" aria-hidden="true"></i>','class="btn btn-danger btn-sm"'); 
				echo '  '; 
				echo anchor(base_url('profile/delete/'.$profile->id),'<i class="fa fa-trash-alt" aria-hidden="true"></i>','class="btn btn-danger btn-sm" Delete','onclick="javascript: return confirm(\'Apakah Anda yakin?\')"'); 
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