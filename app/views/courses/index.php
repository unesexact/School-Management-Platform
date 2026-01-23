<link rel="stylesheet" href="/school_management/public/assets/css/bootstrap.min.css">

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Courses</h2>
        <div>
            <a href="/school_management/public/dashboard/admin" class="btn btn-secondary me-2">
                ⬅ Back to Dashboard
            </a>
            <a href="/school_management/public/courses/create" class="btn btn-success">
                ➕ Add Course
            </a>
        </div>
    </div>

    <?php if (!empty($courses)): ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Subject</th>
                        <th>Teacher</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($courses as $c): ?>
                        <tr>
                            <td><?= htmlspecialchars($c['subject_name']) ?></td>
                            <td><?= htmlspecialchars($c['teacher_name']) ?></td>
                            <td>
                                <a href="/school_management/public/courses/delete?id=<?= $c['id'] ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this course?')">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="alert alert-warning">No courses found.</div>
    <?php endif; ?>

</div>