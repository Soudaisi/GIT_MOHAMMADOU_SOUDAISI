<?php
require 'config.php';

$motcle = $_GET['q'] ?? '';

$stmt = $pdo->prepare("SELECT * FROM employes WHERE nom LIKE ? OR prenom LIKE ?");
$stmt->execute(["%$motcle%", "%$motcle%"]);
$employes = $stmt->fetchAll();
?>

<form method="GET">
    <input type="text" name="q" placeholder="Rechercher un employé..." value="<?= htmlspecialchars($motcle) ?>">
    <button type="submit">Rechercher</button>
</form>

<?php if ($motcle && empty($employes)): ?>
    <p>Aucun résultat trouvé pour "<?= htmlspecialchars($motcle) ?>"</p>
<?php endif; ?>

<?php if (!empty($employes)): ?>
    <table border="1">
        <tr>
            <th>Nom</th><th>Prénom</th><th>Poste</th><th>Email</th><th>Téléphone</th><th>Date</th>
        </tr>
        <?php foreach ($employes as $e): ?>
        <tr>
            <td><?= $e['nom'] ?></td>
            <td><?= $e['prenom'] ?></td>
            <td><?= $e['poste'] ?></td>
            <td><?= $e['email'] ?></td>
            <td><?= $e['telephone'] ?></td>
            <td><?= $e['date_embauche'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>
