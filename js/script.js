$(document).ready(function() {
    // Hilangkan tombol cari
    $('#search-btn').hide();

    // Event ketika keyword ditulis
    // Method load hanya untuk GET
    // $('#keyword').on('keyup', function () {
    //     $('span.loader').show();
    //     $('#container').load('ajax/mahasiswa.php?keyword=' + $('#keyword').val());
    // });

    // Dengan $.get()
    $('#keyword').on('keyup', function () {
        $('span.loader').show();
        $.get('ajax/mahasiswa.php?keyword=' + $('#keyword').val(), function(data) {
            $('#container').html(data);
            $('span.loader').hide();
        });
    });
});