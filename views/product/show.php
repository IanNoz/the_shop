<?php if(isset($product)): ?>
    
    <h2><?=$product->name?></h2>

    <div id="detail-product">
        <div class="image">
            <?php if($product->image != NULL):?>
                <img src="<?=base_url?>/uploads/images/<?=$product->image?>"/>
            <?php else:?>
                <img src="<?=base_url?>/assets/img/camiseta.png<?=$product->image?>"/>
            <?php endif;?>
        </div>
        <div class="data">
            <p class="description"><?=$product->description?></p>
        
            <p class="price"><?=$product->price?></p>
    
            <a href="<?=base_url?>cart/add&id=<?=$product->id?>" class="button">BUY</a>
        </div>
    </div>
 
<?php else:?>

    <h2>The product you are looking for doesn't exist</h2>

<?php endif;?>