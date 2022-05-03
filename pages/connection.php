<?php
function is_connected(): bool
{
    session_start();
    if (isset($_SESSION['id']) === true) {
        return true;
    }
    session_destroy();
    return false;
}