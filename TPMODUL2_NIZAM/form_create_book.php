<?php
include 'connect.php';

// ====================1================= 
// Ambil semua kategori dari tabel categories
$categories = mysqli_query($conn, "SELECT * FROM categories");

// Jika query gagal, tampilkan pesan error
if (!$categories) {
    die("Query error: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tambah Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="container py-5">
        <div class="card shadow p-4">
            <h3 class="mb-4 text-dark">Tambah Buku Baru</h3>
            
            <!-- Form untuk menambah buku -->
            <form action="create.php" method="POST">

                <!-- ====================2================= -->
                <!-- Input Judul Buku -->
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="title" placeholder="Judul Buku" required>
                    <label>Judul Buku</label>
                </div>

                <!-- ====================3================= -->
                <!-- Dropdown Kategori -->
                <div class="form-floating mb-3">
                    <select class="form-select" id="selectCategory" name="categoryId" required>
                        <option value="" disabled selected>-- Pilih Kategori --</option>
                        <?php while ($category = mysqli_fetch_assoc($categories)) : ?>
                            <!-- ====================4================= -->
                            <option value="<?= $category['id'] ?>">
                                <?= htmlspecialchars($category['category_name']) ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                    <label for="selectCategory">Kategori</label>
                </div>

                <!-- ====================5================= -->
                <!-- Input Penulis -->
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="author" placeholder="Penulis" required>
                    <label>Penulis</label>
                </div>

                <!-- ====================6================= -->
                <!-- Input Stok -->
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="stock" placeholder="Stok" min="0" required>
                    <label>Stok</label>
                </div>

                <!-- Tombol Submit -->
                <button type="submit" name="create" class="btn btn-primary">+ Tambah Buku</button>
            </form>
        </div>
    </div>
</body>

</html>
