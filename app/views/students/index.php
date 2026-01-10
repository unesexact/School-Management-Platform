<h2>Students</h2>
<a href="/school_management/public/students/create">Add Student</a>

<table border="1">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Action</th>
    </tr>

    <?php foreach ($students as $s): ?>
        <tr>
            <td>
                <?= htmlspecialchars($s['name']) ?>
            </td>
            <td>
                <?= htmlspecialchars($s['email']) ?>
            </td>
            <td>
                <a href="/school_management/public/students/delete?id=<?= $s['id'] ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>