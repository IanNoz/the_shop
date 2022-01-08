<h2>Our Products</h2>

<?php while($product = $products->fetch_object()): ?>
<div class="product">
	<a href="<?=base_url?>product/show&id=<?=$product->id?>">
		<?php if($product->image != NULL):?>
			<img src="<?=base_url?>/uploads/images/<?=$product->image?>"/>
		<?php else:?>
			<img src="<?=base_url?>/assets/img/camiseta.png<?=$product->image?>"/>
		<?php endif;?>
		<h2><?=$product->name?></h2>
	</a>
	<p><?=$product->price?></p>
	<p><?=$product->description?></p>
	<a href="<?=base_url?>cart/add&id=<?=$product->id?>" class="button">BUY</a>
</div>
<?php endwhile;?>