<?php
namespace PHPMaker2019\project1;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start(); 

// Autoload
include_once "autoload.php";
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$product_edit = new product_edit();

// Run the page
$product_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$product_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fproductedit = currentForm = new ew.Form("fproductedit", "edit");

// Validate form
fproductedit.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
	if ($fobj.find("#confirm").val() == "F")
		return true;
	var elm, felm, uelm, addcnt = 0;
	var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
	var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
	var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
	var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
	for (var i = startcnt; i <= rowcnt; i++) {
		var infix = ($k[0]) ? String(i) : "";
		$fobj.data("rowindex", infix);
		<?php if ($product_edit->product_code->Required) { ?>
			elm = this.getElements("x" + infix + "_product_code");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $product->product_code->caption(), $product->product_code->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($product_edit->product_name->Required) { ?>
			elm = this.getElements("x" + infix + "_product_name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $product->product_name->caption(), $product->product_name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($product_edit->product_price->Required) { ?>
			elm = this.getElements("x" + infix + "_product_price");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $product->product_price->caption(), $product->product_price->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_product_price");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($product->product_price->errorMessage()) ?>");

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}

	// Process detail forms
	var dfs = $fobj.find("input[name='detailpage']").get();
	for (var i = 0; i < dfs.length; i++) {
		var df = dfs[i], val = df.value;
		if (val && ew.forms[val])
			if (!ew.forms[val].validate())
				return false;
	}
	return true;
}

// Form_CustomValidate event
fproductedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fproductedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $product_edit->showPageHeader(); ?>
<?php
$product_edit->showMessage();
?>
<form name="fproductedit" id="fproductedit" class="<?php echo $product_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($product_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $product_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="product">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$product_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($product->product_code->Visible) { // product_code ?>
	<div id="r_product_code" class="form-group row">
		<label id="elh_product_product_code" for="x_product_code" class="<?php echo $product_edit->LeftColumnClass ?>"><?php echo $product->product_code->caption() ?><?php echo ($product->product_code->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $product_edit->RightColumnClass ?>"><div<?php echo $product->product_code->cellAttributes() ?>>
<span id="el_product_product_code">
<span<?php echo $product->product_code->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($product->product_code->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="product" data-field="x_product_code" name="x_product_code" id="x_product_code" value="<?php echo HtmlEncode($product->product_code->CurrentValue) ?>">
<?php echo $product->product_code->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($product->product_name->Visible) { // product_name ?>
	<div id="r_product_name" class="form-group row">
		<label id="elh_product_product_name" for="x_product_name" class="<?php echo $product_edit->LeftColumnClass ?>"><?php echo $product->product_name->caption() ?><?php echo ($product->product_name->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $product_edit->RightColumnClass ?>"><div<?php echo $product->product_name->cellAttributes() ?>>
<span id="el_product_product_name">
<input type="text" data-table="product" data-field="x_product_name" name="x_product_name" id="x_product_name" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($product->product_name->getPlaceHolder()) ?>" value="<?php echo $product->product_name->EditValue ?>"<?php echo $product->product_name->editAttributes() ?>>
</span>
<?php echo $product->product_name->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($product->product_price->Visible) { // product_price ?>
	<div id="r_product_price" class="form-group row">
		<label id="elh_product_product_price" for="x_product_price" class="<?php echo $product_edit->LeftColumnClass ?>"><?php echo $product->product_price->caption() ?><?php echo ($product->product_price->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $product_edit->RightColumnClass ?>"><div<?php echo $product->product_price->cellAttributes() ?>>
<span id="el_product_product_price">
<input type="text" data-table="product" data-field="x_product_price" name="x_product_price" id="x_product_price" size="30" placeholder="<?php echo HtmlEncode($product->product_price->getPlaceHolder()) ?>" value="<?php echo $product->product_price->EditValue ?>"<?php echo $product->product_price->editAttributes() ?>>
</span>
<?php echo $product->product_price->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$product_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $product_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $product_edit->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$product_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$product_edit->terminate();
?>
