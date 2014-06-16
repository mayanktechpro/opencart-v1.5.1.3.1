<?php
// Heading
$_['heading_title']     = 'Export / Import (Insert)';

// Text
$_['text_success']      = 'Success: You have successfully imported your categories and products!';

// Entry
$_['entry_restore']     = 'Import from spreadsheet file:';
$_['entry_description'] = 'Use this function to export or import all your categories and products to or from a XLS spreadsheet file.';
$_['entry_description2'] = 'This function is build manually which Export all the data as same as free version.<br>
You have to replace downloaded data in the sheet with new data and then Import.<br>
Do not repeat the data which you have already imported or which is available on your store, The repeated data stops importing in between and you may face trouble.<br>
It will not remove your previous categories or products data.<br>
Leave blank the sheet for which you do not want to insert any data. (For example: If you do not want to insert new categories, then delete all data of category sheet except header)<br>
In other cases if you are importing only special sheet, it will give error because the data in special sheet is dependent on product sheet.';

// Error
$_['error_permission']  = 'Warning: You do not have permission to modify exports/imports (Insert)!';
$_['error_upload']      = 'Uploaded file is not a valid spreadsheet file or its values are not in the expected formats!';
$_['error_sheet_count'] = 'Export/Import: Invalid number of worksheets, 7 worksheets expected';
$_['error_categories_header'] = 'Export/Import: Invalid header in the Categories worksheet';
$_['error_products_header']   = 'Export/Import: Invalid header in the Products worksheet';
$_['error_options_header']    = 'Export/Import: Invalid header in the Options worksheet';
$_['error_attributes_header'] = 'Export/Import: Invalid header in the Attributes worksheet';
$_['error_specials_header']   = 'Export/Import: Invalid header in the Specials worksheet';
$_['error_discounts_header']  = 'Export/Import: Invalid header in the Discounts worksheet';
$_['error_rewards_header']    = 'Export/Import: Invalid header in the Rewards worksheet';

// Button labels
$_['button_import']     = 'Import';
$_['button_export']     = 'Export';
?>