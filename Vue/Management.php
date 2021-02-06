<?php
  include("../Controller/Fonctions.php");

  render("Header", ["activePage" => "Management"]);
?>

<!--MBL Animated CSS3 Multi Drop Down Menu For Blogger-->
<link rel="stylesheet" type="text/css" href="http://mybloggerlab.com/StyleSheet/MBLNAV.css"/>


<nav id="mbl-menu-wrap">

 <ul id="mbl-menu">

  <li><a href="URL-Here">Semestre 1</a></li>

  <li>
   <a href="URL-Here">Semestre 2</a>
   <ul>
    <li>
      <a href="URL-Here">CSS</a>
     <ul>
      <li><a href="URL-Here">Item 11</a></li>
      <li><a href="URL-Here">Item 12</a></li>
      <li><a href="URL-Here">Item 13</a></li>
      <li><a href="URL-Here">Item 14</a></li>
     </ul>
    </li>
    <li>
     <a href="URL-Here">Graphic design</a>

     <ul>
      <li><a href="URL-Here">Item 21</a></li>
      <li><a href="URL-Here">Item 22</a></li>
      <li><a href="URL-Here">Item 23</a></li>
      <li><a href="URL-Here">Item 24</a></li>
     </ul>
    </li>

    <li>
     <a href="URL-Here">Development tools</a>
     <ul>
      <li><a href="URL-Here">Item 31</a></li>
      <li><a href="URL-Here">Item 32</a></li>
      <li><a href="URL-Here">Item 33</a></li>
      <li><a href="URL-Here">Item 34</a></li>

     </ul>
    </li>
    <li>
     <a href="URL-Here">Web design</a>
     <ul>
      <li><a href="URL-Here">Item 41</a></li>
      <li><a href="URL-Here">Item 42</a></li>
      <li><a href="URL-Here">Item 43</a></li>

      <li><a href="URL-Here">Item 44</a></li>
     </ul>
    </li>
   </ul>
  </li>
  <li>
   <a href="URL-Here">Semestre 1</a>
<ul>
<li><a href="URL-Here">Work1</a></li>
<li><a href="URL-Here">Work2</a></li>
<li><a href="URL-Here">Work3</a></li>
<li><a href="URL-Here">Work4</a></li>
            </ul>
            </li>
<li><a href="URL-Here">Semestre 1</a></li>
<li><a href="URL-Here">Semestre 1</a></li>
<li><a href="URL">Semestre 1</a></li>
<li><a href="URL-Here">Semestre 1</a></li>
<li><a href="URL-Here">Semestre 1</a></li>
<li><a href="URL">Semestre 1</a></li>

</ul>

</nav>


<?php render("Footer", []); ?>
