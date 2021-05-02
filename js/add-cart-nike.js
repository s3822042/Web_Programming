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
    let size = document.getElementById('size').value;
    let quantity = document.getElementById('quantity').value;
    let product = {
      "name": name,
      "price": price,
      "size": size,
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

// function display_cart() {
//     if (cart.length) {
//       let total = 0;
//       msg = '';
//       for (let item of cart) {
//         msg += item["name"] + ": $" + item["price"] +" x " + item["quantity"] + " of Size " + item["size"];
//         let sub_total = parseFloat(item["price"]) * parseFloat(item["quantity"]);
//         msg += " = $" + sub_total + "\n";
//         total += sub_total;
//       }
//       msg += "----------------\n";
//       msg += "Total: $" + total;
//       alert(msg);
//     }
//   }

// // create a storing place for all add to cart button
// var carts = document.querySelectorAll(".addtocart");

// //specify the product
// let productDetail = {
//     name: "Air zoom Tempo NEXT %",
//     tag: "airzoom",
//     price: 255,
//     inCart: 0
// }

// // access the first one only in this case since there is only 1 product
// carts[0].addEventListener("click", () => {

//     cartNumbers(productDetail);
// })


// //this is store the quantity in local and change cart number in the nav bar
// function cartNumbers (product) {
//     let productNumbers = parseInt(localStorage.getItem("cartNumbers"));
//     let quantityNumbers = parseInt(document.getElementById("quantity").value);
//     if ( productNumbers )
//     {
//         localStorage.setItem("cartNumbers", productNumbers + quantityNumbers);
//         document.querySelector(".cart-nav span").textContent = productNumbers + quantityNumbers;
//     } else {
//         localStorage.setItem("cartNumbers", quantityNumbers);
//         document.querySelector(".cart-nav span").textContent = quantityNumbers;
//     }

//     setItems(product);
// }

// function setItems(product) {
//     let cartItems = localStorage.getItem("productsInCart");
//     let quantityNumbers = parseInt(document.getElementById("quantity").value);
//     cartItems = JSON.parse(cartItems);

//     if (cartItems != null) {
//         if (cartItems[product.tag] == undefined) {
//             cartItems = {
//                 ...cartItems,
//                 [product.tag]: product
//             }
//         }
//         cartItems[product.tag].inCart += quantityNumbers; 
//         // cartItems[product.tag].size = parseInt(document.getElementById("size").value)
//     } else {
//         product.inCart = quantityNumbers;
//         // cartItems[product.tag].size = parseInt(document.getElementById("size").value)
//         cartItems = {
//             [product.tag]: product
//         }
//     }

//     localStorage.setItem("productsInCart", JSON.stringify(product));
// }
