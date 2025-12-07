<?php
include("navbar.html");
include("calendarDb.php");
session_start();

$_SESSION['year'] = isset($_SESSION['year']) ? $_SESSION['year'] : date('Y');
$_SESSION['month'] = isset($_SESSION['month']) ? $_SESSION['month'] : date('m');

if (isset($_COOKIE['reveil'])) {
    if (substr($_COOKIE['reveil'], 0, -1) != date('Y-m-d')) {
        $date = substr($_COOKIE['reveil'], 0, -1);
        $content;
        $content = $_COOKIE['reveil'][-1] == 1 ? $content . 'reveil<br>' : $content;
        $content = $_COOKIE['sport'][-1] == 1 ? $content . 'sport<br>' : $content;
        $content = $_COOKIE['ecole'][-1] == 1 ? $content . 'ecole<br>' : $content;
        $content = $_COOKIE['perso'][-1] == 1 ? $content . 'perso<br>' : $content;
        $content = $_COOKIE['soin'][-1] == 1 ? $content . 'soin<br>' : $content;
        $sql = "INSERT INTO calendar (date, content)
            VALUES ('$date', '$content')";

        setcookie('reveil', date('Y-m-d') . '0', time() + 60 * 60 * 24 * 30);
        setcookie('sport', date('Y-m-d') . '0', time() + 60 * 60 * 24 * 30);
        setcookie('ecole', date('Y-m-d') . '0', time() + 60 * 60 * 24 * 30);
        setcookie('perso', date('Y-m-d') . '0', time() + 60 * 60 * 24 * 30);
        setcookie('soin', date('Y-m-d') . '0', time() + 60 * 60 * 24 * 30);

        mysqli_query($conn, $sql);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}

if (isset($_COOKIE['reveil'])) {
    substr($_COOKIE['reveil'], 0, -1) == date('Y-m-d') ? $_COOKIE['reveil'] : setcookie('reveil', date('Y-m-d') . '0', time() + 60 * 60 * 24 * 30);
    substr($_COOKIE['sport'], 0, -1) == date('Y-m-d') ? $_COOKIE['sport'] : setcookie('sport', date('Y-m-d') . '0', time() + 60 * 60 * 24 * 30);
    substr($_COOKIE['ecole'], 0, -1) == date('Y-m-d') ? $_COOKIE['ecole'] : setcookie('ecole', date('Y-m-d') . '0', time() + 60 * 60 * 24 * 30);
    substr($_COOKIE['perso'], 0, -1) == date('Y-m-d') ? $_COOKIE['perso'] : setcookie('perso', date('Y-m-d') . '0', time() + 60 * 60 * 24 * 30);
    substr($_COOKIE['soin'], 0, -1) == date('Y-m-d') ? $_COOKIE['soin'] : setcookie('soin', date('Y-m-d') . '0', time() + 60 * 60 * 24 * 30);
} else {
    setcookie('reveil', date('Y-m-d') . '0', time() + 60 * 60 * 24 * 30);
    setcookie('sport', date('Y-m-d') . '0', time() + 60 * 60 * 24 * 30);
    setcookie('ecole', date('Y-m-d') . '0', time() + 60 * 60 * 24 * 30);
    setcookie('perso', date('Y-m-d') . '0', time() + 60 * 60 * 24 * 30);
    setcookie('soin', date('Y-m-d') . '0', time() + 60 * 60 * 24 * 30);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['previousYear'])) {
        $_SESSION['year'] -= 1;
    } elseif (isset($_POST['nextYear'])) {
        $_SESSION['year'] += 1;
    } elseif (isset($_POST['previousMonth'])) {
        if ($_SESSION['month'] == 1) {
            $_SESSION['month'] = 12;
            $_SESSION['year'] -= 1;
        } else {
            $_SESSION['month'] -= 1;
        }
    } elseif (isset($_POST['nextMonth'])) {
        if ($_SESSION['month'] == 12) {
            $_SESSION['month'] = 1;
            $_SESSION['year'] += 1;
        } else {
            $_SESSION['month'] += 1;
        }
    }

    if (isset($_POST['reveil'])) {
        setcookie('reveil', date('Y-m-d') . '1', time() + 60 * 60 * 24 * 30);
    } elseif (isset($_POST['sport'])) {
        setcookie('sport', date('Y-m-d') . '1', time() + 60 * 60 * 24 * 30);
    } elseif (isset($_POST['ecole'])) {
        setcookie('ecole', date('Y-m-d') . '1', time() + 60 * 60 * 24 * 30);
    } elseif (isset($_POST['perso'])) {
        setcookie('perso', date('Y-m-d') . '1', time() + 60 * 60 * 24 * 30);
    } elseif (isset($_POST['soin'])) {
        setcookie('soin', date('Y-m-d') . '1', time() + 60 * 60 * 24 * 30);
    } elseif (isset($_POST['reveil2'])) {
        setcookie('reveil', date('Y-m-d') . '0', time() + 60 * 60 * 24 * 30);
    } elseif (isset($_POST['sport2'])) {
        setcookie('sport', date('Y-m-d') . '0', time() + 60 * 60 * 24 * 30);
    } elseif (isset($_POST['ecole2'])) {
        setcookie('ecole', date('Y-m-d') . '0', time() + 60 * 60 * 24 * 30);
    } elseif (isset($_POST['perso2'])) {
        setcookie('perso', date('Y-m-d') . '0', time() + 60 * 60 * 24 * 30);
    } elseif (isset($_POST['soin2'])) {
        setcookie('soin', date('Y-m-d') . '0', time() + 60 * 60 * 24 * 30);
    }

    header("Location:" . $_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Routine</title>
    <link rel="stylesheet" href="/first_website/style/style.css">
</head>

<body>
    <main>
        <h2>Routine</h2>
        <div class="routine">
            <form class="afaire" method="post">
                <h3>Daily Quest</h2>
                    <?php
                    echo ((!empty($_COOKIE['reveil'][-1]) == '0') ? '<label>Réveil avant 9h<input type="submit" name="reveil" class="routinebox" value="➡"></label><br><br>' : '<label>&nbsp;</label><br><br>');

                    echo ((!empty($_COOKIE['sport'][-1]) == '0') ? '<label>Sport<input type="submit" name="sport" class="routinebox" value="➡"></label><br><br>' : '<label>&nbsp;</label><br><br>');

                    echo ((!empty($_COOKIE['ecole'][-1]) == '0') ? '<label>2h école<input type="submit" name="ecole" class="routinebox" value="➡"></label><br><br>' : '<label>&nbsp;</label><br><br>');

                    echo ((!empty($_COOKIE['perso'][-1]) == '0') ? '<label>1h de dvlpt perso<input type="submit" name="perso" class="routinebox" value="➡"></label><br><br>' : '<label>&nbsp;</label><br><br>');

                    echo ((!empty($_COOKIE['soin'][-1]) == '0') ? '<label>1h pour sois<input type="submit" name="soin" class="routinebox" value="➡"></label><br><br>' : '<label>&nbsp;</label><br><br>');
                    ?>
            </form>
            <form class="fait" method="post">
                <h3>Quest done</h3>
                <?php
                echo !empty($_COOKIE['reveil'][-1]) == '1' ? '<label><input type="submit" name="reveil2" class="routinebox" value="⬅">Réveil avant 9h</label><br><br>' : '<label>&nbsp;</label><br><br>';
                echo !empty($_COOKIE['sport'][-1]) == '1' ? '<label><input type="submit" name="sport2" class="routinebox" value="⬅">Sport</label><br><br>' : '<label>&nbsp;</label><br><br>';
                echo !empty($_COOKIE['ecole'][-1]) == '1' ? '<label><input type="submit" name="ecole2" class="routinebox" value="⬅">2h école</label><br><br>' : '<label>&nbsp;</label><br><br>';
                echo !empty($_COOKIE['perso'][-1]) == '1' ? '<label><input type="submit" name="perso2" class="routinebox" value="⬅">1h de dvlpt perso</label><br><br>' : '<label>&nbsp;</label><br><br>';
                echo !empty($_COOKIE['soin'][-1]) == '1' ? '<label><input type="submit" name="soin2" class="routinebox" value="⬅">1h pour sois</label><br><br>' : '<label>&nbsp;</label><br><br>';
                ?>
            </form>
        </div>
        <div class="calendar">
            <?php
            function build_calendar($month, $year)
            {
                include("calendarDb.php");
                $firstDay = mktime(0, 0, 0, $month, 0, $year);
                $lastDay = mktime(0, 0, 0, $month + 1, 0, $year);
                echo "<table>";
                echo "<form method='post'>";
                echo "<thead><tr><th colspan='7'>Calendrier interactif<br><input type='submit' class='fleches' name='previousYear' value='⬅'> "
                    . $_SESSION['year'] . " <input type='submit' class='fleches' name='nextYear' value='➡'><br><input type='submit' class='fleches' name='previousMonth' value='⬅'> "
                    . date('F', mktime(0, 0, 0, $_SESSION['month'], 1)) . " <input type='submit' class='fleches' name='nextMonth' value='➡'></th></tr></thead>";
                echo "</form>";
                echo "<tr style='height: 50px;'>";
                echo "<td style='border-style: solid;'>Monday</td>";
                echo "<td style='border-style: solid;'>Tuesday</td>";
                echo "<td style='border-style: solid;'>Wednesday</td>";
                echo "<td style='border-style: solid;'>Thursday</td>";
                echo "<td style='border-style: solid;'>Friday</td>";
                echo "<td style='border-style: solid;'>Saturday</td>";
                echo "<td style='border-style: solid;'>Sunday</td>";
                echo "</tr>";

                $dayOfWeek = date('w', $firstDay);
                $currentDay = 1;

                echo '<tr>';
                for ($i = 0; $i < $dayOfWeek; $i++) {
                    echo '<td style="color:grey;">' . date('d', mktime(0, 0, 0, $month, 0, $year)) - ($dayOfWeek - 1) + $i . '</td>';
                }

                while ($currentDay <= date('d', $lastDay)) {
                    if ($dayOfWeek == 7) {
                        $dayOfWeek = 0;
                        echo '</tr><tr>';
                    }

                    $currentDate = date('Y-m-d', mktime(0, 0, 0, $month, $currentDay, $year));
                    $test = ($currentDate == date("Y-m-d")) ? "currentDay" : "emptyDay";
                    $sql = "SELECT * FROM calendar WHERE date = '$currentDate'";
                    $result = mysqli_query($conn, $sql);

                    if ($result && mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        echo '<td class="day">' . $currentDay . "<br>" . $row['content'] . '</td>';
                    } else {
                        echo '<td class="' . $test . '">' . $currentDay . '</td>';
                    }
                    
                    $currentDay++;
                    $dayOfWeek++;
                }
                $currentDay = 1;
                while ($dayOfWeek < 7) {
                    echo '<td style="color:grey;">' . $currentDay . '</td>';
                    $currentDay++;
                    $dayOfWeek++;
                }

                echo '</tr>';
                echo '</table>';
            }
            build_calendar($_SESSION['month'], $_SESSION['year']);
            ?>
        </div>
    </main>
</body>

</html>