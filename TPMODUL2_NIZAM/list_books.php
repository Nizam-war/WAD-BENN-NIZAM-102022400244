<?php
include 'connect.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';

// Query ambil data buku + nama kategori
$query = "
    SELECT 
        books.id, 
        books.title, 
        categories.category_name AS category_name, 
        books.author, 
        books.stock
    FROM books
    LEFT JOIN categories ON books.category_id = categories.id
    WHERE books.title LIKE '%$search%'
    ORDER BY books.id ASC
";

$result = mysqli_query($conn, $query);

// Cek error SQL
if (!$result) {
    die('Query gagal: ' . mysqli_error($conn));
}

$books = [];
while ($row = mysqli_fetch_assoc($result)) {
    $books[] = $row;
}
?>
    <tbody>
    <?php if (count($books) == 0): ?>
        <tr>
            <td colspan="6" class="text-center text-muted">Tidak ada data</td>
        </tr>
    <?php else: ?>
        <?php foreach ($books as $i => $book): ?>
            <tr>
                <td class="text-center"><?= $i + 1 ?></td>
                <td><?= htmlspecialchars($book['title']) ?></td>
                <td><?= htmlspecialchars($book['category_name']) ?></td>
                <td><?= htmlspecialchars($book['author']) ?></td>
                <td class="text-center"><?= (int)$book['stock'] ?></td>
                <td class="text-center">
                    <a href="form_detail_book.php?id=<?= $book['id'] ?>" class="btn btn-sm btn-primary">Detail</a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</tbody>
