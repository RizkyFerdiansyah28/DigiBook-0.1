<?php 
    //menampilkan data dari DB
    function select($query)
    {
        global $db;
        
        $result = mysqli_query($db, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }

        return $rows;
    }

    //menambahkan buku
    function create_buku($post)
    {
        global $db;

        $judul_buku = $post['judul_buku'];
        $pengarang_buku = $post['pengarang_buku'];
        $genre_buku = $post['genre_buku'];
        $rating_buku = $post['rating_buku'];
        $sinopsis_buku = $post['sinopsis_buku'];

        //query tambah data
        $query = "INSERT INTO buku VALUES(null, '$judul_buku', '$pengarang_buku', '$genre_buku', '$rating_buku', '$sinopsis_buku', CURRENT_TIMESTAMP())";

        mysqli_query($db, $query);
        return mysqli_affected_rows($db);
    }

    function update_buku($post)
    {
        global $db;

        $id_buku = $post['id_buku'];
        $judul_buku = $post['judul_buku'];
        $pengarang_buku = $post['pengarang_buku'];
        $genre_buku = $post['genre_buku'];
        $rating_buku = $post['rating_buku'];
        $sinopsis_buku = $post['sinopsis_buku'];

        //query ubah data
        $query = "UPDATE buku SET judul_buku = '$judul_buku', pengarang_buku = '$pengarang_buku', genre_buku = '$genre_buku', rating_buku = '$rating_buku', sinopsis_buku = '$sinopsis_buku' WHERE id_buku = $id_buku";

        mysqli_query($db, $query);
        return mysqli_affected_rows($db);

    }

    function delete_buku($id_buku)
    {
        global $db;

        //query hapus
        $query = "DELETE FROM buku WHERE id_buku = $id_buku";

        mysqli_query($db, $query);

        return mysqli_affected_rows($db);
    }

    function register_user($post)
    {
        global $db;

        $username = mysqli_real_escape_string($db, $post['username']);
        $email    = mysqli_real_escape_string($db, $post['email']);
        $password = mysqli_real_escape_string($db, $post['password']);

        //cek email apakah sudah terdaftar atau belum
        $check_user = mysqli_query($db, "SELECT email FROM users WHERE email = '$email'");
    if (mysqli_fetch_assoc($check_user)) {
        return 0; // Email sudah terdaftar
    }

    // Hash password sebelum disimpan
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);
    //insert user
    $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email','$password_hashed')";

    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
    }
    
    


?>