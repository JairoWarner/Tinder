<?php

include("includes/header.php");

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="includes/main.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places"></script> -->

    <title>Register here</title>
</head>
<body>


 <main>
 <script>
    // Function to limit the number of selected checkboxes
    function limitSelections(checkbox) {
      var checkboxes = document.getElementsByName('hobby');
      var selectedCount = 0;

      // Count the number of selected checkboxes
      for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
          selectedCount++;
        }
      }

      // Disable or enable checkboxes based on the selected count
      for (var i = 0; i < checkboxes.length; i++) {
        checkboxes[i].disabled = selectedCount >= 5 && !checkboxes[i].checked && checkboxes[i] !== checkbox;
      }
    }
  </script>
  
  <div class="content">
        <div class="accountPage">     
            <div class="tinderCard">
                <div class="accountItems">
                    <h1>Register new account:</h1>
                    <div class="accountForm">       
                        <form action="register.php" method="POST" id="register" enctype="multipart/form-data"> 
                            <label for="email">E-mail:</label>
                            <input type="email" name="email" id="email" required>
                            <p id="emailMessage"></p>
<br><br>                     
                            <label for="password">Password:</label>
                            <input type="password" id="password" name="password" required>
                            <br>   
                            <label for="confirm_password">Confirm Password:</label>
                            <input type="password" id="confirm_password" name="confirm_password" required>
                            <p id="passwordMessage"></p>
 
                            
                            <label for="naam">Naam:</label>
                            <input type="text" name="naam" id="naam" required><br><br>

                            <label for="achternaam">Achternaam:</label>
                            <input type="text" name="achternaam" id="achternaam" required><br><br>

                            <label for="geboorteDatum">Geboorte Datum:</label>
                            <input type="date" name="geboorteDatum" id="geboorteDatum" required><br><br>

                            <label for="geslacht">Geslacht:</label>
                            <select name="geslacht" id="geslacht" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                            </select><br><br>
                            <label for="country">Country:</label>
  <select name="country" id="country" required>
    <option value="">Select Country</option>
    <option value="Netherlands">Netherlands</option>
    <option value="United States">United States</option>
    <option value="United Kingdom">United Kingdom</option>
  </select><br><br>

  <label for="postcode">Postcode:</label>
  <input type="text" name="postcode" id="postcode" required><br><br>

  <label for="address">Address:</label>
  <select name="address" id="address"></select><br><br>


                           
                             <label for="sexualOri">Sexual Ori:</label>
                            <select name="sexualOri" id="sexualOri" required>
                            <option value="straight">Straight</option>
                            <option value="biSexual">BiSexual</option>
                            <option value="gay">Gay</option>
                            </select><br><br>
                            <label for="schoolBaan">School/Baan:</label>
                            <input type="text" name="schoolBaan" id="schoolBaan" required><br><br>
<!-- 
                            <label for="interesses">Interesses:</label>
                            <input type="text" name="interesses" id="interesses" required><br><br> -->
                            <!-- <label>
                            <h3>Hobbies Selection</h3>
                            <form>
                                <input type="checkbox" name="hobby" value="reading" onchange="limitSelections(this)"> Reading
                                <input type="checkbox" name="hobby" value="music" onchange="limitSelections(this)"> Music
                                <input type="checkbox" name="hobby" value="sports" onchange="limitSelections(this)"> Sports
                                <input type="checkbox" name="hobby" value="cooking" onchange="limitSelections(this)"> Cooking
                                <input type="checkbox" name="hobby" value="traveling" onchange="limitSelections(this)"> Traveling
                                <input type="checkbox" name="hobby" value="painting" onchange="limitSelections(this)"> Painting<br>
                                <input type="checkbox" name="hobby" value="photography" onchange="limitSelections(this)"> Photography
                                <input type="checkbox" name="hobby" value="gardening" onchange="limitSelections(this)"> Gardening
                                <input type="checkbox" name="hobby" value="movies" onchange="limitSelections(this)"> Movies
                                <input type="checkbox" name="hobby" value="gaming" onchange="limitSelections(this)"> Gaming
                            </form>
                            </label> -->
                            <label for="fotos">Fotos:</label>
                            <input type="file" name="fotos" id="fotos"><br><br>

                            <label for="showMe">Show Me:</label>
                            <select name="showMe" id="showMe" required>
                            <option value="Both">Both</option>
                            <option value="Men">Men</option>
                            <option value="Woman">Woman</option>
                            </select><br><br>

                            <label for="leeftijd">Leeftijd:</label>
                            <input type="number" name="leeftijd" id="leeftijd" required><br><br>

                            <label for="ageRange">Age Range:</label>
                            <div id="ageSlider">
                                <input type="range" id="minAge" min="18" max="100" value="18" oninput="updateAgeRange()" />
                                <input type="range" id="maxAge" min="18" max="100" value="100" oninput="updateAgeRange()" />

                            <div id="ageRangeLabel"></div>
                            <input type="hidden" id="ageRange" name="ageRange" value="" />
                            </div>


                            <label for="bio">Bio:</label>
                            <textarea name="bio" id="bio" required></textarea><br><br>

                            <div id="messagePHP"><?php

                                if (isset($_SESSION['message'])) {
                                    echo $_SESSION['message'];
                                    unset($_SESSION['message']);
                                }
                                ?>
                            </div>

                            <input type="submit" name="register" value="register">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
function updateAgeRange() {
  var minAge = parseInt(document.getElementById("minAge").value);
  var maxAge = parseInt(document.getElementById("maxAge").value);
  var ageRangeLabel = document.getElementById("ageRangeLabel");
    var ageRangeInput = document.getElementById("ageRange");

  if (minAge >= maxAge) {
    minAge = maxAge - 1;
    document.getElementById("minAge").value = minAge;
  }
  ageRangeLabel.textContent = minAge + " - " + maxAge;
    ageRangeInput.value = minAge + "-" + maxAge;

  var ageSlider = document.getElementById("ageSlider");
  var rangeWidth = ageSlider.clientWidth;
  var minPercent = ((minAge - 18) / 82) * 100;
  var maxPercent = ((maxAge - 18) / 82) * 100;

  var ageRangeLabel = document.getElementById("ageRangeLabel");
  ageRangeLabel.innerHTML = "Min Age: " + minAge + " | Max Age: " + maxAge;
}




    var form = document.getElementById("register");
    const password = document.getElementById("password");
    const confirmPassword = document.getElementById("confirm_password");
    const passwordMessage = document.getElementById("passwordMessage");
    const emailMessage = document.getElementById("emailMessage");
    const emailInput = document.getElementById("email");
    const curseWords = ["fuck", "hell","crap", "damn", "ass", "hoe", "whore", "kanker", "kut", "tering" , "shite", "nigger", "nigga" ,"shit", "bitch"];
    var maxemailLength = 22;
    
    //Add event listener for form submit
        form.addEventListener("submit", function(event) {
            // Get the current email
            var email = emailInput.value;

            // Check if the email is too long
            if (email.length > maxemailLength) {
                // Prevent form from being submitted
                event.preventDefault();
                // Show error message
                emailMessage.innerHTML = 'The email cannot be longer than ' + maxemailLength + ' characters';
                // alert("Sorry, the email cannot be longer than " + maxemailLength + " characters.");
            } else if (password.value !== confirmPassword.value) {
                passwordMessage.innerHTML = "Passwords do not match. Please try again.";
                event.preventDefault();
            } else {
                    for (var i = 0; i < curseWords.length; i++) {
                        // Check if the input value contains the curse word
                        if (email.indexOf(curseWords[i]) !== -1) {
                            event.preventDefault();

                            // Alert the user that the input contains a curse word
                            emailMessage.innerHTML ="The email contains a curse word, please enter a different email.";

                            // Clear the input field
                            email.value = "";
                            break;
                        }
                    }
            }
        });



    $(document).ready(function() {
      $('#country, #postcode').on('input', function() {
        var country = $('#country').val();
        var postcode = $('#postcode').val();

        if (country && postcode) {
            var query = postcode + ', ' + country;
            var url = `https://nominatim.openstreetmap.org/search?q=${encodeURIComponent(query)}&format=json&addressdetails=1`;
          // Make an HTTP request to your server-side endpoint that retrieves address options based on country and postcode
          $.getJSON(url, function(data) {
            if (data.length > 0) {
              var options = '';
              data.forEach(function(result) {
                var addressLine = result.address.road || '';
                var city = result.address.city || '';
                var country = result.address.country || '';
                var address = addressLine + ', ' + city + ', ' + country;
                options += '<option value="' + address + '">' + address + '</option>';
              });
              $('#address').html(options);
            } else {
              $('#address').html('<option value="">No addresses found</option>');
            }
          });
        } else {
          $('#address').html('');
        }
      });
    });
  </script>

  <style>
       .registerForm {
            padding: 10px;
            margin: 10px;
        }

        input , select, textarea{
            max-width: 200px;
            /* box-sizing: border-box; */
            /* background-image: url('img/gif.gif'); */
        }
        #emailMessage, #passwordMessage, #messagePHP{
            color: red;
        }

  </style>

<?php require 'includes/footer.php'?>

</body>
</html>
