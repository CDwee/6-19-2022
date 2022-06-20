<!-- Started at 3:06 6-19-2022 -->

html, body {
    padding:  0;
    margin: 0;
    height: 100%;
}

* {
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    color: #fff;
}

body {
    background-color: #181818;
    font-size: 14px;
    min-width: 720px;
}

#nowPlayingBarContainer {
    width: 100%;
    background-color: #282828;
    bottom: 0;
    position: fixed;
    min-width: 620px;
}

#nowPlayingBar {
    display: flex;
    height: 90px;
    padding: 16px;
    box-sizing: border-box;
}

#nowPlayingLeft,
#nowPlayingRight {
    width: 30%;
    min-width: 180px;
}

#nowPlayingRight {
    position: relative;
    margin-top: 16px;
}

#nowPlayingCenter {
    width: 40%;
    max-width: 700px;
    display: flex;
    flex-direction: column;
    align-items: center;
}

#nowPlayingBar .content {
    width: 100%;
    height:  57px;
}

.playerControls .buttons {
    margin: 0 auto;
    display: table;
}

.controlButton {
    background-color: transparent;
    border: none;
    vertical-align: middle;
}

.controlButton img {
    width: 20px;
    height: 20px;
}

.controlButton.play img,
.controlButton.pause img {
    width: 32px;
    height: 32px;
}

.controlButton:hover {
    cursor: pointer;
}

.progressTime {
    color: #a0a0a0;
    font-size: 11px;
    min-width: 40px;
    text-align: center;
}

.playbackBar {
    display: flex;
}

.progressbar {
    width: 100%;
    height: 12px;
    display: inline-flex;
    cursor: pointer;
}

.progressBarBG {
    background-color: #404040;
    height: 4px;
    width: 100%;
    border-radius: 2px;
}

.progress {
    background-color: #a0a0a0;
    height: 4px;
    width: 0;
    border-radius: 2px;
}

.playbackBar .progressBar {
    margin-top: 3px;
}

#nowPlayingLeft .albumArtWork{
    height: 100%;
    max-width: 57px;
    margin-right: 15px;
    float: left;
    background-size: cover;
}

.trackInfo {
    display: table;
}

#nowPlayingLeft .trackInfo .trackName {
    margin: 6px 0;
    display: inline-block;
    width: 100%;
}

#nowPlayingLeft .trackInfo .artistName span {
    font-size: 12px;
    color: #a0a0a0;
}

.volumeBar {
    width: 180px;
    position: absolute;
    right: 0;
}

.volumeBar .progressBar {
    width: 125px;
}

#topContainer {
    min-height: 100%;
    width: 100%;
}

#navBarContainer {
    background-color: #000;
    width: 220px;
    height: 100vh;
    position: fixed;
    top: 0;
    left: 0;
}

.navBar {
    padding: 25px;
    display: flex;
    flex-direction: column;
    -ms-flex-direction: column;
}

.logo {
    margin-bottom: 15px;
}

.logo img {
    width: 32px;
}

.navBar .group {
    border-top: 1px solid #a0a0a0;
    padding: 10px 0;
}

.navItem {
    padding: 10px 0;
    font-size: 14px;
    font-weight: 500;
    display: block;
    letter-spacing: 1px;
    position: relative;
}

.navItemLink {
    color: #a0a0a0;
    text-decoration: none;
}

.navItemLink:hover {
    color: #fff;
}

.navItemLink .icon {
    position: absolute;
    right: 0;
    top: 6px;
    width: 25px;
}

#mainViewContainer {
    margin-left: 220px;
    padding-bottom: 90px;
    width: calc(100% - 220px);
}

#mainContent {
    padding: 0 20px;
}

.pageHeadingBig {
    padding: 20px;
    text-align: center;
}

.gridViewItem {
    display: inline-block;
    margin-right: 20px;
    width: 29%;
    max-width: 200px;
    min-width: 150px;
    margin-bottom: 20px;
}

.gridViewitem img {
    width: 100%;
}

.gridViewInfo {
    font-weight: 300;
    text-align: center;
    padding: 5px 0;
    text-overflow: ellipsis;
    overflow: hidden;
    white-space: nowrap;
}

<?php
include("includes/config.php");

// session_destroy();

if(isset($_SESSION['userLoggedIn'])) {
    $userLoggedIn = $_SESSION['userLoggedIn'];
}
else {
    header("Location: register.php");
}

?>

<html>
<head>
    <title>Welcome to Slotify!</title>

    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>
    
    <div id="mainContainer">
        
        <div id="topContainer">
            
            <?php include("includes/navBarContainer.php"); ?>

            <div id="mainViewContainer">
                
                <div id="mainContent">
                  
<?php include("includes/header.php"); ?>

<h1 class="pageHeadingBig">You Might Also Like</h1>

<div class="gridViewContainer">

    <?php
        $albumQuery = mysqli_query($con, "SELECT * FROM albums ORDER BY RAND() LIMIT 10");

        while($row = mysqli_fetch_array($albumQuery)) {
            



            echo "<div class='gridViewItem'>

                    <img src='" . $row['artworkPath'] . "'>

                    <div class='gridViewInfo'>"
                        . $row['title'] .
                    "</div>

                </div>";



        }
    ?>

</div>





<?php include("includes/footer.php"); ?>
                  
<!-- Ended at 8:16 6-19-2022 -->
