<script src="/assets/javascript/Travel/index.js" type="text/javascript" defer></script>
<?php if(isset($travels)): ?>
    <table border=1>
        <?php if($scope === 'dashboard'): ?>
            <caption>Liste de tous les trajets</caption>
        <?php endif; ?>
        <tr>
            <?php if($scope === 'dashboard'): ?>
                <th>ID</th>
            <?php endif; ?>
            <th>Départ</th>
            <th>Date & heure</th>
            <th>Destination</th>
            <th>Date & heure</th>
            <th>Places disponibles</th>
            <?php if(isset($_SESSION['user'])): ?>
                <th></th>
            <?php endif; ?>
        </tr>
    
        <?php foreach($travels as $travel): ?>
            <tr data-id="<?= $travel->getId() ?>">
                <?php if($scope === 'dashboard'): ?>
                    <td><?=  $travel->getId() ?></td>
                <?php endif; ?>
                <td><?=  $travel->getDepartureAgency() ?></td>
                <td><?=  $travel->getDepartureAt() ?></td>
                <td><?=  $travel->getArrivalAgency() ?></td>
                <td><?=  $travel->getArrivalAt() ?></td>
                <td><?=  $travel->getAvailableSeats() ?></td>
                <?php if(isset($_SESSION['user'])): 
                    switch($scope):
                    case 'dashboard':?>
                        <td>
                            <a href='#' class="delete_travel_btn">Delete</a>
                        </td>
                    <?php break;
                    case '': ?>
                    <td>
                        <a href="/">Read</a>
                        <?php if($travel->getEmployeeId() === $_SESSION['user']['id']): ?>
                            <a href="/travels/update/<?= $travel->getId() ?>">Update</a>
                            <a href='#' class="delete_travel_btn">Delete</a>
                        <?php endif; ?>
                    </td>                
                    <?php break;
                    endswitch; 
                endif; ?>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>  
    <p>Il n'y a actuellement aucun trajet de disponible !</p>    
<?php endif; ?>