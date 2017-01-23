@extends('layout.front')

@section('content')
  <!-- /End Mian Header --> 
  <!-- Start Breadcrumb Area-->
 <div class="breadcrumb-area">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12">
          <div class="breadcrumb-container">
            <ol class="breadcrumb">
                <li><a href="/store/profile/dashboard">Profile</a></li>
                <li><a href="/store/sales/list">My Sales</a></li>
              </ol>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
$(document).ready(function()
{
    $(".active").click(function()
    {   
        var id = $(this).attr('id');
        //e.preventDefault();
        $.ajax
        ({
            method: 'post',
            url: "/store/scripts/cs",
      
            data: {"idin": id},
            success:function(data)
            {
                console.log(data);
            }
        
        });
    });
    $(".inactive").click(function()
    {   
        var id = $(this).attr('id');
        //e.preventDefault();
        $.ajax
        ({
            method: 'post',
            url: "/store/scripts/cs",
      
            data: {"idin": id},
            success:function(data)
            {
                console.log(data);
            }
        
        });
    }); 
});


</script>
<script>
/*$(document).ready(function(){
    $('#tableProducts').hide();
});*/
        $(document).on('submit','#mainForm',function(e)
        {
            e.preventDefault();
                $.ajax(
                {
                   method: 'POST',
                   //url: '../../scripts/addsale.php',
                   url: '/store/scripts/addsale',
                   data: $("#mainForm").serialize(),
                   cache: false,
                   dataType: "json",
                   success: function(d)
                   {
                     console.log(d);
                     
                   } 
                });
                
                $('#tableProducts').removeClass('hide');
        });
        $(document).ready(function()
        {
             var array_ids = [];
            $('.add').click(function()
            {
                //array_ids.push($(this).parent().siblings('.row_id').html().trim());
                array_ids.push($(this).attr("id"));
                //alert(array_ids);    
            });
            $('.show').click(function()
            {
           //e.preventDefault();
                var jsonString = JSON.stringify(array_ids);
                $.ajax(
                {
                   method: 'POST',
                   //url: '../../scripts/addsale.php',
                   url: '/store/scripts/addsale',
                   data: {"data" : jsonString },
                   cache: false,
                   dataType: "json",
                   success: function(d)
                   {
                     console.log(d);
                   } 
                });
            });

        });
        $(document).ready(function()
          {
            $(".info").on('focus',function()
            {
              $(".limiter").hide();
              //$(".validate").hide();
              window.id = $(this).attr('id');
              $('#limit'+id).show();

              $(this).keyup(updateCount);
              $(this).keydown(updateCount);
            });
            $("#2").on('keyup',function(e)
            {
              this.value = this.value.replace(/[^0-9\.|-]/g,'');
              if($(this).val().length == 2)
              {
                $("#2").val($("#2").val()+'-');
              }
              if($(this).val().length == 5)
              {
                $("#2").val($("#2").val()+'-');
              }
            });
        });
        function updateCount() 
          {
            var cs = $(this).val().length;
            var limit = $(this).attr('maxlength');
            var countLeft = limit-cs;
            
            $('#limit'+id).text(countLeft);
            if(countLeft == 0)
            {
              $('#limit'+window.id).text("Limit Reached").css({"color":"Red"});
            }
            else
            {
              $('#limit'+window.id).css({"color":"Black"});
            }
          }   
    </script>
    <style>
        .hide
        {
            display:none;
        }
    </style>
  <!-- /End Breadcrumb Area--> 
  <!-- Start Company Story Area -->

  <div class="company-story-area section-padding">
    <div class="container">
     <div class=""> 
        <!-- About Us Content Here -->





        <?php if($view=='list'){?>
        <div class="company-story-content">
            <h2 class="title">Sales <span class="color-text">{{$store->name}}</span> </h2>
          </div>
    <div>

            <table class="table table-responsive table-hover table-condensed table-striped table-bordered" id="salesTable">
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Discount</td>
                        <td>Tagline</td>
                        <td>Created</td>
                        <td>End</td>
                        <td>Currently</td>
                        <td></td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                @foreach($store->sales as $row)
                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['sale_discount']; ?></td>
                        <td><?php echo $row['tagline']; ?></td>
                        <td><?php echo $row['created_at']; ?></td>
                        <td><?php echo $row['till']; ?></td>
                        <?php if($row['status'] == 'InActive') { ?>
                        <td>Inactive</td>
                        <?php } else if ($row['status'] == 'Active'){ ?>
                        <td>Active</td>
                        <?php } ?>
                        <?php if($row['status'] == 'InActive') { ?>
                        <td><a class="active" id="<?php echo $row['id']; ?>" href="#">Active</a></td>
                        <?php } else if ($row['status'] == 'Active'){ ?>
                        <td><a class="inactive" id="<?php echo $row['id']; ?>" href="#">Inactive</a></td>
                        <?php } ?>
                        <td><a target="_blank" href="<?php echo "/store/sales/edit?saleid=".$row['id']; ?>">Edit</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>

    </div>
<?php } ?>

      

          <script>
            $(document).ready(function()
            {
              $("#divSaleProduct").hide();
              $("#divSale").show();

              $("#btnSale").click(function()
              {
                $("#divSale").hide();
                $("#divSaleProduct").show();
              });
            });
          </script>


          <?php if($view=='create'){?>



            <div class="col-md-7 col-sm-12" id="ParentContainer">
            
            <div class="company-story-content">
            <h2 class="title">Create <span class="color-text">Sale</span> </h2>
          </div>
              <form action="" method="POST" id="mainForm">
                <div class="form-group">    
              
                      <label for="name">Name: </label>
                <input type="text" name="name" class="info txt-fc form-control" maxlength="50" id="1" required />
                <span id="limit1" class="limiter"><span>
                </div>
                <div class="form-group">
                  <label for="till">Valid Till:</label>
            <input type="text" name="till" class="info txt-fc form-control" maxlength="10" id="2" required/>
            <span id="limit2" class="limiter"><span>
                </div>
                <div class="form-group">
                  <label for="discount">Discount: </label>
            <input type="text" name="discount" class="info txt-fc form-control" maxlength="3" id="3" required/>
            <span id="limit3" class="limiter"><span>
                </div>
                <input type="hidden" name="store_id" value="{{$store->id}}">
                <div class="form-group">
                  <label for="tagline">Tagline: </label>
            <input type="text" name="tagline" class="info txt-fc form-control" maxlength="50" id="4" required/>
            <span id="limit4" class="limiter"><span>
                </div>
                <div class="form-action clearfix">
                  <input class="btn-fc" type="submit" id="btnSale" value="Continue" name="continue" style="width:100%;" />
                </div>
              </form>
             
              
              
              
              
            <div class="hide" id="tableProducts">
            
              <div class="company-story-content">
              <br />
            <h2 class="title">Add Products to <span class="color-text">Sale</span> </h2>
          </div>
            
        <table class="table table-responsive table-hover table-condensed table-striped table-bordered ">
            <thead>
                <tr>
                    <td>Name</td>
                    <td>Price</td>
                    <td>Discount</td>
                </tr>
            </thead>
            <tbody>
              
            </tbody>
        </table>
        <div class="form-action clearfix">
        <input class="show btn-fc" type="button" value="Create Sale" name="push" style="width:100%;"/>
        </div>
    </div>
     </div>
              
        <div class="col-md-5 col-sm-12 follow-scroll" id="ChildenContainer">

        <div id="divSale">
          <div class="company-story-content"><h2 class="title">Create <span class="color-text">Sale</span> </h2></div>

          <p>Here you can create <span class="color-text">sale</span>.</p>
          <p><span class="color-text">Sale</span> is tied to a limited period. Here you can control existing <span class="color-text">sales</span>, create, update, edit.</p>
        </div>
          <div  id="divSaleProduct">
          <div class="company-story-content"><h2 class="title">Add <span class="color-text">Products</span> </h2></div>

          <p>Now here are the product displayed that are currently not in any <span class="color-text">sales</span>.</p>
          <p>Add products as many as you intend to.</p>
        </div>

          <div>
            <div class="company-story-content"><h2 class="title">Quick <span class="color-text">Nav</span> </h2></div>
          <nav>
            <ul>
              <?php if(Auth::user()->privilege=="Owner") {?><li><a href="/store/profile/emp_req">View Employees Requests</a></li> <?php } ?>
              <li><a href="/store/products/list">All Products</a></li>
              <li><a href="/store/products/add_p">Add Product(s)</a></li>
            </ul>
          </nav>
          
        </div>
          </div>

  
      </div>
        

<?php } ?>

<script>
  (function($) {
    var element = $('.follow-scroll'),
        originalY = element.offset().top;
    
    // Space between element and top of screen (when scrolling)
    var topMargin = 20;
    
    // Should probably be set in CSS; but here just for emphasis
    element.css('position', 'relative');
    
    $(window).on('scroll', function(event) {
        var scrollTop = $(window).scrollTop();
        
        element.stop(false, false).animate({
            top: scrollTop < originalY
                    ? 0
                    : scrollTop - originalY + topMargin
        }, 300);
    });
})(jQuery);
</script>









    

    <?php if($view=='edit') {?>


<script>
$(document).ready(function()
{
   $(".del").click(function(e)
   {
        var id = $(this).attr('id');
        var saleid = $('.sale').attr('value');
        e.preventDefault();
        
        $.ajax(
        {
            url:'/store/scripts/del_invoice',
            method:'Post',
            data:{"id":id, "saleid": saleid},
            success:function(d)
            {
                console.log(d);

            }
        });
        $(this).parent().parent().parent().fadeOut(1000);
   });
   
   /*$(".done").click(function() {

    var form = $('#updateForm');

    $.ajax({
        url  : '../../scripts/upsale.php',
        type : form.prop('method'),
        data : form.serialize()
    }).done(function(result) {
    });*/
});

$(document).ready(function()
        {
             var array_ids = [];
            $('.up-add').click(function()
            {
                //array_ids.push($(this).parent().siblings('.row_id').html().trim());
                array_ids.push($(this).attr("id"));
                //alert(array_ids);    
                $(this).parent().parent().parent().fadeOut(1000);

            });
            $('.save').click(function()
            {
                var form = $('#updateForm');
                $.ajax(
                {
                    url  : '/store/scripts/upsale',
                    type : form.prop('method'),
                    data : form.serialize(),
                    success:function(result) 
                    {
                        console.log(result);
                    }
                });
           //e.preventDefault();
                var saleid= $("#saleid").attr('value');
                var jsonString = JSON.stringify(array_ids);
                $.ajax(
                {
                   method: 'POST',
                   //url: '../../scripts/addsale.php',
                   url: '/store/scripts/uppsale',
                   data: {"data" : jsonString, "saleid":saleid },
                   cache: false,
                   dataType: "json",
                   success: function(d)
                   {
                     console.log(d);
                   } 
                });
                $("#updateForm").fadeOut(800).fadeIn();
                
            });
        });
        
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
          <div class="col-md-7 col-sm-12" id="ParentContainer">
            
            
            <div class="company-story-content">
            <h2 class="title"><span class="color-text"> <?php echo $sale->name; ?></span> </h2>
            </div>
           
            <div  style="width: 40%; float: left;">
            
            
               <form action="" method="POST" id="updateForm">
                <div class="form-group">    
              <input class="hidden" value="<?php echo $_GET['saleid']; ?>" name="saleid"/>
                      <label for="name">Name: </label>
                <input type="text" name="name" value="<?php echo $sale->name;?>" class="txt-fc" />
                </div>
                <div class="form-group">
                  <label for="till">Valid Till:</label>
            <input type="text" name="till" value="<?php echo $sale->till;?>" class="txt-fc"/>
                </div>
                <div class="form-group">
                  <label for="discount">Discount: </label>
            <input type="text" name="discount" value="<?php echo $sale->sale_discount;?>" class="txt-fc"/>
                </div>
                <div class="form-group">
                  <label for="tagline">Tagline: </label>
            <input type="text" name="tagline" value="<?php echo $sale->tagline; ?>" class="txt-fc"/>
                </div>
              </form>
              </div>
              
              
              
              
            <div style="width:60%; float:left;" id="tableUpProducts">
          
          <div class="company-story-content">
            <h2 class="title">Existing <span class="color-text">Products</span> </h2>
            </div>
            <input class="hidden sale" name="saleid" value="<?php echo $_GET['saleid']; ?>" id="saleid"/>
        <table class="table table-responsive table-hover table-condensed table-striped table-bordered ">
            <thead>
                <tr>
                    <td>Name</td>
                    <td>Price</td>
                    <td>Discount</td>
                </tr>
            </thead>
            <tbody>
                @foreach($sale->products as $invoice)
                <tr>
                    <td><?php echo $invoice['product']['name']; ?></td>
                    <td><?php echo $invoice['product']['price']; ?></td>
                    <td><?php echo $invoice['product']['discount_price']; ?></td>
                    <td style="width:20px;"><div class="form-action clearfix"><input type="button" name="del" value="Remove" id="<?php echo $invoice['id']; ?>" class="del btn-fc"/></div></td>
                </tr>
               @endforeach
            </tbody>
        </table>
    </div>
    </div>
    
    
     <div class="col-md-5 col-sm-12">
<br />
<br />

     <div class="company-story-content">
            <h2 class="title">Add <span class="color-text">Products</span> </h2>
    </div>
    <table class="table table-responsive table-hover table-condensed table-striped table-bordered ">
            <thead>
                <tr>
                    <td>Name</td>
                    <td>Price</td>
                    <td>Discount</td>
                </tr>
            </thead>
            <tbody>
               @foreach($store->products as $rows)
                <tr>
                    <td class="hide row_id"><?php echo $rows['id'];?></td>
                    <td><?php echo $rows['name']; ?></td>
                    <td><?php echo $rows['price']; ?></td>
                    <td><?php echo $rows['discount_price']; ?></td>
                    <td style="width:20px;"><div class="form-action clearfix"><input type="button" name="add" value="Add" id="<?php echo $rows['id']; ?>" class="up-add btn-fc"/></div></td>
                </tr>
              @endforeach
            </tbody>
        </table>
        
        </div>     
        <div class="form-action clearfix">
        <input class="save btn-fc" type="button"  value="Save" name="push" style="width: 100%;" />
        </div>

<?php }?> 


    





















      </div>
    </div>
  </div>
  <!-- /End Company Story Area --> 

  <!-- /End Our Team Area --> 
  <!-- Start Main Footer Area -->

  <!-- /End Main Footer Area --> 
</div>
<!-- /End Contcat Us Page --> 


@stop