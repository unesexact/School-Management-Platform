<h2>My Courses</h2>

<ul>
    <?php foreach ($courses as $c): ?>
        <li>
            <a href="/school_management/public/grades/course?course_id=<?= $c['id'] ?>">
                <?= $c['name'] ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>