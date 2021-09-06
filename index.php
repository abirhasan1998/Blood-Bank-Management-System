<?php 
    session_start();

    ?>
<!DOCTYPE html>
<html>
<?php $title="Bloodbank | home page"; ?>
<?php require 'head.php'; ?>

<body>
    <?php require 'header.php'; ?>

    <div class="container cont">

        <?php require 'message.php'; ?>

        <div class="row justify-content-center">
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5 col-xs-6 mb-5" style="width: 60%">
                <div class="card">
                    <img src="image/bg.png" class="card-img-top">
                </div>
            </div>

            <div class="col-lg-9">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-5">
                        <div class="card">
                            <div class="card-header text-center">A+</div>
                            <div class="card-body">
                                People of A+ can give blood to A+ and AB+. They can receive blood from A+, A-, O+ and O-
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-5">
                        <div class="card">
                            <div class="card-header text-center">A-</div>
                            <div class="card-body">
                                People of A- can give blood to A-, A+, AB- and AB+. They can receive blood from A- and
                                O-.
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-5">
                        <div class="card">
                            <div class="card-header text-center">B+</div>
                            <div class="card-body">
                                People of B+ can give blood to A+ and AB+. They can receive blood from A+, A-, O+ and
                                O-.
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-5">
                        <div class="card">
                            <div class="card-header text-center">B-</div>
                            <div class="card-body">
                                People of B- can give blood to B-, B+, AB+ and AB-, They can receive blood from B- and
                                O-.They can give blood to B+ and AB+.
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-5">
                        <div class="card">
                            <div class="card-header text-center">AB+</div>
                            <div class="card-body">
                                People with AB+ blood can receive red blood cells from any blood type. This means that
                                demand for AB+ can donate with AB only.
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-5">
                        <div class="card">
                            <div class="card-header text-center">AB-</div>
                            <div class="card-body">
                                People of AB- can receive red blood cells from all negative blood types.
                                AB- can give red blood cells to both AB- and AB+ blood types.
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-5">
                        <div class="card">
                            <div class="card-header text-center">O+</div>
                            <div class="card-body">
                                People of O+ can donate to A+, B+, AB+ and O+ Blood
                                Group O can donate red blood cells to anybody. It's the universal donor.
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-5">
                        <div class="card">
                            <div class="card-header text-center">O-</div>
                            <div class="card-body">
                                People of O- can donate to A+, A-, B+, B-, AB+, AB-, O+ and O- Blood.
                                They can only receive red cell donations from O negative donors.
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-5">
                        <div class="card">
                            <div class="card-header text-center">Admin contact</div>
                            <div class="card-body">
                                <i class="fa fa-envelope"> </i> <a> bloodbank@gmail.com</a><br><br>
                                <i class="fa fa-mobile"> </i> <a> ++8801770770770</a><br><br>
                                <i class="fa fa-phone"> </i> <a> 9896768</a><br><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-6 rounded mb-5">

            </div>
            <div class="col-lg-6 rounded mb-5">
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-lg-12">
                <div class="card">

                </div>
            </div>
        </div>

        <?php require 'footer.php'; ?>

</body>

</html>