<nav>
    <a href="/dashboard/#agencies">Retour</a>
</nav>
<h2>Créer une nouvelle agance</h2>
<p>Veuillez saisir le nom de la ville de l'agence que vous souhaitez créer</p>
<form action="/agencies/create" method="post">
    <div>
        <label for="city">Nom de la ville</label><br>
        <input type="text" name="city" id="city" require>
    </div>
    <input type="submit" value="Ajouter">
</form>
