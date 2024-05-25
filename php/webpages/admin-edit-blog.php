<?php
require "../controllers/funtions.php";

$id = $_GET['id'];
$blog_data = mysqli_fetch_assoc(selectRecords($connection, "*", "blogs", "blogID", $id));

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $inputFieldNames = array_keys($_POST);

    if (isset($_POST['image'])) {
        $index = array_search('image', $inputFieldNames);
        if ($index !== false) {
            unset($inputFieldNames[$index]);
        }
    }

    $data = array();
    foreach ($inputFieldNames as $fieldName) {
        $data[] = $_POST[$fieldName];
    }

    $recorded = updateRecords($connection, 'blogs', $inputFieldNames, $data, $id);

    if (!empty($_FILES['image']['name'])) {
        InsertImage($id);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/css_admin_edit_blog.css">
    <link rel="stylesheet" href="../../bootstrap-icons/font/bootstrap-icons.min.css">
    <link rel="icon" href="../../images/icon.png">
    <link rel="stylesheet" href="../../css/css_Pups.css">
    <script defer src="../../js/js_image_preview.js"> </script>
    <script defer src="../../js/js_admin_edit_blog.js"></script>
    <script id="recorded-value" data-recorded="<?php echo $recorded ? 'true' : 'false'; ?>"></script>
    <script src="../../js/jquery.min.js"></script>
    <title>Edit Blog</title>
    <script src="../../tinymce/js/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: '#blog-textarea',
            license_key: 'gpl',
            paste_as_text: true,
            width: '90%',
            min_height: 500,
            max_height: 500,
            toolbar: 'undo redo | styleselect | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | forecolor backcolor | numlist bullist | outdent indent | link image | fontsize',
            menubar: false,
        });
    </script>
</head>

<body>
    <?php
    include "Pups.php";
    ?>
    <div class="edit-container">
        <div class="left-panel">
            <div class="logo-img">
                <img src="../../images/logo.png" alt="">
            </div>
            <div class="title-heading">
                <p>Edit Blog</p>
            </div>
            <div class="form-con">
                <form action="" method="post" id="blog-form" enctype="multipart/form-data">
                    <p class="form-head">Blog Title:</p>
                    <input type="text" name="title" class="form-input" autocomplete="off" value="<?php echo isset($_POST['title']) ? $_POST['title'] : $blog_data['title']; ?>">
                    <p class="form-head">Publisher:</p>
                    <input type="text" name="publisher" class="form-input" autocomplete="off" value="<?php echo isset($_POST['publisher']) ? $_POST['publisher'] : $blog_data['publisher']; ?>">
                    <p class="form-head">Blog Image:</p>
                    <label id="imagePreview" for="file-upload" class="form-label-upload">
                        <?php if (isset($blog_data['blogID'])) { ?>
                            <img src="<?php echo "../../blog-images/blog-" . $blog_data['blogID'] . "/cover.png?v=" . time();  ?>" alt="">
                        <?php } else { ?>
                            <p class="bi-card-image"></p>
                        <?php } ?>
                    </label>
                    <input id="file-upload" type="file" class="form-file" name="image">
                </form>
            </div>
        </div>
        <div class="gap"></div>
        <div class="right-panel">
            <p class="right-head">Content:</p>
            <textarea name="content" id="blog-textarea" class="form-textarea"><?php echo isset($_POST['content']) ? $_POST['content'] : $blog_data['content']; ?></textarea>
            <button type="submit" class="submit-btn" id="submit">Continue</button>
            <a class="go-back" href="../webpages/admin-dashboard.php">Go Back</a>
        </div>
    </div>
</body>

</html>