document.addEventListener('DOMContentLoaded', () => {
    const cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
    const cartElement = document.querySelector('.cart-items');
    const totalPriceElement = document.querySelector('.total-price');

    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', () => {
            const productId = button.getAttribute('data-product-id');
            const productName = button.getAttribute('data-product');
            const productPrice = parseFloat(button.getAttribute('data-price'));
            const productImage = button.getAttribute('data-image');
            addItemToCart(productId, productName, productPrice, productImage);
        });
    });

    function addItemToCart(productId, productName, productPrice, productImage) {
        const item = cartItems.find(item => item.id === productId);
        if (item) {
            item.quantity++;
        } else {
            cartItems.push({ id: productId, name: productName, price: productPrice, image: productImage, quantity: 1 });
        }
        updateCart();
        saveCart();
    }

    function removeItemFromCart(productId) {
        const itemIndex = cartItems.findIndex(item => item.id === productId);
        if (itemIndex !== -1) {
            cartItems.splice(itemIndex, 1);
        }
        updateCart();
        saveCart();
    }

    function increaseQuantity(productId) {
        const item = cartItems.find(item => item.id === productId);
        if (item) {
            item.quantity++;
        }
        updateCart();
        saveCart();
    }

    function decreaseQuantity(productId) {
        const item = cartItems.find(item => item.id === productId);
        if (item && item.quantity > 1) {
            item.quantity--;
        } else if (item && item.quantity === 1) {
            removeItemFromCart(productId);
            return; // Exit early since removeItemFromCart calls updateCart and saveCart
        }
        updateCart();
        saveCart();
    }
    // const reduceButton = document.getElementsByClassName('bOne');
    // reduceButton.addEventListener('click',()=>{
    //     decreaseQuantity(item.id);
    // });
    function updateCart() {
        cartElement.innerHTML = '';
        let total = 0;
        cartItems.forEach(item => {
            const li = document.createElement('div');
            const img = document.createElement('img');
            img.src = item.image;
            img.alt = item.name;
            img.style.width = '50px'; // Adjust as needed
            img.style.height = '50px'; // Adjust as needed

            li.textContent = `${item.name} - $${item.price.toFixed(2)} x ${item.quantity}`;
            const increaseButton = document.createElement('button');
            increaseButton.textContent = '+';
            increaseButton.addEventListener('click', () => {
                increaseQuantity(item.id);
            });

            const decreaseButton = document.createElement('button');
            decreaseButton.textContent = '-';
            decreaseButton.addEventListener('click', () => {
                decreaseQuantity(item.id);
            });

          

            li.insertBefore(img, li.firstChild);
            li.appendChild(increaseButton);
            li.appendChild(decreaseButton);
            cartElement.appendChild(li);
            total += item.price * item.quantity;
        });
        totalPriceElement.textContent = `Total: $${total.toFixed(2)}`;
    }

    function saveCart() {
        localStorage.setItem('cartItems', JSON.stringify(cartItems));
    }

    // Initialize cart display
    updateCart();
});
