<section class="container-fluid">
  <div class="row">
    <div class="col-md-9 p-0 m-0">
      <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner mb-2">
          <!-- Carousel Items -->
          @foreach ($properties as $index => $property)
            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
            <div class="row d-flex">
              <div class="col-md-12 text-center d-flex flex-column justify-content-center align-items-center mb-2">

              @php
        $mainImages = !empty($property->main_image) ? json_decode($property->main_image, true) : [];
        $mainImage = !empty($mainImages) ? asset('' . $mainImages[0]) : asset('images/default-placeholder.png');
         @endphp
              <img src="{{ $mainImage }}" alt="Property Image" class="imagecontroller">
              <div class="flex bannercontent">
                <div class="bannercontentinner">
                <p class="sm-text1 mb-3 text-center forhidden">
                  More than <span class="highlight">1000+</span> houses available for sale & rent in the country
                </p>
                <h4 class="lg-text1 mb-4">{{$property->title}}</h4>
                <!-- <div class="d-flex justify-content-center mb-1">
              <div class="btn-buttonyellow btn-buttonyellowsmall">Buy</div>
              <div class="btn-buttongreen mx-2">Rent</div>
              </div> -->
<<<<<<< HEAD
                <form action="{{ route('frontend.search') }}" method="GET">
=======
                <form action="{{ route('frontend.searching') }}" method="GET">
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
                  <div
                  class="formsection flex-column justify-content-center align-items-center py-md-3 py-2 gap-2 col-md-10 px-4 mx-md-4">
                  <div class="d-flex flex-wrap gap-md-3 showform">

<<<<<<< HEAD
                    <!-- Listing Type - Categories -->
                    <div class="d-flex flex-column col-md-3">
                    <label class="sm-text1 des-text">Listing type</label>
                    <select class="input bannerinput" name="list_type" id="category_id">
                      <option value="">Select Category</option>
                      @foreach($categories as $category)
=======

                    <select type="text" class="input bannerinput" name="region" placeholder="Regions"
                    value="{{ request('region') }}">
                    <option value="" disabled selected>Select Category</option>
                    @foreach($categories as $category)
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
              <option value="{{ $category->id }}" {{ request('list_type') == $category->id ? 'selected' : '' }}>
              {{ $category->title }}
              </option>
            @endforeach
                    </select>
<<<<<<< HEAD
                    </div>

                    <!-- Properties Type - Subcategories -->
                    <div class="d-flex flex-column col-md-3">
                    <label class="sm-text1 des-text">Properties type</label>
                    <select class="input bannerinput" name="property_type" id="subcategory_id">
                      <option value="">Select Sub-Category</option>
                      @foreach($subcategories as $subcategory)
=======


                    
                    <select type="text" class="input bannerinput" name="region" placeholder="Regions"
                    value="{{ request('region') }}">
                    <option value="" disabled selected>Select subCategory</option>
                    @foreach($subcategories as $subcategory)
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
              <option value="{{ $subcategory->id }}" data-category-id="{{ $subcategory->category_id }}"
              {{ request('property_type') == $subcategory->id ? 'selected' : '' }}>
              {{ $subcategory->title }}
              </option>
<<<<<<< HEAD
            @endforeach
                    </select>
                    </div>

                    <!-- States Selection -->
                    <div class="d-flex flex-column col-md-3">
                    <label class="sm-text1 des-text">States</label>
                    <select class="input bannerinput" name="state">
                      <option value="">Select State</option>
=======
            @endforeach</option>
                    </select>
                    <select type="text" class="input bannerinput" name="region" placeholder="Regions"
                    value="{{ request('region') }}">
                    <option value="1">States</option>
                    
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
                      @foreach($properties as $property)
              @if(!empty($property->state))
          <option value="{{ $property->state }}" {{ request('state') == $property->state ? 'selected' : '' }}>
          {{ $property->state }}
          </option>
        @endif
            @endforeach
                    </select>
<<<<<<< HEAD
                    </div>
=======


>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e

                    <!-- Regions Placeholder -->
                    <select type="text" class="input bannerinput" name="region" placeholder="Regions"
                    value="{{ request('region') }}">
                    <option value="1">regions</option>
                    <option value="2">Region 1</option>
                    <option value="3">Region 2</option>
                    </select>

                    <input type="text" class="input bannerinput" name="location" placeholder="Keyword"
                    value="{{ request('location') }}">
<<<<<<< HEAD
                    <span class="sm-text advance rounded onclick" onclick="funOpenadvance()">Advance</span>
=======
                    <span class="sm-text mt-2 greenhighlight advance" onclick="funOpenadvance()">Advanced ::</span>
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
                    <button type="submit" class="btn-buttongreen">Search</button>
                  </div>
                  </div>
                </form>

<<<<<<< HEAD
                <script>
                  document.addEventListener('DOMContentLoaded', function () {
                  const categorySelect = document.getElementById('category_id');
                  const subCategorySelect = document.getElementById('subcategory_id');

                  function filterSubcategories() {
                    const selectedCategoryId = categorySelect.value;
                    const subCategories = subCategorySelect.querySelectorAll('option');

                    subCategories.forEach(option => {
                    if (!option.value) return; // Skip the "Select Sub-Category" option
                    option.style.display = option.dataset.categoryId === selectedCategoryId || selectedCategoryId === '' ? 'block' : 'none';
                    });

                    // Reset subcategory selection when category changes
                    subCategorySelect.value = '';
                  }

                  // Initial filter when the page loads
                  filterSubcategories();

                  // Update subcategories when the category is changed
                  categorySelect.addEventListener('change', filterSubcategories);
                  });
                </script>
=======
             
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
                </div>
              </div>
              </div>
            </div>
            </div>
      @endforeach
        </div>
      </div>
    </div>



    <div class="col-md-3">
      <div class="row">
        <div class="col-md-12 p-0 ">
          @foreach ($properties as $property)
            <a href="{{route('singleproperties', ['id' => $property->id])}}">
            <div class="property-container mx-2 subbanner-hidden ">
              @php
        $mainImages = !empty($property->main_image) ? json_decode($property->main_image, true) : [];
        $mainImage = !empty($mainImages) ? asset('' . $mainImages[0]) : asset('images/default-placeholder.png');
         @endphp
              <img src="{{ $mainImage }}" alt="Property Image" class="property-image  property-imageheightbanner">
<<<<<<< HEAD
              <div class="property-details">
              <div class="md-text1">
                {{ strlen($property->title) > 32 ? substr($property->title, 0, 32) . "..." : $property->title}}
=======
              <div class="property-details property-detailsbanner px-1">
              <div class="md-text1">
                {{ strlen($property->title) >28 ? substr($property->title, 0, 28) . "..." : $property->title}}
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
              </div>
              <div class="sm-text highlight text-center p-0 m-0">eedddde</div>
              <div class="d-flex justify-content-between gap-3 p-0 mx-4">
                <p class="detail-item sm-text1">
                <span class="sm-text1">13</span><br />
                <i class="fa-solid fa-bed detail-icon"></i>
                </p>
                <p class="detail-item sm-text1">
                <span class="detail-number">02</span><br />
                <i class="fa-solid fa-bath detail-icon"></i>
                </p>
                <p class="detail-item sm-text1">
                <span class="sm-text1">13</span><br />
                <i class="fa-solid fa-bed detail-icon"></i>
                </p>
              </div>
              <p class="extra-small-text1 px-2">
                {{ strlen($property->description) > 150 ? substr($property->description, 0, 150) . "..." : $property->description}}
              </p>
              </div>
            </div>
            </a>
      @endforeach
        </div>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </a>
</section>

<<<<<<< HEAD
<style>
  .amenities {
    background-color: blanchedalmond;
    border-radius: 8px;
    display: none;
  }

  .nameofthing {
    padding-left: 8px;

  }
</style>

<section class="container rounded  amenities ">
  <div class="row   gap-1 p-3" id="advanceitems">
=======

<section class="container rounded  amenities ">
  <div class="row  p-3" id="advanceitems">
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
    <div class="d-flex col-md-2 pt-3">
      <input type="checkbox" name="Aircondition" id="">
      <span class="nameofthing">Air Conditioning</span>
    </div>
    <div class="d-flex col-md-2 pt-3">
      <input type="checkbox" name="Aircondition" id="">
      <span class="nameofthing">Laundry</span>
    </div>
    <div class="d-flex col-md-2 pt-3">
      <input type="checkbox" name="Aircondition" id="">
      <span class="nameofthing">Dishwasher</span>
    </div>
    <div class="d-flex col-md-2 pt-3">
      <input type="checkbox" name="Aircondition" id="">
      <span class="nameofthing">Garage</span>
    </div>
    <div class="d-flex col-md-2 pt-3">
      <input type="checkbox" name="Aircondition" id="">
      <span class="nameofthing">Gym</span>
    </div>
    <div class="d-flex col-md-2 pt-3">
      <input type="checkbox" name="Aircondition" id="">
      <span class="nameofthing">Refrigerator</span>
    </div>
    <div class="d-flex col-md-2 pt-3">
      <input type="checkbox" name="Aircondition" id="">
      <span class="nameofthing">Swimming Pool</span>
    </div>
    <div class="d-flex col-md-2 pt-3">
      <input type="checkbox" name="Aircondition" id="">
      <span class="nameofthing">Washer</span>
    </div>
    <div class="d-flex col-md-2 pt-3">
      <input type="checkbox" name="Aircondition" id="">
      <span class="nameofthing">Balcony</span>
    </div>
    <div class="d-flex col-md-2 pt-3">
      <input type="checkbox" name="Aircondition" id="">
      <span class="nameofthing">Barbeque</span>
    </div>
    <div class="d-flex col-md-2 pt-3">
      <input type="checkbox" name="Aircondition" id="">
      <span class="nameofthing">Floorboard</span>
    </div>
    <div class="d-flex col-md-2 pt-3">
      <input type="checkbox" name="Aircondition" id="">
      <span class="nameofthing">Floorboard</span>
    </div>
    <div class="d-flex col-md-2 pt-3">
      <input type="checkbox" name="Aircondition" id="">
      <span class="nameofthing">Floorboard</span>
    </div>
    <div class="d-flex col-md-2 pt-3">
      <input type="checkbox" name="Aircondition" id="">
      <span class="nameofthing">Floorboard</span>
    </div>
    <div class="d-flex col-md-2 pt-3">
      <input type="checkbox" name="Aircondition" id="">
      <span class="nameofthing">Floorboard</span>
    </div>




  </div>
  </div>
</section>

<script>
  function funOpenadvance() {
    const advanceItems = document.querySelector(".amenities");

    // Check if the advanceItems element is found
    if (!advanceItems) {
      console.error("Element with class 'amenities' not found.");
      return;
    }

    // Check if the display style is set to 'none' and toggle it
    if (advanceItems.style.display === "none") {
      advanceItems.style.display = "block";
    } else {
      advanceItems.style.display = "none";
    }
  }
</script>









<<<<<<< HEAD

=======
{{--
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e

<section class="container-fluid py-4 propertiesfinder propertiesfinderhome">
  <div class="container">
    <h1 class="lg-text1 text-center searchhide" onclick="funsearchingon()">
      <i class="fa-brands fa-searchengin customicons"></i> Find your properties
    </h1>
<<<<<<< HEAD
    <form action="{{ route('frontend.search') }}" method="GET">
=======
    <form action="{{ route('frontend.searching') }}" method="GET">
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
      <div class="justify-content-center align-items-center gap-1 flex-wrap hiddenform hiddenformhome" id="hiddenform">
        <div class="d-flex flex-column col-md-3">
          <label class="sm-text1 des-text">Listing type</label>
          <input type="text" class="input bannerinput" name="list_type" value="{{ request('list_type') }}">
        </div>
        <div class="d-flex flex-column col-md-3">
          <label class="sm-text1 des-text">Properties type</label>
          <input type="text" class="input bannerinput" name="property_type" value="{{ request('property_type') }}">
        </div>
        <div class="d-flex flex-column col-md-3">
          <label class="sm-text1 des-text">Location</label>
          <input type="text" class="input bannerinput" name="location" value="{{ request('location') }}">
        </div>
        <div class="d-flex flex-column col-md-3">
          <label class="md-text1 des-text">Price</label>
          <input type="number" class="input bannerinput" name="min_price" placeholder="Min Price"
            value="{{ request('min_price') }}">
          <input type="number" class="input bannerinput" name="max_price" placeholder="Max Price"
            value="{{ request('max_price') }}">
        </div>
        <div class="d-flex flex-column col-md-3">
          <label class="sm-text1 des-text">Search</label>
          <button class="btn-buttonyellow btn-buttonyellowlg">Find properties</button>
        </div>

      </div>
    </form>
  </div>
</section>
<<<<<<< HEAD
=======
--}}
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e


<script>
  document.addEventListener('DOMContentLoaded', function () {
    const items = document.querySelectorAll('.subbanner-hidden');
    const animationDuration = 4000; // Duration of the entire animation cycle
    const initialDisplayDuration = 1000; // Duration to show initial items

    let currentIndex = 0;

    function showNextItems() {
      // Hide all items
      items.forEach(item => {
        item.classList.remove('visible-item');
        item.classList.add('subbanner-hidden');
      });

      // Calculate the indices for the next three items
      const nextIndex1 = currentIndex;
      const nextIndex2 = (currentIndex + 1) % items.length;
      const nextIndex3 = (currentIndex + 2) % items.length;

      // Show the next three items
      items[nextIndex1].classList.remove('subbanner-hidden');
      items[nextIndex1].classList.add('visible-item');

      items[nextIndex2].classList.remove('subbanner-hidden');
      items[nextIndex2].classList.add('visible-item');

      items[nextIndex3].classList.remove('subbanner-hidden');
      items[nextIndex3].classList.add('visible-item');

      // Update the current index for the next set of items
      currentIndex = (currentIndex + 3) % items.length;
    }

    function showInitialItems() {
      // Initially show the first three items
      if (items.length > 0) {
        items[0].classList.remove('subbanner-hidden');
        items[0].classList.add('visible-item');
      }
      if (items.length > 1) {
        items[1].classList.remove('subbanner-hidden');
        items[1].classList.add('visible-item');
      }
      if (items.length > 2) {
        items[2].classList.remove('subbanner-hidden');
        items[2].classList.add('visible-item');
      }

      // Set a timeout to start the animation loop after the initial display duration
      setTimeout(() => {
        // Start showing items in the loop
        setInterval(showNextItems, animationDuration);
      }, initialDisplayDuration);
    }

    // Start the process
    showInitialItems();
  });
<<<<<<< HEAD

</script>
=======

</script>


<script>
                  document.addEventListener('DOMContentLoaded', function () {
                  const categorySelect = document.getElementById('category_id');
                  const subCategorySelect = document.getElementById('subcategory_id');

                  function filterSubcategories() {
                    const selectedCategoryId = categorySelect.value;
                    const subCategories = subCategorySelect.querySelectorAll('option');

                    subCategories.forEach(option => {
                    if (!option.value) return; // Skip the "Select Sub-Category" option
                    option.style.display = option.dataset.categoryId === selectedCategoryId || selectedCategoryId === '' ? 'block' : 'none';
                    });

                    // Reset subcategory selection when category changes
                    subCategorySelect.value = '';
                  }

                  // Initial filter when the page loads
                  filterSubcategories();

                  // Update subcategories when the category is changed
                  categorySelect.addEventListener('change', filterSubcategories);
                  });
                </script>
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
