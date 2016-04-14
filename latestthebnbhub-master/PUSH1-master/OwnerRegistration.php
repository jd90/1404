<?php
session_start();
?>

<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <link rel="icon"
                  type="image/png"
                  href="assets/b&bicon.png">
            <link type="text/css" rel="stylesheet" href="style.css"/>
            <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,800' rel='stylesheet' type='text/css'>
            <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
            <title>Register: theB&Bhub</title>
        </head>
        <body>

        <section class="container" id="banner">
            <div class="floatleft">
                <img src = "assets/bnblogocroporange.png" id="img">
            </div>
            <div class="floatright">

    <?php
    if ($_SESSION["user"] != null) {
        echo "<p id='loginText'>Currently signed in as: " . $_SESSION["user"];
    echo "    not you?</p><button id='logout()' onclick='logout()'>LOGOUT</button>";
    }else{
    echo "<p id='loginText'>currently not logged in";
    }

    ?>
    <script>
        function logout() {

            window.location = "SearchBB.php";
        }
    </script>

    </div>
</section>
        <section class="container" id="navigation2">
            <div>
                <nav role="main">
                    <ul>
                        <li><a href="help.php#helpsection">Help</a></li>
                        <li><a href="help.php#contactsection">Contact</a></li>
                        <li><a href="B&Bregistration.php">Register</a></li>
                        <li><a href="OwnerSignIn.php">Member Area</a></li>
                        <li><a href="SearchBB.php">Search</a></li>
                    </ul>
                </nav>
            </div>
        </section>


<section class="spacer" id="spacer">


</section>



<section class="container" id="featured">
    <div class="centre">

        <p>Register to list your Property</p>
    </div>
</section>



        <section class="container" id="content2">
            <form action="ownerRegistrationResultPage.php" method="post" id="form">

                <table class="table1">

                    <tr><td class="smallfont"><p>* Required Fields</p></td></tr>
                    <tr><td>
                            <label for="title">Title: *</label></td>
                        <td><select class="inputform" id="title" name="title">
                                <option value="">Select Title</option>
                                <option value="Mr">Mr</option>
                                <option value="Mrs">Mrs</option>
                                <option value="Miss">Miss</option>
                                <option value="Ms">Ms</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td><label for="firstname">First Name: *</label></td>
                        <td><input type="text" class="inputform" id="firstname" name="firstname" placeholder="Enter your First Name" size="20" maxlength="25" required /></td>
                    </tr>
                    <tr>
                        <td><label for="surname">Surname: *</label></td>
                        <td><input type="text" class="inputform" id="surname" name="surname" placeholder="Enter your Surname" size="20" maxlength="25" required /></td>
                    </tr>

                    <tr><td>
                            <label for="address">Address: *</label></td>
                        <td><input type="text" class="inputform" id="address" name="address" placeholder="Enter the first line of the Address" size="30" maxlength="50" required /></td>
                    </tr>

                    <tr><td>
                            <label for="address2">Address Line 2: *</label></td>
                        <td><input type="text" class="inputform" id="address2" name="address2" placeholder="Enter the second line of your Address" size="30" maxlength="50" required /></td>
                    </tr>

                    <tr><td>
                            <label for="postcode">Postcode: *</label></td>
                        <td><input type="text" class="inputform" id="postcode" name="postcode" placeholder="Enter the Postcode" size="20" maxlength="8" required /></td>
                    </tr>

                    <tr><td>
                            <label for="city">City: *</label></td>
                        <td><input type="text" class="inputform" id="city" name="city" placeholder="Enter City Name" size="20" maxlength="20" required /></td>
                    </tr>

                    <tr><td>
                            <label for="telephone">Telephone: *</label></td>
                        <td><input type="text" class="inputform" id="telephone" name="telephone" placeholder="Enter your Telephone Number" size="20" maxlength="20" required /></td>
                    </tr>

                    <tr><td>
                            <label for="mobile">Mobile Telephone: *</label></td>
                        <td><input type="text" class="inputform" id="mobile" name="mobile" placeholder="Enter your Mobile Telephone Number" size="20" maxlength="20" required /></td>
                    </tr>

                    <tr><td>
                            <label for="email">Email: *</label></td>
                        <td><input type="text" class="inputform" id="email" name="email" placeholder="Enter Email Address" size="20" maxlength="50" required /></td>
                    </tr>
                    <tr>
                        <td><label for="password">Password: *</label></td>
                        <td>    <input type="password" class="inputform" id="password" name="password" placeholder="Enter a Password" size="20" maxlength="25" required>
                        </td>
                    </tr>

                    <tr>
                        <td><label for="password2">Retype Password: *</label></td>
                        <td><input type="password" class="inputform" id="password2" name="password2" placeholder="Enter Password again" size="20" maxlength="25" required>
                        </td>
                    </tr>

                    <tr><td></td>
                        <td><p><input type="submit" value="Submit" class="btn3" /></p></td>
                    </tr>

                    <tr><td></td>
                        <td><a href="help.php#helpsection" id="textlink" target="_blank">need help?</a></td>
                    </tr>
                </table></form>

        </section>
        <section class="spacer" id="spacer">


        </section>

        <section class="container" id="foot">

            <div id="footernav">
                <nav role="sub">
                    <ul>
                        <li><a href="SearchBB.php">Search</a></li>
                        <li><a href="OwnerSignIn.php">Member Area</a></li>
                        <li><a href="B&Bregistration.html">Register</a></li>
                        <li><a href="help.php#contactsection">Contact</a></li>
                        <li><a href="help.php#helpsection">Help</a></li>
                    </ul>
                </nav>
            </div>
            <p>&nbsp;</p>
            <div id="copyright">
                <hr width="100%" size="1">
                <p>Copyright. Team D Solutions.</p>
            </div>

        </section>

</body>
</html>