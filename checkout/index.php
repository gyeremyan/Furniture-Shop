<?php
require_once '../model/cart.php';


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {        
        $action = 'confirm';
    }
}

if($action == 'confirm') {
    include 'checkout_page.php';
}


