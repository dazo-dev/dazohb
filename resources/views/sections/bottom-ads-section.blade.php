<div class="bottom-ads-section">

@php

        $url = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';

    @endphp

	<div class="col-sm-12 display-flex display-block-mb">

		@foreach ($data['bottombanner'] as $result)

		{{-- <div class="col-lg-4 col-sm-12" style="text-align:center;"> --}}

			

			<a href="//{{$result->b_link}}" class="margin-x-auto" target=_blank><img src="{{$url}}uploads/banner-img/{{$result->b_img_path}}"></a>

			

		{{-- </div> --}}

		@endforeach

		

	</div>

</div>





