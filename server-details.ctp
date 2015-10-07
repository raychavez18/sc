<!-- .page-content -->
<div class="page-content sidebar-page right-sidebar-page clearfix">
    <!-- .page-content-wrapper -->
    <div class="page-content-wrapper">
        <div class="page-content-inner">
            <div id="page-header" class="clearfix">
                <div class="page-header-simple">
                    <h2>
                        <i class="fa fa-server"> Server <?= h($server['name']) ?><?= !empty($server['decomissioned']) ? '  - Decomissioned: ' . $server['decomissioned'] : '' ?></i>
                    </h2>
                </div>
                <div class="header-stats">

                </div>
            </div>
            <div class="row">
                <!--Start Left Column -->
                <div class="col-md-3 pl0 pr0">
                    <div class="panel panel-default menuActionsHover" id="dyn_0" style="border-bottom-right-radius: 3px; border-bottom-left-radius: 3px;">
                        <div class="panel-heading">
                            <h4 class="panel-title"><i class="fa fa-wrench"></i> Actions</h4>
                            <div class="panel-controls panel-controls-right">
                                <i class="fa fa-sort-down smallIconFix" style="color: rgb(51, 51, 51);"></i>
                            </div>
                        </div>
                        <div style="display:none;" class="panel-body menuActionsMenu">
                            <ul class="list-unstyled link-list mb0">
                                <h4 class="headline">Edit Server Details</h4>
                                <ul class="list-unstyled link-list mb0">
                                    <li><a href="#" data-toggle="modal" data-target="#">Set as managed</a>
                                    </li>
                                    <li><a href="#" data-toggle="modal" data-target="#">Associate Server with Customer</a>
                                    </li>
                                    <li><a href="#" data-toggle="modal" data-target="#">Mark as Internal</a>
                                    </li>
                                    <li><a href="#" data-toggle="modal" data-target="#">Assign Bandwidth Port</a>
                                    </li>
                                    <li><a href="#" data-toggle="modal" data-target="#">Associate with Billing Package</a>
                                    </li>
                                </ul>
                            </ul>
                        </div>
                    </div>
                    <div class="panel panel-default serverInfoHover" id="dyn_0" style="border-bottom-right-radius: 3px; border-bottom-left-radius: 3px;">
                        <div class="panel-heading">
                            <h4 class="panel-title"><i class="fa fa-info"></i> Server Information</h4>
                        </div>
                        <div class="panel-body serverInfoMenu detailsOverview customForm">
                            <h4 class="server-details-header mt0">Server <?= h($server['name']) ?></h4>
                            <h4 class="server-details-header-icon">
<?php
        if (!empty($server['note_type']))
        {
            switch ($server['note_type']['id'])
            {
            case 1 :
                echo '<div class="flag-icon-orange"><i class="fa fa-flag"></i></div>';
                break;
            case 2 :
                echo '<div class="flag-icon-blue"><i class="fa fa-flag"></i></div>';
                break;
            case 3 :
                echo '<div class="flag-icon-red"><i class="fa fa-flag"></i></div>';
                break;
            case 4 :
                echo '<div class="flag-icon-yellow"><i class="fa fa-flag"></i></div>';
                break;
            case 5 :
                echo '<div class="flag-icon-purple"><i class="fa fa-flag"></i></div>';
                break;
            case 6 :
                echo '<div class="flag-icon-green"><i class="fa fa-flag"></i></div>';
                break;
            default :
                echo '<div class="flag-icon-blue"><i class="fa fa-flag"></i></div>';
            }
        }
?>
                            </h4>
                                <div class="row mb10">
                                    <label class="col-lg-6 col-md-6 col-sm-6 col-xs-6 mt5 control-label" for="packageDescriptionBandwidth">Description</label>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                                        <span><?= h($server['description']) ?></span>
                                    </div>
                                </div>

                                <div class="row mb0">
                                    <label class="col-lg-6 col-md-6 col-sm-6 col-xs-6 control-label">Inventory Tag</label>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6  mt5">
                                        <span><?= h($server['inventory_tag']) ?></span>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-lg-6 col-md-6 col-sm-6 col-xs-6 control-label">Nickname</label>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6  mt5">
                                        <span><?= h($server['nickname']) ?></span>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-lg-6 col-md-6 col-sm-6 col-xs-6 control-label" for="baseBandwidth">Hostname</label>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6  mt5">
                                        <span><?= h($server['hostname']) ?></span>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-lg-6 col-md-6 col-sm-6 col-xs-6 control-label" for="packageOverage">Server IP</label>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6  mt5">
                                        <span><?= $server['server_ip'] > 0 ? h(long2ip($server['server_ip'])) : '' ?></span>
                                    </div>
                                </div>
<?php
    if (!empty($server['notes']))
    {
?>
                                <div class="row">
                                    <label class="col-lg-6 col-md-6 col-sm-6 col-xs-6 control-label" for="packageOverage">Notes</label>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6  mt5">
                                        <span><?= h($server['notes']) ?></span>
                                    </div>
                                </div>
<?php
    }


    if ((!empty($server['cust'])) || (!empty($server['internal_department'])))
    {
?>


                                <div class="row">
                                    <label class="col-lg-6 col-md-6 col-sm-6 col-xs-6 control-label">Assigned To</label>
<?php
    if (!empty($server['cust']))
    {
?>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6  mt5">
                                        <span><a href="/customers/<?= preg_replace("/\"/", "\\\"", $server['cust'][0]['custid']) ?>"><?= h($server['cust'][0]['name']) ?></a> On <?= h($server['cust'][0]['_joinData']['dsa_formatted']) ?></span>
                                    </div>
<?php
    }
else if (!empty($server['internal_department']))
    {
?>

                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6  mt5">
                                        <span><a href="/departments/<?= preg_replace("/\"/", "\\\"", $server['internal_department']['id']) ?>"><?= h($server['internal_department']['name']) ?></a></span>
                                    </div>
<?php
    }
?>
                                </div>
<?php
    }
?>
                                <div class="row">
                                    <label class="col-lg-6 col-md-6 col-sm-6 col-xs-6 control-label">Added On</label>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6  mt5">
                                        <span><?= h($server['created']) ?></span>
                                    </div>
				</div>
                                <div class="row">
                                    <label class="col-lg-6 col-md-6 col-sm-6 col-xs-6 control-label">Last updated On</label>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6  mt5">
                                        <span><?= h($server['updated']) ?></span>
                                    </div>
				</div>
                                <div class="row">
                                    <label class="col-lg-6 col-md-6 col-sm-6 col-xs-6 control-label">Customer Owned?</label>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6  mt5">
                                        <span><?= $server['owner'] == 'COMPANY' ? 'No' : 'Yes' ?></span>
                                    </div>
				</div>
                        </div>
                    </div>
                </div>

                <!--Start Right Column -->
                <div class="col-md-9">
                    <div class="tabs mb20">
                        <ul id="myTab" class="nav nav-tabs">
                            <li class="active">
                                <a href="#serverOverview" data-toggle="tab"><i class="fa fa-hdd-o"></i> Server Overview</a>
                            </li>
                            <li class="">
                                <a href="#hardwareDetails" data-toggle="tab"><i class="fa fa-info"></i> Hardware Details</a>
                            </li>
                            <li class="">
                                <a href="#currentAssoc" data-toggle="tab"><i class="fa fa-users"></i> Current Association</a>
                            </li>
                            <li class="">
                                <a href="#portUsage" data-toggle="tab"><i class="fa fa-bolt"></i> Port Usage</a>
                            </li>
                        </ul>
                        <div id="myTabContent2" class="tab-content">
                            <div class="tab-pane fade active in" id="serverOverview">
                                <div class="row">
                                    <div class="col-md-2 col-sm-2 col-xs-2 pr0">
                                        <h4 class="server-details-headline mt10 pr25">Server <?= h($server['name']) ?></h4>
                                        <div class="serverDetails">
                                            <div class="tabs tabs-left">
                                                <!--<div class="serverbg"></div>--><img style="margin-top:17px;" src="../img/ico/server2-100.png">
                                                <div class="grnLine"></div>

                                                <ul id="myTab8" class="pl0 nav nav-tabs">
<?php
	if (!empty($server['asset_pdu_port']))
	{
?>
                                                    <li class="current">
                                                        <a href="#pdu" name="serverNames" data-toggle="tab">PDU's</a>
                                                    </li>
<?php
	}

	if (!empty($server['asset_port']))
	{
?>
                                                    <li class="">
                                                        <a href="#ports" name="serverNames" data-toggle="tab">Connections</a>
                                                    </li>
<?php
	}

	if (!empty($server['assigned_asset_switch_port']))
	{
?>
                                                    <li class="">
                                                        <a href="#switchPorts" name="serverNames" data-toggle="tab">Switch Ports</a>
                                                    </li>
<?php
	}

	if (!empty($server['assigned_kvm_tail']))
	{
?>
                                                    <li class="">
                                                        <a href="#kvm" name="serverNames" data-toggle="tab">KVM</a>
                                                    </li>
<?php
	}

	if (!empty($server['assoc_rack']))
	{
?>
                                                    <li class="">
                                                        <a href="#racks" name="serverNames" data-toggle="tab">Rack</a>
                                                    </li>
<?php
	}

	if (!empty($server['ip_assignment']))
	{
?>
                                                    <li class="">
                                                        <a href="#ip-assign" name="serverNames" data-toggle="tab">Assigned IPs</a>
                                                    </li>
<?php
	}
?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-10 col-sm-10 col-xs-10 pl0">
                                            <span class="server-details-headline-port">PDU's</span>
                                            <!--<h4 class="server-details-headline-port"></h4>-->
                                            <div class="serverDetails">
                                                <div id="myTabContent8" class="tab-content">
<?php
	if (!empty($server['asset_pdu_port']))
	{
?>
                                                    <div class="tab-pane fade active in" id="pdu">
                                                        <ul class="pl0">
<?php
		foreach ($server['asset_pdu_port'] as $pdu_port)
		{
?>
                                                            <li class="serverDetails pb10">
                                                                <div class="row">
                                                                    <div class="server-image-pdu">
                                                                        <button type="button" class="btn btn-default icon-server mr10"><?= $this->Html->image('ico/outlet-black-35.png') ?></button>
                                                                    </div>
                                                                    <div class="server-table">
                                                                        <table class="table mt0 pl10">
                                                                            <thead>
                                                                            <tr>
                                                                                <th class="per15">PDU Port</th>
                                                                                <th class="per35">Power Status</th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            <tr>
                                                                                <td><a href="/pdu_ports/<?= preg_replace("/\"/", "\\\"", $pdu_port['id']) ?>"><?= h($pdu_port['full_name']) ?></a></td>

                                                                                <td>
<?php

switch (($pdu_port['status']))
    {
    case 'on' :
    echo '<div class="color-on">On</div>';
        break;
    case 'off' :
    echo '<div class="color-off">Off</div>';
        break;
    case 'unknown' :
    echo '<div class="color-unknown">?</div>';
        break;
    default:
    $image = 'ico/switchport-30.png';
    }

?>
                                                                                </td>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </li>
<?php
		}
?>
                                                        </ul>
                                                    </div>
<?php
	}

	if (!empty($server['asset_port']))
	{
?>
                                                    <div class="tab-pane fade" id="ports">
                                                        <ul class="pl0">
<?php
		foreach ($server['asset_port'] as $port)
		{
?>
                                                            <li class="serverDetails pb10">
                                                                <div class="row">
                                                                    <div>
                                                                        <button type="button" class="btn btn-default icon-server mt15 mr10"><img src="../img/ico/switchport-30.png"><br><?= h($port['name']) ?></button>
                                                                    </div>
                                                                    <hr class="horizontal-line">
<?php
			// determine the type of connection (if any
			$connectedTo = null;
			if (!empty($port['port']['cable'][0]['port']))
			{
				// there will be multiple port attached to this cable
				// so find the other side
				foreach ($port['port']['cable'][0]['port'] as $cable_port)
				{
					if ($cable_port['id'] != $port['port']['id'])
					{
						// this is the other end of the connection
						// so see if it's attached, and if so, what to
						if (!empty($cable_port['asset_port']))
						{
							// OK, figure out what type of asset this is
							foreach (['server','switch','kvm','kvm_tail','pdu'] as $what)
							{
								if (!empty($cable_port['asset_port']['port_asset_' . $what]))
								{
									$connectedTo = ['type' => $what,
											'details' => $cable_port['asset_port']['port_asset_' . $what]];
								}
							}
						}
						else if (!empty($cable_port['external_connection']))
						{
							$connectedTo = ['type' => 'external_connection',
									'details' => $cable_port['external_connection']];
						}
						else if (!empty($cable_port['patch_panel_port']))
						{
							// special case here so we can get the side
							$cable_port['patch_panel_port']['side'] = $cable_port['name'];
							$connectedTo = ['type' => 'patch_panel_port',
									'details' => $cable_port['patch_panel_port']];
						}
						break;
					}
				}
			}

			// if this is connected to something, show it
			if (!empty($connectedTo))
			{
?>
                                                                    <div class="server-image">
<?php
				switch ($connectedTo['type'])
				{
					case 'server' :
                    echo '<button type="button" class="btn btn-default mr10"><i class="fa fa-server fa-2x"></i><br>Server</button> ';
					case 'switch' :
                    echo '<button type="button" class="btn btn-default mr10"><img src="/img/ico/switch-30.png"><br>Switch</button>';
                    case 'kvm' :
                    echo '<button type="button" class="btn btn-default mr10"><img src="/img/ico/kvm-black-30.png"><br>KVM</button>';
					case 'pdu' :
                    echo '<button type="button" class="btn btn-default mr10"><img src="/img/ico/outlet-black-30.png"><br>PDU</button>';
					case 'kvm_tail' :
                    echo '<button type="button" class="btn btn-default mr10"><img src="/img/ico/kvm-switch-30.png"><br>KVM Tail</button>';
                    default: // this covers patch panels too :)
						$image = 'ico/switchport-30.png';
				}
?>
                                                                        <button type="button" class="btn btn-default icon-server mt15 mr10"><?= $this->Html->image($image) ?></button>
                                                                    </div>
                                                                    <div class="server-table-ports mt10">
                                                                        <table class="table mt0 pl10">
                                                                            <thead>
                                                                            <tr>
                                                                                <th class="per15">Name</th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            <tr>
<?php
				switch ($connectedTo['type'])
				{
					case 'server' :
					case 'switch' :
					case 'kvm' :
					case 'pdu' :
						echo '<td><a href="/' . strtolower(\Cake\Utility\Inflector::pluralize($connectedTo['type'])) . '/' . preg_replace("/\"/", "\\\"", $connectedTo['details']['id']) . '">'. h($connectedTo['details']['name']) . '</a></td>';
						break;
					case 'kvm_tail' :
						echo '<td><a href="/kvm_tails/' . preg_replace("/\"/", "\\\"", $connectedTo['details']['id']) . '">'. h($connectedTo['details']['full_name']) . '</a></td>';
						break;
					case 'patch_panel_port' :
						echo '<td><a href="/patch_panel_ports/' . preg_replace("/\"/", "\\\"", $connectedTo['details']['id']) . '">'. h((!empty($connectedTo['details']['patch_panel_module']['assoc_patch_panel']['name']) ? $connectedTo['details']['patch_panel_module']['assoc_patch_panel']['name'] : 'Unknown') . '/' . $connectedTo['details']['side'] . ':' . $connectedTo['details']['name']) . '</a></td>';
						break;
					default :
						echo '<td>Unknown</td>';
				}
?>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
<?php
			}
			else
			{
?>
                                                                    <div class="server-image">
                                                                    </div>
                                                                    <div class="server-table-ports mt10">
                                                                    </div>
<?php
			}
?>
                                                                </div>
                                                            </li>
<?php
		}
?>
                                                        </ul>
                                                    </div>
<?php
	}

	if (!empty($server['assigned_asset_switch_port']))
	{
?>
                                                    <div class="tab-pane fade" id="switchPorts">
                                                        <ul class="pl0">
<?php
		foreach ($server['assigned_asset_switch_port'] as $switch_port)
		{
?>
                                                            <li class="serverDetails pb10">
                                                                <div class="row">
                                                                    <div class="server-image-switch pt15">
                                                                        <button type="button" class="btn btn-danger icon-server mb5 mr10"><?= $this->Html->image('ico/server-35.png') ?></button>
                                                                        <div class="server-table-switch-two mt15 col-bottom">
                                                                                <span class="switch-port-speed"><?= h($switch_port['speed']) ?>Mbps</span>
                                                                            <span class="switch-port-speed">
                                                                            <?php


switch (($switch_port['ifstatus'] ? 'Up' : 'Down'))
{
    case 'Up' :
        echo '<div class="speed-status-on"><i class="fa fa-arrow-up"></i></div>';
        break;
    case 'Down' :
        echo '<div class="speed-status-off"><i class="fa fa-arrow-down"></i></div>';
        break;
    default:
        $image = 'ico/switchport-30.png';
}



                                                                            ?>
                                                                        </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="server-table server-table-switch ml20 col-bottom">
                                                                        <div class="row mb10">
                                                                            <label class="col-lg-5 col-md-5 col-sm-5 col-xs-5 control-label" for="packageDescriptionBandwidth">Switch Port</label>
                                                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                                                                <span><a href="/switch_ports/<?= preg_replace("/\"/", "\\\"", $switch_port['id']) ?>"><?= h($switch_port['full_name']) ?></a></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb10">
                                                                            <label class="col-lg-5 col-md-5 col-sm-5 col-xs-5 control-label" for="packageDescriptionBandwidth">Nickname</label>
                                                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                                                                <span><a href="/switch_ports/<?= preg_replace("/\"/", "\\\"", $switch_port['id']) ?>"><?= h($switch_port['full_nickname']) ?></a></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb10">
                                                                            <label class="col-lg-5 col-md-5 col-sm-5 col-xs-5 control-label" for="packageDescriptionBandwidth">Billed</label>
                                                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                                                                <span><?= (!empty($switch_port['_joinData']['metered']) && $switch_port['_joinData']['metered'] == 'YES') ? 'Yes' : 'No' ?></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
<?php
		}
?>
                                                        </ul>
                                                    </div>
<?php
	}

	if (!empty($server['assigned_kvm_tail']))
	{
?>
                                                    <div class="tab-pane fade" id="kvm">
                                                        <ul class="pl0">
<?php
		foreach ($server['assigned_kvm_tail'] as $kvm_tail)
		{
?>
                                                            <li class="serverDetails pb10">
                                                                <div class="row">
                                                                    <div class="server-image pt5">
                                                                        <button type="button" class="btn btn-default icon-server mr10"><?= $this->Html->image('ico/kvm-black-50.png') ?></button>
                                                                    </div>
                                                                    <div class="server-table server-table-right pt5 col-bottom">
                                                                        <div class="row mb10">
                                                                            <label class="col-lg-5 col-md-5 col-sm-5 col-xs-5 control-label" for="packageDescriptionBandwidth">Kvm Tail</label>
                                                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                                                                <span><a href="/kvm_tails/<?= preg_replace("/\"/", "\\\"", $kvm_tail['id']) ?>"><?= h($kvm_tail['full_name']) ?></a></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb10">
                                                                            <label class="col-lg-5 col-md-5 col-sm-5 col-xs-5 control-label" for="packageDescriptionBandwidth">Description</label>
                                                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                                                                <span><?= h($kvm_tail['description']) ?></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
<?php
		}
?>
                                                        </ul>
                                                    </div>
<?php
	}

	if (!empty($server['assoc_rack']))
	{
?>
                                                    <div class="tab-pane fade" id="racks">
                                                        <ul class="pl0">
                                                            <li class="serverDetails pb10">
                                                                <div class="row">
                                                                    <div class="server-image">
                                                                        <button type="button" class="btn btn-primary icon-server mr10"><img src="../img/ico/racks-50.png"></button>
                                                                    </div>
                                                                    <div class="server-table">
                                                                        <table class="table mt0 pl10">
                                                                            <thead>
                                                                            <tr>
                                                                                <th class="per15">Name</th>
                                                                                <th>size U</th>
                                                                                <th>numbering</th>
                                                                                <th>start U</th>
                                                                                <th>end U</th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            <tr>
                                                                                <td><?= h($server['assoc_rack']['full_name']) ?></td>
                                                                                <td><?= h($server['assoc_rack']['rack_u']) ?></td>
                                                                                <td><?= $server['assoc_rack']['order_reversed'] == 'YES' ? 'Top to Bottom' : 'Bottom to top' ?></td>
                                                                                <td><?= !empty($server['rack_space']) ? $server['rack_space']['start_u'] : 'Unknown' ?></td>
                                                                                <td><?= !empty($server['rack_space']) ? $server['rack_space']['end_u'] : 'Unknown' ?></td>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                    <div class="server-rack-wrap mt10">
                                                                        <img src="../img/ico/20u-rack-175.png">
                                                                        <div class="server-rack">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
<?php
	}

	if (!empty($server['ip_assignment']))
	{
?>
                                                    <div class="tab-pane fade" id="ip-assign">
                                                        <ul class="pl0">
<?php
		foreach ($server['ip_assignment'] as $ip_assignment)
		{
?>
                                                            <li class="serverDetails pb10">
                                                                <div class="row">
                                                                    <div class="server-image">
                                                                        <button type="button" class="btn btn-default icon-server mt10 mr10"><i class="fa fa-wifi fa-3x"></i></button>
                                                                    </div>
                                                                    <div class="server-table server-table-right pt10 col-bottom">
                                                                        <div class="row mb10">
                                                                            <label class="col-lg-5 col-md-5 col-sm-5 col-xs-5 control-label" for="packageDescriptionBandwidth">IP Block</label>
                                                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 pl0">
                                                                                <span><?= h(long2ip($ip_assignment['ip32a'])) . '/' . h(32 - round(log($ip_assignment['ip32z'] - $ip_assignment['ip32a'],2))) ?></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb10">
                                                                            <label class="col-lg-5 col-md-5 col-sm-5 col-xs-5 control-label" for="packageDescriptionBandwidth">Assignment Type</label>
                                                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 pl0">
                                                                                <span><?= h(\Cake\Utility\Inflector::humanize(strtolower($ip_assignment['assign_type']))) ?></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb10">
                                                                            <label class="col-lg-5 col-md-5 col-sm-5 col-xs-5 control-label" for="packageDescriptionBandwidth">PoP</label>
                                                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 pl0">
                                                                                <span><?= h($ip_assignment['pop']) ?></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb10">
                                                                            <label class="col-lg-5 col-md-5 col-sm-5 col-xs-5 control-label" for="packageDescriptionBandwidth">Comments</label>
                                                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 pl0">
                                                                                <span><?= h($this->Handle->read($ip_assignment['comment'])) ?></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
<?php
		}
?>
                                                        </ul>
                                                    </div>
<?php
	}
?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="hardwareDetails">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th colspan="2">Server <?= h($server['name']) ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
<?php
	if (!empty($server['server_vendor']))
	{
?>
                                    <tr>
                                        <td>Server Vendor </td>
                                        <td><?= $server['server_vendor']['name'] ?></td>
                                    </tr>
<?php
	}
		
	if (!empty($server['server_model']))
	{
?>
                                    <tr>
                                        <td>Server Model </td>
                                        <td><?= $server['server_model']['name'] ?></td>
                                    </tr>
<?php
	}
		
	if (!empty($server['drac_model']))
	{
?>
                                    <tr>
                                        <td>DRAC Model </td>
                                        <td><?= $server['drac_model']['name'] ?></td>
                                    </tr>
<?php
	}

	if (!empty($server['server_raid_controller']))
	{
?>
                                    <tr>
                                        <td>RAID Controller </td>
                                        <td><?= $server['server_raid_controller']['name'] ?></td>
                                    </tr>
<?php
	}

	if (!empty($server['server_operating_system']))
	{
?>
                                    <tr>
                                        <td>Operating System </td>
                                        <td><?= $server['server_operating_system']['name'] ?></td>
                                    </tr>
<?php
	}
		
	if (!empty($server['server_proc_type']))
	{
?>
                                    <tr>
                                        <td>Processor Type </td>
                                        <td><?= $server['server_proc_type']['name'] ?></td>
                                    </tr>
<?php
	}
		
	if (!empty($server['server_proc_speed']))
	{
?>
                                    <tr>
                                        <td>Processor Speed </td>
                                        <td><?= $server['server_proc_speed']['name'] ?></td>
                                    </tr>
<?php
	}
		
	if (!empty($server['motherboard_vendor']))
	{
?>
                                    <tr>
                                        <td>Motherboard Vendor </td>
                                        <td><?= $server['motherboard_vendor']['name'] ?></td>
                                    </tr>
<?php
	}
		
	if (!empty($server['motherboard_model']))
	{
?>
                                    <tr>
                                        <td>Motherboard Model </td>
                                        <td><?= $server['motherboard_model']['name'] ?></td>
                                    </tr>
<?php
	}
?>
		
                                    <tr>
                                        <td>Monitoring </td>
                                        <td><?= $server['monitor'] == 'ON' ? 'Enabled' : 'Disabled' ?></td>
                                    </tr>
                                    <tr>
                                        <td>MAC Addresses </td>
                                        <td><?= empty($server['mac_address_list']) ? 'Not Set' : h($server['mac_address_list']) ?></td>
                                    </tr>
<?php
	if ($server['managed'] == 'YES')
	{
?>
                                    <tr>
                                        <td>Managed By </td>
                                        <td><?= empty($server['managed_by']['name']) ? 'Unknown' : h($server['managed_by']['name']) ?></td>
                                    </tr>
<?php
	}
	else
	{
?>
                                        <td>Managed? </td>
                                        <td>No</td>
                                    </tr>
<?php
	}

	if (!empty($server['asset_server_parent']))
	{
?>
                                    <tr>
                                        <td>Parent Server </td>
                                        <td><a href="/servers/<?= preg_replace("/\"/", "\\\"", $server['asset_server_parent']['id']) ?>"><?= h($server['asset_server_parent']['name']) ?></a></td>
                                    </tr>
<?php
	}

	if (!empty($server['server_relationship_type']))
	{
?>
                                    <tr>
                                        <td>Server Class </td>
                                        <td><?= \Cake\Utility\Inflector::humanize(strtolower($server['server_relationship_type']['name'])) ?></td>
                                    </tr>
<?php
	}
?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="currentAssoc">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, suscipit, autem sit natus deserunt officia error odit ea minima soluta ratione maxime molestias fugit explicabo aspernatur praesentium quisquam voluptatum fuga delectus quidem quas aliquam
                                    minus at corporis libero? Modi, aperiam, pariatur, sequi illum dolore consequuntur aspernatur eos hic officia doloribus magnam impedit autem maiores alias consectetur tempore explicabo. Ducimus, minima,
                                    suscipit unde harum numquam ipsa laboriosam cupiditate nemo repellendus at? Dolorum dicta nemo quaerat iusto.
                                </p>
                            </div>
                            <div class="tab-pane fade" id="portUsage">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, suscipit, autem sit natus deserunt officia error odit ea minima soluta ratione maxime molestias fugit explicabo aspernatur praesentium quisquam voluptatum fuga delectus quidem quas aliquam
                                    minus at corporis libero? Modi, aperiam, pariatur, sequi illum dolore consequuntur aspernatur eos hic officia doloribus magnam impedit autem maiores alias consectetur tempore explicabo. Ducimus, minima,
                                    suscipit unde harum numquam ipsa laboriosam cupiditate nemo repellendus at? Dolorum dicta nemo quaerat iusto.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Init JS only for this page -->
<?= $this->Html->script('pages/server-details') ?>
