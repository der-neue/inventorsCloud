<?php
    // einbinden der Headerdatei -> head & navbar
    $page_title = 'Login';
    $page_stylesheets = array('login.css');
    include_once '../templates/header.php';
    require_once '../assets/php/userLogin.php';

    $login = new Login();
    $result = [];
    if(isset($_POST) && count($_POST) > 0)
        $result = $login->login($_POST);
?>

<div class="login-container">
    <div class="px-4 border rounded">
        <div class="text-center">
            <h2>Login</h2>
            <span class="text-muted">
                Melde dich an um die Cloud benutzen zu können.
            </span>
            <hr>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <div class="form-floating mb-3">
                    <input 
                        type="text" 
                        name="user_name" 
                        class="form-control" 
                        id="floating_name" 
                        placeholder="Benutzername" 
                        required 
                    />
                    <label for="floating_name">Dein Benutzername</label>
                </div>
                <div class="form-floating mb-3">
                    <input 
                        type="password" 
                        name="user_password" 
                        class="form-control" 
                        id="floating_passwd" 
                        placeholder="Passwort" 
                        required
                    />
                    <label for="floating_passwd">Dein Passwort</label>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Login</button>
                    <div class="w-100" style="height: 1em;"></div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
    include_once '../templates/footer.php';
?>