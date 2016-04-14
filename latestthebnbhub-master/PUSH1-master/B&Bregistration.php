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
    <title>Register B&B: theB&Bhub</title>
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

            //header("Location: OwnerReviewPage.php"); ||



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

        <p>Bed and breakfast registration form</p>
    </div>
</section>



<section>




        <form action="bbReviewPage.php" method="POST">

            <table class="table3">
                <tr><td colspan="3"><p>* Required Fields</p></td>

                <tr>
                    <td><label for="bbname">B&B Name: *</label></td>
                    <td><input id="bbname" type="text" class="inputform" name="bbname" placeholder="Enter B&B Name" size="20" maxlength="30" required /></td>
                    <td><label for="bbdescription">B&B Description: *</label></td>
                    <td><input id="bbdescription" type="text" class="inputform" name="bbdescription" placeholder="Enter B&B Description" size="30" maxlength="50" required /></td>
                    <td><label  for="checkin">Check-in Time: *</label></td>
                    <td><select id="checkin" class="inputform" name="checkin">
                            <option value="">Check-in Time</option>
                            <option value="9">09:00:00</option>
                            <option value="10">10:00:00</option>
                            <option value="11">11:00:00</option>
                            <option value="12">12:00:00</option>
                            <option value="13">13:00:00</option>
                            <option value="14">14:00:00</option>
                            <option value="15">15:00:00</option>
                            <option value="16">16:00:00</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="address">Address: *</label></td>
                    <td><input id="address" type="text" class="inputform" name="address" placeholder="Enter the first line of the Address" size="30" maxlength="50" required /></td>
                    <td><label for="telephone">Telephone: *</label></td>
                    <td><input id="telephone" type="text" class="inputform" name="telephone" placeholder="Enter your Telephone Number" size="20" maxlength="20" required /></td>
                    <td><label  for="checkout">Check-out Time: *</label></td>
                    <td><select id="checkout" class="inputform" name="checkout">
                            <option value="">Check-out Time</option>
                            <option value="9">09:00:00</option>
                            <option value="10">10:00:00</option>
                            <option value="11">11:00:00</option>
                            <option value="12">12:00:00</option>
                            <option value="13">13:00:00</option>
                            <option value="14">14:00:00</option>
                            <option value="15">15:00:00</option>
                            <option value="16">16:00:00</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="address2">Address Line 2: *</label></td>
                    <td><input id="address2" type="text" class="inputform" name="address2" placeholder="Enter the second line of the Address" size="30" maxlength="50" required /></td>
                    <td><label for="mobile">Mobile: *</label></td>
                    <td><input id="mobile" type="text" class="inputform" name="mobile" placeholder="Enter your Mobile Number" size="20" maxlength="20" required /></td>
                    <td><label for="picture">Image URL: *</label></td>
                    <td><input id="picture" type="text" class="inputform" name="picture" placeholder="Enter Image URL" size="30" maxlength="250" required /></td>
                </tr>
                <tr>
                    <td><label for="postcode">Postcode: *</label></td>
                    <td><input id="postcode" type="text" class="inputform" name="postcode" placeholder="Enter the Postcode" size="20" maxlength="8" required /></td>
                    <td><label for="email">Email: *</label></td>
                    <td><input id="email" type="text" class="inputform" name="email" placeholder="Enter you Email Address" size="30" maxlength="50" required /></td>
                    <td><label  for="pets">Pets Allowed: *</label></td>
                    <td><select id="pets" class="inputform" name="pets">
                            <option value="">Yes or No</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="city">City: *</label></td>
                    <td><input id="city" type="text" class="inputform" name="city" placeholder=" Enter City" size="20" maxlength="20" required /></td>
                    <td><label for="latitude">Latitude: *</label></td>
                    <td><input id="latitude" type="text" class="inputform" name="latitude" placeholder="Enter the Latitude of B&B" size="20" maxlength="20" required /></td>
                    <td><label hidden for="ownerid">Owner ID: *</label></td>
                    <td><input hidden id="ownerid" type="text" class="inputform" name="ownerid" value="<?php echo"".$_SESSION['ownerid'];?>" size="20" maxlength="10" readonly /></td>
                </tr>
                <tr>
                    <td><label  for="region">Region: *</label></td>
                    <td><select id="region" class="inputform" name="region">
                            <option value="">Select Region</option>
                            <option value="london">London</option>
                            <option value="southeast">South East</option>
                            <option value="southwest">South West</option>
                            <option value="eastmidlands">East Midlands</option>
                            <option value="westmidlands">West Midlands</option>
                            <option value="yorkshireandthehumber">Yorkshire and the Humber</option>
                            <option value="west">West</option>
                            <option value="east">East</option>
                            <option value="northeast">North East</option>
                            <option value="wales">Wales</option>
                            <option value="scotland">Scotland</option>
                            <option value="northernireland">Northern Ireland</option>
                       </select>
                    </td>
                    <td><label for="longitude">Longitude: *</label></td>
                    <td><input id="longitude" type="text" class="inputform" name="longitude" placeholder="Enter Longitude of B&B" size="20" maxlength="20" required /></td>

                </tr>
                <tr>
                    <td colspan="6"><p><input type="submit" value="Submit" class="btn3" /></p></td>
                </tr>

            </table></form>


    </section>



    <section class="spacer" id="spacer">


    </section>

<section class="container" id="featured">
    <div class="centre">

        <p>Need help with the form?</p>
    </div>
</section>


<section id="mycontainer">

    <button class="accordion">&nbsp;&nbsp;&nbsp;Adding your Bed and Breakfast Name</button>
    <div class="panel">
        <p>Enter the name of your Bed and Breakfast as you want it displayed on the website.</p>
        <p>This will be the name that is returned within the search results.</p>
        <p> You can use letters, numbers and special characters up to a maximum of 50 characters.</p>
    </div>

    <button class="accordion">&nbsp;&nbsp;&nbsp;Adding the Address of your Bed and Breakfast</button>
    <div class="panel">
        <p>Enter the address of your Bed and Breakfast.</p>
        <p> Do NOT include the City and Postcode in the address field as these are seperate fields in the form.</p>
        <p>There are two address line fields allowing up to 50 characters in each address field.</p>
    </div>

    <button class="accordion">&nbsp;&nbsp;&nbsp;Adding the City of your Bed and Breakfast</button>
    <div class="panel">
        <p>Enter the City your Bed and Breakfast is located.</p>
        <p>This will be the field the website will search on when searching by City so please enter the information correctly.</p>
        <p>The field allows up to a maximum of 20 characters. </p>
    </div>


    <button class="accordion">&nbsp;&nbsp;&nbsp;Adding the Telephone Numbers of your Bed and Breakfast</button>
    <div class="panel">
        <p>You can have up to a maximum of 20 characters in the Telephone and Mobile fields of the form.</p>
        <p>You can include National and International dialling codes.</p>
        <p>Only landlines will be displayed on the website.</p>
    </div>


    <button class="accordion">&nbsp;&nbsp;&nbsp;Adding the Email Address of the Bed and Breakast</button>
    <div class="panel">
        <p>Add the email address of the Bed and Breakfast.</p>
        <p>The email address will be posted within your listing and will be the address guests will use to contact you.</p>
        <p>You can have up to a maximum of 50 characters.</p>
    </div>

    <button class="accordion">&nbsp;&nbsp;&nbsp;Adding a Description of the Bed and Breakfast</button>
    <div class="panel">
        <p>Enter a description of your Bed and Breadfast up to a maximum of 250 characters.</p>
        <p>The description will be posted in both the search results and the booking page of the website.</p>
        <p>You should provide a general description of the Bed and Breakfast and the services provided.</p>
    </div>


    <button class="accordion">&nbsp;&nbsp;&nbsp;Adding a Room Description for your Bed and Breakfast</button>
    <div class="panel">
        <p>Enter a description of the Room in your Bed and Breadfast up to a maximum of 250 characters</p>
        <p>The description will be posted only in the booking page of the website.</p>
        <p>You should provide a general description of the Room and services.</p>
    </div>

    <button class="accordion">&nbsp;&nbsp;&nbsp;Select a Check In Time</button>
    <div class="panel">
        <p>Select the time guests are allowed to check-in from the dropdown menu provided.</p>
    </div>


    <button class="accordion">&nbsp;&nbsp;&nbsp;Select a Check Out Time</button>
    <div class="panel">
        <p>Select the time guests have to check-out by from the dropdown menu provided.</p>
    </div>

    <button class="accordion">&nbsp;&nbsp;&nbsp;Upload Images of your Bed and Breakfast</button>
    <div class="panel">
        <p>Use the fields provided to upload images of your Bed and Breakfast to the website.</p>
        <p>theB&Bhub do not currently host images. Therefore you are required to provide the url's of the
            images that are hosted by yourself or a third party in order to display them on the website.</p>
        <p>The fields will accept url's of up to a maximum of 250 characters.</p>

    </div>

    <button class="accordion lastaccordion">&nbsp;&nbsp;&nbsp;Stipulating your Bed and Breakfasts policy on Pets</button>
    <div id="foo" class="panel lastpanel">
        <p>Select whether or not your Bed and Breakfast allows guests to bring pets.</p>
        <p>Simply select yes or no from the dropdown menu provided.</p>
    </div>

    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].onclick = function(){
                this.classList.toggle("active");
                this.nextElementSibling.classList.toggle("show");
            }
        }
    </script>


</section>




<section class="spacer" id="spacer">


</section>

<section class="container" id="foot">

    <div id="footernav">
        <nav role="sub">
            <ul>
                <li><a href="SearchBB.php">Search</a></li>
                <li><a href="OwnerSignIn.php">Member Area</a></li>
                <li><a href="B&Bregistration.php">Register</a></li>
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