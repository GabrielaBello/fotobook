<!DOCTYPE html>
<html lang="en"> <!--begin::Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>AdminLTE v4 | Dashboard</title><!--begin::Primary Meta Tags-->
    <?= $this->include("componentes/head");    ?>
</head> <!--end::Head--> <!--begin::Body-->

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary"> <!--begin::App Wrapper-->
    <div class="app-wrapper">  <!--begin::Sidebar-->
        <?= $this->include("componentes/header");   ?>
         <!--end::Sidebar--> 
        <?= $this->include("componentes/aside");   ?>
         <!--begin::App Main-->

        <main class="app-main"> <!--begin::App Content Header-->
            <div class="app-content-header"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0"><?= $this->renderSection('titulo') ?></h3>
                        </div>
                        <div class="col-sm-6">
                           
                        </div>
                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content Header--> <!--begin::App Content-->
            <div class="app-content"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->

                    <?= $this->renderSection('content') ?>

                </div> <!--end::Container-->
            </div> <!--end::App Content-->
        </main> <!--end::App Main--> <!--begin::Footer-->

    <?= $this->include("componentes/footer");?>

</body><!--end::Body-->

</html>