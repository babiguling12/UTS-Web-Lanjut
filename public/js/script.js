$(document).ready(function() {
 
   $('.tombolTambah').on('click', function() {
        $('#judulModal').html('Tambah Data Blog');
        $('.modal-footer button[type=submit').html('Tambah Data');

        // reset form
        $('#id').val('');
        $('#judul').val('');
        $('#sub_judul').val('');
        $('#deskripsi').val('');

        // sembunyikan gambar
        $('#img').attr('src', ''); 
        $('#img').hide();
   });

    $('.tampilModalEdit').on('click', function() {
        $('#judulModal').html('Edit Data Blog');
        $('.modal-footer button[type=submit]').html('Edit Data');
        $('.modal-body form').attr('action', 'http://localhost/utsweblanjut/public/blog/edit');
        $('#gambar').removeAttr('required');

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
                $('#img').attr('src', 'http://localhost/utsweblanjut/public/img/' + data.gambar);   
            }
        });
    });
    
    let idToDelete;

    $('.tampilModalHapus').on('click', function() {
        idToDelete = $(this).data('id');
        $('#confirmHapus').html('Yakin');
    });

    $('#confirmHapus').on('click', function(){
        $.ajax({
            url: 'http://localhost/utsweblanjut/public/blog/hapus/' + idToDelete,
            method: 'post',
            success: function() {
                location.reload();
            }
        });
    });
        
});
