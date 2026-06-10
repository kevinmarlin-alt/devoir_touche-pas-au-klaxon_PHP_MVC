<script src="/assets/javascript/dashboard.js" type="text/javascript" defer></script>
<nav>
    <a href="/">Page d'accueil</a>
</nav>
<?php if(isset($_SESSION['banner'])): ?>
    <p><?= $_SESSION['banner'] ?></p>
<?php endif; ?>

<h2>Dashboard</h2>
<section id="users">
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

<section id="agencies">
    <h3>Agences</h3>

    <!-- Form to create a new agency -->
    <a href="/agencies/create">Ajouter une nouvelle agence</a>

    <table border=1>
        <caption>Liste des agences</caption>
        <tr>
            <th>ID</th>
            <th>Ville</th>
            <th></th>
        </tr>
        <?php foreach($agencies as $agency): ?>
            <tr data-id="<?= $agency['id'] ?>">
                <td><?= htmlspecialchars($agency['id']) ?></td>
                <td><?= htmlspecialchars($agency['city']) ?></td>
                <td>
                    <a href="/agencies/update/<?= $agency['id'] ?>">Update</a>
                    <a href="#" class="delete_btn">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>    
    </table>

</section>
<section id="travels">
    <h3>Trajets</h3>
    <table border=1>
        <caption>Liste des trajets</caption>
        <tr>
            <th>ID</th>
            <th>Départ</th>
            <th>Date & heure</th>
            <th>Arrivée</th>
            <th>Date & heure</th>
            <th>Places</th>
            <th></th>
        </tr>
        <?php foreach($travels as $travel): ?>
            <tr>
                <td><?= $travel->getId() ?></td>
                <td><?= $travel->getDepartureAgency() ?></td>
                <td><?= $travel->getDeparturelAt() ?></td>
                <td><?= $travel->getArrivalAgency() ?></td>
                <td><?= $travel->getArrivalAt() ?></td>
                <td><?= $travel->getAvaivableSeats() ?></td>
                <td>
                    <a href="">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>      </table>
</section>