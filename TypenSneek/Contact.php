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


    <title>Contact TypenSneek</title>
</head>
<body class="bg-light">

<!--nav bar-->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">TypenSneek</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" href="OverOns.php">Over ons</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Blindtypen.php">Blindtypen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Ervaringen.php">Ervaringen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Dyslexie.php">Dyslexie</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="DeCursus.php">De cursus</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="aanmelden.php">Aanmelden</a>
                </li>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Contact.php">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!--/nav bar-->
<!--contact form-->
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
            <form action="/post" method="post">
                <input class="form-control" name="name" placeholder="Naam..." /><br />
                <input class="form-control" name="phone" placeholder="Telefoonnummer..." /><br />
                <input class="form-control" name="email" placeholder="E-mail..." /><br />
                <textarea class="form-control" name="text" placeholder="Hoe kunnen wij u helpen?" style="height:150px;"></textarea><br />
                <input class="btn btn-primary" type="submit" value="Verstuur" /><br /><br />
                <a href="#" class="btn btn-primary">Verstuur   <span class="glyphicon glyphicon-hand-right"></span></a>
            </form>
        </div>
<!--        /contact formulier -->

    </div>

</div>
<!--/contact form-->
<!-- Footer -->
<footer class="page-footer font-small teal pt-4 bg-light " style="margin-top: 100px">



    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2020 Copyright:
        <a href="#" style="text-decoration: none; "> typensneek.nl</a>
    </div>
    <!-- Copyright -->

</footer>
<!-- Footer -->

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