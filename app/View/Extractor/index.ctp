<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<body>

<h1>Webonise TextExtractor</h1>

<p>
    Check File or Folder For Searching
</p>
<div id="searchBlock">
<input type="text" name="txtSearch" placeholder="Text To Search"  value="cakephp" id="txtSearch" style="width: 200px;">
<pre>

    <?php echo $data ?>
</pre>
<input type="button" value="GetLocation" id="btn" style="width:200px"/>

</div>
<div id="result">
<!--get result here from ajax-->
</div>