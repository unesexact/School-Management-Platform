<h2>Teachers</h2>
<a href="/school_management/public/teachers/create">Add Teacher</a>

<table border="1">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Action</th>
    </tr>
    <?php foreach ($teachers as $t): ?>
        <tr>
            <td>
                <?= $t['name'] ?>
            </td>
            <td>
                <?= $t['email'] ?>
            </td>
            <td>
                <a href="/school_management/public/teachers/delete?id=<?= $t['id'] ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>