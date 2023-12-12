<link rel="stylesheet" href="login.css">
<section class="user">
  
  <div class="user_options-container">
    <div class="user_options-text">
      <div class="user_options-unregistered">
        <h2 class="user_unregistered-title">Don't have an account?</h2>
        <p class="user_unregistered-text"></p>
        <button class="user_unregistered-signup" id="signup-button">Sign up</button>
      </div>

      <div class="user_options-registered">
        <h2 class="user_registered-title">Have an account?</h2>
        <p class="user_registered-text"></p>
        <button class="user_registered-login" id="login-button">Login</button>
      </div>
    </div>
    
    <div class="user_options-forms" id="user_options-forms">
      <div class="user_forms-login">
        <h2 class="forms_title">Login</h2>
        <form class="forms_form"  action="login.php" method='POST'>
          <fieldset class="forms_fieldset">
            <div class="forms_field">
              <input type="text" placeholder="Username" class="forms_field-input " name="username" required autofocus />
            </div>
            <div class="forms_field">
              <input type="password" placeholder="Password" class="forms_field-input " name="password" required />
            </div>
          </fieldset>
          <div class="forms_buttons">
            <button type="button" class="forms_buttons-forgot">Forgot password?</button>
            <input type="submit" value="Log In" class="forms_buttons-action" name="forms_form">
          </div>
          <?php require 'xulydangnhap.php';?> 
        </form>
      </div>
      <div class="user_forms-signup">
        <h2 class="forms_title">Sign Up</h2>
        <form class="forms_form" action="login.php" method='POST'>
          <fieldset class="forms_fieldset">
            <div class="forms_field">
              <input type="text" placeholder="Username" class="forms_field-input" name="username" required />
            </div>
            <div class="forms_field">
              <input type="password" placeholder="Password" class="forms_field-input" name="password" required />
            </div>
            <div class="forms_field">
              <input type="email" placeholder="Email" class="forms_field-input" name="email" required />
            </div>
            
          </fieldset>
          <div class="forms_buttons">
            <input type="submit" value="Sign up" class="forms_buttons-action">
          </div>
          <?php require 'xulidangki.php';?> 
        </form>
      </div>
    </div>
  </div>
  
</section>
<script src="login.js"  type="text/javascript"></script>