<div id="carouselExampleIndicators" class="carousel slide p-0" data-ride="carousel">

@php

        $url = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';

    @endphp

  <div class="carousel-inner">

   

 

    {{--@foreach ($data['topbanner'] as $result)

    <div class="carousel-item active">

      <a href="{{$result->b_link}}"><img class="d-block w-100" src="//localhost/dazoAdmin/public/uploads/banner-img/{{$result->b_img_path}}" alt="First slide" style="height: 300px"></a>

    </div>

    

    @endforeach --}}



    @for ($i = 0; count($data['topbanner']) > $i; $i++)

      @if ($i == 0) 

      <div class="carousel-item active">

      @else

      <div class="carousel-item">

      @endif

    

      <a href="//{{$data['topbanner'][$i]->b_link}}" target="_blank"><img class="d-block w-100" src="{{$url}}dazohb2/public/uploads/banner-img/{{$data['topbanner'][$i]->b_img_path}}" alt="First slide" style="height: 300px !important;"></a>

    </div>

    @endfor

    

    

  </div>

  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">

    <span class="carousel-control-prev-icon" aria-hidden="true"></span>

    <span class="sr-only">Previous</span>

  </a>

  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">

    <span class="carousel-control-next-icon" aria-hidden="true"></span>

    <span class="sr-only">Next</span>

  </a>

</div>