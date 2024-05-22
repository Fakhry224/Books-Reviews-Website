<div class="wrapper">
  <div class="row">
      <div class="col">
        <?php Flasher::flash(); ?>
      </div>
  </div>
  <div class="container main">
    <div class="box">
      <div class="input-box">
        <header>REGISTER</header>

        <form action="<?= BASEURL; ?>/AuthController/register" method="post">
          <div class="input-field">
            <input
              type="text"
              class="input"
              id="name"
              name="name"
              required
              autocomplete="off"
            />
            <label for="name">Name</label>
          </div>
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
            <input
              type="password"
              class="input"
              id="re-pass"
              name="confirm_password"
              required
            />
            <label for="re-pass">Re-Enter Password</label>
          </div>
          <div class="input-field">
            <input type="submit" class="submit" value="Sign Up" />
          </div>
        </form>

        <div class="signin">
          <span>Already have an account? <a href="<?= BASEURL; ?>/AuthController/login">Log in here</a></span>
        </div>
      </div>
    </div>
  </div>
</div>

