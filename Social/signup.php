<?php
	include_once 'header.php';
?>

<section class="section">
	<div class="main">
        <h2>Signup</h2>
        <center>
            <form class="signup-form" action="BackEnd/signup.php" method="POST">
                <div>
                    <input type="text" name="first" placeholder="First Name">
                </div>
                <div>
                    <input type="text" name="last" placeholder="Last Name">
                </div>
                <div>
                    <input type="text" name="email" placeholder="E-mail">
                </div>
                <div>
                    <input type="text" name="username" placeholder="Username">
                </div>
                <div>
                    <input type="password" name="password" placeholder="Password">
                </div>
                <div>
                    <input type="password" name="cnfpassword" placeholder="Confirm Password">
                </div>
            
                <button type="submit" name="submit">Sign up</button>
            </form>
        </center>
	</div>
</section>

<?php
	include_once 'footer.php';
?>