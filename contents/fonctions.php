<?php

/**
 * Gestion de l'affichage administrateur
 */

function add_Admin_Link_4()
{
    add_menu_page(
        __('Cardio-Paiement', 'textdomain'),
        'Cardio-Paiement',
        'can_access_cardiopaiement',
        'gestionPaiement',
        'cardioPaiementMain',
        'dashicons-money-alt'
    );

    add_submenu_page(
        'gestionPaiement',
        'Accepter paiement',
        'Accepter paiement',
        'can_access_cardiopaiement',
        'gestionPaiement&option=accepter',
        'cardioPaiementMain'
    );

    add_submenu_page(
        'gestionPaiement',
        'Demander paiement',
        'Demande paiement',
        'can_access_cardiopaiement',
        'gestionPaiement&option=demander',
        'cardioPaiementMain'
    );
}

function cardioPaiementMain()
{
    if (wp_get_current_user()->roles[0] != "administrator") {?>
        <script>alert('Vous devez être administrateur pour pouvoir accéder à ce contenu !\n\nMerci de changer de page !')</script>
        <?php exit();
    }

    if (!isset($_GET['option'])) {
        //L'on inclu la page d'accueil par défaut
        include CPA_FILE_PATH . 'vues/main.php';
    } else {

        switch ($_GET['option']) {
            //MAIN
            case 'accueil':
                include CPA_FILE_PATH . 'vues/main.php';
                break;

            case 'accepter':
                if (isset($_POST['formAccepter'])) {
                    validerUser($_POST['id_clientPaiement']);
                    include CPA_FILE_PATH . 'vues/validation.php';
                }else {
                    include CPA_FILE_PATH . 'vues/accepter.php';
                }
                break;

            case 'demander':
                if (isset($_POST['formDemander'])) {
                    demanderUser($_POST['id_clientPaiement']);
                    include CPA_FILE_PATH . 'vues/validation.php';
                }else {
                    include CPA_FILE_PATH . 'vues/demander.php';
                }
                break;

            default:
                include CPA_FILE_PATH . 'vues/main.php';
                break;
        }
    }
}
