<?php 

 /**
  *  YunoHost - Self-hosting for all
  *  Copyright (C) 2012
  *     Kload <kload@kload.fr>
  *     Guillaume DOTT <github@dott.fr>
  *
  *  This program is free software: you can redistribute it and/or modify
  *  it under the terms of the GNU Affero General Public License as
  *  published by the Free Software Foundation, either version 3 of the
  *  License, or (at your option) any later version.
  *
  *  This program is distributed in the hope that it will be useful,
  *  but WITHOUT ANY WARRANTY; without even the implied warranty of
  *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  *  GNU Affero General Public License for more details.
  *
  *  You should have received a copy of the GNU Affero General Public License
  *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
  */

 ?>
<div class="row row-tab">
	<?php foreach ($appPkgNames as $key => $app) { ?>
		<div class="span6"> 
			<div class="well">
				<div class="row">
					<div class="avatar span2">
						<img src="<?php echo PUBLIC_DIR ?>/img/app.jpg" />
					</div>
					<div class="entityInfo">
						<strong><?php echo ucfirst($app); ?></strong> 
						<?php if (isset($upgradableApps[$app])) { ?>
							 - <span style="color: blue">Upgradable</span>
						<?php } elseif (isset($installedApps[$key])) { ?>
							 - <span style="color: green">Installed</span>
						<?php } ?>
						<div class="maillist">
						 <?php echo $appDesc[$key]; ?></div>
					</div>
					<div class="span1" style="margin-left: 3px; width: 100px; float: right;">
						<div style="text-align: right">
							<?php if (isset($upgradableApps[$app])) { ?>
								<a href="/app/update/<?php echo $app ?>" title="<?php echo T_('Update').' '.ucfirst($app) ?>" class="btn btn-info"><i class="icon-refresh icon-white" style="margin: 2px 0 0 0"></i></a>
							<?php } elseif (isset($installedApps[$key])) { ?>
                                                          <a href="/app/remove/<?php echo $app ?>" title="<?php echo T_('Uninstall').' '.ucfirst($app) ?>" class="delete-confirm btn btn-danger" data-operation="remove" data-app="<?php echo $app; ?>"><i class="icon-trash icon-white" style="margin: 2px 0 0 0"></i></a>
							<?php } else {?>
								<a href="/app/install/<?php echo $app ?>" title="<?php echo T_('Install').' '.ucfirst($app) ?>" class="install-confirm btn btn-success" data-operation="install" data-app="<?php echo $app; ?>"><i class="icon-download-alt icon-white" style="margin: 2px 6px 0 0"></i><?php echo T_('Install') ?></a>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
</div>
<div class="modal fade" id="confirm-modal">
  <div class="modal-header">
    <h3>
      <span class="install-text hide"><?php echo T_('Install'); ?></span>
      <span class="remove-text hide"><?php echo T_('Uninstall'); ?></span>
      <span class="appname"></span>
    </h3>
  </div>
  <div class="modal-body">
  <p class="install-text hide"><?php printf(T_("Are you sure you want to install %s ?"), '<span class="appname"></span>'); ?></p>
  <p class="remove-text hide"><?php printf(T_("Are you sure you want to uninstall %s ?"), '<span class="appname"></span>'); ?></p>
  </div>
  <div class="modal-footer">
    <a href="#" class="btn" data-dismiss="modal">Cancel</a>
    <a href="" id="confirm-link" class="btn btn-primary">Ok</a>
    </div>
</div>
