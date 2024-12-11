<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Linking the fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    
    <!-- Linking the stylesheet -->
    <link rel="stylesheet" href="styles.css">

    <!-- Title of the home page -->
    <title>Home Page</title>
</head>
<body class="home">
    <header>
        <h1>Conversion Tool</h1>
        <br><br>
    </header>
    

    <!-- Creating a form for entering the user name and password -->
    <form method="POST">

    <!-- Label for entering user id (login id) -->
        <div class="credentials">
            
            <h2>Login</h2>
            <!-- Input for entering the user ID -->
            <input type="text" placeholder="Username" name="userID" id="userID"></input> <br>

            <!-- Input for entering the password -->
            <input type="password" placeholder="Password" name="password" id="password"></input><br>

            <!-- Submit button to check the credentials -->
            <input type="submit" id="submit" value="Sign In">

        </div>

        <!-- div to show if login succesfful or failed -->
         <!-- Based on php if condition can be used -->
        <!-- <div class="login_success"><</div> -->
        <!-- <div class="login_fail"><</div> -->
    </form>
    
    <?php
        // Checking if the request method is POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Checking if user id is correct
            if ( $_POST["userID"] == "admin")
            {                
                // Checking if password is correct
                if ( $_POST["password"] == "1234")
                {             
                    echo "<script>
                            setTimeout(function(){window.location.href = 'conversion.php';}); 
                          </script>";  
                }
            
                else {
                    echo "Incorrect Password<br>Try Again";            
                }
            }

            else{
                echo "Incorrect User Id<br>Try Again";
            }
        }
    ?>
    
</body>
</html>