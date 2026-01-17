<h2>Add Timetable Slot</h2>

<form method="POST">
    <label>Course</label><br>
    <select name="course_id" required>
        <?php foreach ($courses as $c): ?>
            <option value="<?= $c['id'] ?>">
                <?= $c['subject'] ?> -
                <?= $c['teacher'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <br><br>

    <label>Day</label><br>
    <select name="day">
        <option>Monday</option>
        <option>Tuesday</option>
        <option>Wednesday</option>
        <option>Thursday</option>
        <option>Friday</option>
        <option>Saturday</option>
    </select>

    <br><br>

    <label>Start Time</label><br>
    <input type="time" name="start_time" required>

    <br><br>

    <label>End Time</label><br>
    <input type="time" name="end_time" required>

    <br><br>

    <button type="submit">Save</button>
</form>