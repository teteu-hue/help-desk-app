<?php

function isAdminOrUser($role)
{
    if($role == "admin")
    {
        return 1;
    } else
    {
        return 2;
    }
}
