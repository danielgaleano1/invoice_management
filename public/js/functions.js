function search_product(){
    var product_id_form=$("#product_id").val();

    $.getJSON(
        '/invoice_product/' + product_id_form,
        function(json) { 
            var price_bd = json.price;
            $("#price").val(price_bd);
            $("#stock").val(json.stock);
        }
      );
}