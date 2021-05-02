function totalCost() {
    let cart = JSON.parse(localStorage.getItem("cart"));
    let total = 0;
    msg = '';
    for (let item of cart) {
        // msg += item["name"] + ": $" + item["price"] +" x " + item["quantity"] + " of Size " + item["size"];
        let sub_total = parseFloat(item["price"]) * parseFloat(item["quantity"]);
        // msg += " = $" + sub_total + "\n";
        total += sub_total;
    }
    msg += "----------------\n";
    msg += "Total: $" + total;
    localStorage.setItem("totalCost", total);
}

function displayCart() {
    let cart = JSON.parse(localStorage.getItem("cart"));
    let total = localStorage.getItem("totalCost");
    let productContainer = document.querySelector(".products");
    console.log(cart);

    if (cart && productContainer) 
    {
        productContainer.innerHTML = '';
        Object.values(cart).map(item => {
            if (item.size == undefined) {
                productContainer.innerHTML += '<div class="product">\n' + '<i class="fas fa-times-circle"></i>\n' + '<div class="product-title">' + item.name 
                + ' (Size: None)' + '</div\n>' + '<div class="price">$' + item.price + '.00</div>\n' + '<div class="quantity">' + item.quantity + '</div>\n' 
                + '<div class="total">$' + (item.quantity * item.price) + '.00</div>\n';
            } else {
                productContainer.innerHTML += '<div class="product">\n' + '<i class="fas fa-times-circle"></i>\n' + '<div class="product-title">' + item.name 
                + ' (Size: ' + item.size + ')' + '</div\n>' + '<div class="price">$' + item.price + '.00</div>\n' + '<div class="quantity">' + item.quantity 
                + '</div>\n'+ '<div class="total">$' + (item.quantity * item.price) + '.00</div>\n';
            }
            productContainer.innerHTML += '</div>\n';
        });

        productContainer.innerHTML += '<div class="basketTotalContainer">' + '<h4 class="basketTotalTitle">TOTAL: ' + '<h4 class="basketTotal">$' + total + '.00</h4>' + '</h4>' + '</div>\n';
    }
}

// function calls 
displayCart();
totalCost();

// cart number to update on the navigation bar 
function cartNumbers() {
    let cartLocal = JSON.parse(localStorage.getItem('cart'));
    if ( cartLocal != null )
    {
        let total = 0;
        for (let item of cartLocal) {
          total += parseInt(item['quantity']);
        }
        document.querySelector(".cart-nav span").textContent = total;
    } 
  }
