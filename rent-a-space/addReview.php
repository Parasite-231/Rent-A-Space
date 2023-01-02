<?php 

include("./db_connect.php");
session_start();


if (isset($_POST['submit']) ) {

    $email = $_SESSION['email'];
    $sql = "SELECT * FROM user where email='$email'";
    $result = mysqli_query($conn, $sql);
    $info = mysqli_fetch_all($result, MYSQLI_ASSOC); 
    
    $user_id=$info[0]['id'];

    $room_id = $_GET['id'];


    //get_room_fk_id
    // $room_id = $_GET['id'];

// Get images from the database


$single_bed_number = $_POST['single_bed_number'];
$double_bed_number = $_POST['double_bed_number'];
$arrival_date = $_POST['arrival_date'];
$departure_date = $_POST['departure_date'];
$mobile_number = $_POST['mobile_number'];
$address =$_POST['address'];



$query = "INSERT INTO booked_room (room_id_fk,user_id_fk,single_bed_number,double_bed_number,arrival_date,departure_date,mobile_number,address) 
VALUES ('$room_id','$user_id','$single_bed_number','$double_bed_number','$arrival_date','$departure_date','$mobile_number','$address')";
 mysqli_query($conn, $query);

echo 'insert successful';
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">


<?php include('./userPartials/userHeaderSection.php') ?>


<body>
    <header class="header" id="navigation-menu">
        <nav>
            <a href="index.html"><img src="logon.png"></a>
            <div class="nav-links">
                <ul>
                    <?php
                  if (isset($_SESSION["userEmail"])) {
                    echo"<li><a href='index.php'>HOME</a></li>";
                    echo"<li><a href=''>ABOUT</a></li>";
                    echo"<li><a href='logOut.php'>Log Out</a></li>";
                    echo"<li><a href='userRegister.php'>REGISTER</a></li>";
                    echo"<li><a href=''>CONTACT US</a>";
                  }
                  else{
                    echo"<li><a href='index.php'>HOME</a></li>";
                    echo"<li><a href=''>ABOUT</a></li>";
                    echo"<li><a href='userLogIn.php'>LOG IN</a></li>";
                    echo"<li><a href='userRegister.php'>REGISTER</a></li>";
                    echo"<li><a href=''>CONTACT US</a>";
                  }
                  ?>
                    <!-- <li><a href="index.html">HOME</a></li>
          <li><a href="">ABOUT</a></li>
          <li><a href="userLogIn.php">LOG IN</a></li>
          <li><a href="userRegister.php">REGISTER</a></li>
          <li><a href="">CONTACT US</a> -->
                    <!-- <ul>
                        <li><a href="#">Phone: +880 1622789888</a></li>
                        <li><a>Email: info@rentaspace.bd</a></li>
                        <li><a>Fax: 934 2009</a></li>
                    </ul> -->

                    </li>
                </ul>

            </div>
        </nav>
    </header>

    <!-- 
    <script>
    function img(anything) {
        document.querySelector('.slide').src = anything;
    }

    function change(change) {
        const line = document.querySelector('.image');
        line.style.background = change;
    }
    </script> -->
    <?php include('./userPartials/userCommonSectionForBookingForm.php') ?>

    <div class="container" style="margin: 10%;">Review Form</h3>

        <form class="row g-3" method="POST" action="./addReview.php">
            <div class="col-md-6">
                <label for="rate" class="form-label">Rate us <b style="color:red"> *( Out of 5 )</b></label>
                <input type="number" name="rate" class="form-control" id="inputEmail4">
            </div>

            <div class="col-12">
                <label for="feedback" class="form-label">Provide your feedback</label>
                <textarea class="form-control" name="feedback" placeholder="Feedback" id="floatingTextarea2"
                    style="height: 100px;resize:none"></textarea>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Send Review</button>
            </div>
        </form>
    </div>

    <script>
    var accItem = document.getElementsByClassName('accordionItem');
    var accHD = document.getElementsByClassName('accordionIHeading');

    for (i = 0; i < accHD.length; i++) {
        accHD[i].addEventListener('click', toggleItem, false);
    }

    function toggleItem() {
        var itemClass = this.parentNode.className;
        for (var i = 0; i < accItem.length; i++) {
            accItem[i].className = 'accordionItem close';
        }
        if (itemClass == 'accordionItem close') {
            this.parentNode.className = 'accordionItem open';
        }
    }
    </script>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"
        integrity="sha512-gY25nC63ddE0LcLPhxUJGFxa2GoIyA5FLym4UJqHDEMHjp8RET6Zn/SHo1sltt3WuVtqfyxECP38/daUc/WVEA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        dots: false,
        navText: ["<i class='fas fa-chevron-left'></i>", "<i class='fas fa-chevron-right'></i>"],
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            1000: {
                items: 4
            }
        }
    })
    </script>

    <?php include('./userPartials/userFooterSection.php') ?>
</body>

</html>