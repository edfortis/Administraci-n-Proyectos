// Bootic Ajax cart widget
// This function gets passed an instance of the Bootic.Cart class
// https://github.com/bootic/bootic_cart
// Ismael Celis 2013 for Bootic.net
// -----------------------------------------------------*/
;(function ($, cart, cartSelector, counterSelector) {
  
  function loading () {
    $('.loading', cartSelector).show()  
  }
  
  // Listen to cart events
  cart
    .bind('loading', loading)
    .bind('adding', loading)
    .bind('removing', loading)
    .bind('updated', function () {
      // Update cart counter
      $(counterSelector).find('.count').text(cart.units)
      $(counterSelector).find('.total').text(cart.formatted_total)
      // Render cart template 'cart' into cart selector. See 'cart_modal.html'
      $(cartSelector).booticTemplateRender('cart', cart)
      
    })
    .bind('removing', function (evt, item) {
      $('#citem_'+item.product_id, cartSelector).remove()
    })
    .bind('error', function (evt, error) {
      throw error
    })
    .bind('added', function (){
      // Show cart modal after updating, if not shown already
      $(cartSelector).modal('show');
    })
  
  /* On DOM ready
  ------------------------------*/
  $(function (){
    // Load the cart
    cart.load()
    // Remove-from-cart links
    $(cartSelector).on('click', 'a[data-remove]', function () {
      cart.remove($(this).data('remove'))    
      return false;
    })
    
    // Update quantities
    $(cartSelector).on('change submit.bootic', 'td input[data-update]', function () {
      var $e = $(this),
          fieldName = $e.attr('name'),
          value = $e.val(),
          variantId = $e.data('update'),
          opts = {};
       
      opts[fieldName] = value;
      cart.add(variantId, null, opts)
      loading()
    })
    
    // Enable Ajax 'add to cart' buttons in product listings
    $.Bootic.ajaxButtons()
  })
    
})(jQuery, Bootic.Cart, 'div#cart-modal', '.bootic-cart-count')
