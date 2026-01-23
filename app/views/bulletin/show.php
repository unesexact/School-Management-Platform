<!DOCTYPE html>
<html>

<head>
    <title>Student Bulletin</title>
    <link rel="stylesheet" href="/school_management/public/assets/css/bootstrap.min.css">
    <style>
        @media print {
            .no-print {
                display: none !important;
            }
        }
    </style>
</head>

<body class="bg-light">

    <div class="container mt-5">

        <div class="card shadow-sm">
            <div class="card-body">

                <h2 class="mb-4 text-center">Student Bulletin</h2>

                <p class="text-center">
                    <strong>Full Name:</strong> <?= htmlspecialchars($student['name']) ?><br>
                    <strong>Email:</strong> <?= htmlspecialchars($student['email']) ?>
                </p>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped text-center align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>Subject</th>
                                <th>Teacher</th>
                                <th>Grade /20</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($grades as $g): ?>
                                <tr>
                                    <td><?= htmlspecialchars($g['subject']) ?></td>
                                    <td><?= htmlspecialchars($g['teacher']) ?></td>
                                    <td><?= number_format($g['grade'], 2) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <p class="fw-bold text-center mt-3">
                    General Average: <?= number_format($average, 2) ?>/20
                </p>

                <p class="fw-bold text-center <?= $average >= 10 ? 'text-success' : 'text-danger' ?>">
                    Status: <?= $status ?>
                </p>

                <div class="d-flex justify-content-center gap-3 mt-4 no-print">
                    <button class="btn btn-success" onclick="window.print()">🖨 Print Bulletin</button>
                    <a href="/school_management/public/bulletins" class="btn btn-secondary">⬅ Back to Students</a>
                </div>

            </div>
        </div>

    </div>

</body>

</html>