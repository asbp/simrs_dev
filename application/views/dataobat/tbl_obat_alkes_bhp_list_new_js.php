<script type="text/javascript">
    $(document).ready(function() {
        $('#barangTable').DataTable({
            "processing": true,
            "ajax": {
                url: "<?php echo base_url("dataobat/json") ?>",
                method: 'POST'
            },
            columns: [{
                "data": "kode_barang",
                "orderable": false
            }, {
                "data": "nama_barang"
            }, {
                "data": "nama_kategori"
            }, {
                "data": "nama_satuan"
            }, {
                "data": "harga"
            },{
                "data": "nama_kategori_harga_brg"
            }, {
                "data": "action",
                "orderable": false,
                "className": "text-center"
            }],
            dom: dt_dom,
            buttons: buttons("<?php echo $create_link ?>", "<?php echo $file_name ?>", "<?php echo $title ?>", "<?php echo $message ?>"),

        });
    });
</script>