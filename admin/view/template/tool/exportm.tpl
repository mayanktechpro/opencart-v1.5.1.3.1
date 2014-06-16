<?php echo $header; ?>
<div id="content">
  <div class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
    <?php } ?>
  </div>
  <?php if ($error_warning) { ?>
  <div class="warning"><?php echo $error_warning; ?></div>
  <?php } ?>
  <?php if ($success) { ?>
  <div class="success"><?php echo $success; ?></div>
  <?php } ?>
  <div class="box">
    <div class="heading">
      <h1><img src="view/image/backup.png" alt="" /> <?php echo $heading_title; ?></h1>
      <div class="buttons"><a onclick="$('#form').submit();" class="button"><span><?php echo $button_import; ?></span></a><a onclick="location='<?php echo $exportm; ?>'" class="button"><span><?php echo $button_export; ?></span></a></div>
    </div>
    <div class="content" style="min-height:200px !important;">
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
        <table class="form">
          <tr>
            <td colspan="2"><?php echo $entry_description; ?></td>
          </tr>
          <tr>
            <td colspan="2" style="font-weight:bold; color:red;"><?php echo $entry_description2; ?></td>
          </tr>
          <tr>
            <td width="25%"><?php echo $entry_restore; ?></td>
            <td><input type="file" name="upload" /></td>
          </tr>
        </table>
      </form>
    </div>
  </div>



  <?php if ($success_romanian) { ?>
  <div class="success"><?php echo $success_romanian; ?></div>
  <?php } ?>
  <div class="box">
    <div class="heading">
      <h1><img src="view/image/backup.png" alt="" /> <?php echo $heading_title_romanian; ?></h1>
      <div class="buttons"><a onclick="$('#formRomanian').submit();" class="button"><span><?php echo $button_import; ?></span></a><a onclick="location='<?php echo $exportm_romanian; ?>'" class="button"><span><?php echo $button_export; ?></span></a></div>
    </div>
    <div class="content" style="min-height:100px !important;">
      <form action="<?php echo $action_romanian; ?>" method="post" enctype="multipart/form-data" id="formRomanian">
        <table class="form">
          <tr>
            <td colspan="2"><?php echo $entry_description_romanian; ?></td>
          </tr>
          <tr>
            <td width="25%"><?php echo $entry_restore_romanian; ?></td>
            <td><input type="file" name="uploadRomanian" /></td>
          </tr>
        </table>
      </form>
    </div>
  </div>

</div>

<?php echo $footer; ?>