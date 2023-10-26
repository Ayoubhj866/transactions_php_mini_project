<?php

session_start();

if (isset($_SESSION['alert'])) {
    echo json_encode(['alert' => $_SESSION['alert'] ]);

} else {
    echo json_encode(['alert' => null]);
}