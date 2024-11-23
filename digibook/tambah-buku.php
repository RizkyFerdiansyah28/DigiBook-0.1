<?php
session_start();
if (!isset($_SESSION["login"])) {
    echo "<script>
                alert('Halaman tidak ditemukan');
                document.location.href = 'index.php';
              </script>";
} else {
    include 'layout/header.php';
}

// Check if form is submitted
if (isset($_POST['tambah'])) {
    // You can validate the data here before calling create_review()
    
    // Call the function to create the review
    if (create_buku($_POST) > 0) {
        echo "<script>
                alert('Berhasil ditambahkan');
                document.location.href = 'daftar-buku.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal ditambahkan');
                document.location.href = 'daftar-buku.php';
              </script>";
    }
}


?>

<div class="container">
    <h1 class="mt-5">Judul Buku</h1>
    <hr>

    <h2 class="mt-5">Detail Buku</h2>
    <form action="" method="POST" class="mt-5" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" id="judul_buku" name="judul_buku" placeholder="Tambahkan judul" required>
        </div>

        <div class="mb-3">
            <label for="pengarang" class="form-label">Pengarang</label>
            <input type="text" class="form-control" id="pengarang_buku" name="pengarang_buku" placeholder="Tambahkan Pengarang" required>
        </div>

        <div class="mb-3">
            <label for="genre" class="form-label">Genre</label>
            <input type="text" class="form-control" id="genre_buku" name="genre_buku" placeholder="Tambahkan Genre" required>
        </div>

        <div class="mb-3">
            <label for="rating" class="form-label">Rating</label>
            <select class="form-control" id="rating_buku" name="rating_buku" required>
                <option value="" disabled selected>Pilih rating</option>
                <?php 
                // Generate options for rating from 1 to 10
                for ($i = 1; $i <= 10; $i++) {
                    echo "<option value=\"$i\">$i</option>";
                }
                ?>
            </select>
        </div>


        <div class="mb-3">
            <label for="ulasan" class="form-label">Tulis Sinopsis</label>
            <textarea class="form-control" id="sinopsis_buku" name="sinopsis_buku" rows="4" placeholder="Tambahkan ulasan"
                required></textarea>
        </div>

        
<!-- 
        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" class="form-control" id="foto_film" name="foto_film" placeholder="Tambahkan Foto..." onchange="previewImg()"
                required>

            <img src="" class="img-thumbnail img-preview" alt="" width="500px">
        </div> -->

        <button type="submit" name="tambah" id="tambah" class="btn btn-success" style="float: right">Tambah Buku
            </button>
    </form>
</div>

<!-- <script>
    function previewImg() {
        const foto_film = document.querySelector('#foto_film');
        const imgPreview = document.querySelector('.img-preview');

        const fileFotoFilm = new FileReader();
        fileFotoFilm.readAsDataURL(foto_film.files[0]);

        fileFotoFilm.onload = function(e){
            imgPreview.src = e.target.result;
        }
    }
    </script> -->