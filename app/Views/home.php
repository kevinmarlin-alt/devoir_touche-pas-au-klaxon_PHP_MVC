<p>Pour obtenir plus d'informations sur un trajet, veuillez vous connecter</p>
<table>
    <tr>
        <th>Départ</th>
        <th>Date & heure</th>
        <th>Destination</th>
        <th>Date & heure</th>
        <th>Places</th>
    </tr>
    <?php foreach($travels as $travel): ?>
        <tr>
            <td><?=  $travel->getDepartureAgency() ?></td>
            <td><?=  $travel->getDeparturelAt() ?></td>
            <td><?=  $travel->getArrivalAgency() ?></td>
            <td><?=  $travel->getArrivalAt() ?></td>
            <td><?=  $travel->getAvaivableSeats() ?></td>
        </tr>
    <?php endforeach; ?>
</table>