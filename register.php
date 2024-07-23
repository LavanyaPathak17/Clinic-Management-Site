<!-- register.php -->

<div id="register-popup" class="popup">
    <div class="popup-content">
        <span class="close" onclick="closePopup('register-popup')">&times;</span>
        <h2>Register</h2>
        <form action="register_handler.php" method="POST">
           
        <input type="text" placeholder="Full Name" name="fullname">
        <input type="text" placeholder="Username" name="username">
        <input type="email" placeholder="E-mail" name="email">
        <input type="password" placeholder="Password" name="password">
        <button type="submit" class="register-btn" name="register">REGISTER</button>
        </form>
    </div>
</div>
