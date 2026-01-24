<link rel="stylesheet" href="/school_management/public/assets/css/bootstrap.min.css">

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="mb-4">Enroll Student</h2>

            <?php if (isset($_GET['error']) && $_GET['error'] === 'duplicate'): ?>
                <div class="alert alert-danger">
                    ⚠️ This student is already enrolled in this course.
                </div>
            <?php endif; ?>


            <form method="POST" action="/school_management/public/enrollments/store">

                <div class="mb-3">
                    <label class="form-label">Student</label>
                    <select name="student_id" class="form-select" required>
                        <option value="">Select Student</option>
                        <?php foreach ($students as $s): ?>
                            <option value="<?= $s['id'] ?>">
                                <?= htmlspecialchars($s['name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Course</label>
                    <select name="course_id" class="form-select" required>
                        <option value="">Select Course</option>
                        <?php foreach ($courses as $c): ?>
                            <option value="<?= $c['id'] ?>">
                                <?= htmlspecialchars($c['subject_name']) ?> (<?= htmlspecialchars($c['teacher_name']) ?>)
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Enroll</button>
                <a href="/school_management/public/enrollments" class="btn btn-secondary">⬅ Back</a>
            </form>
        </div>
    </div>
</div>