<?php
require_once __DIR__ . '/../../core/Auth.php';
Auth::admin();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Add Student</title>
    <link rel="stylesheet" href="/school_management/public/assets/css/bootstrap.min.css">
</head>

<body class="bg-light">

    <div class="container mt-5" style="max-width:500px;">

        <div class="card shadow-sm">
            <div class="card-body">

                <h3 class="text-center mb-4">Add New Student</h3>

                <form method="POST">

                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input name="name" class="form-control" placeholder="Student name" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input name="email" type="email" class="form-control" placeholder="Student email" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" placeholder="Password" required>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="/school_management/public/students" class="btn btn-secondary">Back</a>
                        <button class="btn btn-primary">Create Student</button>
                    </div>

                </form>

            </div>
        </div>

    </div>

</body>

</html>