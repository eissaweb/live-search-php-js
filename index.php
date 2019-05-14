<?php
require __DIR__ . "/vendor/autoload.php";

use App\Book;
use Config\DB;
use Config\Config;
$src = Config::path() . 'src/';
$db = new DB;
$post = new Book($db->connect());

?>

<?php require_once 'src/templates/header.html' ?>
<?php if ($_SERVER['REQUEST_METHOD'] === 'POST'):?>
<div class="container">
	<h4 class="display-4">Results of "<?= $_POST['q'] ?>"</h4>
	<div class="row">
	<div class="col-11">
		<?php 
		require_once "app/controllers/Search.php";
		foreach ($results as $result): ?>
		<li class="list-group-item"><?php $result->title ?> Author : 
			<?php echo $result->author ?></li>

<?php endforeach; ?>
	</div>
</div>

</div>
<?php endif;?>
<?php require_once 'src/templates/footer.php' ?>