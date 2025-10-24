<!DOCTYPE html>
<html>

<head>
    <title>Users Data</title>

</head>

<body>
    <style>
        .debug-card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin: 20px;
        }

        .debug-card h1 {
            font-size: 24px;
        }

        .debug-card h2 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .debug-card .subtitle {
            font-size: 14px;
            color: #666;
        }

        .debug-card table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .debug-card th,
        .debug-card td {
            padding: 8px;
            border: 1px solid #ccc;
            text-align: left;
        }

        .debug-card th {
            background-color: #f2f2f2;
        }
    </style>
    <div class="debug-card">
        <h1>📋 Users Database Debug</h1>
        <h2><?php echo $data['title']; ?></h2>
        <div class="subtitle">Total Users: <?php echo count($data['users']); ?> | Generated on: <?php echo date('Y-m-d H:i:s'); ?></div>
        <table class="data-table">
            <thead>
                <tr>
                    <?php
                    $firstUser = $data['users'][0];
                    foreach ($firstUser as $key => $value) {
                        echo "<th class='table-header'>$key</th>";
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data['users'] as $user) {
                    echo "<tr>";
                    foreach ($user as $key => $value) {
                        echo "<td class='table-cell'>$value</td>";
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>