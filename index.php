<?php
require_once 'Koneksi.php';

$db = new Koneksi();
$users = $db->getUsers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .table-header {
            background-color: #343a40;
            color: #ffffff;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 0.875rem;
        }

        .table-row:hover {
            background-color: #e9ecef;
        }

        .action-link {
            margin-right: 8px;
        }

        .action-link:hover {
            text-decoration: underline;
        }

        .navbar {
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .card {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="min-vh-100">
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <i class="fas fa-users text-primary"></i> User 
                </a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <div class="ms-auto">
                        <a href="add.php" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Tambah User
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <div class="py-4">
            <div class="container">
                <div class="card shadow">
                    <div class="card-body">
                        <h2 class="card-title text-center">List User</h2>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class="table-header">
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>No Handphone</th>
                                        <th>Alamat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $user) { ?>
                                        <tr class="table-row">
                                            <td><?= htmlspecialchars($user['id']) ?></td>
                                            <td><?= htmlspecialchars($user['name']) ?></td>
                                            <td><?= htmlspecialchars($user['phone']) ?></td>
                                            <td><?= htmlspecialchars($user['address']) ?></td>
                                            <td>
                                                <a href="detail.php?id=<?= $user['id'] ?>" class="btn btn-info btn-sm action-link">Detail</a>
                                                <a href="edit.php?id=<?= $user['id'] ?>" class="btn btn-warning btn-sm action-link">Edit</a>
                                                <a href="delete.php?action=delete&id=<?= $user['id'] ?>" class="btn btn-danger btn-sm action-link">Delete</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
