$(document).ready(function()
    {
        $('#autoCity').autocomplete(
        {
            source: "scripts/search_store_by_city.php",
            minLength: 2,
            focus: function( event, ui ) {
              $( "#autoCity" ).val( ui.item.label );
              return false;
            },
            select: function( event, ui ) {
              $( "#autoCity" ).val( ui.item.label );
              return false;
            }
        });
        $('#autoArea').autocomplete(
        {
            source: "scripts/search_store_by_area.php",
            minLength: 2,
            autoFocus: true,
            focus: function( event, ui ) {
              $( "#autoArea" ).val( ui.item.label );
              return false;
            },
            select: function( event, ui ) {
              $( "#autoArea" ).val( ui.item.label );
              return false;
            }
        })    
        .autocomplete("instance")._renderItem = function(ul, item) 
        {
          return $("<li>")
          .append("<div>" + item.label + "<br>" + item.city + "</div>")
          .appendTo(ul);
        };
        $('#autoName').autocomplete(
        {
            source: "scripts/search_store_by_name.php",
            minLength: 2,
            autoFocus: true,
            focus: function( event, ui ) {
              $( "#autoName" ).val( ui.item.label );
              return false;
            },
            select: function( event, ui ) {
              $( "#autoName" ).val( ui.item.label );
              return false;
            }
        })    
        .autocomplete("instance")._renderItem = function(ul, item) 
        {
          return $("<li>")
          .append("<div>" + item.label + "<br>" + item.area + "," + item.city + "</div>")
          .appendTo(ul);
        };

        $(".autoText").hide();
        $(".autoSpan").click(function()
        {

          var txt = $(this).attr('for');
          $(".autoText").hide();
          $("#"+txt).show();

        });
    });