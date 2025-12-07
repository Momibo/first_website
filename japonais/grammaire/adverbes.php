<?php
include("../../navbar.html");
include("../../database.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $jap = $_POST['japonais'];
    $no_kanji = isset($_POST['no_kanji']) ? $_POST['no_kanji'] : '';
    $trad = $_POST['traduction'];
    $sql = "INSERT INTO adverbes (japanese, no_kanji, traduction)
            VALUES ('$jap', '$no_kanji', '$trad')";

    mysqli_query($conn, $sql);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Les adverbes</title>
    <link rel="stylesheet" href="/first_website/style/style.css">
</head>

<body>
    <div class="sheets">
        <h3>Les adverbes</h3>
        <?php
        $sql = "SELECT * FROM adverbes";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<div>";
            echo "<table class='voc'>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["japanese"];
                if ($row["no_kanji"] != "") {
                    echo " (" . $row["no_kanji"] . ")</td>";
                } else {
                    echo "</td>";
                }
                echo "<td>" . $row["traduction"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "</div>";
        }
        ?>

        <form class='ajouter_voc_input' method='post'>
            <div>
                <table>
                    <tr>
                        <td><label>Mot japonais : </label></td>
                        <td><input type='text' name='japonais' required></td>
                    </tr>
                    <tr>
                        <td><label>Sans kanji : </label></td>
                        <td><input type='text' name='no_kanji'></td>
                    </tr>
                    <tr>
                        <td><label>Traduction : </label></td>
                        <td><input type='text' name='traduction' required></td>
                    </tr>
                </table>
            </div>
            <input class='ajouter_voc_btn' type='submit' value='+'>
        </form>
</body>

</html>