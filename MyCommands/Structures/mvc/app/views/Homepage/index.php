<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= URLROOT; ?>/css/style.css">
    <title>Home screen</title>
</head>

<body>
    <h1><?= $data['title']; ?></h1>
    <?php $this->component('exampleComponent', ['title' => 'Component']); ?>
</body>

</html>