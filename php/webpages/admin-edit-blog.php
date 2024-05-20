<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/css_admin_edit_blog.css">
    <script defer src="../../js/js_image_preview.js"> </script>
    <link rel="stylesheet" href="../../bootstrap-icons/font/bootstrap-icons.min.css">
    <link rel="icon" href="../../images/icon.png">
    <title>Edit Blog</title>

    <script src="../../tinymce/js/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: '#blog-textarea',
            width: '90%',
            min_height: 500,
            max_height: 500,
            toolbar: 'undo redo | styleselect | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | forecolor backcolor | numlist bullist | outdent indent | link image | fontsize',
            menubar: false,
        });
    </script>
</head>

<body>
    <div class="edit-container">
        <div class="left-panel">
            <div class="logo-img">
                <img src="../../images/logo.png" alt="">
            </div>
            <div class="title-heading">
                <p>Edit Blog</p>
            </div>
            <div class="form-con">
                <form action="" method="post">
                    <p class="form-head">Blog Title:</p>
                    <input type="text" name="email" class="form-input" autocomplete="off">
                    <p class="form-head">Publisher:</p>
                    <input type="text" name="password" class="form-input" autocomplete="off">
                    <p class="form-head">Add Blog Image:</p>
                    <label id="imagePreview" for="file-upload" class="form-label-upload"><p class="bi-card-image"></p></label>
                    <input id="file-upload" type="file" name="password" placeholder="password123" class="form-file" autocomplete="off">
                </form>
            </div>
        </div>
        <div class="gap"></div>
        <div class="right-panel">
            <p class="right-head">Content:</p>
            <textarea name="" id="blog-textarea" class="form-textarea"></textarea>
            <button type="submit" class="submit-btn">Continue</button>
            <a class="go-back" href="../webpages/admin-dashboard.php">Go Back</a>
        </div>
    </div>
</body>

</html>