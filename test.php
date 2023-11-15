<?php
require_once 'controller/LGRRCController.php';

// Specify the path to the folder containing your images
$folderPath = 'images/dilg4a/region';

// Open the folder
$directory = opendir($folderPath);

// Check if the folder was opened successfully
if ($directory) {
    // Iterate through each file in the folder
    while (($file = readdir($directory)) !== false) {
        // Check if the file is a regular file and ends with a common image file extension
        if (is_file($folderPath . $file) && in_array(pathinfo($file, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif'])) {
            // Print the file name
            echo $file . "<br>";
        }
    }

    // Close the folder
    closedir($directory);
} else {
    // Print an error message if the folder couldn't be opened
    echo "Unable to open the folder.";
}

?>
