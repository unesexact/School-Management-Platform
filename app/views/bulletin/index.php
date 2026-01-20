<h2>Students Bulletins</h2>

<table border="1" cellpadding="8">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Bulletin</th>
    </tr>

    <?php foreach ($students as $student): ?>
        <tr>
            <td>
                <?= htmlspecialchars($student['name']) ?>
            </td>
            <td>
                <?= htmlspecialchars($student['email']) ?>
            </td>
            <td>
                <a href="/school_management/public/bulletin?student_id=<?= $student['id'] ?>">
                    View Bulletin
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>