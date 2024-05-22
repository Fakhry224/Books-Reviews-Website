<div class="wrapper">
  <div class="row">
      <div class="col">
        <?php Flasher::flash(); ?>
      </div>
  </div>
  <div class="container main">
    <div class="box">
      <div class="input-box">
        <header>LOGIN</header>

        <form action="<?= BASEURL; ?>/AuthController/login" method="post">
          <div class="input-field">
            <input
              type="email"
              class="input"
              id="email"
              name="email"
              required
              autocomplete="off"
            />
            <label for="email">Email</label>
          </div>
          <div class="input-field">
            <input
              type="password"
              class="input"
              id="pass"
              name="password"
              required
            />
            <label for="pass">Password</label>
          </div>
          <div class="input-field">
            <input type="submit" class="submit" value="Sign in" />
          </div>
        </form>

        <div class="signin">
          <span>Don't have an account? <a href="<?= BASEURL; ?>/AuthController/register">Register here</a></span>
        </div>
      </div>
    </div>
  </div>
</div>
