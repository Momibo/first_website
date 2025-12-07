<?php
function add_voc ($category, $conn){
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST[$category])){
        $jap = $_POST['japonais'];
        $no_kanji = isset($_POST['no_kanji']) ? $_POST['no_kanji'] : '';
        $trad = $_POST['traduction'];
        $sql = "INSERT INTO vocabulary (japanese, no_kanji, traduction)
                VALUES ('$jap', '$no_kanji', '$trad')";

        mysqli_query($conn, $sql);
    }

    echo "<form class='ajouter_voc_input' action='japonais.php' method='post'>";
    echo"<div>";
    echo"<table>";
    echo"<tr>";
    echo"<td><label>Mot japonais : </label></td>";
    echo"<td><input type='text' name='japonais' required></td>";
    echo"</tr>";
    echo"<tr>";
    echo"<td><label>sans kanji : </label></td>";
    echo"<td><input type='text' name='no_kanji'></td>";
    echo"</tr>";
    echo"<tr>";
    echo"<td><label>traduction : </label></td>";
    echo"<td><input type='text' name='traduction' required></td>";
    echo"</tr>";
    echo"</table>";
    echo"</div>";
    echo"<input class='ajouter_voc_btn' type='submit' name=".$category." value='+'>";
    echo"</form>";

}
?>

<?php /* <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form class='ajouter_voc_input' action='japonais.php' method='post'>
        <div>
            <table>
                <tr>
                    <td><label>Mot japonais : </label></td>
                    <td><input type='text' name='japonais' required></td>
                </tr>
                <tr>
                    <td><label>sans kanji : </label></td>
                    <td><input type='text' name='no_kanji'></td>
                </tr>
                <tr>
                    <td><label>traduction : </label></td>
                    <td><input type='text' name='traduction' required></td>
                </tr>
            </table>
        </div>
        <input class='ajouter_voc_btn' type='submit' name=<?php echo isset($category); ?> value="+">
    </form>
</body>
</html>*/?>