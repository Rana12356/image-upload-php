<?php
if (isset($_POST['submit'])) {
    $image = $_FILES['image'];
    $name = $image['name'];
    $rand = rand(100000, 9999999);
    $rand = md5($rand);
    $rand_string = substr($rand, 0, 10);
    $extension = pathinfo($image['name'], PATHINFO_EXTENSION);
    // $name = str_replace('.' . $extension, '', $name);
    $name = explode('.', $name);
    array_pop($name);
    $name = implode($name);
    $name = $name . '-' . $rand_string . '.' . $extension;
    $path = 'images/' . $name;
    $file = $image['tmp_name'];
    move_uploaded_file($file, $path);
    echo "Image Uploaded successfully";
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0">Image Upload</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <label class="w-100 mt-3">
                                Image
                                <input type="file" name="image" id="image" required>
                            </label>
                            <img src="" alt="" id="preview" width="150px" class="img-thumbnail" style="display : none">
                            <div class="d-grid mt-4">
                                <button type="submit" name="submit" class="btn btn-success">Upload Image</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

    <script>
        $('#image').on('change', function(e) {
            let file = e.target.files[0];
            let image = URL.createObjectURL(file);
            $('#preview').show();
            $('#preview').attr('src', image);
        })
    </script>

    </script>
</body>

</html>