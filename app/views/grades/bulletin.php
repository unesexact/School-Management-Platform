<h2>My Grades</h2>

<table border="1" cellpadding="5">
    <tr>
        <th>Subject</th>
        <th>Grade</th>
    </tr>

    <?php foreach ($grades as $row): ?>
        <tr>
            <td>
                <?= htmlspecialchars($row['subject']) ?>
            </td>
            <td>
                <?= number_format($row['grade'], 2) ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?php if ($generalAverage !== null): ?>
    <h3>General Average:
            <?= number_format($generalAverage, 2) ?>
    </h3>
<?php else: ?>
    <p>No grades available.</p>
<?php endif; ?>

<a href="/school_management/public/index.php/logout">Logout</a>