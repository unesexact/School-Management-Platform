<link rel="stylesheet" href="/school_management/public/assets/css/bootstrap.min.css">

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="mb-4">Add Course</h2>

            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Subject</label>
                    <select name="subject_id" class="form-select" required>
                        <?php foreach ($subjects as $s): ?>
                            <option value="<?= $s['id'] ?>"><?= htmlspecialchars($s['name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Teacher</label>
                    <select name="teacher_id" class="form-select" required>
                        <?php foreach ($teachers as $t): ?>
                            <option value="<?= $t['id'] ?>"><?= htmlspecialchars($t['name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Add Course</button>
                <a href="/school_management/public/courses" class="btn btn-secondary">⬅ Back</a>
            </form>
        </div>
    </div>
</div>