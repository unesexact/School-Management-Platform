<link rel="stylesheet" href="/school_management/public/assets/css/bootstrap.min.css">

<div class="container mt-5">

    <div class="card shadow-sm">
        <div class="card-body">

            <h2 class="mb-4">My Grades</h2>

            <?php if (!empty($grades)): ?>

                <table class="table table-bordered table-striped text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Subject</th>
                            <th>Grade /20</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($grades as $row): ?>
                            <tr>
                                <td><?= htmlspecialchars($row['subject']) ?></td>
                                <td><?= number_format($row['grade'], 2) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <?php if ($generalAverage !== null): ?>
                    <div class="alert alert-info mt-3">
                        <strong>General Average:</strong>
                        <?= number_format($generalAverage, 2) ?>/20
                    </div>
                <?php endif; ?>

            <?php else: ?>
                <div class="alert alert-warning">No grades available.</div>
            <?php endif; ?>

            <div class="mt-3">
                <a href="/school_management/public/index.php/logout" class="btn btn-secondary">Logout</a>
            </div>

        </div>
    </div>

</div>