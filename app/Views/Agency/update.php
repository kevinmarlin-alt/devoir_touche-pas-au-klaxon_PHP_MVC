<script src="/assets/javascript/Agency/update.js" type="text/javascript" defer></script>
<nav>
    <a href="/dashboard/#agencies">Retour</a>
</nav>
<h2>Mettre a jour l'agance</h2>
<p>Veuillez saisir le nouveau nom de l'agence</p>
<form action="" method="GET">
    <div>
        <label for="city">Nom de la ville</label><br>
        <input type="text" name="city" id="city" required>
        <input type="hidden" name="id" value="<?= $agency['id'] ?>">
    </div>
    <input type="submit" value="Mettre a jour">
</form>