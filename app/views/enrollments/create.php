<h2>Enroll Student</h2>

<form method="POST" action="/school_management/public/enrollments/store">

    <select name="student_id" required>
        <option value="">Select Student</option>
        <?php foreach ($students as $s): ?>
            <option value="<?= $s['id'] ?>">
                <?= $s['name'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <br><br>

    <select name="course_id" required>
        <option value="">Select Course</option>
        <?php foreach ($courses as $c): ?>
            <option value="<?= $c['id'] ?>">
                <?= $c['subject_name'] ?> (
                <?= $c['teacher_name'] ?>)
            </option>
        <?php endforeach; ?>
    </select>

    <br><br>

    <button type="submit">Enroll</button>
</form>