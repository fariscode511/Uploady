<?php
include_once '../session.php';
include_once 'logic/addLogic.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once '../components/meta.php'; ?>
    <title>Dashboard - <?= $st['website_name'] ?></title>
    <?php include_once '../components/css.php'; ?>
</head>

<body class="sb-nav-fixed">
    <?php include_once '../components/navbar.php' ?>
    <div id="layoutSidenav">
        <?php include_once '../components/sidebar.php'; ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-user-plus mr-1"></i>
                            Create User
                        </div>
                        <div class="card-body">
                            <form method="POST">
                                <?php if (isset($msg)) : ?>

                                    <?php if ($msg == "yes") : ?>

                                        <?php echo $utils->alert(
                                            "Account has been created",
                                            "success",
                                            "check-circle"
                                        ); ?>

                                    <?php elseif ($msg == "csrf") : ?>

                                        <?php echo $utils->alert(
                                            "CSRF token is invalid.",
                                            "danger",
                                            "times-circle"
                                        ); ?>

                                    <?php elseif ($msg == "error") : ?>

                                        <?php echo $utils->alert(
                                            "An unexpected error has occurred",
                                            "danger",
                                            "times-circle"
                                        ); ?>

                                    <?php endif; ?>

                                <?php endif; ?>
                                <?= $utils->input('csrf', $_SESSION['csrf']); ?>

                                <div class="form-group">
                                    <input type="text" class="form-control" name="username" placeholder="Enter Username" value="">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Enter Email" value="">
                                </div>
                                <div class="form-group" class="text-left">
                                    <input type="password" class="form-control" name="password" placeholder="Enter Password">
                                </div>
                                <?= $utils->input('user_id', $user_id); ?>
                                <div class="form-group">
                                    <input hidden name="is_admin" value="0" />
                                    <div class="custom-control custom-switch custom-control-right">
                                        <input class="custom-control-input" id="is_admin" name="is_admin" value="1" type="checkbox">
                                        <label class="custom-control-label" for="is_admin">Admin</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input hidden name="is_active" value="0" />
                                    <div class="custom-control custom-switch custom-control-right">
                                        <input class="custom-control-input" id="is_active" name="is_active" value="1" type="checkbox">
                                        <label class="custom-control-label" for="is_active">Active</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    Create Account
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
            <?php include_once '../components/footer.php'; ?>
        </div>
    </div>
    <?php include_once '../components/js.php'; ?>
</body>

</html>