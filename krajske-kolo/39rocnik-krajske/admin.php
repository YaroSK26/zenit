<?php 
    require "./assets/auth.php";
    require "./assets/database.php";

    session_start();

    // Zistovanie, či je user prihlásený
    if (!isLoggedIn()) {
        die("Nepovolený vstup");
    }

    $role = $_SESSION["role"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Si prihlásený/zaregistrovaný</p>

    <?php if($role !== "admin"): ?>
        <h1>nie si admin</h1>
          <a href="log-out.php">Odhlasit sa</a>
    <a href="index.php">index</a>
    <?php else: ?>  
           <h1> si admin</h1>
        <a href="log-out.php">Odhlasit sa</a>
        <a href="index.php">Index</a>

        <?php foreach ($users as $user): ?>
            <?php if ($user["role"] === "user"): ?>
                <div>
                    <?= $user["ID"] ?>
                    <?= $user["meno"] ?>
                    <?= $user["role"] ?>
                    <?= $user["ponuka"] ?>
                    <?= $user["cena"] ?>
                    <form action="process.php" method="post">
                        <input type="hidden" name="action" value="resetPonuka">
                        <input type="hidden" name="userId" value="<?= $user['ID'] ?>">
                        <button type="submit">Reset ponuka</button>
                    </form>

                    <form action="process.php" method="post">
                        <input type="hidden" name="action" value="vymazatUzivatela">
                        <input type="hidden" name="userId" value="<?= $user['ID'] ?>">
                        <button type="submit">Vymazať užívateľa</button>
                    </form>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>
</body>

<script>
    <?php
        function resetPonuka($userId, $connection) {
            try {
                // Resetovanie ponuky (nastavenie na hodnotu podľa vašich potrieb)
                $newPonukaValue = "default_value";

                // Aktualizácia hodnoty v databáze
                $sql = "UPDATE users SET ponuka = ? WHERE ID = ?";
                $statement = mysqli_prepare($connection, $sql);

                if ($statement) {
                    mysqli_stmt_bind_param($statement, "si", $newPonukaValue, $userId);
                    mysqli_stmt_execute($statement);
                    mysqli_stmt_close($statement);

                    return true;
                } else {
                    return false;
                }
            } catch (Exception $e) {
                return false;
            }
        }

        function vymazatUzivatela($userId, $connection) {
            try {
                // Vymazanie užívateľa z databázy
                $sql = "DELETE FROM users WHERE ID = ?";
                $statement = mysqli_prepare($connection, $sql);

                if ($statement) {
                    mysqli_stmt_bind_param($statement, "i", $userId);
                    mysqli_stmt_execute($statement);
                    mysqli_stmt_close($statement);

                    return true;
                } else {
                    return false;
                }
            } catch (Exception $e) {
                return false;
            }
        }
    ?>
</script>
</html>
