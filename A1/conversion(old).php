<!-- Starting a session -->
<?php
    session_start();
?>

<body class="conversion">
    <header>
        <h1><a href="index.php">Conversion Tool</h1></a></h1>
        <br><br>
    </header>

    <!--Declaring variables and functions -->
    <?php
        // $_SESSION["start"] = time();
        // $_SESSION["expire"] = $_SESSION["start"] + (30*60);
        // Variable to store the unit being used (will be reset everytime the page is refreshed or when reset is pressed)
        // Variable to store the choice of the category
        $_SESSION["Category"] = $_POST["category"];
        $_SESSION["From"] = $_POST["from"];
        $_SESSION["To"] = $_POST["to"];


        // Array to hold the categories
        $Categ_List = ["Length", "Volume", "Mass", "Temperature", "Speed", "Area","Time","Digital Storage"];
    
        // Array to hold different Units of each category
        $LenUnits = ["Kilometre","Metre","Centimetre","Miles","Inches","Feet"];
        $VolUnits = ["Litre","Millilitre","Gallons","Pints"];
        $MassUnits = ["Kilograms", "Pounds", "Grams", "Ounces", "Tonnes", "Milligrams", "Stones"];
        $TempUnits = ["Celcius","Fahreneheit","Kelvin"];
        $SpeedUnits = ["Kilometres per Hour", "Miles per Hour", "Metres per Second", "Feet per Second", "Knots", "Mach"];
        $AreaUnits = ["Square metres", "Square Feet", "Acres", "Square Inches", "Hectares", "Square Kilometres", "Square Miles"];
        $TimeUnits = ["Seconds", "Minutes", "Hours", "Days", "Weeks", "Months", "Years"];
        $DSUnits = ["Bytes", "Kilobytes", "Megabytes", "Gigabytes", "Terabytes", "Bits"]; 

        //Variables to hold values used for calculations
        $Num = 0;
        $Val = 0;

        function km_m($Num,$From) {
            //Checking the from value and calculating based on it
            if ($From == "Kilometre"){
                $Val = $Num * 1000;
                return $Val;
            }
            else {
                $Val = $Num / 1000;
                return $Val;

            }
        }

        function km_cm ($Num,$From){
            
            if ($From == "Kilometre"){
                $Val = $Num * 100000;
                return $Val;
            }
            else {
                $Val = $Num / 100000;
                return $Val;
            }
        }

        function km_miles ($Num,$From){
           
            if ($From == "Kilometre"){
                $Val = $Num * 0.62;
                return $Val;
            }
            else {
                $Val = $Num / 0.62;
                return $Val;
            }
        }

        function km_foot ($Num,$From) {

            if ($From == "Kilometre"){
                $Val = $Num * 100000;
                return $Val;
            }
            else {
                $Val = $Num / 100000;
                return $Val;
            }
        }
        function km_inch ($Num,$From) {
            
            if ($From == "Kilometre"){
                $Val = $Num * 100000;
                return $Val;
            }
            else {
                $Val = $Num / 100000;
                return $Val;
            }
        }
    
    ?>
    
    <div class="conversion">

        <!-- Form to select the category for conversion -->
        <form method = "POST">
            <label>Category</label><br>
            <!-- Select to choose the category -->
            <select id="category" name="category" >
                <!-- Using PHP to show options to save space -->
                <?php
                    // Loop through each unit in the array and create an <option> element
                    foreach ($Categ_List as $cat) {
                        //Showing each option
                        echo "<option ";
                        // Used to make sure that the option is selected even when submit is pressed
                        if ($_SERVER["REQUEST_METHOD"] == "POST"){if ($_POST["category"] == $cat) { echo "selected";}};
                        echo ">$cat</option>";
                        
                        echo "Category cannot be selected";
                        
                    }
                ?>
            </select>
            
            <input type="submit" id="btnSelectCat" value="Select">

            <?php

                $_SESSION["Categ"] = $_POST["category"];
                echo $_SESSION["Categ"];
                // Assigning the selected value to the variable (final choice)
                if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["category"])){                  
                    $Categ = $_POST["category"];
                    // echo "<br>Chosen Category is ".$Categ."<br>";
                }
            ?>

        </form>
        
        <br>
        <!-- Form which holds the units, value and convert or reset button -->
        <form method="POST">
            <!-- Division to hold two forms and arrow.Used for styling  -->
            <div class="from_to">

                <div class="from_label">
                    <label>From</label> 
                    <!-- Dropdown to choose unit -->
                    <select id="from" name="from" >
                        <!-- <option value="" disabled selected>Select a unit</option>  -->
                        <!-- Using PHP to show options to save space -->
                        <?php
                            // To show units based on the category chosen                      
                            switch ($Categ){
                                case "":
                                    echo "Ok";
                                    break;

                                case "Length":
                                    // Loop through each unit in the array and create an <option> element
                                    foreach ($LenUnits as $unit) {
                                        // echo "<option value=\"$unit\"> $unit</option>"; 

                                        echo "<option value=\"$unit\"";
                                        // Used to make sure that the option is selected even when submit is pressed
                                        if ($_SERVER["REQUEST_METHOD"] == "POST"){if ($_POST["from"] == $unit) { echo "selected";}};
                                        echo ">$unit</option>";
                        
                                    }
                                    break;

                                case "Volume":
                                    foreach ($VolUnits as $unit) {
                                        echo "<option value=\"$unit\"> $unit</option>";
                                    } 
                                    break;

                                case "Mass":
                                    foreach ($MassUnits as $unit) {
                                        echo "<option value=\"$unit\"> $unit</option>";
                                        }
                                    break; 

                                case "Temperature":                 
                                    foreach ($TempUnits as $unit) {
                                        echo "<option value=\"$unit\"> $unit</option>";
                                    } 
                                    break;

                                case "Speed":
                                    foreach ($SpeedUnits as $unit) {
                                        echo "<option value=\"$unit\"> $unit</option>";
                                    }
                                    break;

                                case "Area":
                                    foreach ($AreaUnits as $unit) {
                                        echo "<option value=\"$unit\"> $unit</option>";
                                    } 
                                    break;
    
                                case "Time":
                                    foreach ($TimeUnits as $unit) {
                                        echo "<option value=\"$unit\"> $unit</option>";
                                    }
                                    break;
                                        
                                case "Digital Storage":
                                    foreach ($DSUnits as $unit) {
                                        echo "<option value=\"$unit\"> $unit</option>";
                                    } 
                                    break;                                  
                                }
                        ?>
                    </select>
                        
                        <?php
                            // Assigning the selected value to the $Choice variable (final choice)
                            // $_POST["from"] selects the chosen from unit
                            if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["from"])){
                                $From = $_POST["from"];
                                
                            } 
                            // else{
                            //     echo "From is not set";
                            // }           
                        ?>
                </div>

                <!-- Div used for arrow mark -->
                <div class="arrow_right">
                    <i class="fa-solid fa-arrow-right"></i>
                </div>
                
                <div class="to_label">
                    <label>To</label>
                    <!-- Dropdown to choose unit -->
                    <select id="to" name="to" >
                    <!-- <option value="" disabled selected>Select a unit</option>  -->
                    <!-- Using PHP to show options to save space -->
                    <?php
                    // To show units based on the category chosen                      
                        switch ($Categ){
                            case "":
                                echo "Ok";
                                        break;

                                    case "Length":
                                        // Loop through each unit in the array and create an <option> element
                                        foreach ($LenUnits as $unit) {
                                            echo "<option value=\"$unit\"> $unit</option>"; 

                                            if ($_SERVER["REQUEST_METHOD"] == "POST"){if ($_POST["category"] == $cat) { echo "selected";}};
                                            echo ">$cat</option>";
                                        }
                                        break;

                                    case "Volume":
                                        
                                        foreach ($VolUnits as $unit) {
                                            echo "<option value=\"$unit\"> $unit</option>";
                                        } 
                                        break;
                                    case "Mass":
                                        
                                        foreach ($MassUnits as $unit) {
                                            echo "<option value=\"$unit\"> $unit</option>";
                                        }
                                        break; 
                                    case "Temperature":
                                        
                                        foreach ($TempUnits as $unit) {
                                            echo "<option value=\"$unit\"> $unit</option>";
                                        } 
                                        break;

                                    case "Speed":
                                        
                                        foreach ($SpeedUnits as $unit) {
                                            echo "<option value=\"$unit\"> $unit</option>";
                                        }
                                        break;

                                    case "Area":
                                        
                                        foreach ($AreaUnits as $unit) {
                                            echo "<option value=\"$unit\"> $unit</option>";
                                        } 
                                        break;

                                    case "Time":
                                        
                                        foreach ($TimeUnits as $unit) {
                                            echo "<option value=\"$unit\"> $unit</option>";
                                        }
                                        break;
                                        
                                    case "Digital Storage":
                                        
                                        foreach ($DSUnits as $unit) {
                                            echo "<option value=\"$unit\"> $unit</option>";
                                        } 
                                        break;                                      
                        }
                    ?>
                    </select> 
                </div>       

            </div>
            
            <br>
            <!-- Division to hold values and buttons used for styling (overall structure) -->
            <div>
                <!-- Seperating the value input boxes for stlying -->
                <div class="value">
                    <!-- Input for entering the value to convert -->
                    <input type="text" placeholder="Enter Value" name="categ" id="categ"></input>
                    <!-- Output to show the value -->
                    <!-- Default value of the input box is 0 (assigned earlier) -->
                    <input type="text" placeholder="Output" name="categ" id="categ" value="<?php echo $Val?>" readonly></input> 
                </div>                    
            </div>
            
            <?php
                $_SESSION["Category"]
            ?>
            <input type="submit" id="btnCalc" value="Convert">
            <!-- Calling function to calculate the output -->
            <?php
                $_SESSION["From"] = $_POST["from"];
                $_SESSION["To"] = $_POST["to"];

                // echo $Categ;
                // if ($_SERVER["REQUEST_METHOD"] == "POST"){
                //     switch ($Categ) {
                //         case "Length":
                //             echo "Came in Length Calculation";  
                //     }
                // }
            ?>

            <br>
            <!-- Button to submit -->
            
            <!-- Button to reset values  -->
            <!-- <input type="reset" id="reset" value="Clear">   -->

        </form>

    </div>
    
</body>
</html>