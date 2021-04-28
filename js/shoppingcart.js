// taking input from the product page
const new_product = []
const product_name = document.getElementById("product_name").innerHTML;
const product_image = document.getElementById("product_image").src;
const product_price = document.getElementById("product_price").innerHTML;
const quantity = document.getElementById("quantity");

function add_to_cart() {

    // check if the user had an accoutn already or not
    if (localStorage.getItem(product_name) === null) {
        new_product.push(product_image);
        new_product.push(product_name);
        new_product.push(quantity.value);
        new_product.push(product_price);
        localStorage.setItem(product_name, JSON.stringify(new_product));
        count_amount_of_product_added();
    } else if (localStorage.getItem(product_name) !== null) {
        var product_content = localStorage.getItem(product_name);
        var product_information = JSON.parse(product_content);
        product_information[2] = Number(product_information[2]) + Number(quantity.value);
        localStorage.setItem(product_name, JSON.stringify(product_information));
        count_amount_of_product_added();
    }

}


function count_amount_of_product_added() {
    const cart_amount = document.getElementById("amount")
    var amount = 0;
    for (var i = 1; i <= localStorage.length; i++) {
        amount += 1;
    }
    cart_amount.innerHTML = amount;
}


window.onload = count_amount_of_product_added()


document.getElementById("addtocart_button").addEventListener("click", add_to_cart)
    //product_name,product_image,quantity,addtocart_button, product_price, amount(for cart symbol)