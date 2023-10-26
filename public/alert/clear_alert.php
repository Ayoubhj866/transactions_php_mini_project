<?php

session_start();

if (isset($_SESSION['alert'])) {
    unset($_SESSION['alert']);

    $response = array('success' => true, 'message' => 'Alert session has been deleted');
    echo json_encode($response);
} else {
    $response = array('success' => false, 'message' => 'ALert session not found');
    echo json_encode($response);
}