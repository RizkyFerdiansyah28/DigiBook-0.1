<?php 
include 'layout/header.php';

// Periksa apakah pengguna sudah login
if(!isset($_SESSION["login"])){
    echo "<script>alert('Anda belum login');
    document.location.href = 'login.php';
    </script>";
    exit;
}

// Ambil user_id dari session, bukan dari GET
$user_id = $_SESSION['user_id'];

// Ambil data pengguna yang login
$user = select("SELECT * FROM users WHERE user_id = $user_id")[0];
?>


    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f0f2f5;
        }


        .profile-picture {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-bottom: 1rem;
            object-fit: cover;
        }

        .profile-name {
            font-size: 1.8rem;
            color: #1a1a1a;
            margin-bottom: 0.5rem;
        }

        .profile-bio {
            color: #666;
            margin-bottom: 1rem;
        }

        .stats {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-top: 1rem;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 1.5rem;
            font-weight: bold;
            color: #1a1a1a;
        }

        .stat-label {
            color: #666;
            font-size: 0.9rem;
        }

        .recent-reviews {
            margin-top: 2rem;
            background-color: white;
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .review-item {
            display: flex;
            gap: 1rem;
            padding: 1rem 0;
            border-bottom: 1px solid #eee;
        }

        .review-item:last-child {
            border-bottom: none;
        }

        .movie-poster {
            width: 100px;
            height: 150px;
            object-fit: cover;
            border-radius: 5px;
        }

        .review-content {
            flex: 1;
        }

        .movie-title {
            font-size: 1.2rem;
            font-weight: bold;
            color: #1a1a1a;
            margin-bottom: 0.5rem;
        }

        .review-text {
            color: #444;
            line-height: 1.5;
            margin-bottom: 0.5rem;
        }

        .review-meta {
            color: #666;
            font-size: 0.9rem;
        }

        .rating {
            color: #ffd700;
            font-weight: bold;
        }
    </style>


    <div class="container">
        <div class="profile-header">
            <img src="./foto/foto-profil/670a7e4738949.png" alt="Foto Profil" class="profile-picture">
            <h1 class="profile-name"><?= $user['username']; ?></h1>
            <p class="profile-bio">admin</p>
        </div>
        
        <div class="recent-reviews">
            <h2>Buku Terbaik</h2>
            <div class="review-item">
                <img src="./foto/foto-film/670f30e72ef30.jpg" alt="Film Poster 1" class="movie-poster">
                <div class="review-content">
                    <h3 class="movie-title">Pluto</h3>
                    <p class="review-text">buku bagus</p>
                    <p class="review-meta">Rating: <span class="rating">9/10</p>
                </div>
            </div>
            
        </div>
    </div>

    <div class="container my-3 text-end">
    <a href="edit-profil.php" class="btn btn-success">Edit</a>
    </div>