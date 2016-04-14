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





        <?php

        $bb = $_GET['bbname'];
        $bbid = $_GET['bbid'];

        $sesh = $_SESSION['user'];
        echo "<p>Want to Add a Room to <strong>".$bb;
        echo"?</strong></p>"



        ?>
</div>
</section>




<section class="container" id="content2">



    <form action="bbRoomReviewPage.php" method="POST">

        <table class="table3">
            <tr><td colspan="3"><p>* Required Fields</p></td>
                </tr>
            <tr>
                <td><label for="bbname">B&B Name: *</label></td>
                <td><select id="bbname" class="inputform" name="bbname"><option value="<?php echo"".$bb ?>"><?php echo"".$bb ?></option></td>
                <td><label for="nbrofpeople">Room Sleeps: *</label></td>
                <td><select class="inputform" id="nbrofpeople" name="nbrofpeople">
                        <option value="">Room Capacity</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="roomname">Room Name: *</label></td>
                <td><input type="text" id="roomname" class="inputform" name="roomname" placeholder="Enter Room Name" size="20" maxlength="25" required /></td>
                <td><label for="roomtype">Room Type: *</label></td>
                <td><select class="inputform" id="roomtype" name="roomtype">
                        <option value="">Room Type</option>
                        <option value="single">Single Room</option>
                        <option value="double">Double Room</option>
                        <option value="family">Family Room</option>
                    </select>
                </td>
                     </tr>
            <tr>
                <td><label for="roomdescription">Room Description: *</label></td>
                <td><input type="text" id="roomdescription" class="inputform" name="roomdescription" placeholder="Enter Room Description" size="30" maxlength="50" required /></td>
                <td><label for="en-suite">En-Suite: *</label></td>
                <td><select class="inputform" id="en-suite" name="en-suite">
                        <option value="">En-Suite</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </td>
                      </tr>
            <tr>
                <td><label for="price">Price: *</label></td>
                <td><input type="text" id="price" class="inputform" name="price" placeholder="Enter Price Per Night" size="20" maxlength="10" required /></td>
                <td><label for="imageurl">Image URL: *</label></td>
                <td><input type="text" id="imageurl" class="inputform" name="imageurl" placeholder="Enter Image URL" size="30" maxlength="50" required /></td>
                <td hidden><label for="bbid">B&B ID: *</label></td>
                <td hidden><input type="text" id="bbid" class="inputform" name="bbid" value="<?php echo"".$bbid ?>" size="20" maxlength="10" readonly /></td>
                </tr>
            <tr>
                <td colspan="4"><p><input type="submit" value="Submit" class="btn3" /></p></td>
                </tr>
        </table></form>

                </section>
                <section class="spacer" id="spacer">


                </section>

<section class="container" id="featured">
    <div class="centre">

        <p>Want to add more images?</p>
    </div>
</section>


<section class="container" id="content2">



    <form action="bbRoomReviewPage.php" method="POST">

        <table class="table3">

            <tr>
                <td><label for="bbname">B&B Name: *</label></td>
                <td><select id="bbname" class="inputform" name="bbname"><option value="<?php echo"".$bb ?>"><?php echo"".$bb ?></option></td>
                </tr>
            <tr>
                <td><label for="imageurl">1st Image URL: *</label></td>
                <td><input type="text" id="imageurl" class="inputform" name="imageurl" placeholder="Enter Image URL" size="30" maxlength="50" required /></td>
                <td><label for="imageurl">4th Image URL: *</label></td>
                <td><input type="text" id="imageurl" class="inputform" name="imageurl" placeholder="Enter Image URL" size="30" maxlength="50" required /></td>
            </tr>
            <tr>
                <td><label for="imageurl">2nd Image URL: *</label></td>
                <td><input type="text" id="imageurl" class="inputform" name="imageurl" placeholder="Enter Image URL" size="30" maxlength="50" required /></td>
                <td><label for="imageurl">5th Image URL: *</label></td>
                <td><input type="text" id="imageurl" class="inputform" name="imageurl" placeholder="Enter Image URL" size="30" maxlength="50" required /></td>
            </tr>
            <tr>
                <td><label for="imageurl">3rd Image URL: *</label></td>
                <td><input type="text" id="imageurl" class="inputform" name="imageurl" placeholder="Enter Image URL" size="30" maxlength="50" required /></td>
                <td><label for="imageurl">6th Image URL: *</label></td>
                <td><input type="text" id="imageurl" class="inputform" name="imageurl" placeholder="Enter Image URL" size="30" maxlength="50" required /></td>
                <td hidden><label for="bbid">B&B ID: *</label></td>
                <td hidden><input type="text" id="bbid" class="inputform" name="bbid" value="<?php echo"".$bbid ?>" size="20" maxlength="10" readonly /></td>
            </tr>
            <tr>
                <td colspan="4"><p><input type="submit" value="Submit" class="btn3" /></p></td>
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