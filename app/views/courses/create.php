<h2>Add Course</h2>

<form method="POST">
    <label>Subject</label><br>
    <select name="subject_id" required>
        <?php foreach ($subjects as $s): ?>
            <option value="<?= $s['id'] ?>">
                <?= $s['name'] ?>
                </option>
        <?php endforeach; ?>
    </select><br><br>

    <label>Teacher</label><br>
    <select name="teacher_id" required>
        <?php foreach ($teachers as $t): ?>
            <option value="<?= $t['id'] ?>">
                    <?= $t['name'] ?>
                </option>
        <?php endforeach; ?>
    </select><br><br>

    <button>Add Course</button>
</form>