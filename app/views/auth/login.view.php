    <?php $messages = $this->messenger->getMessage();
    if (!empty($messages)) : foreach ($messages as $message) : ?>
            <div class="alert alert-primary t<?= $message[1] ?>" role="alert" style="color:white;">
                <?php echo $message[0] ?>
            </div>
    <?php endforeach;
    endif; ?>
    <div class="wrapper-2">
        <form class="form-signin" method="post">
            <h2 class="form-signin-heading">Please login</h2>
            <input type="text" class="form-control" name="userName" placeholder="Email Address" required="" autofocus="" />
            <input type="password" class="form-control" name="password" placeholder="Password" required="" />
            <label class="checkbox">
                <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
            </label>
            <button name="login" class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
        </form>
    </div>