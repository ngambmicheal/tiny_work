$(document).ready(function()
{
	//$("div#left").removeClass("collapse").addClass("collapsed");
	$(".categories_anchor").on('click', function(e)
	{
		$('.product_area').fadeOut(500);
		//$('.product_area').empty();
		//$('.product_area').hide();

		//$("#product_rows").text(' ');

		//$('.sale_title').hide();
		//$('.products_title').show();
		

		if($(this).hasClass('ajax_push'))
		{
			$(".sales_anchor").parent().removeClass('active current');
			$(".categories_anchor").parent().removeClass('active current');
			$(this).parent().toggleClass('active current');
		}

		e.preventDefault();
		var store_username = $("#storeUsername").val();	

		var store_id = $("#storeID").val();
		var cat_id = $(this).attr('id');
		
		if(cat_id==0)
		{
			var dataCategory = {"store_id": store_id, "store_username": store_username};
			window.history.pushState({urlPath: "?store="+store_username+'&view=products'},"","?store="+store_username+'&view=products');
		}
		else
		{
			var dataCategory = {"store_id": store_id, "cat_id": cat_id, "store_username": store_username};
			window.history.pushState({urlPath: "?store="+store_username+'&view=products&category='+cat_id},"","?store="+store_username+'&view=products&category='+cat_id);		
		}
		
		$.ajax(
		{
			url: 'scripts/products_by_categories.php',
			data: dataCategory,
			method: 'POST',
			dataType: "text",
			success: function(data)
			{
				//var json = $.parseJSON(data);
				//count = 0;
                //for(i=0; i<=json.length; i++)
                //{

                   //$('.product_area').append('<div class="products_title"><center><span>--------</span><h2 class="title">Products</h2><span class="badge" id="product_rows">'+count+'</span><span>--------</span></center><div><div class="product"> <a href="/index.php?store='+store_username+'&view=single&product='+json[i].product_id+'"><div class="product-image"><img src="'+image_check(json[i].product_image1)+'" /></div></a><div class="product-details"><div class="product-name"><a class="name" href="/index.php?store='+store_username+'&view=single&product='+json[i].product_id+'"><span>'+json[i].product_name.substring(0,23)+'</span></a></div><div class="product-price"><span class="price">@ Rs. '+number_format(json[i].product_price, 2, '.', ',')+'</span>/-</div><div class="product-discount"><span class="discount">Discount: <span class="color-text">'+json[i].product_discount+'</span>%</span></div></div></div>');
                   //$('.product_area').fadeIn(500).show();
                   //count = count + 1;
                   $(".product_area").html(data);
                   //$("#product_rows").text(count);
                   $(".product_area").fadeIn(500);
                   //var html = '<div class="product"><a href="/index.php?store='+$store_username+'&view=single&product='+json[i].product_id+'"><div class="product-image"><img src="'+json[i].product_image1+'>" /></div></a><div class="product_details"><div class="product-name"><a class="name" href="/index.php?store='+$store_username+'&view=single&product='+json[i].product_id+'"><span>'+json[i].product_name+'</span></a></div><div class="product-price"><span class="price">@ Rs. '+json[i].product_price+'</span>/-</div><div class="product-discount"><span class="discount">Discount: <span class="color-text">'+json[i].product_discount+'</span>%</span></div></div></div>';
                //}
                //$.getScript( "js/fc-products.js");
			}

		});     
	});

	$(".sales_anchor").on('click', function(e)
	{
		e.preventDefault();
		var store_username = $("#storeUsername").val();	
		var store_id = $("#storeID").val();
		var sale_id = $(this).attr('id');
		$(".product_area").fadeOut(500);
		$(".products_title").fadeOut(500);
		if($(this).hasClass('ajax_push'))
		{
			$(".categories_anchor").parent().removeClass('active current');
			$(".sales_anchor").parent().removeClass('active current');
			$(this).parent().toggleClass('active current');
		}
		if(sale_id==0)
		{
			var dataSales = {"store_id": store_id,"store_username": store_username};
			window.history.pushState({urlPath: "?store="+store_username+'&view=sales'},"","?store="+store_username+'&view=sales');
		}
		else
		{
			var dataSales = {"store_id": store_id, "sale_id": sale_id,"store_username": store_username};
			window.history.pushState({urlPath: "?store="+store_username+'&view=sales&sale='+sale_id},"","?store="+store_username+'&view=sales&sale='+sale_id);
		}
		$.ajax(
		{
			url: 'scripts/sales_sales_products.php',
			dataType: "text",
			data: dataSales,
			method: 'POST',
			success: function(data)
			{
				console.log(data);
				
				$(".product_area").html(data);
				$(".product_area").fadeIn(500);
				//$.getScript( "js/fc-products.js");
			}
		});
	});

	$(".single_anchor").on('click', function(e)
	{
		e.preventDefault();
		var store_username = $('#storeUsername').val();
		var store_id = $("#storeID").val();
		var product = $(this).attr('id');

		$('.product_area').fadeOut(500);
		window.history.pushState({urlPath: "?store="+store_username+'&view=single&product='+product},"","?store="+store_username+'&view=single&product='+product);
		$.ajax(
		{
			url: 'scripts/single_product.php',
			data: {"store_username": store_username, "store_id": store_id, "product": product},
			method: 'POST',
			dataType: 'text',
			success: function(data)
			{
				$(".product_area").html(data);
				$(".product_area").fadeIn(500);
				//$.getScript( "js/fc-products.js");
			}
		});
	});
});

function number_format (number, decimals, dec_point, thousands_sep) {
    // Strip all characters but numerical ones.
    number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function (n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
        };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}

function image_check(image)
{
	no_img = "noimagefound.jpg";
	var img = new Image(); 
	img.src = 'uploads/store/products/'+image;
	if (image != 0 && img.width != 0) 
	{
		return 'uploads/store/products/'+image;
	}
    return 'uploads/web_service/'+no_img;
}