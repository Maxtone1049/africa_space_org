


document.getElementById('checkout-form').addEventListener('submit', function(event) {
    event.preventDefault();  // Prevent form submission

    const firstName = document.querySelector('#first_name').value;
    const lastName = document.querySelector('#last_name').value;
    const email = document.querySelector('#email').value;
    const phone = document.querySelector('#phone').value;
    const address = document.querySelector('#address').value;
    const city = document.querySelector('#city').value;
    const postalCode = document.querySelector('#postalCode').value;
    const country = document.querySelector('#country').value;

    const cartItems = JSON.parse(localStorage.getItem('cartData')) || [];
    console.log(cartItems.total);

    let lastItem = null;

    if (cartItems && Array.isArray(cartItems.items)) {
        cartItems.items.forEach(item => {
            lastItem = item;
        });
    }

    console.log(lastItem);

    const txRef = 'afus' + Date.now(); // Unique transaction reference

    // Ensure lastItem has valid data
    if (!lastItem) {
        console.error('No items found in the cart.');
        return;
    }

    // Flutterwave Checkout
    FlutterwaveCheckout({
    public_key: "FLWPUBK_TEST-ac960a48cf2670df7c3d8a479ddb6869-X",
    tx_ref: txRef,  // Make sure txRef is properly defined elsewhere
    amount: cartItems.total,
    currency: "ZAR",
    payment_options: "card, ussd",  // You may want to add 'mobile_money' or others, depending on your use case
    customer: {
        email: email,  // Ensure email is valid
        phone_number: phone,  // Ensure phone is valid
        name: `${firstName} ${lastName}`,  // Make sure firstName and lastName are defined
    },
    customizations: {
        title: "Africa United Space",
        logo: "https://checkout.flutterwave.com/assets/img/rave-logo.png",
    },
    callback: function (data) {
        console.log('Payment Successful', data);

        const transactionReference = data.tx_ref;
        const status = data.status;  // 'success' or other status
        const transactionId = data.transaction_id;

        // Send payment data to the server using fetch
        fetch("savePayment.php", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                item_name: lastItem.name,
                item_price: lastItem.price,
                item_quantity: lastItem.quantity,
                subtotal: cartItems.total,
                item_image: lastItem.image, 
                item_size: lastItem.size,
                first_name: firstName,
                last_name: lastName,
                email: email,
                country: country, 
                address: address,
                city: city,
                postal_code: postalCode,
                phone: phone,
                total_amount: cartItems.total,
                tx_ref: data.tx_ref,  
                status: data.status,  
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === "success") {
                console.log('Payment data saved successfully', data);
            } else {
                console.error('Failed to save payment data', data);
            }
        })
        .catch(error => {
            console.error('Error saving payment data', error);
        });
        
        return false;
    },
});


});


