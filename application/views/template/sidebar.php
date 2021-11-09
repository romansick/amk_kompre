<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar="" class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <?php
                $role_id = $this->session->userdata('role_id');
                $queryMenu = "SELECT `user_menu`.`id`,`menu`
                            FROM `user_menu` JOIN `user_access_menu`
                              ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                            WHERE `user_access_menu`.`role_id` = $role_id
                            ORDER BY `user_access_menu`.`menu_id` ASC
                ";
                $menu = $this->db->query($queryMenu)->result_array();

                ?>

                <?php foreach ($menu as $m) : ?>
                    <li class="menu-title"><?= $m['menu']; ?></li>
                    <!-- Sub Menu sesuai Menu -->
                    <?php
                    $menuId = $m['id'];
                    $querySubMenu = "SELECT *
                                       FROM `user_sub_menu` JOIN `user_menu`
                                         ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                                      WHERE `user_sub_menu`.`menu_id` = $menuId
                                        AND `user_sub_menu`.`is_active` = 1  
                     ";
                    $subMenu = $this->db->query($querySubMenu)->result_array();
                    ?>
                    <?php foreach ($subMenu as $sm) : ?>
                        <li>
                            <?php if ($title == $sm['judul']) : ?>
                                <a href="<?= base_url($sm['url']); ?>">
                                <?php else : ?>
                                    <a href="<?= base_url($sm['url']); ?>">
                                    <?php endif; ?>
                                    <i class="<?= $sm['icon']; ?>"></i>
                                    <span><?= $sm['judul']; ?></span>
                                    </a>
                        </li>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->