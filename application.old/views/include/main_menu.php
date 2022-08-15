<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li id="map" class=" nav-item">
                <a href="<?=base_url('panel/map')?>"><i class="fad fa-map-marked-alt"></i><span class="menu-title"><?=lang('map')?></span></a>
            </li>
            <li class=" navigation-header"><span><?=lang('route_history')?></span><i class="la la-ellipsis-h" data-toggle="tooltip" data-placement="right" data-original-title="<?=lang('route_history')?>"></i>
            </li>
            <li id="routeStatic" class=" nav-item"><a href="<?=base_url('panel/route-static')?>"><i class="fa fa-route"></i><span class="menu-title"><?=lang('static')?></span></a>
            </li>
            <li id="routeAnimation" class=" nav-item"><a href="<?=base_url('panel/route-animation')?>" ><i class="fad fa-route"></i><span class="menu-title"><?=lang('animation')?></span></a>
            </li>
            <li class=" navigation-header"><span><?=lang('reports')?></span><i class="la la-ellipsis-h" data-toggle="tooltip" data-placement="right" data-original-title="<?=lang('reports')?>"></i>
            </li>
            <li id="reportSummary" class=" nav-item"><a href="<?=base_url('panel/report-summary')?>" ><i class="fad fa-border-top"></i><span class="menu-title"><?=lang('summaryReport')?></span></a>
            </li>
            <?php
            //$user = $this->session->userdata('user');
            //$user = (object) json_decode($user);
            //print_r($user);
            if ($user->administrator) {
                ?>
                <li class="navigation-header"><span class="font-weight-bold"><?=lang('settings')?></span><i class="la la-ellipsis-h" data-toggle="tooltip" data-placement="right" data-original-title="<?=lang('settings')?>"></i></li>
                <li id="users" class=" nav-item"><a href="<?=base_url('panel/users')?>" ><i class="fad fa-users"></i><span class="menu-title"><?=lang('users')?></span></a>
                </li>
                <?php
            }
            ?>
            <!--<li id="calendar" class=" nav-item">
                <a class="close-device-position" href="<?/*=base_url('panel/calendar')*/?>"><i class="fad fa-calendar"></i><span class="menu-title"><?/*=lang('calendar')*/?></span></a>
            </li>-->
            <li id="geofence" class=" nav-item">
                <a class="close-device-position" href="<?=base_url('panel/geofence')?>"><i class="fad fa-street-view"></i><span class="menu-title"><?=lang('geofence')?></span></a>
            </li>
            <li id="notification" class=" nav-item">
                <a class="close-device-position" href="<?=base_url('panel/notification')?>"><i class="fad fa-comment-alt-lines"></i><span class="menu-title"><?=lang('notification')?></span></a>
            </li>
        </ul>
    </div>
</div>
