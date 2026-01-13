<h2>Subjects</h2>
<a href="/school_management/public/subjects/create">Add Subject</a>

<table border="1">
    <tr>
        <th>Name</th>
        <th>Action</th>
    </tr>
    <?php foreach ($subjects as $s): ?>
        <tr>
            <td>
                <?= $s['name'] ?>
            </td>
            <td>
                <a href="/school_management/public/subjects/delete?id=<?= $s['id'] ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>