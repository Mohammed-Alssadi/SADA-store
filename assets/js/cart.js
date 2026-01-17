/**
 * Generic Alert Function using SweetAlert2
 */
function showAlert(type, title, message, redirect = null) {
    Swal.fire({
        icon: type,         // success | error | warning | info
        title: title,
        text: message,
        timer: 2000,
        showConfirmButton: false,
        timerProgressBar: true
    }).then(() => {
        if (redirect) {
            window.location.href = redirect;
        }
    });
}

/**
 * Add Product to Cart
 */
function addToCart(productId) {
    if (!productId) {
        showAlert('error', 'Error', 'Invalid Product ID');
        return;
    }

    fetch('handlers/cart_add.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        },
        body: new URLSearchParams({ product_id: productId })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
           
            showAlert('success', 'Added!', 'Product added to cart successfully');
            updateCartCounter();
            
        } else {
            showAlert('warning', 'Notice', data.message || 'Failed to add product');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showAlert('error', 'Oops...', ' Can Not  Buy now, Please Login ');
    });
}

/**
 * Remove Item from Cart
 */
function removeFromCart(productId) {
    Swal.fire({
        title: 'Are you sure?',
        text: "This item will be removed from your cart!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            fetch('handlers/cart_remove.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: `product_id=${productId}`
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                     location.reload();
                    const row = document.getElementById('row-' + productId);
                    if (row) row.remove();
                    
                    updateCartTotals(); 
                    showAlert('success', 'Deleted!', 'Item has been removed.');
                     
                }
            });
        }
    });
}

/**
 * Update Quantity on Server
 */
function updateQty(productId, qty){

 fetch('handlers/cart_update.php', {
  method:'POST',
  headers:{'Content-Type':'application/x-www-form-urlencoded'},
  body:`product_id=${productId}&qty=${qty}`
 })

 .then(res => res.json())

 .then(data => {

  if(data.success){

   document.getElementById('qty-'+productId).value = qty;

   updateItemTotal(productId);
   updateCartTotals();

  } else {

   alert(data.message || 'فشل تحديث الكمية');

  }

 });

}

/**
 * Update Individual Item Total in UI
 */
function updateItemTotal(productId) {
    const priceElement = document.getElementById('price-' + productId);
    const qtyElement = document.getElementById('qty-' + productId);
    const totalElement = document.getElementById('total-' + productId);

    if (priceElement && qtyElement && totalElement) {
        let price = parseFloat(priceElement.innerText.replace('$', ''));
        let qty = parseInt(qtyElement.value);
        let total = (price * qty).toFixed(2);
        totalElement.innerText = '$' + total;
    }
}

function increaseQty(productId) {
    let input = document.getElementById('qty-' + productId);
    if (input) {
        let qty = parseInt(input.value) + 1;
        updateQty(productId, qty);
    }
}

function decreaseQty(productId) {
    let input = document.getElementById('qty-' + productId);
    if (input) {
        let qty = parseInt(input.value) - 1;
        if (qty < 1) return;
        updateQty(productId, qty);
    }
}

function updateCartCounter() {
    let counter = document.getElementById('cart-count');
    if (counter) {
        counter.textContent = parseInt(counter.textContent || 0) + 1;
    }
}