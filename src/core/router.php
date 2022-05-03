<?php
$page = 'home.php';
if(isset($_GET['page'])){
    if ($_GET['page'] == 'confidentialite') {
        $page = 'confidentialite.php';
    }
    if ($_GET['page'] == 'mentionlegal') {
        $page = 'mentionlegal.php';
    }
    if ($_GET['page'] == 'kanban') {
        $page = 'kanban.php';
    }
    if ($_GET['page'] == 'register') {
        $page = 'register.php';
    }
    if ($_GET['page'] == 'login') {
        $page = 'login.php';
    }
    if ($_GET['page'] == 'login') {
        $page = 'login.php';
    }
    if ($_GET['page'] == 'categ') {
        $page = 'code_ajout_categorie.php';
    }
    if ($_GET['page'] == 'deconnection') {
        $page = 'unlog.php';
    }
    if ($_GET['page'] == 'monprofil') {
        $page = 'profil.php';
    }
}
include_once(dirname(__FILE__).'/../../pages/'.$page);