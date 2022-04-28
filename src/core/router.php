<?php
$page = 'home.php';
if(isset($_GET['page'])){
    switch ($_GET['page']){
        case 'connection':
            $page = 'connection.php';
            break;
    }
}
include_once(dirname(__FILE__).'/../../pages/'.$page);