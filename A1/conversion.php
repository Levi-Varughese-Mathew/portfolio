<?php
    // Start the session to retain category and selected values
    session_start();

    // Arrays for categories and units
    $Categ_List = ["Length", "Volume", "Mass", "Temperature", "Speed", "Area", "Time", "Digital Storage"];
    $LenUnits = ["Kilometre", "Metre", "Centimetre", "Miles", "Inches", "Feet"];
    $VolUnits = ["Litre", "Millilitre", "Gallons", "Pints"];
    $MassUnits = ["Kilograms", "Pounds", "Grams", "Ounces", "Tonnes", "Milligrams", "Stones"];

    // Variables to hold selections and values (default values are added)
    $Categ = $_SESSION['category'] ?? '';
    $From = $_POST['from'] ?? '';
    $To = $_POST['to'] ?? '';
    $Num = $_POST['value'] ?? 0;
    $Result = "";

    // Function for length conversion
    function length_conversion($Num, $From, $To) {
        $conversion_rates = [
            "Kilometre" => 1000,
            "Metre" => 1,
            "Centimetre" => 0.01,
            "Miles" => 1609.34,
            "Inches" => 0.0254,
            "Feet" => 0.3048,
        ];

        // Convert to base unit (Metre) first
        $base_value = $Num * $conversion_rates[$From];

        // Convert from base unit to target unit
        return $base_value / $conversion_rates[$To];
    }

    // Handle category selection
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["btnSelectCat"])) {
        $Categ = $_POST["category"];
        $_SESSION['category'] = $Categ;
        // $_SESSION['category'] = $_POST["category"];
    }

    // Handle conversion calculation
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["btnCalc"])) {
        if ($Categ == "Length" && $From && $To) {
            $Result = length_conversion($Num, $From, $To);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Font awesome Linking -->
        <script src="https://kit.fontawesome.com/8412492225.js" crossorigin="anonymous"></script>

        <!-- Linking the fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
        
        <!-- Linking the stylesheet -->
        <link rel="stylesheet" href="styles.css">
        <title>Conversion Page</title>
    </head>

    <body>
        <!-- Form to select the category -->
        <form method="POST">
            <label>Category</label><br>
            <!-- Select used to show a list of options -->
            <select name="category">
                <?php foreach ($Categ_List as $cat): ?>
                    <option value="
                        <?php echo $cat ?>" <?= ($Categ == $cat) ? 'selected' : '' ?>><?= $cat ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <!-- Button to select the category -->
            <input type="submit" name="btnSelectCat" value="Select">
        </form>

        <?php if ($Categ): ?>
            <h2>Selected Category: <?= htmlspecialchars($Categ) ?></h2>

            <!-- Form to choose units and convert -->
            <form method="POST">
                <label>From</label>
                <!-- Select used to allow to choose from -->
                <select name="from">
                    <?php
                        //Making the array empting before using
                        $units = [];
                        //Checking the chosen category
                        if ($Categ == "Length") {
                            $units = $LenUnits;
                        }
                        //Going through each units for displaying the from option
                        foreach ($units as $unit):
                            echo "<option>".$unit."</option>";
                    ?>
                </select>

                <label>To</label>
            
                <select name="to">
                    <?php
                        //Going through each units for displaying the from option
                        foreach ($units as $unit):
                            echo "<option>".$unit."</option>";
                        ?>                        
                </select>        
                 
                <!-- Label to enter the value for calculation -->
                <label>Value</label>
                <input type="number" name="value" step="any" value="<?= htmlspecialchars($Num) ?>">

                <input type="submit" name="btnCalc" value="Convert">
            </form>

            <?php if ($Result !== ""): ?>
                <h3>Result: <?= htmlspecialchars($Result) ?></h3>
            
        
                
    </body>
</html>