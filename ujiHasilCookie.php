<?php
if (isset($_GET["action"])) {
	if ($_GET["action"] == "delete") {
		$cookie_data = stripslashes($_COOKIE['keranjang']);
		$cart_data = json_decode($cookie_data, true);
		foreach ($cart_data as $keys => $values) {
			if ($cart_data[$keys]['itemId'] == $_GET["id"]) {
				unset($cart_data[$keys]);
				$item_data = json_encode($cart_data);
				setcookie("keranjang", $item_data, time() + (86400 * 30));
				header("location:ujiHasilCookie.php?remove=1");
			}
		}
	}
	if ($_GET["action"] == "clear") {
		setcookie("keranjang", "", time() - 3600);
		header("location:ujiHasilCookie.php?clearall=1");
	}
}
?>

<?php
if (isset($_COOKIE["keranjang"])) :
    $total = 0;
    $cookie_data = stripslashes($_COOKIE['keranjang']);
    $cart_data = json_decode($cookie_data, true);
    // $cart_clear = array_map($cart_data);
    var_dump($cart_data);
    foreach ($cart_data as $keys => $values) :
?>


<form method="get" class="card">
    <input type="text" spellcheck="false" name="idMagazine" value="<?=$values['itemId']?>">
    <input type="text" spellcheck="false" name="namaJalan" value="<?=$values['itemJalan']?>">
    <a href="ujiHasilCookie.php?action=delete&id=<?=$values['itemId']?>">Delete</a>
</form>


<?php
endforeach;
endif;
?>