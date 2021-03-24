<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <script src="<?php echo e(asset('/js/calendar.js')); ?>"></script>

    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <style type="text/css">
        

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #000000;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  font-size: 15px;
}
.dropdown-content a:hover {background-color: #E6581F;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {}

#tblMyTrans tbody tr:nth-child(odd) {background-color: #454545;}
    </style>


</head>
<body>
    <div class="overlay-main" style="background-color: #000000de;height: 100vh;width: 100%;z-index: 1000000;position: fixed;top: 0;display: none">
        <img src="https://www.animatedimages.org/data/media/217/animated-horse-image-0291.gif" style="width: 10%;position: fixed;top: 50%;left: 41%;opacity: 1;display: none" https:="" www.animatedimages.org="" data="" media="">
    </div>
    <div id="app">
        
        <nav class="navbar navbar-expand-md navbar-light navbar-fixed-top shadow-sm">
            <div class="container full-width">
                <a class="navbar-brand" href="<?php echo e(url('/home')); ?>">
                    

                    <img src="<?php echo e(url('/')); ?>/images/logodazo2.png">
                    
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto link-area">
                        <a href="#" class="nav-item nav-link">LEARN HOW TO RACE</a>
                        <a href="<?php echo e(url('/otb')); ?>" class="nav-item nav-link" onclick="$('.map-section').focus()">OTB LOCATOR</a>
                        <a href="#" class="nav-item nav-link">LIVESTREAM</a>
                        <a href="#" class="nav-item nav-link">BET</a>
                        <a href="<?php echo e(url('/home')); ?>" class="nav-item nav-link">RACES</a>
                        <li></li>
                        <li class="dropdown">
                        <a id="_selpage-selected" href="#" class="nav-item nav-link dropbtn">
                           
                           <?php if(Route::current()->getName() == 'horses'): ?> HORSES
                           <?php elseif(Route::current()->getName() == 'jockey'): ?> JOCKEYS
                           <?php elseif(Route::current()->getName() == 'trainer'): ?> TRAINERS
                           <?php elseif(Route::current()->getName() == 'owner'): ?> OWNERS
                           <?php else: ?> HORSES
                           <?php endif; ?>
                           <span class="fa fa-angle-down"></span>
                           </a>
                           
                         <div class="dropdown-content">
                           <a id='_selpage' href="<?php echo e(route('horses')); ?>">HORSES</a>
                           <a id='_selpage' href="<?php echo e(route('trainer')); ?>">TRAINERS</a>
                           <a id='_selpage' href="<?php echo e(route('owner')); ?>">OWNERS</a>
                           <a id='_selpage' href="<?php echo e(route('jockey')); ?>">JOCKEYS</a>
                         </div>
                        </li>
                        <a  href="<?php echo e(route('forum')); ?>" class="nav-item nav-link">FORUM</a>
                        <a href="javascript:void(0)" class="nav-item nav-link" onclick="$('.bottom-section').focus()">CONTACT US</a>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto profile">
                        <!-- Authentication Links -->

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fas fa-user-alt"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="background-color: #000;">
                                <a class="dropdown-item active-user-current" target-active-id="<?php echo e(Auth::user()->id); ?>" href="javascript:void(0)">Hi! <?php echo e(Auth::user()->name); ?>

                                    <br>
                                    <p class="subscription-level" target-sub="<?php echo e(Auth::user()->is_subscribed); ?>"><?php echo e((Auth::user()->is_subscribed == 1) ?  Auth::user()->subscription_type : 'No Subscription'); ?></p>
                                </a>
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <img src="<?php echo e(url('/')); ?>/images/DazoCoin-png.png" width="40px" style="float: left; margin-right: 15px;">
                                    <div>
                                        <div class="col-sm-6">
                                           <p style="margin: 0">Dazo Coin</p>
                                            <h4 style="font-size: 14px"><?php echo e((Auth::user()->coins == "") ? 0 : Auth::user()->coins); ?></h4> 
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="<?php echo e(route('profile')); ?>" style="border-top: 1px solid gray;">
                                    My Account
                                </a>
                                <a class="dropdown-item" href="javascript:void(0)" data-toggle="modal" data-target="#referModal">
                                    Invite Friends
                                </a>
                                <a class="dropdown-item" href="javascript:void(0)" style="border-bottom: 1px solid gray;">
                                    Settings
                                </a>
                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    <?php echo e(__('Logout')); ?>

                                </a>

                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4" style="padding-bottom: 0 !important">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>

    

    

   
    
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script type="text/javascript">
        $('.overlay-main').show();
        $( document ).ready( function() {

            $('#current-season').DataTable( {
                "columnDefs": [
                    {
                        "targets": [ 15 ],
                        "visible": false
                    }
                ],
                "bPaginate": false,
                "bLengthChange": false,
                "bFilter": false,
                "bInfo": false,
            } );

            $('#prev-season').DataTable( {
                "columnDefs": [
                    {
                        "targets": [ 15 ],
                        "visible": false
                    }
                ],
                "bPaginate": false,
                "bLengthChange": false,
                "bFilter": false,
                "bInfo": false,
            } );

            $('#tblMyTrans').DataTable({
                "bInfo":false,
                "lengthChange":false,
                "scrollX":true,
                "sPaginationType": "full_numbers",
                "language": {
                    "paginate": {
                   "previous": "<",
                   "first": "<<",
                   "next": ">",
                   "last": ">>",
                 },
                },
            });

            var oTable = $('#jockeyTable').DataTable({
                 "dom": '<"top"i>rt<"bottom"flp><"clear">',
                    "lengthChange": false,
                    "bFilter": true,
                    "pagingType": "full_numbers",
                    "language": {
                     "paginate": {
                       "previous": "<",
                       "first": "<<",
                       "next": ">",
                       "last": ">>",
                     },
                     "info": "SHOWING _END_ OF _TOTAL_ JOCKEYS",
                 },
                 "pageLength": 25
                });

            var ownerTable = $('#ownerTable').DataTable({
                 "dom": '<"top"i>rt<"bottom"flp><"clear">',
                    "lengthChange": false,
                    "bFilter": true,
                    "pagingType": "full_numbers",
                    "language": {
                     "paginate": {
                       "previous": "<",
                       "first": "<<",
                       "next": ">",
                       "last": ">>",
                     },
                     "info": "SHOWING _END_ OF _TOTAL_ OWNER",
                 },
                 "pageLength": 25
                });

            var hTable = $('#horseTable').DataTable({
                 "dom": '<"top"i>rt<"bottom"flp><"clear">',
                    "lengthChange": false,
                    "bFilter": true,
                    "pagingType": "full_numbers",
                    "language": {
                     "paginate": {
                       "previous": "<",
                       "first": "<<",
                       "next": ">",
                       "last": ">>",
                     },
                     "info": "SHOWING _END_ OF _TOTAL_ HORSES",
                 },
                 "pageLength": 25
                });

            var tTable = $('#trainerTable').DataTable({
             "dom": '<"top"i>rt<"bottom"flp><"clear">',
                "lengthChange": false,
                "bFilter": true,
                "pagingType": "full_numbers",
                "language": {
                 "paginate": {
                   "previous": "<",
                   "first": "<<",
                   "next": ">",
                   "last": ">>",
                 },
                 "info": "SHOWING _END_ OF _TOTAL_ HORSES",
             },
             "pageLength": 25
            });

            $('#tblhorserecord').DataTable({
             "dom": '<"top"i>rt<"bottom"flp><"clear">',
                "lengthChange": false,
                "bFilter": true,
                "pagingType": "full_numbers",
                "language": {
                 "paginate": {
                   "previous": "<",
                   "first": "<<",
                   "next": ">",
                   "last": ">>",
                 },
                 "info": "SHOWING _END_ OF _TOTAL_ HORSES",
             },
             "pageLength": 25
            });

            $('#tbljockeyrace').DataTable({
             "dom": '<"top"i>rt<"bottom"flp><"clear">',
                "lengthChange": false,
                "bFilter": true,
                "pagingType": "full_numbers",
                "language": {
                 "paginate": {
                   "previous": "<",
                   "first": "<<",
                   "next": ">",
                   "last": ">>",
                 },
                 "info": "SHOWING _END_ OF _TOTAL_ HORSES",
             },
             "pageLength": 25
            });

            $('#tblownerhorse').DataTable({
             "dom": '<"top"i>rt<"bottom"flp><"clear">',
                "lengthChange": false,
                "bFilter": true,
                "pagingType": "full_numbers",
                "language": {
                 "paginate": {
                   "previous": "<",
                   "first": "<<",
                   "next": ">",
                   "last": ">>",
                 },
                 "info": "SHOWING _END_ OF _TOTAL_ HORSES",
             },
             "pageLength": 25
            });

            $('.filter-jockey').on('change', function(event) {
             event.preventDefault();
             /* Act on the event */

             switch($(this).val()) {
               case 'total-rides-desc':
                 oTable.order([[6, 'desc']]).draw();
                    
                 break;
               case 'total-rides-asc':
                 oTable.order([[6, 'asc']]).draw();
                    
                 break;
               case 'total-win-desc':
                 oTable.order([[1, 'desc']]).draw();
                    
                 break;
               case 'total-win-asc':
                 oTable.order([[1, 'asc']]).draw();
                   
                 break;
               case 'total-stake-desc':
                 oTable.order([[7, 'desc']]).draw();
                    
                 break;
               case 'total-stake-asc':
                 oTable.order([[7, 'asc']]).draw();
                   
                 break;
                }
            });


            $('.trainer-btn').on('click', function(event) {
                event.preventDefault();
                /* Act on the event */
                
                var abc = $('.trainer_search').val();

                trainerTable.search( abc ).draw();
            });

            $('.owner-btn').on('click', function(event) {
                event.preventDefault();
                /* Act on the event */
                
                var abc = $('.owner_search').val();

                ownerTable.search( abc ).draw();
            });

            $('.jockey-btn').on('click', function(event) {
                event.preventDefault();
                /* Act on the event */
                
                var abc = $('.jockey_search').val();

                oTable.search( abc ).draw();
            });

            $('.horse-btn').on('click', function(event) {
                event.preventDefault();
                /* Act on the event */
                var abc = $('.horse_name').val();

                hTable.search( abc ).draw();
            });


            $('.filter-horses').on('change', function(event) {
             event.preventDefault();
             /* Act on the event */

             switch($(this).val()) {
               case 'name-asc':
                 hTable.order([[0, 'asc']]).draw();
                    
                 break;
               case 'name-desc':
                 hTable.order([[0, 'desc']]).draw();
                    
                 break;
               case 'weight-asc':
                 hTable.order([[3, 'asc']]).draw();
                    
                 break;
               case 'weight-desc':
                 hTable.order([[3, 'desc']]).draw();
                   
                 break;
               case 'time-desc':
                 hTable.order([[8, 'asc']]).draw();
                    
                 break;
               case 'time-asc':
                 hTable.order([[8, 'desc']]).draw();
                   
                 break;
                }
            });
        });

        $(window).on('load', function() {
            //when html page complete loaded
            $('.overlay-main').hide();
        });
    </script>

</body>
</html>
<?php /**PATH D:\xampp\htdocs\dazohb\resources\views/layouts/app.blade.php ENDPATH**/ ?>