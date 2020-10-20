<div class="wrapper rounded p-3" style="background: #F5E6CC; color: #05386B;">
    <h4>Login</h4>
    <hr>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group rounded-pill <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
            <label>Gebruikersnaam</label>
            <input type="text" name="username" class="form-control rounded-pill border border-success"
                   value="<?php echo $username; ?>">
            <span class="help-block"><?php echo $username_err; ?></span>
        </div>
        <div class="form-group rounded-pill <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
            <label>Wachtwoord</label>
            <input type="password" name="password" class="form-control border border-success rounded-pill">
            <span class="help-block"><?php echo $password_err; ?></span>
        </div>
        <div class="form-group rounded-pill">
            <input type="submit" class="btn btn-warning rounded-pill mx-auto" value="Login" style="color: black">
            <!--                <button id="custom-button" type="submit" value="Login" class="g-recaptcha" data-sitekey="6Lcs1swZAAAAAC6EQaUBZMtU0wm58efdk5uR1vAT" data-callback='onSubmit' data-action='submit'>Login</button>-->
        </div>

        <div>
            <br>
            <hr>
            <br>
            <img src="../img/foto5.jpg" alt="ja" class="img-thumbnail rounded mx-auto d-block">
        </div>
</div>
</div>
