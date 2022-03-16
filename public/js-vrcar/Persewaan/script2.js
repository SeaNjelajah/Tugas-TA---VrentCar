$("#bukti_button").click(function(){
 
    ElementModal = document.getElementById('BuktiBayarModal' + this.getAttribute('order_id'));
    ElementPreview = document.getElementById('bukti_preview' + this.getAttribute('order_id'));
    
    if (ElementPreview.src) {
        ElementModal.click();
    } else {

        $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: this.getAttribute('route'),
            dataType : 'image',
            type: 'POST',
            data: {
                'gambar': this.getAttribute('gambar'),
                'order_id': this.getAttribute('order_id')
            },
            contentType: false,
            processData: false,

            success:function(response) {
                ElementModal.click();
                ElementPreview.src = URL.createObjectURL(response);
            }
       });

       
    }
  });
