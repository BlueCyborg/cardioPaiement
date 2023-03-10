<?php

function getClientsNonAdherents()
{
    $args = array(
        'role' => 'paiementencours',
        'orderby' => 'user_nicename',
        'order' => 'ASC',
    );
    return get_users($args);
}

function getClientsAdherents()
{
    $args = array(
        'role' => 'paiementaccepte',
        'orderby' => 'user_nicename',
        'order' => 'ASC',
    );
    return get_users($args);
}

function validerUser($id_client)
{
    global $wpdb;
    //L'on reset le role de l'utilisateur et l'on lui attribue son role principal
    wp_update_user(
        [
            'ID' => $id_client,
            'role' => 'clientadherent',
            'dateAbonnement' => date("y.m.d"),
        ]
    );
    //Puis on lui ajoute le role paiement accepte
    $user_id_role = new WP_User($id_client);
    $user_id_role->add_role('paiementaccepte');
}

function demanderUser($id_client)
{
    global $wpdb;
    //L'on reset le role de l'utilisateur et l'on lui attribue son role principal
    wp_update_user(
        [
            'ID' => $id_client,
            'role' => 'clientadherent',
        ]
    );
    //Puis on lui ajoute le role paiement accepte
    $user_id_role = new WP_User($id_client);
    $user_id_role->add_role('paiementencours');
}

function getClientsDateAdherence()
{
    global $wpdb;
    return $wpdb->get_results("SELECT `ID`,`user_nicename`,`dateAbonnement` FROM `z00b_users` WHERE `dateAbonnement` IS NOT NULL;");
}

function getClub($idClub)
{
    global $wpdb;
    $query = $wpdb->prepare(
        "SELECT nom FROM z00b_club WHERE `id` = %d ",
        array($idClub)
    );
    return $wpdb->get_results($query) ?? null;
}
