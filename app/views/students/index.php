<h2>Students</h2>
<a href="/school_management/public/students/create">Add Student</a>

<form method="get" action="/school_management/public/students/search" style="margin-bottom:15px;">
    <input type="text" name="q" placeholder="Search by name or email" value="<?= htmlspecialchars($_GET['q'] ?? '') ?>">
    <button type="submit">Search</button>
</form>


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