<!-- .page-content -->
<div class="page-content sidebar-page right-sidebar-page clearfix">
    <!-- .page-content-wrapper -->
    <div class="page-content-wrapper">
        <div class="page-content-inner">
            <form id="contactForm" role="form" enctype="multipart/form-data"  resultsdisplayid="resultsDisplay" useajaxsubmit="true" submittext="Update Contact" widgetid="detailForm" method="post" action="/contacts/<?= preg_replace("/\"/", "\\\"", $contact['contact']) ?>" dojotype="demand:SmartForm">

            <!-- Start .page-content-inner -->
            <div id="page-header" class="clearfix">
                <div class="page-header-simple">
                </div>
            </div>

            <!-- Start .row -->
            <div class="row">
                <div class="col-md-5">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"><i class="fa fa-user"></i>Contact Overview</h4>
                        </div>
                        <!-- Start .panel -->
                        <div class="panel-body">
                            <div class="row profile">
                                <!-- Start .row -->
                                <div class="col-md-5 col-sm-5 col-xs-5">
                                    <div class="profile-avatar mb5">
                                        <?php if (!empty($contact_avatar)) { ?>
                                            <img src="data:image/png;base64, <?= preg_replace("/\"/", "\\\"", base64_encode($contact_avatar)) ?>" alt="avatar">

                                        <?php } else {
                                            echo $this->Html->image('defaultavatar.png');
                                        } ?>
                                        <div class="contacts-info">
                                            <h4 class="small-text-profile-cust  mt0 mb5"><?= h($contact['name']) ?></h4>
                                            <h5 class="small-text-profile-cust  mt0 mb5"><?= h($contact['title']) ?></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7 col-sm-7 col-xs-7">
                                    <div class="right-align mr5 mt150">
                                        <h5 class="small-text-profile mt0 mb5"><?= h($contact['officephone']) ?></h5>
<?php
	if ((isset($editable)) && ($editable))
	{
?>

<?php
	}
?>
                                        <a href="mailto:<?= preg_replace("/\"/", "\\\"", $contact['email']) ?>"> <?= h($contact['email']) ?></a>

                                    </div>
                                    </div>
                            </div>
                            <!-- End .row -->
                        </div>
                    </div>
                    <!-- End .panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"><i class="fa fa-pencil"></i>Internal Notes</h4>
                        </div>
                        <!-- Start .panel -->
                        <div class="panel-body">
                            <div class="row profile">
                                <!-- Start .row -->
                                <div class="col-md-12">
<?php
    if ((isset($editable)) && ($editable))
    {
?>
                                    <textarea id="internNotes" name="internNotes" class="form-control title ht150"  value="<?= h($contact['notice']) ?>" disabled required ></textarea>
    <?php
    }
    else
    {
    ?>
                                    <span><?= h($contact['notice']) ?></span>
    <?php
    }
?>
                                </div>
                            </div>
                            <!-- End .row -->
                        </div>
                    </div>
                    <!-- End .panel -->
                </div>
                <!--Start Right Column -->
                <div class="col-md-7">
                        <div class="tabs mb20">
                            <ul id="myTab" class="nav nav-tabs">
                                <li class="active">
                                    <a href="#userOverview" data-toggle="tab"><i class="fa fa-user"></i>Contacts Details</a>
                                </li>
                                <li>
                                    <a href="#customerAssoc" data-toggle="tab"><i class="fa fa-check"></i>Customer Associations</a>
                                </li>
                            </ul>

                            <div id="myTabContent2" class="tab-content">
                                <div class="tab-pane fade active in" id="userOverview">
                                    <div class="row">
                                            <div class="row mb10">
                                                <div class="form-group">
                                                <label for="firstName" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">First Name</label>
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 pl0">
<?php
	if ((isset($editable)) && ($editable))
	{
?>
                                                        <input type="text" id="firstName" name="firstName" class="form-control title" value="<?= h($contact['first_name']) ?>" required disabled>
                                                        <span concealed="true" class="fieldRequired" style="display: none;">(*required)</span>
<?php
	}
	else
	{
?>
                                                        <span><?= h($contact['first_name']) ?></span>
<?php
	}
?>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="row mb10">
                                                <div class="form-group">
                                                <label for="lastName" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Last Name</label>
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 pl0">
<?php
	if ((isset($editable)) && ($editable))
	{
?>
                                                        <input type="text" id="lastName" name="lastName" class="form-control title" value="<?= h($contact['last_name']) ?>" required disabled>
                                                        <span concealed="true" class="fieldRequired" style="display: none;">(*required)</span>
<?php
	}
	else
	{
?>
                                                        <span><?= h($contact['last_name']) ?></span>
<?php
	}
?>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="row mb10">
                                                <div class="form-group">
                                                <label for="contactTitle" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Title</label>
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 pl0">
<?php
	if ((isset($editable)) && ($editable))
	{
?>
                                                        <input type="text" id="contactTitle" name="contactTitle" class="form-control title" value="<?= h($contact['title']) ?>" required disabled>
<?php
	}
	else
	{
?>
                                                        <span><?= h($contact['title']) ?></span>
<?php
	}
?>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="row mb10">
                                                <div class="form-group">
                                                <label for="nickName" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Nickname</label>
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 pl0">
<?php
	if ((isset($editable)) && ($editable))
	{
?>
                                                        <input type="text" id="nickName" name="nickName" class="form-control title" value="<?= h($contact['nickname']) ?>" required disabled>
<?php
	}
	else
	{
?>
                                                        <span><?= h($contact['nickname']) ?></span>
<?php
	}
?>
                                                </div>
                                                </div>
                                            </div>

                                            <div class="row mb10">
                                                <div class="form-group">
                                                <label for="phoneNumber" class="col-lg-3 col-md-3 col-sm-3 control-label">Primary Office Phone Number</label>
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 pl0">
<?php
	if ((isset($editable)) && ($editable))
	{
?>
                                                        <input type="text" id="phoneNumber" name="phoneNumber" class="form-control title" value="<?= h($contact['officephone']) ?>" required disabled>
<?php
	}
	else
	{
?>
                                                        <span><?= h($contact['officephone']) ?></span>
<?php
	}
?>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="row mb10">
                                                <div class="form-group">
                                                <label for="mobileNumber" class="col-lg-3 col-md-3 col-sm-3 control-label">Primary Mobile Phone Number</label>
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 pl0">
<?php
	if ((isset($editable)) && ($editable))
	{
?>
                                                        <input type="text" name="mobileNumber" class="form-control title" value="<?= h($contact['mobilephone']) ?>" required disabled>
<?php
	}
	else
	{
?>
                                                        <span><?= h($contact['mobilephone']) ?></span>
<?php
	}
?>
                                                </div>
                                                </div>
                                            </div>
                                            <div concealed="true" style="display: none;">
                                                <div style="position:relative">
                                                    <a style="position:absolute;left:0px" href="javascript:addPhoneInput()"><img title="Add a phone number" src="/images/list-add.png">
                                                    </a>
                                                </div> Alt Phone Numbers
                                                <span concealed="true" class="italic" style="display: none;">Use digits and hyphens only.</span>
                                            </div>
                                            <div anticoncealed="true" class="row mb10">
                                                <div class="form-group alt">
                                                <label for="altPhoneNumber" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Alt Phone Numbers</label>
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 pl0">
                                                        <div class="input_fields_wrap">
                                                            <input type="text" id="altPhoneNumber" name="altPhoneNumber" class="form-control title" value="" disabled>
                                                            <button style="display: none;" class="add_field_button mt5">Add Phone Number<i class="fa fa-plus pl5"></i></button>

                                                            <!--button class="add_field_button mt5">Add Phone Number<i class="fa fa-plus pl5"></i></button>-->
                                                        </div>
                                                </div>
                                              </div>
                                            </div>

                                            <div class="row mb10">
                                                <div class="form-group">
                                                <label for="contactNotes" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Notes</label>
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 pl0">
<?php
	if ((isset($editable)) && ($editable))
	{
?>
                                                        <textarea id="contactNotes" type="text" name="contactNotes" value="<?= h($contact['notes']) ?>" class="form-control title text-area-172" disabled required></textarea>
                                                        <span concealed="true" class="italic" style="display: none;">Customers can see and edit this!</span>
<?php
	}
	else
	{
?>
                                                        <span><?= h($contact['notes']) ?></span>
<?php
	}
?>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div anticoncealed="true" class="row mb10">
                                             <div class="form-group">
                                            <label for="primaryEmail" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Primary Email</label>
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 pl0">
<?php
	if ((isset($editable)) && ($editable))
	{
?>
                                                    <input type="email" id="primaryEmail" name="primaryEmail" class="form-control title" value="<?= h($contact['email']) ?>" required disabled>
<?php
	}
	else
	{
?>
                                                        <span><?= h($contact['email']) ?></span>
<?php
	}
?>
                                            </div>
                                     </div>
                                    </div>
                                    <div anticoncealed="true" class="row mb10">
                                        <div class="form-group">
                                        <label for="altEmail" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Alt Emails</label>
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 pl0">
                                                <?php
                                                foreach ($contact['contact_alt_email'] as $alt_email)
                                                {
                                                    ?>
                                                    <input type="email" id="altEmail" name="altEmail" class="form-control title" value="<?=h($alt_email['address']) ?>" disabled>
                                                    <?php
                                                }
                                                ?>
                                            <div class="input_fields_wrap_email">
                                                <button style="display: none;" class="add_field_button_email mt5 mb10">Add Email<i class="fa fa-plus pl5"></i></button>

                                            </div>

                                        </div>
                                       </div>
                                    </div>
                                    <div class="row mb10">
                                      <div class="form-group">
                                        <label for="addedOn" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Added On</label>
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 pl0">
                                            <div class="input-group">
                                                <span><?= h($contact['created']) ?></span>
                                            </div>
                                        </div>
                                     </div>
                                    </div>
                                    <div class="row mb10">
                                      <div class="form-group">
                                        <label class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Last updated On</label>
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 pl0">
                                            <div class="input-group">
                                                <span><?= h($contact['updated']) ?></span>
                                            </div>
                                        </div>
                                      </div>
                                    </div>

                                    <a class="ml15" id="editContactDetails" href="#">Edit Contact Details</a>
                                            <div class="row">
                                            </div>
                                    <input id="submitBtn" style="display: none;" type="submit" class="btn btn-primary" value="Save"> <input id="cancelBtn" style="display: none;" type="button" class="btn btn-danger" value="Cancel">

                                </div>
                                <div class="tab-pane fade" id="customerAssoc">
                                    <div class="row">
                                        <table class="table table-striped">
                                            <thead>
                                            <th colspan="2">Customer Associations</th>
                                            </thead>
                                            <tbody>
<?php
    foreach ($contact['cust'] as $cust)
    {
?>
                                                <tr>
                                                    <td>
<?php
    if ((isset($view_customer)) && ($view_customer))
    {
?>
                                                            <a href="/customers/<?= preg_replace("/\"/", "\\\"", $cust['custid']) ?>"><?= h($cust['companyname']) ?></a>
<?php
    }
    else
    {
?>
                                                            <span><?= h($cust['companyname']) ?></span>
<?php
    }
?>
                                                    </td>
                                                    <td>
<?php
    if ((isset($view_portal)) && ($view_portal))
    {
?>
                                                            <a class="btn btn-primary" href="/contacts/<?= preg_replace("/\"/", "\\\"", $contact['contact']) ?>/open_portal/<?= preg_replace("/\"/", "\\\"", $cust['custid']) ?>" target="_blank">Log in to customer interface as user <span class="icon">
                                                            <i class="fa fa-cloud"></i></span></a>
<?php
    }
?>
                                                    </td>
                                                </tr>
<?php
    }
?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!-- End .panel -->
                        <!-- End .tabs -->
                    </div>
                    <!-- End Right Column -->
                </div>
            </div>
            <!--End .row -->
            </form>
        </div>
        <!-- End .page-content-inner -->
    </div>
    <!-- / page-content-wrapper -->
</div>
<!-- / page-content -->

<!-- Init JS only for this page -->
<?= $this->Html->script('pages/contact') ?>
