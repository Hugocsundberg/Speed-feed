<?php
require('../functions.php');
require('header.php');
require('nav.php');
logMessage();

$userName = $_SESSION['user']['name'];


if (isset($_SESSION['user'])) {
    if ($_SESSION['user']['avatar_path'] === 'default') {
        $avatarPath = '../account/uploads/default.svg';
    } else {
        $avatarPath = $_SESSION['user']['avatar_path'];
    }
} else {
    $avatarPath = '../account/uploads/default.svg';
}

//Database connection
// $db = new PDO('sqlite:../hacker_news_database.sqlite3');
?>
<script src="../script/enter.js"></script>
<form name="create-post" id="create-post" class="create-post-form" action="/account/submit_post.php" method="post" enctype='multipart/form-data'>
    <div class="post">
        <div class="date-section">
            <div class="left">
                <img src="<?= $avatarPath ?>" alt="">
                <p class="name"><?= $userName ?></p>
            </div>
            <div class="right">
                <p class="date"><?= 'future date' ?></p>
            </div>
        </div>
        <div class="image-section imageUploadSection">
            <img class="image-upload-placeholder" src="/images/image-placeholder-landing.svg" alt="">
            <p class="upload-image-text">Click to upload image</p>
            <input class="hidden" type="file" name="file" id="file">
        </div>
        <div class="text-section">
            <div class="text-section-text">
                <input class="headline" maxlength="40" placeholder="Headline" type="text" name="Headline" id="Headline">
                <textarea placeholder="This is an interesting block of text" class="CreatePostbody body" type="text" name="Body" id="Body" form="create-post"></textarea>
            </div>
            <div class="text-section-vote">
                <div class="img-container">
                    <img class="upvote" src="/images/upvote.svg" alt="">
                </div>
                <p class="count-up">0 likes</p>
                <div class="img-container">
                    <img class="downvote" src="/images/downvote.svg" alt="">
                </div>
            </div>
        </div>
        <div class="bottom-section">
        </div>
    </div>
    <div class="link-submit-container">
        <label class="link-label" for="link">Link</label>
        <input class="link-input input-field" placeholder="http://example.com" type="text" name="link" id="link">
        <input class="inactive link-button" type="submit" value="Post">
    </div>
</form>
<script src="../script/Classes/ConfirmationBox.js"></script>
<script src="../script/hamburger.js"></script>
<script src="../script/image_upload.js"></script>
<script src="../script/preview_image_post.js"></script>
<script src="../script/count_up.js"></script>
<script src="../script/create_post.js"></script>

<?php createMessage(3) ?>