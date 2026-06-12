<script src="/assets/javascript/Travel/update.js" type="text/javascript" defer></script>


<nav>
    <a href="/">Accueil</a>
</nav>

<h2>Modifier un trajet</h2>

<form action="" data-id="<?= $travel->getId() ?>">
    <div>
        <label for="departure_agency_id">Départ</label><br>
        <select name="departure_agency_id" id="departure_agency_id" required >
            <?php foreach($agencies as $agency): ?>
                <?php if($agency['city'] === $travel->getDepartureAgency()): ?>

                    <option value="<?= $agency['id'] ?>" selected >
                        <?= $agency['city'] ?>
                    </option>

                <?php else: ?>

                    <option value="<?= $agency['id'] ?>">
                        <?= $agency['city'] ?>
                    </option>

                <?php endif; ?>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label for="departure_at">Date & heure</label><br>
        <input 
            type="datetime-local" 
            name="departure_at" 
            id="departure_at"
            value="<?= $travel->getDepartureAt() ?>"
            required >
    </div>
    <div>
        <label for="arrival_agency_id">Départ</label><br>
        <select name="arrival_agency_id" id="arrival_agency_id" required >
            <?php foreach($agencies as $agency): ?>
                <?php if($agency['city'] === $travel->getArrivalAgency()): ?>

                    <option value="<?= $agency['id'] ?>" selected >
                        <?= $agency['city'] ?>
                    </option>

                <?php else: ?>

                    <option value="<?= $agency['id'] ?>">
                        <?= $agency['city'] ?>
                    </option>
                    
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label for="arrival_at">Date & heure</label><br>
        <input 
            type="datetime-local" 
            name="arrival_at" 
            id="arrival_at"
            value="<?= $travel->getArrivalAt() ?>"
            required
            >
    </div>
    <div>
        <label for="seats_total">Nombre total de places</label><br>
        <input 
            type="number" 
            name="seats_total" 
            id="seats_total"
            min="0"
            value="<?= $travel->getTotalSeats() ?>"
            required 
            >
    </div>
    <div>
        <label for="seats_total">Nombre de places disponibles</label><br>
        <input 
            type="number" 
            name="seats_available" 
            id="seats_available"
            min="0"
            value="<?= $travel->getAvailableSeats() ?>"
            required 
            >
    </div>
    <input 
        type="hidden" 
        name="employee_id" 
        id="employee_id" 
        value="<?= $travel->getEmployeeId() ?>" 
        >

    <input type="submit" value="Enregistrer">
</form>