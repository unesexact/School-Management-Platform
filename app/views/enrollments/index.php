<h2>Enrollments</h2>
<a href="/school_management/public/enrollments/create">+ Enroll Student</a>

<table border="1">
    <tr>
        <th>Student</th>
        <th>Subject</th>
        <th>Action</th>
    </tr>

    <?php foreach ($enrollments as $e): ?>
        <tr>
            <td>
                <?= $e['student_name'] ?>
            </td>
            <td>
                <?= $e['subject_name'] ?>
            </td>
            <td>
                <a
                    href="/school_management/public/enrollments/delete?student_id=<?= $e['student_id'] ?>&course_id=<?= $e['course_id'] ?>">Remove</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>