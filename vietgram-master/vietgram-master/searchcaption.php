<!DOCTYPE html>
<html lang="en">
<?php 
    session_start();
    include('connection.php');
    $search = $_GET['search'];
    $res = mysqli_query($conn,"select * from photo where caption='".$search. "'");
    $jmlHasilSearch = mysqli_num_rows($res);
    while($hasilSearch[]=mysqli_fetch_array($res));
?> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Feed | Vietgram</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <nav class="navigation">
        <div class="navigation__column">
            <a href="feed.php">
                <!-- Master branch comment -->
                <img src="images/logo.png" />
            </a>
        </div>
        <div class="navigation__column">
            <i class="fa fa-search"></i>
            <form action="searchcaption.php" method="get">
                 <input name="search" type="text" placeholder="Search">
            </form>
        </div>
        <div class="navigation__column">
            <ul class="navigations__links">
                <li class="navigation__list-item">
                    <a href="explore.php" class="navigation__link">
                        <i class="fa fa-compass fa-lg"></i>
                    </a>
                </li>
                <li class="navigation__list-item">
                    <a href="#" class="navigation__link">
                        <i class="fa fa-heart-o fa-lg"></i>
                    </a>
                </li>
                <li class="navigation__list-item">
                    <a href="profile.php" class="navigation__link">
                        <i class="fa fa-user-o fa-lg"></i>
                    </a>
                </li>
                <li class="navigation__list-item">
                    <a href="logout.php" class="navigation__link">
                        <i class="fa fa-sign-out fa-lg"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    
    <main id="feed">
        <?php
            if ($jmlHasilSearch == 0){
                echo "Sorry, no result found. Try another caption";
                echo "<br>";
                echo "<br>";
            } else{
                for ($i=0; $i < $jmlHasilSearch; $i++) {
        ?>
            <?php 
                echo $jmlHasilSearch." result found"; 
                echo "<br> <br>";
            ?> 
            <div class="photo">
                <header class="photo__header">
                    <img src="images/avatar2.jpg" class="photo__avatar" />
                    <div class="photo__user-info">
                        <span class="photo__author"><?php echo $hasilSearch[$i][0];?></span>
                    </div>
                </header>
                <center><img class="img-fluid" height="400px" width="400px" src="<?php echo $hasilSearch[$i][1]; ?>" /></center>
                <div class="photo__info">
                    <div class="photo__actions">
                    <?php echo $hasilSearch[$i][2]; ?><br><br>
                        <span class="photo__action">
                            <i class="fa fa-heart-o fa-lg"></i>
                        </span>
                        <span class="photo__action">
                            <i class="fa fa-comment-o fa-lg"></i>
                        </span>
                    </div>
                    <span class="photo__likes"><?php echo $hasilSearch[$i][3];?> likes</span>
                    <ul class="photo__comments">
                        <li class="photo__comment">
                            <span class="photo__comment-author">test123</span> love this!
                        </li>
                    </ul>
                    <span class="photo__time-ago">2 hours ago</span>
                    <div class="photo__add-comment-container">
                        <textarea name="comment" placeholder="Add a comment..."></textarea>
                        <i class="fa fa-ellipsis-h"></i>
                    </div>
                </div>
            </div>
        <?php } } ?>
    </main>

    <footer class="footer">
        <div class="footer__column">
            <nav class="footer__nav">
                <ul class="footer__list">
                    <li class="footer__list-item"><a href="#" class="footer__link">About Us</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Support</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Blog</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Press</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Api</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Jobs</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Privacy</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Terms</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Directory</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Language</a></li>
                </ul>
            </nav>
        </div>
        <div class="footer__column">
            <span class="footer__copyright">© 2017 Vietgram</span>
        </div>
    </footer>
</body>
</html>