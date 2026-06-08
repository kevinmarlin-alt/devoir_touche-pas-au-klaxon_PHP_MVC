<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>TOUCHE PAS AU KLAXON</h1>
        <?php if(isset($_SESSION['user'])): ?>
            <a href="/travels">Créer un trajet</a>
            <p>Bonjour 
                <?= $_SESSION['user']['firstname'] ?> 
                <?= $_SESSION['user']['lastname'] ?> 
            </p>
            <a href="/logout">Déconnexion</a>
        <?php else : ?>
                <a href="/login">Se connecter</a>
        <?php endif; ?>
    </header>
