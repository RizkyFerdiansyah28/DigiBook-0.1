<?php 

    session_start();
    if (!isset($_SESSION["login"])) {
        include 'layout/header-guest.php';
    } else {
        include 'layout/header.php';
    }

    if (isset($_GET['id_buku'])) {
      $id_buku = (int)$_GET['id_buku'];
    } else {
      echo "<script>
              alert('ID review tidak ditemukan');
              document.location.href = 'index.php';
            </script>";
      exit;
    }

    $buku = select("SELECT * FROM buku WHERE id_buku = $id_buku")[0];

    
?>

<style>
  .overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(to bottom, rgba(0,0,0,0.7), rgba(0,0,0,0.2));
    z-index: 0;
  }

  .content {
    position: relative;
    z-index: 2;
  }

  .rating {
    color: yellow;
    font-size: 1.2em;
  }

  .book-price {
    font-size: 2rem;
    color: #008000;
  }

  .book-discount {
    font-size: 1.2rem;
    color: gray;
    text-decoration: line-through;
  }

  .detail-title {
    display: inline-block; /* Membuat garis hanya sepanjang teks */
    border-bottom: 1px solid #fff;
    padding-bottom: 3px;
  }

  .detail-list {
    list-style: none;
    padding: 0;
    font-size: 1rem;
  }

  .detail-list li {
    margin-bottom: 0.5rem;
  }

  .icon-section img {
    width: 50px;
    margin-bottom: 0.5rem;
  }

  .icon-section p {
    font-size: 0.9rem;
    text-align: center;
  }
</style>

<!-- Outer div -->
<div class="bg-dark text-white position-relative">
  <div class="overlay"></div>

  <div class="container p-5" id="konten">
    <div class="row content">
      <!-- Left Column: Book Image and Icons -->
      <div class="col-md-4">
        <img src="./foto/foto-film/670f30e72ef30.jpg" class="img-fluid mb-3" alt="Poster Buku" />
      </div>

      <!-- Right Column: Book Details -->
      <div class="col-md-8">
        <h2><?= $buku['judul_buku']; ?></h2>
        <small>Ditulis oleh: <?= $buku['pengarang_buku']; ?></small>
        <div class="rating mb-2">
          <?= $buku['rating_buku']; ?>/10
        </div> 
        <div>
          <span class="book-price">Rp96.000</span>
          <span class="book-discount">Rp120.000</span>
          <span class="badge bg-success">20% OFF</span>
        </div>
        <hr class="border-light">
        <p class="detail-title">Detail</p> <!-- Garis hanya sepanjang teks -->
        <ul class="detail-list">
          <li><strong>Kondisi:</strong> Baru</li>
          <li><strong>Min. Pemesanan:</strong> 1 Buah</li>
        </ul>
        <p><?= $buku['sinopsis_buku']; ?>
       </p>
  
        <a href="checkout.php" class="btn btn-primary mt-3">Beli Buku</a>
      </div>
    </div>
  </div>
</div>