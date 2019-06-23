<?php
require_once('../system/config.php');
require_once('../header.php'); ?>

<legend class="mb-2">XXE</legend>

<form name="xmk" action="" method="post">
    <div class="form-row">
        <input type="text" name="xml" size="30" class="form-control">
    </div>
    <div class="form-row">
        <input type="submit" value="提交" class="ml-auto mt-2 col-1 btn btn-primary">
    </div>
</form>

<?php
if(isset($_POST['xml'])) {
    $xml = fifter($_POST['xml']);
    echo($xml. "<br />");
    $xml_obj = simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOENT);
    echo($xml_obj);
}
?>

<?php require_once('../footer.php'); ?>
