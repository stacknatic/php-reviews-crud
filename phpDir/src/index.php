<?php

declare(strict_types=1);
include './db.php';
$sql = "select * from consultant";
$result = mysqli_query($conn, $sql);

$theaverage = "SELECT AVG(rating) AS 'averageRating' FROM rating";

$average = mysqli_query($conn, $theaverage);

while ($row = mysqli_fetch_array($average)) {
    $avg = $row;
}

if ($result) {
    $totalrating =  mysqli_num_rows($result);
    while ($row = mysqli_fetch_assoc($result)) {
        $views = $row['views'];
        $about = $row['about'];
        $review = $row['review'];
        $rating = $row['rating'];
        //     echo '<tr>
        //     <th scope="row">'.$views.'</th>
        //     <td>'.$about.'</td>
        //     <td>'.$review.'</td>

        //   </tr>';
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    if (isset($_POST['submit'])) {
        $review = $_POST['review'];
        //   $description=$_POST['description'];

        $rating = $_POST['rating'];

        $review = htmlspecialchars($review);
        //   $description = htmlspecialchars($description);

        $stmt = $conn->prepare("insert into consultant(review, rating) values(?,?)");
        $stmt->bind_param("si", $review, $rating);
        // $stmt->bind_param("i", $rating);

        

        $stmt->execute();

        //echo "New review added successfully";

        $stmt->close();
        $conn->close();

        header("Location: index.php");
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My PHP Project</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="/font-awesome-4.7.0/css/font-awesome.min.css">
</head>

<body>
    <main>
        <section class='profile-section'>

            <!-- <h2>Profile Overview</h2> -->
            <div class='profile-images'>
                <div class='profile-cover'>

                </div>

                <div class='profile-pic'></div>

            </div>
            <div class='profile-name'>
                John Smith
                <p>average is: <?php echo $avg ?></p>
            </div>

            <div class='profile-stats'>
                <span class='profile-views'><? echo $views ?> Views</span>
                <!-- <span>864 <span class='profile-follows'>Follows</span></span> -->
                <span class='profile-reviews'><? echo $totalrating ?> Reviews</span>

            </div>

            <div class='profile-data'>

                <h3>About</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Inventore vel, harum, assumenda temporibus dicta velit architecto blanditiis aliquid amet ut laboriosam minus optio ea, repudiandae unde praesentium possimus labore! Ratione praesentium voluptas quasi et ex!</p>
                <h3>Reviews</h3>
                <!-- <p> Rated 4 / 5 based on 1 review</p>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked" ></span>
        <span class="fa fa-star unchecked"></span>
        <br> -->

                <p> Rated 4 / 5 based on <? echo $totalrating ?> reviews</p>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>


                <h3>Book Apointment</h3>
                <form action="" method='post'>
                    <label for="date">Select date</label>
                    <input type="date" id="date">
                    <label for="time">Select time</label>
                    <input type="time" id='time' min="09:00" max="17:00" required>
                </form>
                <p>Send Message</p>
            </div>


        </section>
        <section class='sidebar'>
            <div>
                <h2>Recent Reviews</h2>
                <button class='add-review'>Add review</button>
                <!-- <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span> -->
                <?php 
              
                $result = mysqli_query($conn, $sql);
                if ($result) {
                   
                    $number = 1;
                    function checker1($rating){
                        if($rating >= 1){
                            return 'checked';
                        }}
                    function checker2($rating){
                        if($rating >= 2){
                            return 'checked';
                        }}
                    function checker3($rating){
                        if($rating >= 3){
                            return 'checked';
                        }}
                    function checker4($rating){
                        if($rating >= 4){
                            return 'checked';
                        }}
                    function checker5($rating){
                        if($rating >= 5){
                            return 'checked';
                        }}
                    
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['consultantId'];
                        // $about = $row['about'];
                        $review = $row['review'];
                        $rating = $row['rating'];
                        
                        $star1 = checker1($rating);
                        $star2 = checker2($rating);
                        $star3 = checker3($rating);
                        $star4 = checker4($rating);
                        $star5 = checker5($rating);




                        //     echo '<tr>
                        //     <th scope="row">'.$views.'</th>
                        //     <td>'.$about.'</td>
                        //     <td>'.$review.'</td>
                
                        //   </tr>';
                        echo $number++ . '.'
                        . 
                       
                        "
                        <span class='fa fa-star $star1'></span>
                        <span class='fa fa-star $star2'></span>
                        <span class='fa fa-star $star3'></span>
                        <span class='fa fa-star $star4'></span>
                        <span class='fa fa-star $star5'></span>
                       
                        <p> $review </p>
                        ";
                    }
                }
                ?>
                <!-- <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star unchecked"></span> -->
               
               

            </div>
        </section>
        <div class="modal-container">
            <div class="modal-box">
                <span class="modal-close-button">x</span>
                <h2 id="game-score">Add Review</h2>
                <p class="review"></p>
                <div class="review-input-container">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method='post'>
                        <textarea name="review" id="review" cols="50" rows="10"></textarea>
                        <label for="rating">Choose rating</label>
                        <select name="rating" id="rating">
                            <option value="5">5</option>
                            <option value="4">4</option>
                            <option value="3">3</option>
                            <option value="2">2</option>
                            <option value="1">1</option>
                        </select>
                        <input type="submit" value="Submit review" class='submit-review-button' name='submit'>
                    </form>

                </div>


            </div>

        </div>
    </main>
    <script src="main.js"></script>
</body>

</html>