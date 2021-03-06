<script type="text/javascript">
    $(document).ready(function() {

        var t = $("#mytable").dataTable({
            initComplete: function() {
                var api = this.api();
                $('#mytable_filter input')
                    .off('.DT')
                    .on('keyup.DT', function(e) {
                        if (e.keyCode == 13) {
                            api.search(this.value).draw();
                        }
                    });
            },
            oLanguage: {
                sProcessing: "loading..."
            },
            processing: true,
            ajax: {
                "url": "<?php echo api_url("dt_diary") ?>",
                "type": "POST",
                "data": {
                    "id_pendaftaran": "<?php echo $info_pasien->id ?>",
                }
            },
            dom: dt_dom,
            buttons: [{
                text: '<i class="fa fa-sign-out-alt"></i>&nbsp;&nbsp;Kembali',
                className: "btn btn-info",
                action: function(e, node, config) {
                    window.location = "<?= $back_url ?>";
                }
            }, ...buttons("<?php echo $create_link ?>", "<?php echo $file_name ?>", "<?php echo $title ?>", "<?php echo $message ?>")],

            columns: [{
                    "data": "id",
                    "orderable": false
                }, {
                    "data": "tgl_input"
                }, {
                    "data": "isi"
                },
                {
                    "data": "action",
                    "orderable": false,
                    "className": "text-center"
                }
            ],
            order: [
                [0, 'desc']
            ],
            rowCallback: function(row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                $('td:eq(0)', row).html(index);
            }
        });
    });
</script>