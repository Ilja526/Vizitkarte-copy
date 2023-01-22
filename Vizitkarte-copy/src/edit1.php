<?php
$regestracija = null;
if (isset($_GET['id']) && !is_array($_GET['id']) && is_numeric($_GET['id'])) {
    $pdo=require_once 'connection.php';
    $selectStatement = $pdo->prepare('SELECT * FROM `registracija` WHERE id = ?');
    $selectStatement->execute([$_GET['id']]);
    $regestracija = $selectStatement->fetch();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit</title>
    <link href="../css/bootstrap.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <?php if (!$regestracija): ?>
        <div class="card">
            <div class="card-header text-end">
                <a class="btn btn-success" href="admin1.php">Return to Reservations</a>
            </div>
            <div class="card-body pb-0">
                <div class="alert alert-danger">
                    Wrong reservation ID has been provided!
                </div>
            </div>
        </div>
    <?php else: ?>
        <form method="post" class="form" action="update1.php">
            <div class="card">
                <div class="card-header text-end">
                    <a class="btn btn-success" href="admin1.php">Return to Reservations</a>
                </div>
                <div class="card-body">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($regestracija['Id']) ?>" />

                    <p>Name: <input type="text" required class="form-control" name="Name" value="<?= htmlspecialchars($regestracija['Name']) ?>" /></p>

                    <p>Lastname: <input type="text" required class="form-control" name="Email_or_personal_data" value="<?= htmlspecialchars($regestracija['Lastname']) ?>" /></p>

                    <p>Age: <input type="text" required class="form-control" name="Arrival_Date" value="<?= htmlspecialchars($regestracija['Age']) ?>" /></p>

                    <p>Telephon: <input type="text" required class="form-control" name="Number_of_departures" value="<?= htmlspecialchars($regestracija['Telephon']) ?>"/></p>

                    <p>Gmail: <input type="text" required class="form-control" name="Number_of_people" value="<?= htmlspecialchars($regestracija['Gmail']) ?>" /></p>
                </div>
                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    <?php endif; ?>
</div>
</body>
</html>