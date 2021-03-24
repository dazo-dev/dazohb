<div class="map-section" tabindex="1" style="outline-width: 0;">
	<div class="col-sm-12 display-flex display-block-mb p-0">
		<div class="col-lg-5 col-sm-12 left-block" id="mapselection">
			<div class="row block-layer">
				<div class="header"><p>Off-Track Betting Locator</p></div>
			</div>
			<div class="row block-layer">
				<select id="_province" class="form-control">
					<option value="0">Select Province</option>

					<?php $__currentLoopData = $data['mapProvince']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<option><?php echo e($r->province); ?></option>

					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					
				</select>
			</div>
			<div class="row block-layer">
				<select id="_city" class="form-control">
					 <option value="0">Select City</option>
					 
				</select>
			</div>
			
			<div class="row block-layer-result">
				<div class="result-title">Result</div>
			</div>

			<br>

			<div id="mapAddress">

				
			</div>
		</div>
		<div class="col-lg-7 col-sm-12 right-block p-0">
			<div id="map">
				<!-- <iframe id="map" src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d30911.5440843132!2d120.9750187637099!3d14.430447854289703!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1slas%20pinas%20camella%20easy!5e0!3m2!1sen!2sph!4v1604361556481!5m2!1sen!2sph"
	    width="100%"
	    height="405"
	    frameborder="0"
	    style="border:0;"
	    allowfullscreen=""
	    aria-hidden="false"
	    tabindex="0">
	  		</iframe> -->
			</div>
			
		</div>
	</div>
</div>


<script>
        function defaultmap(locations) {
	
           
    
    
    var map = new google.maps.Map(document.getElementById('map'), {
        center: new google.maps.LatLng(14.59129129555957, 120.99777720547598),
        // { lat: 13.79242948856351, lng: 121.06090833693067 },
        zoom: 11,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });
    var infowindow = new google.maps.InfoWindow();


	}
</script>

<script async defer
      src="https://maps.googleapis.com/maps/api/js?key=<?php echo e(env('GOOGLE_MAP_KEY')); ?>w&callback=defaultmap"
      
    ></script>




	

<?php /**PATH D:\xampp\htdocs\dazohb\resources\views/sections/map-track-section.blade.php ENDPATH**/ ?>