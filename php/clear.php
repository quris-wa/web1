<?php
session_start();
function clear_table(): void
{
    $_SESSION['table'] = array();
}