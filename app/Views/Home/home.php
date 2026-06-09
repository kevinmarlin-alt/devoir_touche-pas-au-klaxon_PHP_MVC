<?php if(!isset($_SESSION['user'])): ?>
    <p>Pour obtenir plus d'informations sur un trajet, veuillez vous connecter</p>
<?php else: ?>
    <p>Trajets proposés</p>
<?php endif; ?>

<table border=1>
    <tr>
        <th>Départ</th>
        <th>Date & heure</th>
        <th>Destination</th>
        <th>Date & heure</th>
        <th>Places</th>
        <?php if(isset($_SESSION['user'])): ?>
            <th></th>
        <?php endif; ?>
    </tr>
    <?php foreach($travels as $travel): ?>
        <tr>
            <td><?=  $travel->getDepartureAgency() ?></td>
            <td><?=  $travel->getDeparturelAt() ?></td>
            <td><?=  $travel->getArrivalAgency() ?></td>
            <td><?=  $travel->getArrivalAt() ?></td>
            <td><?=  $travel->getAvaivableSeats() ?></td>
            <?php if(isset($_SESSION['user'])): ?>
                <td>
                    <a href="/">Read</a>
                    <?php if($travel->getEmployeeId() === $_SESSION['user']['id']): ?>
                        <a href="/">Update</a>
                        <a href='travels/<?= $travel->getId() ?>'>Delete</a>
                    <?php endif; ?>
                </td>
            <?php endif; ?>
        </tr>
    <?php endforeach; ?>
</table>