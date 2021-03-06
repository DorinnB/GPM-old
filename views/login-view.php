
<script type="text/javascript" src="js/login.js"></script>
<link rel="stylesheet" href="css/login.css">

<div class="container">
  <!-- Modal -->
  <div class="modal fade" id="login-modal" role="dialog" tabindex="-1">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" align="center">
          <img class="img-responsive" id="img_logo" src="img/logo.png">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
          </button>
        </div>

        <!-- Begin # DIV Form -->
        <div id="div-forms">

          <!-- Begin # Login Form -->
          <form id="login-form">
            <div class="modal-body">
              <div id="div-login-msg">
                <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                <span id="text-login-msg">Type your username and password.</span>
              </div>
              <!--	<input id="login_username" class="form-control" type="text" required>	-->
              <SELECT id="login_username" class="form-control">
                <?php include 'controller/lstTech-controller.php';	?>
              </select>
              <input id="login_password" class="form-control" type="password" placeholder="Password">
              <div class="checkbox">
                <label>
                  <input type="checkbox" id="login_remember_me" value=""> Remember me
                </label>
              </div>
            </div>
            <div class="modal-footer">
              <div>
                <button type="submit" id="btnLogin" class="btn btn-primary btn-lg btn-block">Login</button>
              </div>
              <div>
                <!--                               <button id="login_lost_btn" type="button" class="btn btn-link">Lost Password?</button>
                <button id="login_register_btn" type="button" class="btn btn-link">Register</button>	-->
              </div>
            </div>
          </form>
          <!-- End # Login Form -->

          <!-- Begin | Lost Password Form -->
          <form id="lost-form" style="display:none;">
            <div class="modal-body">
              <div id="div-lost-msg">
                <div id="icon-lost-msg" class="glyphicon glyphicon-chevron-right"></div>
                <span id="text-lost-msg">Type your e-mail.</span>
              </div>
              <input id="lost_email" class="form-control" type="text" placeholder="E-Mail (type ERROR for error effect)" required>
            </div>
            <div class="modal-footer">
              <div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">Send</button>
              </div>
              <div>
                <button id="lost_login_btn" type="button" class="btn btn-link">Log In</button>
                <button id="lost_register_btn" type="button" class="btn btn-link">Register</button>
              </div>
            </div>
          </form>
          <!-- End | Lost Password Form -->

          <!-- Begin | Register Form -->
          <form id="register-form" style="display:none;">
            <div class="modal-body">
              <div id="div-register-msg">
                <div id="icon-register-msg" class="glyphicon glyphicon-chevron-right"></div>
                <span id="text-register-msg">Register an account.</span>
              </div>
              <input id="register_username" class="form-control" type="text" placeholder="Username (type ERROR for error effect)" required>
              <input id="register_email" class="form-control" type="text" placeholder="E-Mail" required>
              <input id="register_password" class="form-control" type="password" placeholder="Password" required>
            </div>
            <div class="modal-footer">
              <div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">Register</button>
              </div>
              <div>
                <button id="register_login_btn" type="button" class="btn btn-link">Log In</button>
                <button id="register_lost_btn" type="button" class="btn btn-link">Lost Password?</button>
              </div>
            </div>
          </form>
          <!-- End | Register Form -->

        </div>
        <!-- End # DIV Form -->

      </div>

    </div>
  </div>
</div>
