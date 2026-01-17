<!DOCTYPE html>
<html>

<head>
    <title>Student Bulletin</title>
    <style>
        body {
            font-family: Arial;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }

        h2 {
            margin-bottom: 5px;
        }
    </style>
</head>

<body>

    <h2>Student Bulletin</h2>

    <p>
        <strong>Full Name:</strong> <?= htmlspecialchars($student['name']) ?><br>
        <strong>Email:</strong> <?= htmlspecialchars($student['email']) ?>
    </p>

    <table>
        <tr>
            <th>Subject</th>
            <th>Teacher</th>
            <th>Grade /20</th>
        </tr>

            <?php foreach ($grades as $g): ?>
            <tr>
                <td><?= htmlspecialchars($g['subject']) ?></td>
                <td><?= htmlspecialchars($g['teacher']) ?></td>
                <td><?= number_format($g['grade'], 2) ?></td>
            </tr>
            <?php endforeach; ?>
    </table>

    <p>
        <strong>General Average:</strong> <?= number_format($average, 2) ?>/20
    </p>

    <p>
        <strong>Status:</strong> <?= $status ?>
    </p>

    <button onclick="window.print()">Print Bulletin</button>

</body>

</html>