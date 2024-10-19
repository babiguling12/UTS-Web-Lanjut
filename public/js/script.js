$(document).ready(function() {

    $('.tampilModalEdit').on('click', function() {
        $('#judulModal').html('Edit Data Blog');
        $('.modal-footer button[type=submit]').html('Edit Data');
        $('.modal-body form').attr('action', 'http://localhost/utsweblanjut/public/blog/edit');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/utsweblanjut/public/blog/getubah',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#id').val(data.id);
                $('#judul').val(data.judul);
                $('#sub_judul').val(data.sub_judul);
                $('#deskripsi').val(data.deskripsi);
                $('#gambar').val(data.gambar);   
            }
        });
    });
    
    let idToDelete;

    $(document).on('click', '.tampilModalHapus', function() {
        idToDelete = $(this).data('id');
    });

    $('$confirmHapus').on('click', function(){
        $.ajax({
            url: 'http://localhost/utsweblanjut/public/blog/hapus/' + idToDelete,
            method: 'post',
            success: function(response) {
                location.reload();
            }
        });
    });
        
});
