<h2>Manage Categories</h2>

<a href="<?=base_url?>category/create" class="button button-small">
    Create Category
</a>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
    </tr>
    <?php while($cat = $categories->fetch_object()): ?>
    <tr>
        <td><?= $cat->id; ?></td>
        <td><?= $cat->name; ?></td>
    </tr>
    <?php endwhile; ?>
</table>