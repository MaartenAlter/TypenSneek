<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!--    external css -->
    <link rel="stylesheet" href="css/footer.css">
    <title>Hello, world!</title>
</head>
<body>

<?php
include "include/navbar.php";
?>


<div class="container" style="margin-top: 100px">
    <div class="row">
        <div class="col-sm">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h4>Ervaringen</h4>
                    We hebben al vele cursisten gehad op les. <br>
                    Iedereen kan een reactie sturen. Deze worden dan op deze plaats gezet.

                </div>
            </div>
        </div>

        <div class="col-sm">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <p>Hartelijk bedankt voor alle goede zorgen, leuke lessen en super begeleiding.
                        Groeten van Susan (en haar ouders)</p>

                </div>
            </div>
        </div>

        <div class="col-sm">
            <div class="card" style="width: 18rem;">
                <div class="card-body">

                    <p class="card-text">Bedankt voor de goede zorgen en fantastische resultaten die jullie hebben weten
                        te behalen voor onze dochter Sanne-Rixt.</p>

                </div>
            </div>
        </div>


    </div>
</div>
<!--row #2-->
<div class="container" style="margin-top: 70px">
    <div class="row">
        <div class="col-sm">
            <div class="card" style="width: 18rem;">
                <div class="card-body">

                    <p class="card-text">Omdat ik nu blind kan typen had ik veel meer tijd voor mijn werkstuk. De eerste
                        keer een 5,5 en nu had ik een 8. Hier ben ik heel blij mee. Ruben</p>

                </div>
            </div>
        </div>

        <div class="col-sm">
            <div class="card" style="width: 18rem;">
                <div class="card-body">

                    <p class="card-text">Ik moest van mijn ouders op typeles. Het huiswerk was niet altijd even leuk,
                        maar ik ben nu toch heel blij dat ik blind kan typen. Bedankt. Maarten</p>

                </div>
            </div>
        </div>

        <div class="col-sm">
            <div class="card" style="width: 18rem;">
                <div class="card-body">

                    <p class="card-text">Bedankt dat jullie toch nog een mogelijkheid hebben gevonden dat Sanne de
                        lessen kon volgen. Fantastisch! Sanne kan nu goed typen en wij zijn heel trots. Anneke en Marco
                        de Boer
                    </p>

                </div>
            </div>
        </div>


    </div>
</div>


<?php
require "include/footer.php";
?>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
