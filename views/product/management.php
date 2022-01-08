<h2>Products Management</h2>

<a href="<?=base_url?>product/create" class="button button-small">
    Create Product
</a>

<?php if (isset($_SESSION['product']) && $_SESSION['product'] == 'completed'):?>
    <strong class="alert-green">The prduct has been added successfully</strong>
<?php elseif(isset($_SESSION['product']) && $_SESSION['product'] != 'completed'):?>
    <strong class="alert-red">The prduct couldn't be added</strong>
<?php endif;?>
<?php Utils::deleteSession('product');?>

<?php if (isset($_SESSION['delete']) && $_SESSION['delete'] == 'completed'):?>
    <strong class="alert-green">The prduct has been deleted successfully</strong>
<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] != 'completed'):?>
    <strong class="alert-red">The prduct couldn't be deleted</strong>
<?php endif;?>
<?php Utils::deleteSession('delete');?>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Stock</th>
        <th>actions</th>
    </tr>
    <?php while($product = $products->fetch_object()): ?>
    <tr>
        <td><?= $product->id; ?></td>
        <td><?= $product->name; ?></td>
        <td><?= $product->price; ?></td>
        <td><?= $product->stock; ?></td>
        <td>
            <a href="<?=base_url?>product/edit&id=<?=$product->id?>" class="button button-management">Edit</a>
            <a href="<?=base_url?>product/delete&id=<?=$product->id?>" class="button button-management button-red">Delete</a>
    </tr>
    <?php endwhile; ?>
</table>