<!-- login.php -->

<div id="login-popup" class="popup">
    <div class="popup-content">
        <span class="close" onclick="closePopup('login-popup')">&times;</span>
        <h2>Login</h2>
        <form action="login_handler.php" method="POST">
           
        <input type="text" placeholder="E-mail or Username" name="email_username">
        <input type="password" placeholder="Password" name="password">
        <button type="submit" class="login-btn" name="login">LOGIN</button>
        <!-- <div class="forgot-btn">
        <button type = "button" onclick="forgotPopup()"> Forgot Password ? </button>
            </div> -->
        </form>
    </div>
</div>




  <div class="popup-container" id="forgot-popup">
    <div class="forgot popup">
      <form method="POST" action="forgotpassword.php">
        <h2>
          <span>RESET PASSWORD</span>
          <button type="reset" onclick="popup('forgot-popup')">X</button>
        </h2>
        <input type="email" placeholder="E-mail" name="email">
        <button type="submit" class="reset-btn" name="send-reset-link">SEND LINK</button>
      </form>
    </div>
  </div>

  <script>
function forgotPopup() {
      document.getElementById('login-popup').style.display = "none";
      document.getElementById('forgot-popup').style.display = "flex";
    }
    </script>
