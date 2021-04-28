const product_image = document.getElementById("product_img_cart");
const product_name = document.getElementById("product_name_cart");
const quantity = document.getElementById("quantity_cart");
const product_price = document.getElementById("product_price_cart");
const product_price_cont = document.getElementById("product_price_cont");
const product_img_cont = document.getElementById("product_img_cont");
const product_name_cont = document.getElementById("product_name_cont");
const quantity_cont = document.getElementById("quantity_cont");


window.onload = count_amount_of_product_added()
window.onload = get_product_to_cart()

function count_amount_of_product_added() {
    const cart_amount = document.getElementById("amount")
    var amount = 0;
    for (var i = 1; i <= localStorage.length; i++) {
        amount += 1;
    }
    cart_amount.innerHTML = amount;
}

function get_product_to_cart() {

    for (x in localStorage) {
        var product_content = JSON.parse(localStorage.getItem(x));
        product_image.src = product_content[0];
        var img = document.createElement("img");
        elem.setAttribute("src", product_content[0]);
        // elem.src = product_content[0]
        elem.setAttribute("alt", product_content[1]);
        elem.setAttribute("class", "product-img");
        elem.setAttribute("id", "product_img_cart");
        document.getElementById("product_img_container").appendChild(img);
        product_name.innerHTML = product_content[1];
        quantity.value = product_content[2];
        product_price.innerHTML = product_content[3];
    }
}