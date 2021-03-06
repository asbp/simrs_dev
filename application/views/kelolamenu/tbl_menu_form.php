<div class="content-wrapper">

    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA MENU</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">

                <table class='table table-bordered'>

                    <tr>
                        <td width='200'>Title <?php echo form_error('title') ?></td>
                        <td><input type="text" class="form-control" name="title" id="title" placeholder="Title" value="<?php echo $title; ?>" /></td>
                    </tr>
                    <tr>
                        <td width='200'>Url <?php echo form_error('url') ?></td>
                        <td><input type="text" class="form-control" name="url" id="url" placeholder="Url" value="<?php echo $url; ?>" /></td>
                    </tr>
                    <tr>
                        <td width='200'>Icon <?php echo form_error('icon') ?></td>
                        <td><input type="text" class="form-control" name="icon" id="icon" placeholder="Icon" value="<?php echo $icon; ?>" /></td>
                    </tr>
                    <tr>
                        <td width='200'>Is Main Menu <?php echo form_error('is_main_menu') ?></td>
                        <td> <select name="is_main_menu" class="form-control">
                                <option value="0">MAIN MENU</option>
                                <?php
                                $menu = $this->db->get('tbl_menu')->result();
                                foreach ($menu as $m) {
                                    echo "<option value='$m->id' ";
                                    echo $m->id == $is_main_menu ? 'selected' : '';
                                    echo ">" .  strtoupper($m->title) . "</option>";
                                }
                                ?>
                            </select></td>
                    </tr>
                    <tr>
                        <td width='200'>Pengakses menu</td>
                        <td>
                                <?= @$menu_access ?>
                        </td>
                    </tr>
                    <tr>
                        <td width='200'>Is Aktif <?php echo form_error('is_aktif') ?></td>
                        <td><?php echo form_dropdown('is_aktif', array('y' => 'AKTIF', 'n' => 'TIDAK'), $is_aktif, array('class' => 'form-control')) ?></td>
                    </tr> 
                    <tr>
                        <td></td>
                        <td><input type="hidden" name="id_menu" value="<?php echo @$id; ?>" />
                            <button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> <?php echo $button ?></button>
                            <a href="<?php echo base_url('kelolamenu') ?>" class="btn btn-info"><i class="fa fa-sign-out-alt"></i> Kembali</a></td>
                    </tr>
                </table>
            </form>
        </div>
</div>