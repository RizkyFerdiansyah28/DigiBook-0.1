<?php 
include 'layout/header.php';

?>

<style>
    a {
    text-decoration: none;
}
</style>

<div class="container mt-5">
    <h1>Cari Film</h1>
    <table class="table table-striped table-bordered mt-3 "  id="table">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Judul</th>
                <th class="text-center">Tanggal Rilis</th>
                <th class="text-center">Rating</th>
                <th class="text-center">poster</th>
                
            </tr>
        </thead>

        <tbody>
            <tr>
                <td class="text-center">1</td>
                <td class="text-center">Pluto</td>
                <td class="text-center">09-11-2024</td>
                <td class="text-center">Komik</td>
                <td class="text-center">9/10</td>
                <td class="text-center"><img src="./foto/foto-film/670f30e72ef30.jpg" width="150px"></td>
                <td width="15%" class="text-center">
                    <a href="edit-buku.php" class="btn btn-primary">Edit</a>
                    <a href="hapus-buku.php" class="btn btn-danger"
                        onclick="return confirm('Apakah anda yakin untuk menghapus review')">Hapus</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>