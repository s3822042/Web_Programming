// taking input from the product page
function add_to_cart() {
    if (localStorage.getItem("validatedEmailAddress") !== null) {
        let toast = document.getElementById("toast")
        let new_product = []
        let product_name = document.getElementById("product_name").innerHTML;
        let product_image = document.getElementById("product_image").src;
        let product_price = document.getElementById("product_price").innerHTML;
        let quantity = document.getElementById("quantity");
        // check if the user had an accoutn already or not
        if (localStorage.getItem(product_name) === null) {
            new_product.push(product_image);
            new_product.push(product_name);
            new_product.push(quantity.value);
            new_product.push(product_price);
            localStorage.setItem(product_name, JSON.stringify(new_product));
            count_amount_of_product_added();
        } else
        if (localStorage.getItem(product_name) !== null) {
            var product_content = localStorage.getItem(product_name);
            var product_information = JSON.parse(product_content);
            product_information[2] = Number(product_information[2]) + Number(quantity.value);
            localStorage.setItem(product_name, JSON.stringify(product_information));
            count_amount_of_product_added();
        }
        toast.classList.add("toast-visible")
        toast.innerHTML = product_name + " has been added to the shopping cart"
        setTimeout(function dissapear() {
            toast.classList.remove("toast-visible");
        }, 4000);
    } else {
        toast.classList.add("toast-visible")
        toast.innerHTML = "You need to log in first in order to add product to the cart"
        setTimeout(function dissapear() {
            toast.classList.remove("toast-visible");
        }, 4000);
    }
}


function count_amount_of_product_added() {
    const cart_amount = document.getElementById("amount")
    let amount = 0;
    for (var i = 1; i <= localStorage.length; i++) {
        let email = localStorage.key(i)
        if (email !== 'validatedEmailAddress') {
            amount += 1;
        }
    }
    cart_amount.innerHTML = amount;
}

document.getElementById("toast").addEventListener("click", function() {
    document.getElementById("toast").classList.remove("toast-visible")
})
window.onload = count_amount_of_product_added()
document.getElementById("addtocart_button").addEventListener("click", add_to_cart)

//product_name,product_image,quantity,addtocart_button, product_price, amount(for cart symbol)