<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@500&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-color: lavender;
        }
    </style>
    <title>FirstLab</title>
</head>

<body>
<div class="header">
    <div class="header_inner">
        <div class="personal_info">
            <p>Uvarovskaya L.A. P3208 variant 1820</p>
        </div>
        <div class="nav_link">
            <nav>
                <a class="nav_link" href="https://github.com/dashboard"><img src="img/github_icon.png" width=30px></a>
            </nav>
        </div>
    </div>
</div>
<form class="parameters" action="php/check.php" method="post" name="form">
    <img src="img/graphic.png" width="200">
    <h3>Select the X value:</h3>
    <table>
        <tbody>
        <tr>
            <td><label>
                    <input id="radio1" class="radioX" type="radio" name="x" value="-4">-4</label></td>
            <td><label>
                    <input id="radio2" class="radioX" type="radio" name="x" value="-3">-3</label></td>
            <td><label>
                    <input id="radio3" class="radioX" type="radio" name="x" value="-2">-2</label></td>
        </tr>
        <tr>
            <td><label>
                    <input id="radio4" class="radioX" type="radio" name="x" value="-1"> -1</label></td>
            <td><label>
                    <input id="radio5" class="radioX" type="radio" name="x" value="0"> 0</label></td>
            <td><label>
                    <input id="radio6" class="radioX" type="radio" name="x" value="1"> 1</label></td>
        </tr>
        <tr>
            <td><label>
                    <input id="radio7" class="radioX" type="radio" name="x" value="2"> 2</label></td>
            <td><label>
                    <input id="radio8" class="radioX" type="radio" name="x" value="3"> 3</label></td>
            <td><label>
                    <input id="radio9" class="radioX" type="radio" name="x" value="4"> 4</label></td>
        </tr>
        </tbody>
    </table>
    <h3>Enter the Y value:</h3>
    <label>
        <input id="textY" class="text-input" maxlength="6" type="text" name="y" placeholder="(-3; 5)" size="13">
    </label>
    <h3>Enter the Radius value:</h3>
    <label>
        <label>
            <input id="textR" class="text-input" maxlength="6" type="text" name="r" placeholder="(2; 5)" size="13">
        </label>
    </label>
    <div class="action-buttons">
        <button class="action-button" type="submit" id="submit_request" name="check" value="check">
            Check
        </button>
        <button class="action-button" type="submit" id="clear_table" name="clear" value="clear">
            Clear
        </button>
    </div>
</form>
<div class="result">
    <table class="result-table" id="table">
        <thead style="font-weight: bold">
        <tr>
            <td>X</td>
            <td>Y</td>
            <td>R</td>
            <td>Current time</td>
            <td>Execution time</td>
            <td>Result</td>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($_SESSION['table'] as $res_arr) {
            echo "<tr>
                <td> $res_arr[0]</td>
                <td> $res_arr[1]</td>
                <td> $res_arr[2]</td>
                <td> $res_arr[3]</td>
                <td> $res_arr[4]</td>
                <td $res_arr[6]> $res_arr[5]</td>
            </tr>";
        }
        ?>
        </tbody>
    </table>
</div>
<script src="validate.js"></script>
</body>
</html>

