// Ambil keyword yang dibutuhkan
const keyword = document.getElementById('keyword');
const searchBtn = document.getElementById('search-btn');
const container = document.getElementById('container');

// Tambah event ketika keyword ditulis
keyword.addEventListener('input', function (e) {
    // Buat object ajax
    const ajax = new XMLHttpRequest();

    // Cek kesiapan ajax
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            container.innerHTML = ajax.responseText;
        }
    }

    // Eksekusi ajax
    // ajax.open(method, pathFile, isAsynchronous)
    // Path file pada ajax.open() tidak ditampilkan ke header/address bar
    ajax.open('GET', `ajax/mahasiswa.php?keyword=${keyword.value}`, true);
    ajax.send();
});