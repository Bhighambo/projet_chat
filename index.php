<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login_chat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body class="d-flex justify-content-center align-items-center vh-100">

    <div class="w-400 p-5 shadow rounded">
        <form method="post" action="app/http/auth.php">
            <div class="f-flex justify-content-center align-items-center flex-column">
                <h3 class="display-4 fs-1 text-center">LOGIN</h3>
                <?php if (!empty($_GET["message"])): ?>
                    <div class="alert alert-danger"><?php echo $_GET["message"]; ?></div> 
                <?php endif ?>
                
            </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">E-Mail</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="user_mail">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="user_password">
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="afficherMotdepasse" onchange="afficher(this);">
            <label class="form-check-label" for="afficherMotdepasse">Afficher Mot de passe</label>
          </div>
          <button type="submit" class="btn btn-primary">Connexion</button>
          <a href="inscription.php">Créer compte</a>
        </form> 
    </div>

    <script>
        function afficher(x){
          var affiche=x.checked;
          if (affiche) {
            document.getElementById("exampleInputPassword1").type="text";
            document.getElementById("afficherMotdepasse").textContent="Hide";
          }else{
            document.getElementById("exampleInputPassword1").type="password";
            document.getElementById("afficherMotdepasse").textContent="Show";
          }
        }
   </script>
    
</body>
</html>