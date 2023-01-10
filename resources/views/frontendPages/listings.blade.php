@extends('layouts.frontend.app')

@section('content')
<style>
.animals {
  margin-top: 30px;
}
.animal {
  padding: 15px 20px;
  width: 100%;
  font-weight: 700;
  background: rgba(0,0,0,0.1);
  margin-bottom: 5px;
}
    </style>
    <section id="listing--section">
    <div id="fb-root"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="sidebar">
                        <div class="filters">
                          
                            <form>

                            <ul class="added-filters">
                            @foreach ($categories as $category)
                            <li class="checksfilter">
                                    <span class="form-check">
                                      <input class="form-check-input"  type="checkbox" value="{{ str_replace(' ','-',strtolower($category->name)) }}" id="{{ str_replace(' ','-',strtolower($category->name)) }}"/>{{ $category->name }} </span>
                                </li>  
                        @endforeach
                        </form>
   </ul>
    </div>
                        <div class="items--list--panel" id="items--list--panel">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <div class="nav flex-column nav-pills mt-1 me-3" id="v-pills-tab" role="tablist"
                                        aria-orientation="vertical">
                                        @foreach ($properties as $key => $property)
                                            @include('frontendPages.listing-partial.itemPanel', [
                                                'property' => $property,
                                                'key' => $key,
                                            ])
                                        @endforeach
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="tab-content" id="nav-tabContent">
                      
                        <!-- Tab Content Start -->
                        @foreach ($properties as $key => $property)
                            @include('frontendPages.listing-partial.detailedItemPanel', [
                                'property' => $property,
                                'key' => $key,
                            ])
                        @endforeach
                        <!-- Tab Content End -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>var $filterCheckboxes = $('input[type="checkbox"]');
var filterFunc = function() {
  
  var selectedFilters = {};

  $filterCheckboxes.filter(':checked').each(function() {

    if (!selectedFilters.hasOwnProperty(this.name)) {
      selectedFilters[this.name] = [];
    }

    selectedFilters[this.name].push(this.value);
  });

  // create a collection containing all of the filterable elements
  var $filteredResults = $('.cat_prop');

  // loop over the selected filter name -> (array) values pairs
  $.each(selectedFilters, function(name, filterValues) {

    // filter each .animal element
    $filteredResults = $filteredResults.filter(function() {

      var matched = false,
        currentFilterValues = $(this).data('category').split(' ');

      // loop over each category value in the current .animal's data-category
      $.each(currentFilterValues, function(_, currentFilterValue) {

        // if the current category exists in the selected filters array
        // set matched to true, and stop looping. as we're ORing in each
        // set of filters, we only need to match once

        if ($.inArray(currentFilterValue, filterValues) != -1) {
          matched = true;
          return false;
        }
      });

      // if matched is true the current .animal element is returned
      return matched;

    });
  });

  $('.cat_prop').hide().filter($filteredResults).show();
}

$filterCheckboxes.on('change', filterFunc);  
$(".checksfilter").click(function(){

// $(this).children().children().attr('checked','checked');
// $filterCheckboxes.on('change', filterFunc);  
});
    </script>
@endsection
