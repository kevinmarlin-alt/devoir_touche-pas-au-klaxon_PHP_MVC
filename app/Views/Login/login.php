<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOUCHE PAS AU KLAXON - Connexion</title>
</head>
<body>
    <main>
        <p>Si c'est votre première connexion, veuillez contacter votre administareur afin de vous fournir votre mot de passe personnel.</p>
        <form action="/" method="POST">
            <div class="input-group">
                <label for="email">Email</label><br>
                <input type="email" name="email" id="email" value="arthur.henry@email.fr">
            </div>
            <div class="input-group">
                <label for="password">Mot de passe</label><br>
                <input type="password" name="password" id="password" value="Test">
            </div>
            <input type="submit" value="Connexion">
        </form>

        <?php  if(isset($error)): ?>
            <p><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

    </main>
    
</body>
</html>