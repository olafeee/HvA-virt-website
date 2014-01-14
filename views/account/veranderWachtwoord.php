<?php if (isset($_SESSION['loggedIn'])):?>
<?php include'/views/klantpaneel/klantpaneelHeader.php'; ?>

      <form class="form-signin" action="/account/wijzigWachtwoord" method="post">
            <input type="password" class="form-control" placeholder="Password" required="" name="password">
              <input type="password" class="form-control" placeholder="passwordnieuw" required="" name="passwordnieuw">
               <input type="password" class="form-control" placeholder="passwordnieuw" required="" name="passwordnieuw2">
            <label class="checkbox">
              <input type="checkbox" value="remember-me"> Remember me
            </label>
            <label>
              <a href="register">Create an account</a>
        </label>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Back</button>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Change</button>
      </form>


<?php else: 
header('location: /login');
 endif; ?>