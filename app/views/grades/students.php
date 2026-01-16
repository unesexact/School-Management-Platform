<h2>Students</h2>

<table border="1">
    <tr>
        <th>Name</th>
        <th>Grade /20</th>
        <th>Save</th>
    </tr>

    <?php foreach ($students as $s): ?>
        <tr>
            <form method="POST" action="/school_management/public/grades/save">
                <td>
                    <?= $s['name'] ?>
                </td>
                <td>
                    <input type="number" name="grade" step="0.1" min="0" max="20" value="<?= $s['grade'] ?>">
                </td>
                <input type="hidden" name="student_id" value="<?= $s['id'] ?>">
                <input type="hidden" name="course_id" value="<?= $_GET['course_id'] ?>">
                <td><button>Save</button></td>
            </form>
        </tr>
    <?php endforeach; ?>
</table>