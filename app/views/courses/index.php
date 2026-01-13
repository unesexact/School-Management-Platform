<h2>Courses</h2>
<a href="/school_management/public/courses/create">Add Course</a>

<table border="1">
    <tr>
        <th>Subject</th>
        <th>Teacher</th>
        <th>Action</th>
    </tr>
    <?php foreach ($courses as $c): ?>
        <tr>
            <td>
                <?= $c['subject_name'] ?>
            </td>
            <td>
                <?= $c['teacher_name'] ?>
            </td>
            <td>
                <a href="/school_management/public/courses/delete?id=<?= $c['id'] ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>