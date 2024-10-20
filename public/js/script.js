$(document).ready(function() {
 
   $('.tombolTambah').on('click', function() {
        $('#judulModal').html('Tambah Data Blog');
        $('.modal-footer button[type=submit').html('Tambah Data');
        $('#id').val('');
        $('#judul').val('');
        $('#sub_judul').val('');
        $('#deskripsi').val('');
        $('#gambar').val(''); 
   });

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
                $('#gambarLama').val(data.gambarLama);
            }
        });


        $('#previewImg').attr('src', 'http://localhost/utsweblanjut/public/img/' + $(this).data('gambar'));
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
            success: function(response) {
                location.reload();
            }
        });
    });
        
});
