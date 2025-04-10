<?php

function isConnected() {
    if (isset($_SESSION['admin_id']) && !empty($_SESSION['admin_id'])) {
        return true;
    }
    return false;
}