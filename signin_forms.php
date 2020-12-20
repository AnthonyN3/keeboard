<section id="contact">
    <!-- Register -->
    <div class="social column">
        <h3>Register</h3>
        <form action="php/register.php" method="post">
            <label>First name: </label><input type="text" name="firstname" id="firstname" required /><br>
            <label>Last name: </label><input type="text" name="lastname" id="lastname" required /><br>
            <label>User Type: </label><select name="users"><br>
                <option value="1">user</option>
                <option value="2">admin</option>
                </select><br>
            <label>E-mail:       </label><input type="email" name="email" id="email" required/><br>
            <label>Password: </label><input type="password" name="password" id="password" required/><br>
            <input value="Sign up" type="submit" />
        </form>
    </div>

    <!-- sign in -->
    <div class="column">
        <h3>Already a User?</h3>
        <!-- </header> -->
        <form method="POST" action="php/login.php">
        <br><label>E-mail: </label><input type="email" name="email" id="email" required/><br>
        <br><label>Password: </label><input type="password" name="password" id="password" required/><br>
        <br><input value="log in" type="submit" />
        </form>
    </div>
</section>

<div style="text-align: center;">
    <?php
        if (isset($_SESSION['error'])) {
            echo "<a style='color: red'>{$_SESSION['error']}</a>";
            echo '<br><br>';
            unset($_SESSION['error']); // clear the error in the $_SESSION array
        }
    ?>
</div>