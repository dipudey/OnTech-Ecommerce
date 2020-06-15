

$("body").on("click","#add_to_cart",function () {
  var id = $(this).data('id')
  // alert(id)

  $.ajax({
    url: "/product/view/"+id,
    method: 'get',
    dataType: 'json',
    success: function (data){
      $('#Modal-Show').modal('show')
      $('#pname').text(data.product.product_name)
      $('#pcat').text(data.category);
      $('#psubcat').text(data.subcategory_name);
      $('#pcode').text(data.product.product_code);
      // $('#pbrand').text(data.product.brand.brand_name);
      $("#thambnail").attr('src',"/uploads/products/"+data.product.thambnail_picture);
      $('#product_id').val(data.product.id);

      var d =$('select[name="size"]').empty();
      $.each(data.size, function(key, value){
          $('select[name="size"]').append('<option value="'+ value +'">' + value + '</option>');
           if (data.size == "") {
                  $('#sizediv').hide();
           }else{
                 $('#sizediv').show();
           }
      });

      var d =$('select[name="color"]').empty();
      $.each(data.color, function(key, value){
           $('select[name="color"]').append('<option value="'+ value +'">' + value + '</option>');
            if (data.color == "") {
                   $('#colordiv').hide();
            } else{
                 $('#colordiv').show();
            }
       });




    }
  })



})
