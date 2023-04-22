<?php

declare(strict_types=1);
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

            <h2>Profile Overview</h2>
            <div class='profile-images'>
                <div class='profile-cover'>
                </div>

                <div class='profile-pic'></div>

            </div>
            <div class='profile-name'>
                John Smith
            </div>

            <div class='profile-stats'>
                <span>1,300 Views</span>
                <span>864 Follows</span>
                <span>2300 Reviews</span>

            </div>

            <div class='profile-data'>

                <h3>About</h3>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Inventore dicta quo, illum voluptas sit esse suscipit harum repellendus provident iure facilis maiores. Ut repellat nihil enim consectetur quam pariatur incidunt ipsam! Tenetur quo non voluptates dolores. Amet sapiente dignissimos molestias at illum ipsam consequatur alias, fugiat ipsa ad asperiores corporis.
                <h3>Reviews</h3>
                <!-- <span> Rated 4 / 5 based on 1 review</span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked" ></span>
        <span class="fa fa-star unchecked"></span>
        <br> -->

                <span> Rated 4 / 5 based on 3 reviews</span>
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
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sequi, praesentium! Libero quam, est accusantium aperiam voluptas laboriosam dolorem impedit. Aliquam.</p>

                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star unchecked"></span>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sequi, praesentium! Libero quam, est accusantium aperiam voluptas laboriosam dolorem impedit. Aliquam.</p>

                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star unchecked"></span>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sequi, praesentium! Libero quam, est accusantium aperiam voluptas laboriosam dolorem impedit. Aliquam.</p>

            </div>
        </section>
    </main>

</body>

</html>