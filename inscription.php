<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription_chat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body class="d-flex justify-content-center align-items-center vh-100">

    <div class="w-400 p-5 shadow rounded">
        <form method="post" action="app/http/enregistrement.php" enctype="multipart/form-data" >
            <div class="f-flex justify-content-center align-items-center flex-column">
                <h3 class="display-4 fs-1 text-center">Inscription</h3>

                <?php if (!empty($_GET["message"])): ?>
                    <div class="alert alert-danger"><?php echo $_GET["message"]; ?></div> 
                <?php endif ?>
                
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nom" name="nom">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Pos-nom" name="postnom">
            </div>
            <div class="mb-3">
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Mail" name="mail">
            </div>
            <div class="mb-3">
                <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Photo" name="photo">
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe" name="motdepasse">
            </div>
            <button type="submit" class="btn btn-primary">Entregistrer</button>
            <a href="index.php">Login</a>
        </form>
        
    </div>
    
</body>
</html>