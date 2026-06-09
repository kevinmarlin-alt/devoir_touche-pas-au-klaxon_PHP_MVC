<h2>Dashboard</h2>
<section>
    <h3>Utilisateurs</h3>
    <table border=1>
        <caption>Liste des utilisateurs</caption>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Téléphone</th>
            <th>Email</th>
            <th>Role</th>
        </tr>
        <?php foreach($employees as $employee): ?>
            <tr>
                <td><?= $employee->getId() ?></td>
                <td><?= $employee->getLastname() ?></td>
                <td><?= $employee->getFirstName() ?></td>
                <td><?= $employee->getPhone() ?></td>
                <td><?= $employee->getEmail() ?></td>
                <td><?= $employee->getRole() ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</section>
<section>
    <h3>Agences</h3>
    <table border=1>
        <caption>Liste des agences</caption>
        <tr>
            <th>Ville</th>
        </tr>
    </table>
</section>
<section>
    <h3>Trajets</h3>
    <table border=1>
        <caption>Liste des trajets</caption>
        <tr>
            <th>Départ</th>
            <th>Date & heure</th>
            <th>Arrivée</th>
            <th>Date & heure</th>
            <th>Places</th>
        </tr>
    </table>
</section>