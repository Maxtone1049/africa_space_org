

document.addEventListener("DOMContentLoaded", () => {
    fetch("storeApi.php") // Ensure this path is correct relative to where the HTML is served
        .then(response => {
            if (!response.ok) {
                throw new Error("Network response was not ok: " + response.statusText);
            }
            return response.json();
        })
        .then(data => {
            if (data.error) {
                document.getElementById("product-grid").innerHTML = `<p>${data.error}</p>`;
                return;
            }

            // Populate products in the HTML
            document.getElementById("product-grid").innerHTML = data.map(product => `

                <div>
                    <a href="#">
                        <div class="product-card" data-product-id="${product.id}">
                            <div class="seperate">
                                <button class="pre-order-btn">Pre-order now</button>
                                </div>
                                <img class="img" src="${product.image}" alt="${product.product_name}">
                            <div class="seperate">
                                <p class="size">${product.size}</p>
                                <p class="price">${product.price}  </p>
                                <p class="product_name na">${product.product_name}</p>
                                <p class="description de">${product.description}</p>
                                <p class="colours de">${product.colours}</p>


                            </div>
                        </div>
                        <p class="">${product.product_name}</p>
                    </a>
                </div>


            `).join('');
        })
        .catch(error => {
            console.error("Fetch error:", error);
            document.getElementById("product-grid").innerHTML = `<p>Error fetching products: ${error.message}</p>`;
        });
});


// When clicking a product card, store product details in localStorage
document.getElementById('product-grid').addEventListener('click', function(event) {
    if (event.target.closest('.product-card')) {
        const productCard = event.target.closest('.product-card');
        const productId = productCard.dataset.productId;

        // Find the product from the displayed data (assuming the product data is in the DOM)
        const productDetails = Array.from(document.querySelectorAll('.product-card'))
            .find(card => card.dataset.productId === productId);

        if (productDetails) {
            // Store the product details in localStorage
            localStorage.setItem('productDetails', JSON.stringify({
                id: productId,
                product_name: productDetails.querySelector('.product_name').textContent,
                description: productDetails.querySelector('.description').textContent,
                price: productDetails.querySelector('.price').textContent,
                size: productDetails.querySelector('.size').textContent,
                colours: productDetails.querySelector('.colours').textContent,
                
                image: productDetails.querySelector('.img').src


            }));

            // Redirect to the detail page
            window.location.href = "detailpage.php";
        }
    }
});