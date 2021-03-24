<nav class="navbar navbar-expand-md navbar-light navbar-fixed-top shadow-sm">
    <div class="container full-width">
        <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
            <img src="images/logodazo2.png" height="71px">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto link-area">
                <a href="#" class="nav-item nav-link">LEARN HOW TO RACE</a>
                <a href="javascript:void(0)" class="nav-item nav-link" onclick="$('.map-section').focus()">OTB LOCATOR</a>
                <a href="#" class="nav-item nav-link">LIVESTREAM</a>
                <a href="#" class="nav-item nav-link">BET</a>
                <a href="#" class="nav-item nav-link" onclick="$('.bottom-section').focus()">CONTACT US</a>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto btn-area">
                <!-- Authentication Links -->

                <li class="nav-item">
                    <a class="nav-link nav-login" data-toggle="modal" data-target="#signinModal" href="javascript:void(0)"><?php echo e(__('Log in')); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-register" data-toggle="modal" data-target="#registerModal" href="javascript:void(0)"><?php echo e(__('Sign Up')); ?></a>
                </li>
            </ul>
        </div>
    </div>
    <a class="hidden-btn terms-btn" data-toggle="modal" data-target="#termsModal" href="javascript:void(0)"></a>
    <a class="hidden-btn otp-btn" data-toggle="modal" data-target="#otpModal" href="javascript:void(0)">O</a>
    <a class="hidden-btn profile-btn" data-toggle="modal" data-target="#profileModal" href="javascript:void(0)">P</a>
    <a class="hidden-btn notification-btn" data-toggle="modal" data-target="#notiModal" href="javascript:void(0)">N</a>
</nav><?php /**PATH D:\xampp\htdocs\dazohb\resources\views/sections/default-header-section.blade.php ENDPATH**/ ?>