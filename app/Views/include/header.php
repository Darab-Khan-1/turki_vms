<!-- BEGIN: Header-->
<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light bg-info navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul id="navbarLogo" class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="fad fa-bars font-large-1"></i></a></li>
                <li class="nav-item">
                    <a class="navbar-brand" href="<?=base_url('panel/map')?>">
                        <img class="img-fluid w-85" alt="arac takip" src="<?=base_url('app-assets/images/logo/takip-logo.png');?>">
                    </a>
                </li>
                <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fad fa-ellipsis-v"></i></a></li>
            </ul>
        </div>
        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
                </ul>
                <ul id="navbarUser" class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-language nav-item">
                        <a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php
                            echo match (lang('Text.lang')) {
                                "tr" => '<i class="flag-icon flag-icon-tr"></i><span class="selected-language"></span>',
                                default => '<i class="flag-icon flag-icon-gb"></i><span class="selected-language"></span>',
                            };
                            ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-flag">
                            <a class="close-device-position dropdown-item" href="<?=base_url('lang/en')?>" data-language="en"><i class="flag-icon flag-icon-gb"></i> <?=lang('Text.english')?></a>
                            <a class="close-device-position dropdown-item" href="<?=base_url('lang/tr')?>" data-language="tr"><i class="flag-icon flag-icon-tr"></i> <?=lang('Text.turkish')?></a>
                        </div>
                    </li>
                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"><span class="mr-1 user-name text-bold-700"><?=$account->name;?></span><span class="avatar avatar-online"><img src="<?=base_url('app-assets/images/portrait/small/default-avatar.png');?>" alt="avatar"><i></i></span></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="close-device-position dropdown-item" data-toggle="modal" data-target="#profileModal"><i class="fad fa-user"></i> <?=lang('Text.editProfile')?></a>
                            <div class="dropdown-divider"></div>
                            <a class="close-device-position dropdown-item" href="<?=base_url('logout')?>"><i class="fad fa-sign-out-alt"></i> <?=lang('Text.logout')?></a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- END: Header-->
