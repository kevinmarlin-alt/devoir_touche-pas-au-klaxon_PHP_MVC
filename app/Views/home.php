<p>Pour obtenir plus d'informations sur un trajet, veuillez vous connecter</p>
<table>
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
                <?php if($travel->getEmployeeId() === $_SESSION['user']['id']): ?>
                    <th>Read, Update, Delete</th>
                <?php else :?>
                    <th>Read</th>
                <?php endif; ?>
            <?php endif; ?>
        </tr>
    <?php endforeach; ?>
</table>