<?php
header('Location: ../web1.php');
session_start();
function validate($x, $y, $r): bool
{
    return is_numeric($x) &&
        is_numeric($y) &&
        is_numeric($r) && in_array($x, array(-4, -3, -2, -1, 0.0, 1, 2, 3, 4)) &&
        $y > -3 && $y < 5 &&
        $r > 2 && $r < 5;
}

function is_hit($x, $y, $r): bool
{
    if (($x >= 0 && $y >= 0 && ($x * $x + $y * $y) <= ($r / 2 * $r / 2)) ||
        ($x <= 0 && $y <= 0 && abs($y) <= ($r / 2) && abs($x) <= $r) ||
        ($x >= 0 && $x <= $r && $y <= 0 && $y >= ($r / 2) && ($x * $x + $y * $y) <= ((5 / 4) * $r * $r)))
    return true;
    else return false;
}

if (isset($_POST['check'])) {
    date_default_timezone_set('Europe/Moscow');
    $exc_time = microtime(true);
    $cur_time = date("H:i:s");
    $x = (($_POST["x"] != null)) ? $_POST["x"] : null;
    if (abs($x - round($x)) <= 1e-7)
        $x = round($x);
    $y = (!empty($_POST["y"])) ? str_replace(",", ".", $_POST["y"]) : null;
    if (abs($y - round($y)) <= 1e-7)
        $y = round($y);
    $r = (!empty($_POST["r"])) ? str_replace(",", ".", $_POST["r"]) : null;
    if (abs($r - round($r)) <= 1e-7)
        $r = round($r);
    if (validate($x, $y, $r)) {
        $res_style = "style=\"color:";
        if (strval(is_hit($x, $y, $r))) {
            $res_style .= "green\"";
            $is_hit = "success";
        } else {
            $res_style .= "red\"";
            $is_hit = "fail";
        }
        $exc_time = round((microtime(true) - $exc_time) * 1e6, 2) . " ms";
        if (!isset($_SESSION['table'])) {
            $_SESSION['table'] = array();
        }
        $res_arr = array($x, $y, $r, $cur_time, $exc_time, $is_hit, $res_style);
        $_SESSION['table'][] = $res_arr;

    }
} else if (isset($_POST['clear'])) {
    require_once('clear.php');
    clear_table();
}
