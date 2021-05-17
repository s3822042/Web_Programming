// container for the products
if (localStorage.getItem('cart') == null) {
    var cartItems = [];
} else {
    var cartItems = JSON.parse(localStorage.getItem('cart'));
}

// add to cart button functionality
addButton = document.querySelector('.addtocart');
addButton.addEventListener('click', addProduct);

function addProduct() {
    // if (localStorage.getItem("validatedEmailAddress") !== null) {
        let toast = document.getElementById("toast")
        let name = document.getElementById('product-name').textContent;
        let price = document.querySelector('#price span').textContent;
        let quantity = document.getElementById('quantity').value;
        let product = {
            "name": name,
            "price": price,
            "quantity": quantity
        };
        cartItems.push(product);
        localStorage.setItem('cart', JSON.stringify(cartItems));
        // add toast
        toast.classList.add("toast-visible")
        toast.innerHTML = name + " has been added to the shopping cart"
        setTimeout(function dissapear() {
            toast.classList.remove("toast-visible");
        }, 4000);
    // } else {
    //     toast.classList.add("toast-visible")
    //     toast.innerHTML = "You need to log in first in order to add product to the cart"
    //     setTimeout(function dissapear() {
    //         toast.classList.remove("toast-visible");
    //     }, 4000);
    // }
}
// remove toast (faster option)
document.getElementById("toast").addEventListener("click", function() {
    document.getElementById("toast").classList.remove("toast-visible")
})

// cart number to update on the navigation bar 
function cartNumbers() {
    let cartLocal = JSON.parse(localStorage.getItem('cart'));
    if (cartLocal != null) {
        let total = 0;
        for (let item of cartLocal) {
            total += parseInt(item['quantity']);
        }
        document.querySelector(".cart-nav span").textContent = total;
    }
}