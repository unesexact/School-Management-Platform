<h1>My Timetable</h1>

<table border="1" cellpadding="8">
    <tr>
        <th>Subject</th>
        <th>Teacher</th>
        <th>Day</th>
        <th>Time</th>
    </tr>

    <?php foreach ($data as $row): ?>
        <tr>
            <td>
                <?= htmlspecialchars($row['subject']) ?>
            </td>
            <td>
                <?= htmlspecialchars($row['teacher']) ?>
            </td>
            <td>
                <?= htmlspecialchars($row['day']) ?>
            </td>
            <td>
                <?= substr($row['start_time'], 0, 5) ?> -
                <?= substr($row['end_time'], 0, 5) ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>