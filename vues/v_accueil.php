<html>
<head>
    <title>Accueil</title>
    <link rel="stylesheet" type="text/css" href="/includes/assets/css/style.css">
</head>
<body class="accueil" style="background-color:#056FC7;">

<div class="formulaire" style="float: left; margin-top: 12em; margin-left: 10em; text-align: center; color: white;">
    <h2 style="background-color: white; color: black; border-radius: 2em; padding: 0.1em;">Connexion</h2>

    <form action="index.php?uc=auth&action=connexion" method="post" class="form" style="background: linear-gradient(75deg, white, whitesmoke); border-radius: 15px; padding: 2em; margin-top: 0.1em; width: 20em; box-shadow: 6px 4px 4px black;">
        <input style="height: 2em;padding: 1em; background-color: rgba(217, 217, 217, 1); border:none; border-radius:0.5em;" type="text" placeholder="Login" name="login" required><br><br>
        <input style="height: 2em; padding: 1em; background-color: rgba(217, 217, 217, 1); border:none; border-radius:0.5em;" type="password" placeholder="Mot de passe" name="password" required><br><br>
        <input type="submit" style="width: 10em;height: 2.5em; margin-bottom: 0.001em; margin-top:2em; background-color: rgba(217, 217, 217, 1); border:none; border-radius:1em;" value="Se connecter" name="submit"><br><br>
    </form>
</div>
<div class="image" style="box-shadow: 10px 9px 11px black; float:right; margin-right:20em; margin-top:2em; margin-bottom:2em; border-radius:15px; overflow:hidden;">

    <img src="https://st3.depositphotos.com/6469658/15905/i/600/depositphotos_159053534-stock-photo-wave-band-abstract-background-surface.jpg" style="width: 400px; height: 600px;"alt="Image_de_bienvenue">
</div>
</body>
</html>