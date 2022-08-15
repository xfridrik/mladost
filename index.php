<?php
require_once "MyPDO.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <title>ŠD Mladosť</title>
    <link rel="stylesheet" href="style.css?id=1">
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">ŠD Mladosť (STU)</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Výber zo zoznamu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="graficky.php">Grafický výber</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="info.php">Informácie o ŠD</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://ubytovanie.stuba.sk">Ubytovací systém</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Jazyk
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="?lang=sk">SK</a></li>
                            <li><a class="dropdown-item disabled" href="?lang=en">EN</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<br>
<h4>UPOZORNENIE</h4>
<p class="inf">Táto aplikácia slúži na zistenie spolubývajúcich na internáte ŠD Mladosť (STU). Nejdená sa o oficiálny ubytovací systém. Aplikácia je založená na dobrovoľnosti poskytnutia kontaktu ostatným užívateľom, pre zachovanie bezpečnosti sa odporúča použiť AIS ID. Identifikátor je uložený do databázy a verejne dostupný, pokiaľ sa nevykoná akcia "zmazať" prístupná pre všetky identifikátory vyhľadanej izby. <strong>Nikdy nezadávaj údaje iných ľudí bez ich súhlasu!</strong></p>
<h1>Výber izby</h1>
<form action="index.php" method="GET">
    <div class="mb-3">
        <select id="disabledSelect" class="form-select" name="building" aria-label="blok">
            <?php
            if(isset($_GET["building"])){
                $bu = $_GET["building"];
                echo "<option value='$bu' selected>>$bu<</option>";
            }else{
                echo "<option selected disabled>Vyber BLOK</option>";
            }
            ?>
        <option value="A1">A1</option>
        <option value="A2">A2</option>
        <option value="A3">A3</option>
        <option value="A4">A4</option>
        <option value="B1">B1</option>
        <option value="B2">B2</option>
        <option value="B3">B3</option>
        <option value="B4">B4</option>
        <option value="C1">C1</option>
        <option value="C2">C2</option>
        <option value="C3">C3</option>
        <option value="C4">C4</option>
        <option value="D1">D1</option>
        <option value="D2">D2</option>
        <option value="D3">D3</option>
        <option value="D4">D4</option>
    </select>
        <div class="col-auto"><span id="help" class="form-text">Prvé číslo v čísle izby.</span></div>
    <select id="posch" name="floor" class="form-select" aria-label="poschodie">
        <?php
        if(isset($_GET["floor"])){
            $bu = $_GET["floor"];
            echo "<option value='$bu' selected>>P$bu<</option>";
        }else{
            echo "<option selected disabled>Vyber POSCHODIE</option>";
        }
        ?>
        <option value="1">P1</option>
        <option value="2">P2</option>
        <option value="3">P3</option>
        <option value="4">P4</option>
        <option value="5">P5</option>
        <option value="6">P6</option>
        <option value="7">P7</option>
        <option value="8">P8</option>
    </select>

        <div class="col-auto">
        <span id="help" class="form-text">
          Druhé číslo v čísle izby.
        </span>
        </div>
    <select id="bunka" name="unit" class="form-select" aria-label="bunka">
        <?php
        if(isset($_GET["unit"])){
            $bu = $_GET["unit"];
            echo "<option value='$bu' selected>>$bu<</option>";
        }else{
            echo "<option selected disabled>Vyber BUNKU</option>";
        }
        ?>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>

        <div class="col-auto">
        <span id="help" class="form-text">
          Číslo za lomítkom.
        </span>
        </div>

    <select id="room" name="room" class="form-select" aria-label="izba">
        <?php
        if(isset($_GET["room"])){
            $bu = $_GET["room"];
            echo "<option value='$bu' selected>>$bu<</option>";
        }else{
            echo "<option selected disabled>Vyber IZBU</option>";
        }
        ?>
        <option value="1">1</option>
        <option value="2">2</option>
    </select>



    </div>
    <button type="submit" class="btn btn-primary mb-3">Vyhľadať izbu</button>
</form>

<div class="mladost">
    <?php
    if(isset($_GET["building"]) && isset($_GET["floor"]) && isset($_GET["unit"]) && isset($_GET["room"])){
        try {
            $sql = "SELECT * FROM rooms where building = :b and unit = :u and room = :r";
            $stmt = MyPDO::instance()->prepare($sql);
            $unit = $_GET["floor"].$_GET["unit"];
            $stmt->execute([":b"=>$_GET["building"], ":u"=>$unit, ":r"=>$_GET["room"]]);
            $room = $stmt->fetchObject();
            if($room){
                echo "<br><form class='add' action='add.php' method='get'>";
                echo "<h3>Bývam na tejto izbe</h3>";
                echo "<input type='hidden' name='id' value='$room->id'>";
                echo '<div class="col-auto"><span id="help" class="form-text dark">napríklad AIS ID, prezývka, sociálna sieť...</span></div>';
                echo '<input type="text" name="name" class="form-control" placeholder="Tvoj identifikátor" aria-label="Username" required>';
                echo "<input class='form-check-input' type='checkbox' value='' id='suhlas' required><label class='form-check-label' for='suhlas'>Súhlasím s uložením a zverejnením zadaných údajov</label>";
                echo "<br><br><button type='submit' class='btn btn-primary'>Pridať sa na izbu $room->building $room->unit/$room->room</button>";
                echo "</form>";

                echo "<section class='room'>";
                echo "<ul class='list-group'>";
                echo "<li class='list-group-item active d-flex justify-content-between align-items-center'><h2>Izba $room->building $room->unit/$room->room</h2>";
                $sql = "SELECT * FROM people where room_id = :room";
                $stmt = MyPDO::instance()->prepare($sql);
                $stmt->execute([":room"=>$room->id]);
                $people = $stmt->fetchAll();
                $count = sizeof($people);
                echo "<span class='badge badge-secondary badge-pill'>$count</span>";
                echo "</li>";
                if(sizeof($people)==0){
                    echo "Na tejto izbe zatiaľ nie sú žiadni survivors";
                }else{
                    foreach ($people as $person){
                        echo "<li class='list-group-item d-flex justify-content-between align-items-center'><span id='space'></span>$person->nickname
                                <form id='inside' action='del.php' method='post' onsubmit='return confirm(".'"Naozaj chceš odstrániť tento záznam?"'.");' >
                                    <input type='hidden' name='id' value='$person->id'>
                                    <button type='submit' class='btn btn-danger del'>zmazať</button>
                                </form>
                                </li>";
                    }
                    echo "</ul>";
                }
                echo "</section>";



                echo "<section class='unit'>";
                echo "<ul class='list-group'>";
                echo "<li class='list-group-item active d-flex justify-content-between align-items-center'><h2>Bunka $room->building $room->unit</h2>";
                $sql = "SELECT * FROM people p join rooms r on p.room_id = r.id where r.building = :b and r.unit = :u";
                $stmt = MyPDO::instance()->prepare($sql);
                $stmt->execute([":b"=>$room->building, ":u"=>$room->unit]);
                $people = $stmt->fetchAll();
                $count = sizeof($people);
                echo "<span class='badge badge-secondary badge-pill'>$count</span>";
                echo "</li>";
                if(sizeof($people)==0){
                    echo "Na tejto bunke zatiaľ nie sú žiadni survivors";
                }else{
                    foreach ($people as $person){
                        echo "<li class='list-group-item'>$person->nickname</li>";
                    }
                    echo "</ul>";
                }
                echo "</section>";




                echo "<section class='floor'>";
                $p = substr($room->unit,0,1);
                echo "<ul class='list-group'>";
                echo "<li class='list-group-item active d-flex justify-content-between align-items-center'><h2>Chodba $room->building P$p </h2>";
                $sql = "SELECT * FROM people p join rooms r on p.room_id = r.id where r.building = :b and r.unit like :u";
                $stmt = MyPDO::instance()->prepare($sql);
                $stmt->execute([":b"=>$room->building, ":u"=>$p."%"]);
                $people = $stmt->fetchAll();
                $count = sizeof($people);
                echo "<span class='badge badge-secondary badge-pill'>$count</span>";
                echo "</li>";
                if(sizeof($people)==0){
                    echo "Na tejto chodbe zatiaľ nie sú žiadni survivors";
                }else{
                    foreach ($people as $person){
                        echo "<li class='list-group-item'>$person->nickname (bunka $person->unit)</li>";
                    }
                    echo "</ul>";
                }
                echo "</section>";

            }

        }catch (Exception $e){
            echo "Nastala chyba";
            var_dump($e);
        }
    }
    ?>

</div>

</body>
<script>

</script>
</html>