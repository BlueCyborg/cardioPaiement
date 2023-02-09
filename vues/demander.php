<h1><u>Cardio-Paiement</u> : Plugin de gestion des clients adhérents !</h1><br>

<form action="" method="POST">
    <p>Séléctionnez le client afin de lui demander de payer : </p>
    <select name="id_clientPaiement">
    <?php
    $clientsNonAdherents = getClientsAdherents();
    foreach ($clientsNonAdherents as $unClient) {?>
        <option value="<?=$unClient->id?>"><?=$unClient->user_nicename?></option>
    <?php }?>
    </select>
    <button type="submit" name="formDemander" style="display: inline-block; background-color: #154c79; border-radius: 10px; border: 4px double #cccccc; color: #eeeeee; text-align: center; width: 100px; transition: all 0.5s; cursor: pointer; margin: 5px;">
        Valider
    </button>
</form>