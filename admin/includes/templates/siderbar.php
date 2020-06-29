<div class="app-sidebar sidebar-shadow bg-dark sidebar-text-light">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Dashboard</li>
                <li>
                    <a href="index.php" class="mm-active">
                        <i class="metismenu-icon pe-7s-config pe-spin"></i> Dashboard
                    </a>
                </li>
                <li class="app-sidebar__heading">Content</li>
                <div tabindex="-1" class="dropdown-divider"></div>

                <li class="">
                    <a href="#" aria-expanded="false">
                        <i class="metismenu-icon pe-7s-help2"></i>
                        Plates
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul class="mm-collapse" style="height: 7.04px;">
                        <li>
                            <a href="create-plate.php">
                                Create
                            </a>
                        </li>

                        <li>
                            <a href="list-plate.php">
                                List
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="">
                    <a href="#" aria-expanded="false">
                        <i class="metismenu-icon pe-7s-ticket"></i>
                        Categories
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul class="mm-collapse" style="height: 7.04px;">
                        <li>
                            <a href="create-categorie.php">Create</a>
                        </li>

                        <li>
                            <a href="list-categorie.php">List</a>
                        </li>


                    </ul>
                </li>

                <?php if ($_SESSION['access'] == '1') : ?>

                    <li class="">
                        <a href="#" aria-expanded="false">
                            <i class="metismenu-icon pe-7s-users"></i>
                            Admins
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        <ul class="mm-collapse" style="height: 7.04px;">
                            <li>
                                <a href="create-admin.php">Create</a>
                            </li>

                            <li>
                                <a href="list-admin.php">List</a>
                            </li>

                        </ul>
                    </li>
                <?php endif; ?>

                <li class="">
                    <a href="#" aria-expanded="false">
                        <i class="metismenu-icon pe-7s-note2"></i>
                        Menu
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul class="mm-collapse" style="height: 7.04px;">
                        <li>
                            <a href="create-menu.php">Add</a>
                        </li>

                        <li>
                            <a href="list-menu.php">List</a>
                        </li>
                    </ul>
                </li>

                <li class="">
                    <a href="#" aria-expanded="false">
                        <i class="metismenu-icon pe-7s-notebook"></i>
                        Reservations
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul class="mm-collapse" style="height: 7.04px;">
                        <li>
                            <a href="create-admin.php">Create</a>
                        </li>

                        <li>
                            <a href="list-admin.php">List</a>
                        </li>


                    </ul>
                </li>

            </ul>
        </div>
    </div>
</div>