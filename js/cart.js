function totalCost() {
    let cart = JSON.parse(localStorage.getItem("cart"));
    let total = 0;
    // msg = '';
    for (let item of cart) {
        // msg += item["name"] + ": $" + item["price"] +" x " + item["quantity"] + " of Size " + item["size"];
        let sub_total = parseFloat(item["price"]) * parseFloat(item["quantity"]);
        // msg += " = $" + sub_total + "\n";
        total += sub_total;
    }
    // msg += "----------------\n";
    // msg += "Total: $" + total;
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
    
        productContainer.innerHTML += '<div class="basketTotalContainer">' 
        + '<h4 class="basketTotalTitle">ORDER TOTAL: ' + '<h4 class="basketTotal">$' + total + '.00</h4>' + '</h4>'
        + '</div>\n';
    }
}

function afterCoupon () {
    let couponValue = document.querySelector("#coupon-input-field");
    let paymentTotal = document.querySelector("#paymentTotalValue span");
    let total = localStorage.getItem("totalCost");

    // console.log(couponValue.value);
    // console.log(paymentTotal.textContent);
    console.log(couponValue.value);
    // console.log(total);
    if (couponValue.value == "COSC2430-HD") {
        paymentTotal.innerHTML = '$' + (parseFloat(total)*0.8).toFixed(2) + ' (-20%)';
    } 
    else if (couponValue.value == "COSC2430-DI") {
        paymentTotal.innerHTML = '$' + (parseFloat(total)*0.9).toFixed(2) + ' (-10%)';
    } 
    else if (total == null) {
        paymentTotal.innerHTML = 'Go buy some!';
        document.querySelector(".order-button a").href = "#";
    } 
    else {
        paymentTotal.innerHTML = '$' + total + '.00';
   }  
 }

 function validCoupon() {
    let couponValue = document.querySelector("#coupon-input-field");
    let paymentTotal = document.querySelector("#paymentTotalValue span");
    if (couponValue.value != "COSC2430-HD" && couponValue.value != "COSC2430-DI" && couponValue.value != "")
    {
        paymentTotal.innerHTML = "Invalid coupon code!";
        document.querySelector(".order-button a").disabled = true;
    }
 }

// function calls 
afterCoupon();
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
