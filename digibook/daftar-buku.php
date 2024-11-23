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

$buku = select("SELECT * FROM buku");
?>

<div class="container mt-5">
    <h1>ReviewkanLe</h1>
    <a href="tambah-buku.php" class="btn btn-success "> Tambah</a>

    <table class="table table-striped table-bordered mt-3 "  id="table">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Judul</th>
                <th class="text-center">Pengarang</th>
                <th class="text-center">Tanggal Rilis</th>
                <th class="text-center">Genre</th>
                <th class="text-center">Rating</th>
                <th class="text-center">Poster</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php $no = 1?>
            <?php foreach ($buku as $data_buku) :?>
            <tr>
                <td class="text-center"><?= $no++?></td>
                <td class="text-center"><?= $data_buku['judul_buku']; ?></td>
                <td class="text-center"><?= $data_buku['pengarang_buku']; ?></td>
                <td class="text-center">09-11-2024</td>
                <td class="text-center"><?= $data_buku['genre_buku']; ?></td>
                <td class="text-center"><?= $data_buku['rating_buku']; ?></td>
                <td class="text-center"><img src="./foto/foto-film/670f30e72ef30.jpg" width="150px"></td>
                <td width="15%" class="text-center">
                    <a href="edit-buku.php?id_buku=<?= $data_buku['id_buku']; ?>" class="btn btn-primary">Edit</a>
                    <a href="hapus-buku.php?id_buku=<?= $data_buku['id_buku']; ?>" class="btn btn-danger"
                        onclick="return confirm('Apakah anda yakin untuk menghapus review')">Hapus</a>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>
