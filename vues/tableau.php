<h1><u>Cardio-Paiement</u> : Plugin de gestion des clients !</h1><br>

<table border="1" width="100%">
    <thead>
        <tr>
            <th scope="col">Pseudo</th>
            <th scope="col">Club</th>
            <th scope="col">Date Abonnement</th>
            <th scope="col">Différence Année</th>
            <th scope="col">Différence Jours</th>
        </tr>
    </thead>
    <tbody>

    <?php
$clients = getClientsAdherents();
foreach ($clients as $unClient) {

    $nomClub = "";
    $dateAbonnement = "";
    $differenceA = "";
    $differenceJ = "";

    if (!isset(getClub($unClient->id_club)[0]->nom)) {
        $nomClub = "Null";
    } else {
        $nomClub = getClub($unClient->id_club)[0]->nom;
    }
    if (!isset($unClient->dateAbonnement)) {
        $dateAbonnement = "Null";
        $differenceA = "Null";
        $differenceJ = "Null";
    } else {
        $dateAbonnement = $unClient->dateAbonnement;
        //Calcul de la différence
        $date1 = new DateTime($dateAbonnement);
        $date2 = new DateTime("now");
        $interval = $date1->diff($date2);
        $differenceA = $interval->y . " ans, " . $interval->m . " mois, " . $interval->d . " jours ";
        if ($interval->days >= 365) {
            $differenceJ = '<p style="color:red">' . $interval->days . ' jours</p>';
        } else {
            $differenceJ = '<p style="color:green">' . $interval->days . ' jours</p>';
        }
    }
    ?>
    <tr>
        <td><?=$unClient->user_nicename?></td>
        <td><?=$nomClub?></td>
        <td><?=$dateAbonnement?></td>
        <td><?=$differenceA?></td>
        <td><?=$differenceJ?></td>
    </tr>
<?php }?>
    </tbody>
</table>