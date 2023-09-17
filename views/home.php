<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.png">
    <title>Simple PHP MVC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <section class="mt-4">
            <div class="row">
                <div class="col text-center">
                    <h2>Testa uzdevums</h2>
                </div>
            </div>
        </section>
        <section class="mt-4">
            <div class="row">
                <div class="col">
                    <form action="/new-test" method="POST">
                        <div class="mb-3">
                            <input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Ievadi savu vārdu">
                        </div>
                        <div class="mb-3">
                            <select class="form-select" aria-label="Izvēlies testu">
                                <option selected>Izvēlies testu</option>
                                <?php foreach ($testList as $test) : ?>
                                    <option value="<?php echo $test->getId() ?>"><?php echo $test->getName() ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3 text-center">
                            <input type="submit" value="save">
                            <button type="submit" class="btn btn-primary">Sākt</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>