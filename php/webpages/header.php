<?php
$popular_menu_blogs = selectRecords($connection, "*", "blogs", '', '', 'popularity DESC', '5');
?>

<div class="nav-bar" id="nav-bar">
    <img src="../../images/full-logo.png" alt="">
    <a class="home-nav bi-house" href="index.php"> Home</a>
    <div class="search-body">
        <div class="search-box">
            <input id="head-search" type="text" placeholder="Search for a blog" onkeyup="searching('head-search')">
            <span class="bi-search"></span>
        </div>
        <div id="head-search-result" class="results"></div>

    </div>
    <a class="authorize-nav" href="../webpages/admin-login.php">Authorize</a>
    <button class="menu-nav" onclick="openMenuBurger()">&#9776;</button>
</div>

<!------------------------------------- Menu Bar ------------------------------------------------>

<div class="menu-burger" id="menuBurger">
    <div class="top-burger-content">
        <span class="arrow bi-arrow-left" onclick="closeMenuBurger()"></span>
        <div class="menu-search-body">
            <div class="menu-search-box">
                <input id="menu-search" type="text" placeholder="Search for a blog" onkeyup="searching('menu-search')">
                <span class="bi-search"></span>
            </div>
            <div id="menu-search-result" class="menu-results">
                <!-- <p>asdasd</p> -->
            </div>

        </div>
    </div>
    <a class="burger-home" href="../webpages/index.php">
        <p class="bi-house"> Home</p>
    </a>
    <a class="burger-authorize" href="../webpages/admin-login.php">
        <p class="bi-door-open"> Authorize</p>
    </a>
    <div class="popular-menu">
        <div class="popular-menu-title">
            <p>Popular blogs</p>
        </div>
        <div class="popular-gap"></div>
        <div class="popular-menu-contents">
            <?php while ($row = mysqli_fetch_assoc($popular_menu_blogs)) { ?>
                <a class="popular-menu-link" href="blog-profile.php?id=<?php echo  $row['blogID']; ?>"><?php echo $row['title']; ?></a>
            <?php } ?>
        </div>
    </div>
</div>