<?php if(isset($_SESSION['banner'])): ?>
    <p style="color: red"><?= $_SESSION['banner'] ?></p>
<?php endif; ?>

<?php

use App\Components\TravelsTable;

 if(!isset($_SESSION['user'])): ?>
    <p>Pour obtenir plus d'informations sur un trajet, veuillez vous connecter</p>
<?php else: ?>
    <p>Trajets proposés</p>
<?php endif; 

TravelsTable::renderAvailableTravels();
?>
