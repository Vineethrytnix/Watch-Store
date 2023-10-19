<?php
session_start();
$uid = $_SESSION['uid'];
// echo $uid."hello";
include '../connection/connect.php';
include 'header.php'
    ?>



<center><br>
    <b>
        <h1>Shopping Cart <img src="../assets/img/cart.png" width="50px" alt=""></h1>
    </b><br><br>
</center>
<section class="cart_area ">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $view = "SELECT `cart`.*,`category`.*,`products`.* FROM `products`,`category`,`cart` WHERE `category`.`c_id`=`products`.`cid` AND `cart`.`pid`=`products`.`pid` AND `cart`.`uid`='$uid' AND `cart`.`status`='incart'";
                        $exe = mysqli_query($conn, $view);
                        $total = 0; // Initialize total variable
                        
                        // Check if there are products in the cart
                        if (mysqli_num_rows($exe) > 0) {
                            while ($row = mysqli_fetch_array($exe)) {
                                $price = $row['price'];
                                $pid = $row['pid'];
                                $cartId = $row['cart_id'];
                                $quantity = $row['quantity'];
                                $subtotal = $price * $quantity;
                                $total += $subtotal; // Update total with this row's subtotal
                                ?>
                                <tr>
                                    <td>
                                        <img src="../assets/image/<?php echo $row['pimage']; ?>" width="100px" alt="">
                                    </td>
                                    <td>
                                        <?php echo $row['pname']; ?>
                                    </td>
                                    <td>&#8377;
                                        <?php echo $price; ?>
                                    </td>
                                    <td>
                                        <input type="number" class="quantity form-control" style="width:100px"
                                            data-cart-id="<?php echo $cartId; ?>" value="<?php echo $quantity; ?>" min="1">
                                    </td>
                                    <td> ₹
                                        <?php echo $subtotal; ?>
                                    </td>
                                    <td>
                                        <a href="delete_cart.php?cart_id=<?php echo $cartId; ?>&pid=<?php echo $pid; ?>"><img
                                                src="../assets/img/delete.png" width="30px" alt="hsedhjdsvhj"></a>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            // No products in cart
                            echo '<tr><th colspan="6"><center><h1>No products in cart <img src="../assets/img/empty-cart.png" width="60px" alt=""></h1></center></th></tr>';
                        }
                        ?>
                        <tr>
                            <th colspan="6">
                                <div class="cupon_text float-right">
                                    <p>Total: &#8377; <span id="total">
                                            <?php echo $total; ?>
                                        </span></p>
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <th colspan="6">
                                <div class="cupon_text float-right">
                                    <?php
                                    if (mysqli_num_rows($exe) > 0) {
                                        // Display the "Proceed to checkout" button if there are products in the cart
                                        echo '<a class="btn_1" href="payment1.php?total=' . $subtotal . '">Proceed to checkout</a>';
                                    }
                                    ?>
                                </div>
                            </th>
                        </tr>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</section>


<script>
    // JavaScript code for updating quantity and calculating total
    const quantityInputs = document.querySelectorAll('.quantity');
    const totalElement = document.getElementById('total');
    const checkoutButton = document.getElementById('checkout');

    // Function to update the subtotal and total
    function updateTotals() {
        let newTotal = 0;
        quantityInputs.forEach(input => {
            const cartId = input.getAttribute('data-cart-id');
            const price = parseFloat(input.parentElement.previousElementSibling.textContent.slice(2)); // Remove '&#8377;'
            const quantity = parseInt(input.value);
            const subtotal = price * quantity;
            newTotal += subtotal;
            document.querySelector(`[data-cart-id="${cartId}"]`).parentElement.nextElementSibling.textContent = `₹ ${subtotal.toFixed(2)}`;
        });
        totalElement.textContent = `${newTotal.toFixed(2)}`;
    }

    // Event listeners for quantity input changes
    quantityInputs.forEach(input => {
        input.addEventListener('input', () => {
            updateTotals();
        });
    });

    // Event listener for checkout button
    checkoutButton.addEventListener('click', () => {
        // Add your code to handle the checkout process here
        alert('Checkout button clicked');
    });

    // Initial total calculation
    updateTotals();
</script>
</body>


<?php
include 'footer.php'
    ?>