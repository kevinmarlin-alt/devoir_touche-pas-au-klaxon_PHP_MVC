<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/assets/header.js" defer></script>
    <title>TOUCHE PAS AU KLAXON - Accueil</title>
</head>
<body>
    <header>
        <?php if(isset($_SESSION['user'])): ?>
            <?php switch($_SESSION['user']['role']):
            case 'ADMIN': ?>
                <a href="/dashboard">
                    <h1>TOUCHE PAS AU KLAXON</h1>
                </a>
                <a href="/dashboard/#users">Utilisateurs</a>
                <a href="/dashboard/#agencies">Agences</a>
                <a href="/dashboard/#travels">Trajets</a>
            <?php break; ?>

            <?php case 'USER': ?>
                <h1>TOUCHE PAS AU KLAXON</h1>
                <a href="#" id="createTravelBtn">Créer un trajet</a>
            <?php break; ?>

            <?php endswitch; ?>
            <p>Bonjour 
                <?= $_SESSION['user']['firstname'] ?> 
                <?= $_SESSION['user']['lastname'] ?> 
            </p>
            <a href="/logout">Déconnexion</a>
        <?php else : ?>
            <h1>TOUCHE PAS AU KLAXON</h1>
            <a href="/login">Se connecter</a>
        <?php endif; ?>
    </header>
