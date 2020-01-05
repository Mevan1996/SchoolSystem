<?php
include_once 'header.php';
?>
    <section class="main-container">
        <form class="signup-form" action="includes/signup.inc.php" method="POST">
            <h2 class="signup">Sign Up</h2>
            <input type="text" name="first" placeholder="First Name">
            <input type="text" name="last" placeholder="Last Name">
            <input type="text" name="email" placeholder="E-mail">
            <input type="text" name="uid" placeholder="User Name">
            <input type="password" name="pwd" placeholder="Password">
            <input type="password" name="repwd" placeholder="Retype Password">
            <select  name="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
            <input type="date" name="dob" placeholder="Date of Birth">
            <input type="number" name="age" placeholder="Age">
            <select  name="role">
                <option value="teacher">I am a Teacher</option>
                <option value="student">I am a Student</option>
                <option value="administrator">I am an Administrator</option>
                <option value="alumni">I am an Alumni Member</option>
            </select>
            <button type="submit" name="submit">Sign Up</button>
        </form>
    </section>
    </body>
    </html>
<?php
include_once 'footer.php';
?>