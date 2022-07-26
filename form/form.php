<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
require_once("base.php");
require_once("functions.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>

<body>
    <div class="container mt-5 form">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <h4 class="text-center text-white text-uppercase">Register Form</h4>
                            <?php
                            if (isset($_POST["reg-btn"])) {
                                echo register();
                            }
                            ?>
                            <div class="form-group">
                                <label for="name" class="text-white">Your Name</label>
                                <input type="text" id="name" name="name" class="form-control" value="<?php echo old("name") ?>">
                                <small class="text-danger font-monospace"><?php echo getError("name") ?></small>
                            </div>

                            <div class="form-group mt-3">
                                <label for="email" class="text-white">Email</label>
                                <input type="text" id="email" name="email" class="form-control" value="<?php echo old("email") ?>">
                                <?php if (getError("email")) { ?>
                                    <small class="text-danger font-monospace"><?php echo getError("email") ?></small>
                                <?php } ?>
                            </div>

                            <div class="form-group mt-3">
                                <label for="password" class="text-white">Password</label>
                                <input type="password" id="password" name="password" class="form-control" value="<?php echo old("password") ?>">
                                <small class="text-danger font-monospace"><?php echo getError("password") ?></small>
                            </div>

                            <div class="form-group mt-3">
                                <label for="address" class="text-white">address</label>
                                <textarea type="address" id="address" name="address" rows="5" class="form-control"><?php echo old("address") ?></textarea>
                                <small class="text-danger font-monospace"><?php echo getError("address") ?></small>
                            </div>

                            <div class="form-group mt-3">
                                <label for="phone" class="text-white">phone</label>
                                <input type="number" id="phone" name="phone" class="form-control" value="<?php echo old("phone") ?>">
                                <small class="text-danger font-monospace"><?php echo getError("phone") ?></small>
                            </div>

                            <div class="form-group mt-3">
                                <label for="gender" class="text-white">Gender</label>
                                <div class="d-flex justify-content-evenly border p-3 bg-primary rounded">
                                    <?php foreach ($genderArr as $key => $g) { ?>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="<?php echo $g ?>_id" name="gender" class="custom-control-input" <?php echo old("gender") == $g ? "checked" : ""; ?> value="<?php echo $g ?>">
                                            <label class="custom-control-label text-capitalize text-dark" for="<?php echo $g ?>_id"><?php echo $g ?></label>
                                        </div>
                                    <?php } ?> 
                                </div>
                                <small class="text-danger font-monospace"><?php echo getError("gender") ?></small>
                            </div>

                            <div class="form-group mt-3">
                                <label for="file" class="text-white">Photo Upload</label>
                                <input type="file" id="file" name="upload" accept=".jpg,.png,.jpeg" class="form-control" value="<?php echo old("upload") ?>">
                                <small class="text-danger font-monospace"><?php echo getError("upload") ?></small>
                            </div>

                            <hr>
                            <div class="d-flex justify-content-between align-align-items-center">
                                <div class="form-check form-switch mt-2">
                                    <input class="form-check-input"  type="checkbox" checked id="flexSwitchCheckDefault">
                                    <label class="form-check-label text-white" for="flexSwitchCheckDefault">All Correct</label>
                                </div>
                                <button class="btn btn-primary" name="reg-btn">submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <?php clear() ?> -->
</body>

</html>