function search_product(){
    var product_id_form=$("#product_id").val();
    console.log(product_id_form);

    $.getJSON(
        '/invoice_product/' + product_id_form,
        function(json) { 
            $("#price").val(json.price);
            $("#stock").val(json.stock);
        }
    );
}