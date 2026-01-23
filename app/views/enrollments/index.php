<link rel="stylesheet" href="/school_management/public/assets/css/bootstrap.min.css">

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Enrollments</h2>
        <div>
            <a href="/school_management/public/dashboard/admin" class="btn btn-secondary me-2">
                ⬅ Back to Dashboard
            </a>
            <a href="/school_management/public/enrollments/create" class="btn btn-success">
                ➕ Enroll Student
            </a>
        </div>
    </div>

    <?php if (isset($enrollments) && count($enrollments) > 0): ?>

        <div class="table-responsive">
            <table class="table table-bordered table-striped text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Student</th>
                        <th>Subject</th>
                        <th width="140">Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($enrollments as $e): ?>
                        <tr>
                            <td><?= htmlspecialchars($e['student_name']) ?></td>
                            <td><?= htmlspecialchars($e['subject_name']) ?></td>
                            <td>
                                <a href="/school_management/public/enrollments/delete?student_id=<?= $e['student_id'] ?>&course_id=<?= $e['course_id'] ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to remove this enrollment?');">
                                    Remove
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    <?php else: ?>

        <div class="alert alert-warning text-center">
            No enrollments found.
        </div>

    <?php endif; ?>

</div>