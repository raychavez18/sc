<!-- .page-content -->
<div class="page-content sidebar-page right-sidebar-page clearfix">
    <!-- .page-content-wrapper -->
    <div class="page-content-wrapper extraPadding">
        <div class="page-content-inner">
            <!-- Start .row -->
            <div class="row pt10">
                <form id="userPrefForm" class="customForm" method="post" enctype="multipart/form-data">
                <div class="col-md-5 pl0">
                    <div class="panel panel-default">
                        <!-- Start .panel -->
                        <div class="panel-heading">
                            <h4 class="panel-title"><i class="fa fa-info"></i>User Info </h4>
                            <a class="emailListToggle edit-link" href="#"><i class="fa fa-pencil"></i> Edit </a>
                        </div>
                        <div class="panel-body">                            

                                 <div class="row profile">
                                        <!-- Start .row -->

                                        <div class="col-md-7 col-sm-7 col-xs-7 pl0">

                                            <div class="profile-avatar text-left mb5">

<?php
	if (!empty($user['avatar']))
	{
?>

                                                    <div class="changeProfile">
                                                    <label for="fileUploadLink" class="custom-file-upload">
                                                    <img src="data:image/png;base64, <?= preg_replace("/\"/", "\\\"", base64_encode($user['avatar'])) ?>" alt="avatar">
                                                    <img class="cameraUpload" src="../img/elements/icon_camera_128.png">
                                                    <input id="fileUploadLink" style="visibility: hidden;" type="file" class="filestyle" name="imageUpload" />

                                                    </label>
                                                   </div>

<?php
	}
	else
	{
                                                    echo $this->Html->image('defaultavatar.png');
	}
?>




                                         <h5 class="small-text-profile ml20 mb0"><?= h($user['full_name']) ?></h5>

                                         <?php
    if (!empty($user['title']))
   {
?>

                                         <h5 class="small-text-profile ml20 mb0"><?= h($user['title']) ?></h5>
<?php
    }
?>
                                        </div>




                                     </div>
                        <div class="col-md-5 col-sm-5 col-xs-5 mt50 pl0 pr5">
                            <button type="button" class="btn btn-xs btn-warning mr5 mb50"><i class="fa fa-user mr5"></i> Change photo</button>
                            <input id="editPhoneNumber" placeholder="No Phone Number" name="editPhoneNumber" type="text" class="form-control title" value="<?= ($user['phone']) ?>" disabled>
                            <a class="pref-email test" href="#"><?= h($user['email']) ?></a>
                        </div>




<?php
	if ($user['avatar_source'] == 'db')
	{
?>

<?php
	}
	else
	{
?>
                                                <label class="mb10"><span style="display: none;" class="mb10">Profile image taken from <?= h(Cake\Utility\Inflector::camelize($user['avatar_source'])) ?></span>
                                                </label>
<?php
	}
?>
                            <?php
                            if (count($user['emails']) > 0)
                            {
                            ?>
                            <div class="row mb5">
                                <!-- <a class="emailListToggle" href="#">Change email <i class="fa fa-pencil"></i></a>-->







                                <select id="emailList" style="display:none;" class="form-control" name="changeEmailList">
                                    <?php
                                    foreach ($user['emails'] as $email)
                                    {
                                        ?>
                                        <option name="changeEmailOption" value="<?= preg_replace("/\"/", "\\\"", $email) ?>"<?= $user['email'] == $email ? ' selected' : '' ?>><?= h($email) ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </>
                        </div>
                        <?php
                        }
                        ?>

                                </div>
                                </div>
                            
                        </div>
                          <div class="form-group"> 
                                    <div class="pull-right">
                                         <input id="cancelBtn" style="display: none;" type="button" class="btn btn-danger" value="Cancel"> <input id="submitBtn" style="display: none;" class="btn btn-primary" type="submit" value="Update"'>
                                    </div>
                          </div>
                    </div>
                    <!--End .panel -->
                <div class="col-md-7 pl0">
                     <div class="panel panel-default">
                        <!-- Start .panel -->
                        <div class="panel-heading">
                            <h4 class="panel-title"><i class="fa fa-cog"></i> Preferences </h4>
                            <a class="emailListToggle edit-link-pref" href="#"><i class="fa fa-pencil"></i> Edit </a>
                        </div>
                        <div class="panel-body">
                                <div class="form-group">
                                    <div class="row mb10">
                                        <label for="adminName" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Default items per page</label>
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                            <div class="row">
                                                <div class="input-group-admin">
                                                    <select id="defaultItems" class="form-control title" name="defaultItems" disabled>
<?php
	foreach ($items_per_pages as $num_items)
	{
?>
							<option value='<?= $num_items ?>' <?= $items_per_page == $num_items ? ' selected' : '' ?>><?= $num_items ?></option>
<?php
	}
?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row mb10">
                                        <label for="adminUserName" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Date Format</label>
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                            <div class="row">
                                                <div class="input-group-admin">
                                                    <select id="dateFormat" class="form-control title" name="dateFormat" disabled>
<?php
	
	foreach ($dateformats as $dateformat)
	{
?>
							<option value="<?= preg_replace("/\"/", "\\\"", $dateformat['value']) ?>" <?= $date_format == $dateformat['value'] ? ' selected' : '' ?>><?= h($dateformat['caption']) ?></option>
<?php
	}
?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row mb10">
                                        <label for="kayakoUser" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Time Zone</label>
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                            <div class="row">
                                                <div class="input-group-admin">
                                                    <select id="timeZone" class="form-control title" name="timeZone" disabled>
<?php
	foreach ($timezones as $timezone)
	{
?>
							<option value="<?= preg_replace("/\"/", "\\\"", $timezone) ?>" <?= $time_zone == $timezone ? ' selected' : '' ?>><?= h($timezone) ?></option>
<?php
	}
?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--End .row -->
        </div>
    </div>
</div>

<!-- Init JS only for this page -->
<?= $this->Html->script('pages/preferences') ?>
