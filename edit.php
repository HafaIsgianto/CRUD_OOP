<?php
require_once 'Koneksi.php';
$db = new Koneksi();

$user = []; 
if (isset($_GET['id'])) {
    $user = $db->getUserById($_GET['id']);
}


if (!$user) {
    echo "User not found.";
    exit; 
}

if (isset($_POST['submit'])) {
    $data = [
        'name' => $_POST['name'],
        'phone' => $_POST['phone'],
        'address' => $_POST['address'],
    ];


    if ($db->updateUser($user['id'], $data)) {
        header('Location: index.php');
        exit;
    } else {
        echo "Failed to update user."; 
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
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

        .form-label {
            font-weight: bold;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .action-button {
            background-color: #007bff;
            border-color: #007bff;
        }

        .action-button:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="d-flex align-items-center justify-content-center min-vh-100">
        <div class="bg-white w-100 max-w-md shadow-lg rounded-lg p-4 fade-in">
            <h2 class="text-3xl font-bold text-center mb-4">Edit User</h2>
            <form action="" method="post">
                <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']) ?>">
                <div class="mb-3">
                    <label for="name" class="form-label">
                        <i class="fas fa-user text-blue-500 mr-2"></i> Nama
                    </label>
                    <input type="text" id="name" name="name" value="<?= htmlspecialchars($user['name']) ?>" required class="form-control">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">
                        <i class="fas fa-phone text-green-500 mr-2"></i> No Handphone
                    </label>
                    <input type="tel" id="phone" name="phone" value="<?= htmlspecialchars($user['phone']) ?>" required class="form-control">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">
                        <i class="fas fa-map-marker-alt text-orange-500 mr-2"></i> Alamat
                    </label>
                    <textarea id="address" name="address" required class="form-control"><?= htmlspecialchars($user['address']) ?></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" name="submit" class="btn action-button text-white">Perbarui</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
