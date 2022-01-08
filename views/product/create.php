
<?php if(isset($edit) && $edit && isset($pro) && is_object($pro)):?>
    <h2>Edit Product <?=$pro->name?></h2>
    <?php $url_action = base_url."product/save&id=".$pro->id;?>
<?php else:?>
    <h2>Create Product</h2>
    <?php $url_action = base_url."product/save";?>
<?php endif;?>

<div class="form_container">
    
    <form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">
        <label for="name">Name</label>
        <input type="text" name="name" value="<?=isset($pro) && is_object($pro) ? $pro->name : '';?>" required/>

        <label for="description">Description</label>
        <textarea name="description" required><?=isset($pro) && is_object($pro) ? $pro->name : '';?></textarea>

        <label for="price">Price</label>
        <input type="text" name="price" value="<?=isset($pro) && is_object($pro) ? $pro->price : '';?>" required/>

        <label for="stock">Stock</label>
        <input type="number" name="stock" value="<?=isset($pro) && is_object($pro) ? $pro->stock : '';?>" required/>

        <label for="category">Category</label>
        <?php $categories = Utils::showCategories();?>
        <select name="category">
            <?php while($cat = $categories->fetch_object()):?>
                <option value="<?=$cat->id;?>" <?=isset($pro) && is_object($pro) && $cat->id == $pro->category_id ? 'selected' : '';?>>
                    <?=$cat->name?>
                </option>
            <?php endwhile; ?>
        </select>

        <label for="image">Image</label>
        <?php if(isset($pro) && is_object($pro) && !empty($pro->image)):?>
            <img src="<?=base_url?>/uploads/images/<?=$pro->image?>" class="thumb">
        <?php endif;?>
        <input type="file" name="image"/>

        <input type="submit" value="Save" />
    </form>
</div>
