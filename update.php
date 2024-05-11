<?php 

include "config.php";

    if (isset($_POST['update'])) {

        $firstname = $_POST['firstname'];

        $s_no = $_POST['s_no'];

        $email = $_POST['email'];

        $mobile = $_POST['mobile'];

        $city = $_POST['city'];

        $country = $_POST['country']; 

        $sql = "UPDATE `contact` SET `firstname`='$firstname',`email`='$email',`mobile`='$mobile',`city`='$city',`country`='$country' WHERE `s_no`='$s_no'"; 

        $result = $conn->query($sql); 

        if ($result == TRUE) {

            echo "Record updated successfully.";
            header('Location: database.php');


        }else{

            echo "Error:" . $sql . "<br>" . $conn->error;

        }

    } 

if (isset($_GET['s_no'])) {

    $s_no = $_GET['s_no']; 

    $sql = "SELECT * FROM `contact` WHERE `s_no`='$s_no'";

    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        

        while ($row = $result->fetch_assoc()) {

            $firstname = $row['firstname'];

            $email = $row['email'];

            $mobile = $row['mobile'];

            $city  = $row['city'];

            $country = $row['country'];

            $s_no = $row['s_no'];

        } 

    ?>

        <h2>User Update Form</h2>

        <form action="" method="post">

          <fieldset>

            <legend>Personal information:</legend>

            First name:<br>

            <input type="text" name="firstname" value="<?php echo $firstname; ?>">

            <input type="hidden" name="s_no" value="<?php echo $s_no; ?>">

            <br>

            Email:<br>

            <input type="email" name="email" value="<?php echo $email; ?>">

            <br>

            Mobile:<br>

            <input type="number" name="mobile" value="<?php echo $mobile; ?>">

            <br>

            City:<br>

            <input type="text" name="city" value="<?php echo $city; ?>">

            <br>

            Country:<br>

            <input type="text" name="country" value="<?php echo $country; ?>">

            <br><br>

            <input type="submit" value="Update" name="update">

          </fieldset>

        </form> 

        </body>

        </html> 

    <?php

    } else{ 

        header('Location: database.php');

    } 

}

?> 