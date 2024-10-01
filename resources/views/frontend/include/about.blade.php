{{-- <!-- about --> --}}
<section class="container-fluid container-fluid-background about gapbetweensection">
  <div class="container d-flex flex-column justify-content-center align-items-center">
    <div class="row">
      @foreach ($aboutuss as $aboutus)
     
      <div class="col-md-6 d-flex">
  <div class="image col-md-6 first">
    @php
      $images = json_decode($aboutus->image, true);
    @endphp

    @if (!empty($images) && isset($images[0]))
      <img src="{{ asset('storage/aboutus/' . basename($images[0])) }}" alt="aboutus">
    @else
      <p>No image available</p>
    @endif
  </div>

  <div class="image col-md-6 my-2 mx-1 second">
    @php
      $images = json_decode($aboutus->image, true);
    @endphp

    @if (!empty($images) && isset($images[1]))
      <img src="{{ asset('storage/aboutus/' . basename($images[1])) }}" alt="aboutus">
    @else
      <p>No image available</p>
    @endif
  </div>
</div>

    @endforeach
<<<<<<< HEAD
      <div class="col-md-5 mx-md-4 ">
=======
      <div class="col-md-5 mx-md-4">
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
        <div class="title">
          <div class="xs-text dashline">Trusted Real estate Care</div>
          <div class="lg-text1">Dream living Spaces Setting New Build</div>
        </div>
        @foreach ($aboutuss as $aboutus)
      <p class="sm-text1">{{$aboutus->description}}</p>
      <div class="d-flex">
        <i class="fa-solid fa-hand-point-right customicons mx-2"></i>
        <p class="sm-text1">{{$aboutus->description}}</p>
      </div>
      <div class="d-flex">
        <i class="fa-solid fa-hand-point-right customicons mx-2"></i>
        <p class="sm-text1">{{$aboutus->description}}</p>
      </div>
    @endforeach
      </div>
    </div>
  </div>
</section>