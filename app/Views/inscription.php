<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h2>Créer un compte</h2>

    <?php if(isset($validation)): ?>
        <div style="color:red;">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('/enregistrer') ?>" method="post">
        <label>Nom :</label><br>
        <input type="text" name="nom" required><br><br>

        <label>Prenom :</label><br>
        <input type="text" name="prenoms" required><br><br>

        <label>Email :</label><br>
        <input type="email" name="email" required><br><br>

        <label>Telephone :</label><br>
        <input type="text" name="telephone" required><br><br>

        <label>Mot de passe :</label><br>
        <input type="password" name="mot_de_passe" required><br><br>

        <button type="submit">S'inscrire</button>

    </form>
</body>
</html>