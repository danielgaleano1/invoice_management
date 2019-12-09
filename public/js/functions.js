function search_product(){
    var product_id_form=$("#product_id").val();
    var url="";

    $.ajax({

    })
    

    $.get(url,function(resul){
        $("#price").val('resul');
        console.log(1);
    })
}
 