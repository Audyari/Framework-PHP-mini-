<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?? 'Home'; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 50px;
        }

        table {
            width: 100%;
            margin-bottom: 50px;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .admin {
            background-color: #ffcccc;
        }

        .user {
            background-color: #ccffcc;
        }

        .guest {
            background-color: #ccccff;
        }

        .message {
            text-align: center;
            margin-bottom: 20px;
        }

        a {
            display: block;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1><?php echo $title ?? 'Halaman Awal'; ?></h1>
    
    <?php if (isset($users) && !empty($users)): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo $user->id; ?></td>
                    <td><?php echo htmlspecialchars($user->username); ?></td>
                    <td>
                        <span class="<?php echo $user->role; ?>">
                            <?php echo strtoupper($user->role); ?>
                        </span>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <div class="message">
            <p>Total: <strong><?php echo count($users); ?> users</strong> found in database</p>
        </div>
    <?php else: ?>
        <div class="message">
            <p>Halaman Awal</p>
        </div>
    <?php endif; ?>
    
    <div style="text-align: center; margin-top: 20px; margin-bottom: 50px;">
        <a href="<?php echo $GLOBALS['link']; ?>">← Back to Home</a>
    </div>
</body>
</html>