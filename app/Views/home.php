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

<form action="/travels/create" method="POST">
    <div>
        <label for="departure_agency_id">Départ</label><br>
        <select name="departure_agency_id" id="departure_agency_id">
            <?php foreach($agencies as $agency): ?>
                <option value="<?= $agency['id'] ?>"><?= $agency['city'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label for="departure_at">Date & heure</label><br>
        <input type="datetime-local" name="departure_at" id="departure_at">
    </div>
    <div>
        <label for="arrival_agency_id">Départ</label><br>
        <select name="arrival_agency_id" id="arrival_agency_id">
            <?php foreach($agencies as $agency): ?>
                <option value="<?= $agency['id'] ?>"><?= $agency['city'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label for="arrival_at">Date & heure</label><br>
        <input type="datetime-local" name="arrival_at" id="arrival_at">
    </div>
    <div>
        <label for="seats_total">Places total</label><br>
        <input type="number" name="seats_total" id="seats_total">
    </div>
    <input type="number" name="employee_id" id="employee_id" value=<?= $_SESSION['user']['id'] ?> hidden>
    <input type="submit" value="Ajouter">
</form>