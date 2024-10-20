<?php
require_once 'Koneksi.php';

$db = new Koneksi();

if (isset($_GET['id'])) {
    $user = $db->getUserById($_GET['id']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .fade-in {
            animation: fadeIn 0.5s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .profile-icon {
            height: 3.5rem;
            width: 3.5rem;
            background-color: #ffe5b4; 
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #ff9800; 
            font-size: 2rem;
            font-family: monospace;
        }

        .action-link {
            transition: color 0.3s ease;
        }

        .action-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="d-flex align-items-center justify-content-center min-vh-100">
        <div class="relative px-4 py-10 bg-white shadow-lg rounded-lg fade-in">
            <div class="max-w-md mx-auto">
                <div class="d-flex align-items-center mb-4">
                    <div class="profile-icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="pl-2 font-weight-bold text-xl text-gray-700">
                        <h2 class="leading-relaxed"><?= htmlspecialchars($user['name']) ?></h2>
                    </div>
                </div>
                <div class="divide-y divide-gray-200 mt-4">
                    <div class="py-8 text-base leading-6 space-y-4 text-gray-700">
                        <div class="d-flex align-items-center fade-in">
                            <i class="fas fa-phone text-green-500 mr-3"></i>
                            <p>No Handphone: <?= htmlspecialchars($user['phone']) ?></p>
                        </div>
                        <div class="d-flex align-items-center fade-in">
                            <i class="fas fa-map-marker-alt text-red-500 mr-3"></i>
                            <p>Alamat: <?= htmlspecialchars($user['address']) ?></p>
                        </div>
                    </div>
                </div>
                <div class="pt-6 text-base font-weight-bold">
                    <a href="edit.php?id=<?= $user['id'] ?>" class="text-cyan-600 action-link mr-4">
                        <i class="fas fa-edit mr-2"></i>Edit
                    </a>
                    <a href="delete.php?action=delete&id=<?= $user['id'] ?>" class="text-red-600 action-link">
                        <i class="fas fa-trash mr-2"></i>Delete
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
