
$(document).ready(function(){
    
    //AGREGANDO CLASE ACTIVE EL PRIMER ENLACE =============
    $('.category_list .category_item[category="all"]').addClass('ct_item_active');

    $('.category_item').click(function(e){
       e.preventDefault();
       var catProduct = $(this).attr('category');
       console.log(catProduct);
              
        //AGREGANDO CLASE ACTIVA AL ENLACE SELECCIONADO
       $('.category_item').removeClass('ct_item_active');
       $(this).addClass('ct_item_active');

       if(catProduct=='all'){
            $('.product_item').show();
       }else{
            //OCULTANDO PRODUCTOS
            $('.product_item').hide();

            //MOSTRANDO PRODUCTOS
            $('.product_item[category="'+catProduct+'"]').show();
       }
    });   
});   


