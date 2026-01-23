<?php
require_once __DIR__ . '/../../core/Auth.php';
Auth::admin();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Students Bulletins</title>
    <link rel="stylesheet" href="/school_management/public/assets/css/bootstrap.min.css">
</head>

<body class="bg-light">

    <div class="container mt-5">

        <h2 class="mb-4">Students Bulletins</h2>

        <div class="card shadow-sm">
            <div class="card-body">

                <table class="table table-bordered table-striped text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th width="180">Bulletin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($students)): ?>
                            <tr>
                                <td colspan="3">No students found.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($students as $student): ?>
                                <tr>
                                    <td><?= htmlspecialchars($student['name']) ?></td>
                                    <td><?= htmlspecialchars($student['email']) ?></td>
                                    <td>
                                        <a href="/school_management/public/bulletin?student_id=<?= $student['id'] ?>"
                                            class="btn btn-primary btn-sm">
                                            View Bulletin
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