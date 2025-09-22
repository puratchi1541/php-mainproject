 $('.newsletter-form').submit(function(event) {
      event.preventDefault(); 

      let email = $(this).find('input[type="email"]').val().trim();
      
        let pattern =  /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.com$/;

      let messageBox = $(this).find('.message');

      if (pattern.test(email)) {
        messageBox.text('Subscribed successfully!').css('color', 'green');
        this.reset(); 
      } else {
        messageBox.text('enter a valid email address.').css('color', 'red');
      }
    });