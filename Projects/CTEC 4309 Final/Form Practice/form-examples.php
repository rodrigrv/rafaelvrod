<form...>
First Name: <input type ="fname">

<input type="checkbox" name="tag[]" value="school">
<input type="checkbox" name="tag[]" value="garden">
<input type="checkbox" name="tag[]" value="computer">
==================================================

echo $_POST['fname']

==========================

General Interests Safety School Computer

<ul>
	<li>General Interests</li>
    <li>Safety</li>
    <li>School</li>
    <li>Computer</li>
</ul>

$selection = implode("</li><li>" ,$tag;

$selection = "<ul><li>$selection</li></ul>";

echo $selection

============================

foreach ($tag => $item) {
	$selection = $selection, "<li>$item</li>";
    }
    $selection = "<ul$selection</ul>";