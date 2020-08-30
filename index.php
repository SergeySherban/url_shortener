<?php
session_start();
include_once  'classes/Records.php';
$records = new Records();
$arrRecords = $records->getRecords()
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>URL Shortener</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="title">Shorten a URL</h1>
            </div>
        </div>
        <div class="form-container">
            <form action="shorten.php" method="post">
                <div class="row">
                    <div class="col-6">
                        <label>URL</label>
                        <input class="form-control" type="url" name="url" placeholder="Enter a url here" required>
                        <?php
                        if(isset($_SESSION['error'])) {
                            echo "<p class='error'>{$_SESSION['error']}</p>";
                            unset($_SESSION['error']);
                        }
                        ?>
                    </div>
                    <div class="col-4">
                        <label>Expiration date</label>
                        <input class="form-control" type="date" name="date">
                    </div>
                    <div class="col-2 button">
                        <input type="submit" value="Shorten" class="btn btn-info">
                    </div>
                    <div class="col-2"></div>
                </div>
            </form>
        </div>
        <div class="table-container">
            <?php
            if (isset($_SESSION['success'])) {
            echo "<p class='success'>{$_SESSION['success']}</p>";
            unset($_SESSION['success']);
            }
            ?>
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">URL</th>
                    <th scope="col">Short URL</th>
                    <th scope="col">Count of clicks</th>
                    <th scope="col">Created date</th>
                    <th scope="col">Expiry date</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $id = 1;
                foreach ($arrRecords as $data) {
                ?>
                    <tr class="row-info">
                        <th scope="row"><?php echo $id++; ?></th>
                        <td><?php echo $data['url'] ?></td>
                        <td class="<?php
                        $today = date("Y-m-d H:i:s");
                        if(isset($data['expiration']) && $data['expiration'] != '0000-00-00 00:00:00') {
                            $date = $data['expiration'];
                            if ($date < $today) {
                                echo "date-off";
                            }
                        }
                        ?>">
                            <a target="_blank" href="<?php echo 'http://'. $_SERVER[HTTP_HOST]. '/' . $data['code'] ?>" class="link">
                                <?php echo 'http://' . $_SERVER[HTTP_HOST] . '/' . $data['code'] ?></a>
                        </td>
                        <td class="count"><?php echo $data['count'] ?></td>
                        <td><?php echo substr($data['created'], 0, strpos($data['created'], ' ')); ?></td>
                        <td><?php
                            if($data['expiration'] != '0000-00-00 00:00:00') {
                                echo substr($data['expiration'], 0, strpos($data['expiration'], ' '));
                            } else {
                                echo 'unlimited';
                            }
                            ?>
                        </td>
                        <td>
                            <form action="shorten.php" method="post">
                                <input type="hidden" name="del_user" value="<?php echo $data['id'] ?>" />
                                <input type="submit" value="Delete" class="btn btn-danger">
                            </form>
                        </td>
                    </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>
</html>