<?php if(isset($_SESSION['identity'])):?>
    <h2>make order</h2>
    <p>
        <a href="<?=base_url?>cart/index">Return to cart</a>
    </p>
    <br/>
    <h3>Delivery Address</h3>
    <form action="<?=base_url?>order/make" method="POST">

        <label for="country">Address</label>
        <input type="text" name="address" required/>

        <label for="country">Country</label>
        <input type="text" name="country" required/>

        <label for="country">Postcode</label>
        <input type="text" name="postcode" required/>

        <input type="submit" value="CHECKOUT" />

    </form>
<?php else: ?>
    <h2>Login needed</h2>
    <p>You need to Log in in order to make an order</p>
<?php endif;?>