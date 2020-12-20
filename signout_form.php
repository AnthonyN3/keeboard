<!--
<section id="contact" style="text-align: center;">
    <div class="social">
        <h3>Account</h3>
        </header>
            <form method="POST" action="php/logout.php">
            <br><br>
            <br><input value="log out" type="submit" />
            </form>
    </div>
</section> -->

<!-- echo "{$_SESSION['id']} {$_SESSION['fname']} {$_SESSION['fname']} {$_SESSION['code']} {$_SESSION['email']}"; -->


<div style="text-align: center;">
    <h3>
        First name: <?php echo "${_SESSION['fname']}";?> <br>
        Last Name:  <?php echo "${_SESSION['lname']}";?> <br>
        email:      <?php echo "${_SESSION['email']}";?> <br>
        id:          <?php echo "${_SESSION['id']}";?> <br>
        type:       <?php if($_SESSION['code']==1){ echo "user";} else { echo "admin";};?> 
    </h3>
    <form method="POST" action="php/logout.php" style="text-align: center;">
        <br><br>
        <br><input value="log out" type="submit"  />
    </form>
    <br><br><br>
</div>
