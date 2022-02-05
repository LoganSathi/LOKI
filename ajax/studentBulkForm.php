<div class="drag-area">
    Drag and Drop File Here <br> <span id='sub'> Only .csv file allowed</span>
</div>
<div id='bulk-register-success'>Successfully Registered All Students</div>
<div id='csv-error'>Only .csv is allowed</div>

<script>
    $(document).ready(function() {
        $('.drag-area').on('dragover', function() {
            $(this).addClass('drag-over');
            return false;
        });

        $('.drag-area').on('dragleave', function() {
            $(this).removeClass('drag-over');
            return false;
        });

        $('.drag-area').on('drop', function(e) {
            e.preventDefault();
            $(this).removeClass('drag-over');
            var formData = new FormData();
            var files_list = e.originalEvent.dataTransfer.files;
            for (let i = 0; i < files_list.length; i++) {
                formData.append('file[]', files_list[i]);
            }
            $.ajax({
                url: "../ajax/studentBulkRegister.php",
                method: "POST",
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    $('#table-margin').html(data);
                }
            });
        });
    });
</script>