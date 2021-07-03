<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Admin</title>
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <style>
        .hijau {
            background: #38ef7d;
        }

        .tosca {
            background: #73c9bb;
        }

        li {
            margin: 4px 0;
        }
    </style>
</head>


<body>
    <div class="container-fluid bg-light">
        <div class="row">

            <!--Navbar-->
            <?php include 'navbar.php' ?>

            <div class="col-md-12">
                <div class="row">

                    <!--Sidebar-->
                    <?php include 'sidebar.php' ?>

                    <div class="col-md-4">
                        <?php include 'tabel.php' ?>
                    </div>

                    <div class="col-md-4">
                        <?php include 'tabel2.php' ?>

                    </div>
                </div>
            </div>

        </div>
    </div>
</body>


<script src=" https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</html>