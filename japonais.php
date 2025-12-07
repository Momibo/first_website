<?php
include("navbar.html");
include("database.php");
include("ajouter_voc.php");
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <main>
        <h2>Japonais</h2>
        <p>J'ai commencé à apprendre le japonais avec duolingo avec une traduction de
            japonais à anglais mais ici je vais traduire le japonais en français sauf
            pour les mots qui n'ont pas de traduction précise (ou pas de traduction
            tout court) en fançais, comme pour This/That en anglais.<br>Comme je débute
            je vais mettre la prononciation des kanjis a côté, soit avec l'alphabet
            fr, soit avec les hiraganas
        </p>
        <?php /*
        <div class="sheets">
            <h3>La famille et les pronoms personnels</h3>
            <ul>
                <li>私 (watashi) = moi / je (/mon)</li>
                <li>/ 俺 (ore)</li>
                <li>あなた = tu</li>
                <li>彼 (Kare) = il</li>
                <li>彼女 (kanojo) = elle</li>
                <li>私たちは = nous</li>
                <li>彼ら (karera) = ils</li>
            </ul>
            <?php
            add_voc('famille', $conn);
            ?>
        </div>
        
        <input type="text" id="myInput" onchange="test(this.value)" />
        <script>
            function test(value) {
                // You can perform any PHP-related logic here using AJAX or send the value to a PHP script
                // For this example, we'll simply alert the value using JavaScript
                alert(value);
            }
        </script>
        */ ?>
    </main>
</body>

</html>

<?php /*
    mysqli_close($conn);*/
?>