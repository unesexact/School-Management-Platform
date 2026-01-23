<?php
require_once __DIR__ . '/../../core/Auth.php';
Auth::admin();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Students</title>
    <link rel="stylesheet" href="/school_management/public/assets/css/bootstrap.min.css">
</head>

<body class="bg-light">

    <div class="container mt-5">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Students</h2>
            <a href="/school_management/public/students/create" class="btn btn-success">+ Add Student</a>
        </div>

        <!-- Search -->
        <form method="get" action="/school_management/public/students/search" class="row g-2 mb-4">
            <div class="col-md-10">
                <input type="text" name="q" class="form-control" placeholder="Search by name or email"
                    value="<?= htmlspecialchars($_GET['q'] ?? '') ?>">
            </div>
            <div class="col-md-2 d-grid">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>

        <!-- Table -->
        <div class="card shadow-sm">
            <div class="card-body">

                <table class="table table-bordered table-striped text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th width="150">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                                <?php if (empty($students)): ?>
                            <tr>
                                <td colspan="3">No students found.</td>
                            </tr>
                                <?php else: ?>
                                    <?php foreach ($students as $s): ?>
                                <tr>
                                    <td><?= htmlspecialchars($s['name']) ?></td>
                                    <td><?= htmlspecialchars($s['email']) ?></td>
                                    <td>
                                        <a href="/school_management/public/students/delete?id=<?= $s['id'] ?>"
                                            class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>

                    </tbody>
                </table>

            </div>
        </div>

        <br>
        <a href="/school_management/public/dashboard/admin" class="btn btn-secondary">⬅ Back to Dashboard</a>

    </div>

</body>

</html>