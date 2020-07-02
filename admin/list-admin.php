<?php
include_once '../includes/functions/bd_conn.php';
include_once './includes/templates/header.php'; ?>
<?php if ($_SESSION['access'] == '0') {
    echo ("<script>location.href = 'index.php';</script>");
} ?>
<!-- side-bar -->
<?php include_once './includes/templates/siderbar.php'; ?>
<!-- end-side-bar -->
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">

                        <i class="pe-7s-users icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>Users
                        <div class="page-title-subheading">
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title"></h5>

                        <div class="col-md-12 text-center">
                            <div class="lds-ring">
                                <div></div>
                                <div></div>
                                <div>
                                </div>
                                <div></div>
                            </div>
                        </div>
                        <div class="card-body  ">
                            <table id="list_table" style=" display: none; " class="item-table  align-middle mb-0 table table-borderless table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th>User Name</th>
                                        <th>Name</th>
                                        <th>Last Name</th>
                                        <th>Location</th>
                                        <th>Access</th>
                                        <th>Image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    try {
                                        $sql = "SELECT * FROM admin ORDER BY name ASC";
                                        $result = $conn->query($sql);
                                    } catch (Exception $e) {
                                        //throw $th;
                                        $error = $e->getMessage();
                                        echo $error;
                                    } ?>


                                    <?php while ($user = $result->fetch_assoc()) { ?>



                                        <tr>
                                            <td class="">
                                                <a href="#" data-id="<?php echo $user['id_admin'] ?>" data-type="admin" data-img="<?php echo $user['img'] ?>" class="badge badge-pill badge-danger options delete p-2 mb-1 d-block">
                                                    Delete &nbsp; <i class="fa fa-trash"></i>
                                                </a>
                                                <a href="edit-admin.php?id=<?php echo $user['id_admin']; ?>" class="badge badge-pill badge-success options p-2 mb-1 d-block">
                                                    Update &nbsp; <i class="far fa-edit"></i>
                                                </a>

                                            </td>
                                            <td><b><?php echo $user['user_name'] ?></b></td>
                                            <td><?php echo $user['name']; ?></td>
                                            <td><?php echo $user['last_name']; ?></td>
                                            <?php
                                            $location = $user['id_location'];
                                            if ($location < '5') {

                                                $s = "SELECT * FROM location WHERE id = $location";
                                                $res = $conn->query($s);
                                                $loc = $res->fetch_assoc();
                                            }
                                            ?>
                                            <td><?php $l = ($location == '5') ? 'All' : $loc['name'];
                                                echo $l ?></td>
                                            <td><?php $access = ($user['access'] == 1) ? 'Admin' : 'Manager';
                                                echo $access ?></td>
                                            <?php if ($user['img'] == '' || $user['img'] == null) { ?>
                                                <td><img class="rounded" src="./assets/images/avatars/user.png" alt="Img for <?php echo $user['user_name']; ?>" width="150px"></td>
                                            <?php } else { ?>
                                                <td><img class="rounded" src="./assets/images/avatars/<?php echo $user['img']; ?>" alt="Img for <?php echo $user['user_name']; ?>" width="150px"></td>

                                        <?php }
                                        }
                                        ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Action</th>
                                        <th>User Name</th>
                                        <th>Name</th>
                                        <th>Last Name</th>
                                        <th>Location</th>
                                        <th>Access</th>
                                        <th>Image</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once './includes/templates/footer.php' ?>