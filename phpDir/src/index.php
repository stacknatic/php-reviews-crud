<?php
declare(strict_types=1);
include './db.php';
$sql = "select * from consultant order by consultantid desc";
$result = mysqli_query($conn, $sql);

$averagequery = "SELECT AVG(rating) AS 'averageRating' FROM consultant";

$getaverage = $conn->query($averagequery);

$average = mysqli_fetch_assoc($getaverage);

$reviewaverage = round(floatval($average['averageRating']), 1);


if ($result) {
    $totalrating =  mysqli_num_rows($result);
    while ($row = mysqli_fetch_assoc($result)) {
        $views = $row['views'];
        $about = $row['about'];
        $review = $row['review'];
        $rating = $row['rating'];
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    if (isset($_POST['submit'])) {
        $review = $_POST['review'];
        //   $description=$_POST['description'];

        $rating = $_POST['rating'];

        $review = htmlspecialchars($review);
        
        $stmt = $conn->prepare("insert into consultant(review, rating) values(?,?)");
        $stmt->bind_param("si", $review, $rating);

        

        $stmt->execute();

        $stmt->close();
        $conn->close();

        header("Location: index.php");
        exit();
    }
    if (isset($_POST['delete'])) {
    

        $postId = $_POST['delete'];


        $stmt = $conn->prepare("delete from consultant where consultantid=?");
        $stmt->bind_param("i", $postId);

        

        $stmt->execute();


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
    <header>
        <div>
            <h1>
                CyberKonsult
            </h1>
            <small>
                Hire the best cyber security consultants
            </small>
        </div>
        <nav>
            <button class='admin-button'>
                Admin
            </button>
        </nav>
    </header>
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
            </div>

            <div class='profile-stats'>
                <!-- <span class='profile-views'><? echo $views ?> Views</span> -->
                <span> Cyber Security Consultant </span>
            </span>
            <!-- <span class='profile-reviews'><? echo $totalrating ?> Reviews</span> -->
            
        </div>
        <div class="location">
        <img class="location-icon" src="/images/location.svg" alt="location icon"></img><span class='location-icon'>Paris</span>

        </div>

            <div class='profile-data'>

                <h3>About</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Inventore vel, harum, assumenda temporibus dicta velit architecto blanditiis aliquid amet ut laboriosam minus optio ea, repudiandae unde praesentium possimus labore! Ratione praesentium voluptas quasi et ex!</p>
                <h3>Reviews</h3>
                

                <p> Rated <? echo $reviewaverage ?> / 5 based on <? echo $totalrating ?> reviews</p>
                        <span class='fa fa-star <?if($reviewaverage >= 1)
                            echo 'checked'?>'>
                        </span>
                        <span class='fa fa-star <?if($reviewaverage >= 2)
                            echo 'checked'?>'>
                        </span>
                        <span class='fa fa-star  <?if($reviewaverage >= 3)
                            echo 'checked'?>'>
                        </span>
                        <span class='fa fa-star  <?if($reviewaverage >= 4)
                            echo 'checked'?>'>
                        </span>
                        <span class='fa fa-star  <?if($reviewaverage >= 5)
                            echo 'checked'?>'>
                        </span>


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
    
                <?php 
              
                $result = mysqli_query($conn, $sql);
                if ($result) {
                   
                    $number = 1;
                    // starkey is the position of the star (between 1 - 5)
                    function checker1($rating, $starkey){
                        if($rating >= $starkey){
                            return 'checked';
                        }}
                    
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['consultantId'];
                        // $about = $row['about'];
                        $review = $row['review'];
                        $rating = $row['rating'];
                        $star1 = checker1($rating, 1);
                        $star2 = checker1($rating, 2);
                        $star3 = checker1($rating, 3);
                        $star4 = checker1($rating, 4);
                        $star5 = checker1($rating, 5);
                        

                        echo $number++ . '.'
                        . 
                       
                        "
                        <span class='fa fa-star $star1'></span>
                        <span class='fa fa-star $star2'></span>
                        <span class='fa fa-star $star3'></span>
                        <span class='fa fa-star $star4'></span>
                        <span class='fa fa-star $star5'></span>
                       
                        <div>
                        <form action='' method='post'>
                        <p> $review <p>
                        <div>
                        
                        <button class='edit-review' name='edit' value=$id> Edit </button>
                        <button class='delete-review' name='delete' value=$id> Delete </button>
                        </div>
                        </form>
                        </div>
                        ";
                        
                    }
                    
                }
                ?>

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
        
        <div class="modal-container">
            <div class="modal-box">
                <span class="modal-close-button">x</span>
                <h2 id="game-score">Edit Review</h2>
                <p class="review"></p>
                <div class="review-input-container">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method='post'>
                        <textarea name="edit-review" id="review" cols="50" rows="10"></textarea>
                        <label for="rating">Choose rating</label>
                        <select name="rating" id="rating">
                            <option value="5">5</option>
                            <option value="4">4</option>
                            <option value="3">3</option>
                            <option value="2">2</option>
                            <option value="1">1</option>
                        </select>
                        <input type="submit" value="Submit edit" class='submit-edit-button' name='submit'>
                    </form>

                </div>

            </div>

        </div>
    <script src="main.js"></script>
</body>

</html>