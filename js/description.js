// $(document).ready(function () {
//   $('.discount').hide();
//   // Initial values
//   let quantity = 1;
//   let price = 2499.00;
//   let discount = 0;  

//   function updatePrices() {
//     let subtotal = price * quantity;
//     let total = subtotal - discount; 

//     $('#quantity').text(quantity);
//     $('#subtotal').text('RS ' + subtotal.toFixed(2));
//     $('#total').text('RS ' + total.toFixed(2));
//   }

//   $('.addbtn').click(function () {
//     quantity++;
//     updatePrices();
//     showMessage("Increased quantity");
//   });

//   $('.subbtn').click(function () {
//     if (quantity > 1) {
//       quantity--;
//       updatePrices();
//       showMessage("Decreased quantity");
//     }
//   });

//   removeItem = function () {
//     $('.cart-product').hide();
//     quantity = 0;
//     $('#quantity').text("0");
//     $('#subtotal').text("RS 0.00");
//     $('#total').text("RS 0.00");
//     $('.discount').hide();
//     showMessage("Item removed");
//   };

//   // applyPromo = function () {
//   //   let code = $('#promoInput').val().toLowerCase();
//   //   if (code === "lux20") {
//   //     discount = 500;
//   //     $('.discount').show().text("Discount: -RS " + discount.toFixed(2));
//   //     showMessage("Promo applied");
//   //   } else {
//   //     discount = 0;
//   //     $('.discount').hide();
//   //     showMessage("Invalid promo");
//   //   }
//   //   updatePrices();
//   // };

//   proceedToCheckout = function () {
//     if (quantity > 0) {
//       $(toast).text("Order confirmed!").css({
//         "display": "block","font-size": "20px"
//       }).hide().fadeIn(1000).delay(3000).fadeOut(400);

//       setTimeout(()=>{
//         window.location.href ="./index.php";
//       },2000);

//     } else {
//       $(toast).text("Your cart is empty!").css({
//         "display":"block"
//       });
//     }
//   };

//   function showMessage(text) {
//     $('#successMessage span').text(text);
//     $('#successMessage').fadeIn();
//     setTimeout(() => {
//       $('#successMessage').fadeOut();
//     }, 2000);
//   }

//   updatePrices();
// });

let qty = 1;
let unit_price = parseFloat($('#unitprice').data('price'));
let discount = 0;

function updateSummary(){
    let subtotal = unit_price * qty;
    let total = subtotal - discount;
    $('#quantity').text(qty);
    $('#subtotal').text('RS ' + subtotal.toFixed(2));
    $('#total').text('RS ' + total.toFixed(2));
    if(discount > 0){
        $('#discountAmount').text('- RS ' + discount.toFixed(2));
        $('#discountRow').removeClass('hidden');
    } else {
        $('#discountRow').addClass('hidden');
    }
}

function showToast(message){
    const toast = $('<div class="toast-message"></div>').text(message);
    $('#toast').append(toast);
    toast.fadeIn(400).delay(2000).fadeOut(400, function(){ $(this).remove(); });
}

// Quantity buttons
$('.addbtn').click(function(){ qty++; updateSummary(); });
$('.subbtn').click(function(){ if(qty>1){ qty--; updateSummary(); } });

// Remove item / empty cart
function emptyCart(){
    $('.cart-product').remove();
    qty = 0;
    discount = 0;
    updateSummary();
    showToast("Cart is now empty!");
}

// Promo code functionality
function applyPromo(){
    const code = $('#promoInput').val().trim().toUpperCase();
    const validPromo = "lux20"; 
    if(code === validPromo){
        discount = unit_price * qty * 0.20; 
        updateSummary();
        showToast("Promo code applied successfully!");
    } else {
        discount = 0;
        updateSummary();
        showToast("Invalid promo code");
    }
}

// Checkout function
function proceedToCheckout(){
    if(qty === 0){
        showToast("Cart is empty!");
        return;
    }
    showToast("Proceeding to checkout with total RS " + (unit_price*qty - discount).toFixed(2));
}
