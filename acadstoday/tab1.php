<html>
	<head>
<title>CSS Tabs | unraveled</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<!-- CSS Tabs is licensed under Creative Commons Attribution 3.0 - http://creativecommons.org/licenses/by/3.0/ -->

<style type="text/css">

body {
font: 100% verdana, arial, sans-serif;
background-color: #fff;
margin: 50px;
}

/* begin css tabs */

ul#tabnav { /* general settings */
text-align: left; /* set to left, right or center */
margin: 1em 0 1em 0; /* set margins as desired */
font: bold 11px verdana, arial, sans-serif; /* set font as desired */
border-bottom: 1px solid #6c6; /* set border COLOR as desired */
list-style-type: none;
padding: 3px 10px 3px 10px; /* THIRD number must change with respect to padding-top (X) below */
}

ul#tabnav li { /* do not change */
display: inline;
}

body#tab1 li.tab1, body#tab2 li.tab2, body#tab3 li.tab3, body#tab4 li.tab4 { /* settings for selected tab */
border-bottom: 1px solid #fff; /* set border color to page background color */
background-color: #fff; /* set background color to match above border color */
}

body#tab1 li.tab1 a, body#tab2 li.tab2 a, body#tab3 li.tab3 a, body#tab4 li.tab4 a { /* settings for selected tab link */
background-color: #fff; /* set selected tab background color as desired */
color: #000; /* set selected tab link color as desired */
position: relative;
top: 1px;
padding-top: 4px; /* must change with respect to padding (X) above and below */
}

ul#tabnav li a { /* settings for all tab links */
padding: 3px 4px; /* set padding (tab size) as desired; FIRST number must change with respect to padding-top (X) above */
border: 1px solid #6c6; /* set border COLOR as desired; usually matches border color specified in #tabnav */
background-color: #cfc; /* set unselected tab background color as desired */
color: #666; /* set unselected tab link color as desired */
margin-right: 0px; /* set additional spacing between tabs as desired */
text-decoration: none;
border-bottom: none;
}

ul#tabnav a:hover { /* settings for hover effect */
background: #fff; /* set desired hover color */
}

/* end css tabs */
	
</style>
</head>

<body id="tab1">

<p><a href="/publications/css_tabs/">&#8592; Introduction</a></p>

<h1>CSS Tabs 2.0</h1>

<ul id="tabnav">
	<li class="tab1"><a href="header.php">Tab One</a></li>
	<li class="tab2"><a href="footer.php">Tab Two</a></li>
	<li class="tab3"><a href="index3.html">Tab Three</a></li>
	<li class="tab4"><a href="index4.html">Tab Four</a></li>

</ul>

<p>CSS Tabs is licensed under <a rel="license" href="http://creativecommons.org/licenses/by/3.0/">Creative Commons Attribution 3.0</a>.</p>

<p>Joshua Kaufman, <a href="/">unraveled</a><br />
28 January, 2007</p>

<a href="css_tabs_v1.html">Looking for CSS Tabs 1.0?</a>

</body>

</html>
