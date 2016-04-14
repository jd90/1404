

$(document).ready(function(){
    $("#submit").click(function(){
        var email = $("#email").val();
        var password = $("#password").val();
// Returns successful data submission message when the entered information is stored in database.
        var dataString = 'email='+ email + '&password='+ password;
        if(email==''||password=='')
        {
            alert("Please Fill All Fields");
        }
        else
        {var loader = "<div id='loader' class='loader'></div>";
            $('body').append(loader);
// AJAX Code To Submit Form.
            $.ajax({


                type: "POST",
                url: "ajax-example.php",
                data: dataString,
                cache: false,
                success: function(result){

                    if(result=="username or password is wrong"){
                        $('#loader').remove();
                    $("#result").html(result);
                    }
                    else{
                        $('#loader').remove();
                        alert("That's you signed in!!");

                        var form = $('<form action="SearchBB.php" method="POST">' +
                            '<input hidden type="text" name="user" value="'+email+'" />' +
                            '<input hidden type="text" name="ownerid" value="'+result+'" />' +
                            '</form>');
                        $('body').append(form);
                        form.submit();
                        //$.session.set("user", ""+email);
                        //window.location.href = "http://bbhubapp.azurewebsites.net/Home.php";
                    }


                }
            });
        }
        return false;
    });
});