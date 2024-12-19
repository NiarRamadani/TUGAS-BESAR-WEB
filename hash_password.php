<?php
// Sertakan koneksi database
require 'connect.php';

try {
    // Password yang akan di-hash
    $passwordAdmin = password_hash('admin', PASSWORD_DEFAULT);
    $passwordUser1 = password_hash('password123', PASSWORD_DEFAULT);

    // Siapkan query untuk mengupdate password di tabel users
    $stmt = $pdo->prepare("UPDATE users SET password = ? WHERE username = ?");

    // Update password untuk admin
    $stmt->execute([$passwordAdmin, 'admin']);

    // Update password untuk user1
    $stmt->execute([$passwordUser1, 'user1']);

    echo "Password berhasil di-hash dan diupdate!";
} catch (PDOException $e) {
    echo "Terjadi kesalahan: " . $e->getMessage();
}
?>
