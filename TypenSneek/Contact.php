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

    <!-- External css -->
    <link rel="stylesheet" href="css/contact.css">

    <!-- recaptcha -->
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script>
        function onSubmit(token) {
            document.getElementById("captcha").submit();
        }
    </script>

    <title>Contact TypenSneek</title>
</head>
<body class="">

<!--nav bar-->
<?php
include "include/navbar.php";
?>

<!--/nav bar-->


<!--contact form-->
<!--recaptcha-->


<!--/recaptcha-->
<div class="container" id="space">
    <div class="row">
        <div class="col-md-4">
            <b>Contact</b> <br />
            <p>Mocht u toch nog vragen hebben over onze cursus, aarzel dan niet.<br>
                Vul het contactformulier in. Wij streven ernaar om u binnen twee werkdagen antwoord te geven.
            </p>

            <br>
            <!-- Google Map -->
            <div style="width: 350px;position: relative;"><iframe width="350" height="170" src="https://maps.google.com/maps?width=350&amp;height=120&amp;hl=en&amp;q=Pinksterbloem%2026+(Typen%20Sneek)&amp;ie=UTF8&amp;t=&amp;z=13&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                <div style="position: absolute;width: 80%;bottom: 10px;left: 0;right: 0;margin-left: auto;margin-right: auto;color: #000;text-align: center;">
                    <small style="line-height: 1.8;font-size: 2px;background: #fff;">
                    </small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style>
            </div>
            <br />
        </div>

        <div class="col-md-8">
            <form class="captcha" method="post">
                <input class="form-control" name="name" required placeholder="Naam..." /><br />
                <input class="form-control" name="phone" required placeholder="Telefoonnummer..." /><br />
                <input class="form-control" name="email" required placeholder="E-mail..." /><br />
                <textarea class="form-control" name="text" required placeholder="Hoe kunnen wij u helpen?" style="height:150px;"></textarea><br />
                <button class="g-recaptcha" class="btn btn-primary"
                        data-sitekey="6Lcs1swZAAAAAC6EQaUBZMtU0wm58efdk5uR1vAT"
                        data-callback='onSubmit'
                        data-action='submit'>Submit</button>
            </form>
        </div>
    </div>
</div>
<!--/contact form-->

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


<!--
kleur gebruiken

Yass Queen: #ff1d58

Sister Sister: #f75990

Crown Yellow: #fff685

Blue Light: #00DDFF

Brutal Blue: #0049B7
-->
