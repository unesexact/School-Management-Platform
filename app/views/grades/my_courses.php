<link rel="stylesheet" href="/school_management/public/assets/css/bootstrap.min.css">

<div class="container mt-5">

    <div class="card shadow-sm">
        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>My Courses</h2>
                <a href="/school_management/public/dashboard/teacher" class="btn btn-secondary">
                    ⬅ Back to Dashboard
                </a>
            </div>

            <?php if (!empty($courses)): ?>

                <ul class="list-group">
                    <?php foreach ($courses as $c): ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong><?= htmlspecialchars($c['name']) ?></strong>
                            <a href="/school_management/public/grades/course?course_id=<?= $c['id'] ?>"
                                class="btn btn-primary btn-sm">
                                Enter Grades
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>

            <?php else: ?>

                <div class="alert alert-warning text-center">
                    No courses assigned to you yet.
                </div>

            <?php endif; ?>

        </div>
    </div>

</div>