
<?php $style = $store->style;?>

<style>
/*Social and Action Top*/
.header-top-left > p
{
	color: <?php echo $style['fc_action']; ?>;
}
.header-top-left > p > span > a
{
	color: <?php echo $style['fc_action']; ?>;
}
.header-top-right > ul > li > a > i
{
	color: <?php echo $style['top_social_media']; ?>;
}
/**/






/* Anchor Tag */
a
{
	color: <?php echo $style['a']; ?>;
}
a:hover
{
	color: <?php echo $style['a_hover']; ?>;
}
a:active
{
	color: <?php echo $style['a_click']; ?>;
}
/**/






/* Button */
.btn-fc
{
  background: <?php echo $style['btn']; ?> none repeat scroll 0 0 !important;
color: #ffffff;
display: inline;
font-size: 13px;
font-weight: 500;
line-height: 30px;
margin: 0;
padding: 7px 10px;
position: relative;
text-align: center;
text-transform: uppercase;
z-index: 1;
  
  border: 0; /* remove border   */
  cursor: pointer;
  
}
.btn-fc:hover
{
	background: <?php echo $style['btn_hover']; ?> !important;
}

a.btn-fc
{
background: <?php echo $style['btn']; ?> none repeat scroll 0 0;
color: #ffffff;
display: inline;
font-size: 13px;
font-weight: 500;
line-height: 30px;
margin: 0;
padding: 7px 10px;
position: relative;
text-align: center;
text-transform: uppercase;
z-index: 1;
  
  border: 0; /* remove border   */
  cursor: pointer;
}
a.btn-fc:hover
{
	background: <?php echo $style['btn_hover']; ?>;
	color: white;
}
/**/






/* Text Box */

.txt-fc
{ 
font-size:14px; 
padding:6px; 
border-width:1px; 
border-radius:0px; 
border-style:solid; 
border-color:<?php echo $style['txt_border']; ?>;  
} 
		 
.txt-fc:hover 
{ 
	border-color:<?php echo $style['txt_border_hover']; ?>;  
}
.txt-fc:focus
{
	border-color:<?php echo $style['txt_border_focus']; ?> !important;
}

/**/



/* Side Menu */
ul.fc-subside li a 
{
	color: <?php echo $style['side_menu']; ?>; 
}
ul.fc-subside li a:hover
{
	color: <?php echo $style['side_menu_hover']; ?>; 
}
ul.fc-subside li a:active
{
	color: <?php echo $style['side_menu_active']; ?>; 
}
ul.fc-subside li.current
{
	background-color: <?php echo $style['side_menu_current']; ?>;
}
ul.nav-pills li.active a
{
	background-color: <?php echo $style['side_menu_current']; ?> !important;
	border-radius: 0 !important;

}
/**/




/* Breadcrumb */
.breadcrumb-area ol.breadcrumb 
{
	background-color:<?php echo $style['breadcrumb']; ?>;
	border-radius: 0px;
}
.breadcrumb-area ol.breadcrumb li a
{
	color: <?php echo $style['breadcrumb_a']; ?>;
}
/**/






/* Footer */
.footer-bottom-area
{
	background-color: <?php echo $style['footer']; ?>;
}
/**/





/* Important_Span and Heading*/
.color-text
{
	color: <?php echo $style['important_span']; ?>;
}
.title
{
	color: <?php echo $style['heading']; ?>;
}
.title
{
    display: inline-block; 
    font-size: 24px; 
    font-weight: normal; 
    margin-bottom: 20px; 
    position: relative; 
    text-transform: capitalize; 
}
/**/



/*New 2017 */
/*-------------------------------------------------*/

/* Main Menu */
.main-menu-area ul.text-right li a
{
	color: <?php echo $style['top_menu']; ?>; 
}
.main-menu-area ul.text-right li a:hover
{
	color: <?php echo $style['top_menu_hover']; ?>; 
}
.main-menu-area ul.text-right li a:active
{
	color: <?php echo $style['top_menu_active']; ?>; 
}
.main-menu-area ul.text-right li a.current
{
color: <?php echo $style['top_menu_current']; ?>; 
}
/**/
/*---------------------OLD----------------------------*/


/* Main Menu */
nav.navbar-topnav
{
	 background-color: <?php echo $style['top_menu_back']; ?> !important;
}
nav.navbar-topnav a
{ 
	color: <?php echo $style['top_menu']; ?> !important; 
}
nav.navbar-topnav ul.navbar-nav a:hover 
{ 
	border-color: <?php echo $style['top_menu_hover']; ?> !important; 
}
nav.navbar-topnav ul.navbar-nav li.active a
{ 
	background-color: <?php echo $style['top_menu_active']; ?> !important;
}
nav.navbar-topnav ul.dropdown-menu > li > a:hover 
{ 
	background-color: <?php echo $style['top_menu_hover']; ?>; 
}



/* Left Menu */
/*Independant Menu Items*/
li.independent-menu span.lbl
{
	color: <?php echo $style['menu_label']; ?> !important;
}
.independent-menu span.sign
{
	background-color: <?php echo $style['menu_label_back']; ?> !important;
}

/*Categories Menu*/
li.categories-menu span.lbl
{
	color: <?php echo $style['categories_menu']; ?> !important;
}
li.categories-menu span.sign
{
	background-color: <?php echo $style['categories_menu_back']; ?> !important;
}
li.categories-menu li.active span.lbl
{
	color: <?php echo $style['categories_menu_active']; ?> !important;
	background-color: <?php echo $style['categories_menu_active_back']; ?> !important;
}

/*Sales Menu*/
li.sales-menu span.lbl
{
	color: <?php echo $style['sales_menu']; ?> !important;
}
li.sales-menu span.sign
{
	background-color: <?php echo $style['sales_menu_back']; ?> !important;
}
li.sales-menu li.active span.lbl
{
	color: <?php echo $style['sales_menu_active']; ?> !important;
	background-color: <?php echo $style['sales_menu_active_back']; ?> !important;
}


</style>