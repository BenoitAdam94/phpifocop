<?php

function user_is_connect()
{
    if (!empty($_SESSION['membre'])) {
        return true;
    }
    return false;
}


function user_is_admin()
{
    if (user_is_connect() && $_SESSION['membre']['statut'] == 1) {
        return true;
    } else {
        return false;
    }
}
