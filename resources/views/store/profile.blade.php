@extends('layout.front')


@section('content')

<div class="breadcrumb-area">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12">
          <div class="breadcrumb-container">
            <ol class="breadcrumb">
                <li><a href="../store/profile.php">Profile</a></li>
              </ol>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /End Breadcrumb Area--> 
  <!-- Start Company Story Area -->
  <div class="company-story-area section-padding">
    <div class="container">
     <div class="row"> 
        <!-- About Us Content Here -->




<style>
#postDiv {
  margin: 0;
  min-width: 250px;
}

/* Include the padding and border in an element's total width and height */
#postDiv * {
  box-sizing: border-box;
}

/* Remove margins and padding from the list */
#myUL {
  margin: 0;
  padding: 0;
}



/* Style the header */
.header {

  padding: 30px 40px;
  color: black;
  text-align: center;
}

/* Clear floats after the header */
.header:after {
  content: "";
  display: table;
  clear: both;
}

/* Style the input */
#myInput
{
  width: 75%;
  height: 85%;
  resize: none;
  border: none !important;
  overflow:hidden;
}

/* Style the "Add" button */
.addBtn 
{
  text-align: center;
  cursor: pointer;
  transition: 0.3s;

}

</style>
<script>
// Create a "close" button and append it to each list item
var myNodelist = document.getElementsByTagName("ul#myUL LI");
var i;
for (i = 0; i < myNodelist.length; i++) {
  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  myNodelist[i].appendChild(span);
}

// Click on a close button to hide the current list item
var close = document.getElementsByClassName("close");
var i;
for (i = 0; i < close.length; i++) {
  close[i].onclick = function() {
    var div = this.parentElement;
    div.style.display = "none";
  }
}


// Create a new list item when clicking on the "Add" button
function newElement() {
  var li = document.createElement("li");
  var span = document.createElement("span");
  span.className = "post";
  var inputValue = document.getElementById("myInput").value;
  var t = document.createTextNode(inputValue);
  span.appendChild(t);
  li.appendChild(span);
  if (inputValue === '') {
    alert("You must write something!");
  } else {
    document.getElementById("myUL").prepend(li);
  }
  //document.getElementById("myInput").value = "";
  var div = document.createElement("div");
  var a = document.createElement("a");
  var txt = document.createTextNode("Delete");
  a.className = "close";
  a.appendChild(txt);
  div.appendChild(a);
  li.appendChild(div);

  for (i = 0; i < close.length; i++) {
    close[i].onclick = function() {
      var div = this.parentElement;
      div.style.display = "none";
    }
  }
}
function textAreaAdjust(o) {
  o.style.height = "1px";
  o.style.height = (25+o.scrollHeight)+"px";
}
</script>
<style>
  hr.side { border: solid black; border-width: 1px 0 0; clear: both; margin: 22px 0 21px; height: 0; }
</style>
       @if($view == "dashboard")

         

        <script>
          $(document).ready(function()
          {
            $(".addBtn").click(function(e)
            {
              var post = $("#myInput").val();
              $.ajax(
              {
                url: '/store/scripts/add_post',
                method: 'POST',
                data: {"store": {{$store->id}}, "user":{{Auth::user()->id}}, "post": post },
                success:function(data)
                {

                }
              });
              $("#myInput").fadeOut('800', function()
                {
                  $(this).val("");
                }).fadeIn();
            });
            $(".close").click(function()
            {
              var id = $(this).attr('id');
              $.ajax(
              {
                url: '/store/scripts/del_post',
                method: 'POST',
                data: {"id":id},
                success:function(data)
                {

                }

              });
              $(this).parent().parent().hide();
            });

            $(".post-input").on('focus',function()
            {
              $(".limiter").show();
              $(this).keyup(updateCount);
              $(this).keydown(updateCount);
            });
          });
          function updateCount() 
          {
            var cs = $(this).val().length;
            var limit = $(this).attr('maxlength');
            var countLeft = limit-cs;
            
            $('.limiter').text(countLeft);
            if(countLeft == 0)
            {
              $('.limiter').css({"color":"Red"});
            }
            else
            {
              $('.limiter').css({"color":"Black"});
            }
          }
        </script>
        <div class="col-md-7 col-sm-12">
          <div class="company-story-content">
            <h2 class="title">Dashboard <span class="color-text">{{$store->username}}></span> </h2>

            <div id="postDiv">







            <div id="myDIV" class="header">
              <hr class="side" />

              <textarea id="myInput" class="txt-fc post-input" onkeyup="textAreaAdjust(this)" placeholder="Post for your store..." maxlength="200"></textarea>
              
              <span onclick="newElement()" class="addBtn btn-fc">Add <span class="limiter"></span></span>

              <hr class="side" />

            </div>
    


            </div>
          </div>    
        </div>
     	@endif


        @if($view="emp_req"  && Auth::user()->privilege=="Owner")

        <div class="col-md-7 col-sm-12">
          <div class="company-story-content">
            <h2 class="title">Employees <span class="color-text">Requests</span></h2>

            <div>
              <table class="table table-responsive table-hover table-striped table-condensed">
                <thead>
                  <tr>
                    <td>Date of Application</td>
                    <td>Name</td>
                    <td>Proposed Salary</td>
                  </tr>
                </thead>
                <tbody>
               @foreach($store->employment_requests as $request)
                  <tr>
                    <td>{{date("jS M Y, H:I A", strtotime($request->created_at))}}</td>
                    <td><a class="fc-emp" href="#" id="{{$request->id}}">{{$request->user->first_name . ' '. $request->user->last_name}} </a></td>
                    <td>Rs. {{$request->message}}</td>
                  </tr>
              @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <script>
          $(document).ready(function()
          {
            $(".fc-emp").click(function(e)
            {
              e.preventDefault();
              var id = $(this).attr("id");
              $.ajax(
              {
                url: '../scripts/emp_prof_det.php',
                method: 'POST',
                data: {"id":id},
                dataType: "json", 
                success: function(data)
                {
                  first_name = data.first_name;
                  middle_name = data.middle_name;
                  last_name = data.last_name;
                  e = data.email;
                  p = data.contact;
                  m = data.mobile;
                  pm = data.prop_message;
                  ps = data.prop_status;
                  ao = data.prop_date;
                  ei = data.emp_id;
                  id = data.id;
                  $("#emp_f").text(first_name);
                  $("#emp_full").text(first_name + " " + middle_name + " " + last_name);
                  $("#emp_e").text(e);
                  $("#emp_p").text(p);
                  $("#emp_m").text(m);
                  $("#emp_ao").text(ao);
                  $("#emp_ps").text(ps);
                  $("#emp_pm").text(pm);
                  $(".accept").attr("id", id + '-' + ei);
                  $(".reject").attr("id", id + '-' + ei);
                  console.log(data);
                }
              });
            });
          });
        </script>

        @elseif($view=="emp_req" && Auth::user()->priviledge == "Employee"){ 
          <script> location.replace("/store/profile/dashboard"); </script> 
         
         
        @endif






        
        @if($view=="emp_req" && Auth::user()->privilege=="Owner")
        <div class="col-md-5 col-sm-12">
          <div class="company-story-content"><h2 class="title">View <span class="color-text" id="emp_f"></span> </h2></div>
          <table class="table table-hover table-condensed table-responsive">
          <tr><td><span>Full Name: </span></td><td><span class="color-text" id="emp_full"></span></td></tr>
          <tr><td><span>Email: </span></td><td><span class="color-text" id="emp_e"></span></td></tr>
          <tr><td><span>Phone: </span></td><td><span class="color-text" id="emp_p"></span></td></tr>
          <tr><td><span>Mobile: </span></td><td><span class="color-text" id="emp_m"></span></td></tr>
          <tr><td><span>Applied On: </span></td><td><span class="color-text" id="emp_ao"></span></td></tr>
          <tr><td><span>Proposed Salary: </span></td><td><span class="color-text" id="emp_ps"></span></td></tr>
          <tr><td><span>Proposal: </span></td><td><span class="color-text" id="emp_pm"></span></td></tr>
          </table>
          <br />
          <div class="section-title">
            <a href="" class="accept btn-fc" id="" >Accept</a>
            <a href="" class="reject btn-fc" id="" >Reject</a>
            <br />
            <br />
            <div id="r_form" class="hidden">
              <form method="POST" action="" id="rej_form">
                <textarea name="message" rows="5" cols="5" class="form-control txt-fc" id="prop_r_message"></textarea>
                <input type="submit" name="submit" value="Reject" class="form-control btn btn-sm" />
              </form>
            </div>
          </div>

          <br />
          <div class="company-story-content"><h2 class="story-title">Quick <span class="color-text">Nav</span> </h2></div>
          <nav>
            <ul>
              <li><a href="/store/profile/dashboard">Dashboard</a></li>
              @if(Auth::user()->privilege=="Owner") <li><a href="/store/profile/emp_req">View Employees Requests</a></li> @endif
              <li><a href="/store/products/manageproducts/list">All Products</a></li>
              <li><a href="/store/products/manageproducts/add_p">Add Product(s)</a></li>
            </ul>
          </nav>
        </div>
        

        <script>
          $(document).ready(function()
          {
            $(".accept").click(function(e)
            {
              e.preventDefault();
              var arr = $(this).attr('id').split('-');
              
              $.ajax(
              {
                url: '../scripts/prop_acc.php',
                method: 'POST',
                data: {"id": arr[0],"emp_id": arr[1]},
                success: function(d)
                {
                  console.log(d);
                }
              });
            });

            $(".reject").click(function(e)
            {
              var arr = $(this).attr('id').split('-');
              
              e.preventDefault();

              $("#r_form").removeClass("hidden");
            

              $("#rej_form").submit(function(e)
              {
                var message = $("#prop_r_message").val();
                e.preventDefault();
                $.ajax(
                {
                  url: '../scripts/prop_rej.php',
                  method: 'POST',
                  data: {"id": arr[0], "message": message},
                  success: function(d)
                  {
                    console.log(d);
                  }
                });
              });
            });
          });


        </script>



       

        @endif



        <!-- About Us Right Image Here -->
        @if($view=="dashboard")
        <div class="col-md-5 col-sm-12">
        
          <div class="company-story-content"><h2 class="title">Quick <span class="color-text">Nav</span> </h2></div>
          <nav>
            <ul>
              <li><a href="profile.php?view=dashboard">Dashboard</a></li>
              <?php if(Auth::user()->privilege=="Owner") {?><li><a href="profile.php?view=emp_req">View Employees Requests</a></li> <?php } ?>
              <li><a href="../store/products/manageproducts.php?view=list">All Products</a></li>
              <li><a href="../store/products/manageproducts.php?view=add_p">Add Product(s)</a></li>
            </ul>
          </nav>

          
          <style>
            #myUL li 
            {
              
              
              word-wrap: break-word;
              height: auto;
            }
            
            .post
            {
              margin-left: 20px;

            }
            .close 
            {
              color: #00B2ED;

            }
            .id-content
            {
              margin-top: 25px;
              font-style: italic;
              font-size: 12px;
            }
            .content
            {
              font-size: 10px;
            }
            #posts
            {
              height: 300px;
              overflow: auto;
            }
          </style>
          <br />
          <div id="posts">
          <h2 class="title">Posts</h2>
            <ul id="myUL">
           		@foreach($store->posts as $post)
              <li>
                <span class="post"><?php echo $post['store_post']; ?></span>
                
                <div class="id-content">
                  <span class="content">By </span>{{$post->user->username}}
                  <span class="content"> @ </span>
                  		{{date("jS M Y, h:i A", strtotime($post->created_at))}}
                  <a class="close" id="<?php echo $post['id']; ?>">Delete</a>
                </div>
              </li>
              <hr />
            	@endforeach
              
            </ul>
          </div>
          

        </div>
       @endif
      </div>
    </div>
  </div>

</div>

@stop