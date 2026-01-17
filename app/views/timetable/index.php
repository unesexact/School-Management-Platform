<h2>Timetable</h2>

<a href="/school_management/public/timetable/create">➕ Add Slot</a>

<table border="1" cellpadding="8">
    <tr>
        <th>Subject</th>
        <th>Teacher</th>
        <th>Day</th>
        <th>Time</th>
        <th>Action</th>
    </tr>

    <?php foreach ($timetables as $t): ?>
        <tr>
            <td>
                <?= $t['subject'] ?>
            </td>
            <td>
                <?= $t['teacher'] ?>
            </td>
            <td>
                <?= $t['day'] ?>
            </td>
            <td>
                <?= $t['start_time'] ?> -
                <?= $t['end_time'] ?>
            </td>
            <td>
                <a href="/school_management/public/timetable/delete?id=<?= $t['id'] ?>">❌</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>