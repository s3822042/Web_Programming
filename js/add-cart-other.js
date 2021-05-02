// container for the products
if (localStorage.getItem('cart') == null)
{
  var cartItems = [];
} else {
  var cartItems = JSON.parse(localStorage.getItem('cart'));
}

// add to cart button functionality
addButton = document.querySelector('.addtocart');
addButton.addEventListener('click', addProduct);
function addProduct() {
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
}

// cart number to update on the navigation bar 
function cartNumbers () {
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

