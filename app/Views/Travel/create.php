<h2>Créer un nouveau trajet</h2>
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
        <input 
            type="datetime-local" 
            name="departure_at" 
            id="departure_at"
        >
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
        <input 
            type="datetime-local" 
            name="arrival_at" 
            id="arrival_at"
        >
    </div>
    <div>
        <label for="seats_total">Nombre de places disponible</label><br>
        <input 
            type="number" 
            name="seats_total" 
            id="seats_total"
            min="0"
        >
    </div>
    <input 
        type="hidden" 
        name="employee_id" 
        id="employee_id" 
        value="<?= $_SESSION['user']['id'] ?>"
    >
    
    <div>
        <label for="firstname">Prénom</label><br>
        <input 
            type="text" 
            name="firstname" 
            id="firstname" 
            value="<?= htmlspecialchars($employee['firstname']) ?>" 
            disabled
        >
    </div>
    <div>
        <label for="lastname">Nom</label><br>
        <input 
            type="text" 
            name="lastname" 
            id="lastname" 
            value="<?= htmlspecialchars($employee['lastname']) ?>" 
            disabled
        >
    </div>
    <div>
        <label for="email">Email</label><br>
        <input 
            type="email" 
            name="email" 
            id="email" 
            value="<?= htmlspecialchars($employee['email']) ?>" 
            disabled
        >
    </div>
    <div>
        <label for="phone">Téléphone</label><br>
        <input 
            type="tel" 
            name="phone" 
            id="phone" 
            value="<?= htmlspecialchars($employee['phone']) ?>" 
            disabled
        >
    </div>
    <input type="submit" value="Ajouter">
</form>
<?php var_dump($_POST) ?>