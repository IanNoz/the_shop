<h2>Cart</h2>

<table>
    <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Price</th>
        <th>Units</th>
    </tr>
    
    <?php foreach($cart as $index => $element): ?> 
        
        <?php $product = $element['product']; ?>
        
        <tr>
            <td>
                <?php if($product->image != NULL):?>
                    <img src="<?=base_url?>/uploads/images/<?=$product->image?>" class="img-cart"/>
                <?php else:?>
                    <img src="<?=base_url?>/assets/img/camiseta.png<?=$product->image?>" class="img-cart"/>
                <?php endif;?>
            </td>
            <td>
                <a href="<?=base_url?>product/show&id=<?=$product->id?>">
                    <?= $product->name?>
                </a>
            </td>
            <td>
                <?= $product->price?>
            </td>
            <td>
                <?= $element['units']?>
            </td>
        </tr>
    
    <?php endforeach;?>
</table>
<br/>

<div class="total-cart">
    <?php $stats = Utils::cartStats(); ?>

    <h3>Total: £<?=$stats['total']?></h3>
    <a href="<?=base_url?>order/index" class="button button-checkout"> CHECK OUT </a>
</div>