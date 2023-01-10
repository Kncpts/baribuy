<div class=" cat_prop nav-link {{ $key == 0 ? 'active' : '' }}"
    data-category="{{ str_replace(' ', '-', strtolower($property->categories()->first()->name)) }} john doe"
    id="v-pills-profile-tab-{{ $property->id }}" data-bs-toggle="pill"
    data-bs-target="#v-pills-profile-{{ $property->id }}" type="button" role="tab"
    aria-controls="v-pills-profile-{{ $property->id }}" aria-selected="true">
    <div  style="height:227px" class="card col-md-12 p-2 item--list"
        data-category="{{ str_replace(' ', '-', strtolower($property->categories()->first()->name)) }} john doe">
        <div class="row">
            <div class="col-5">
            <img class="w-100" style="height:210px;max-width:210px;max-height:210px" src="{{ asset('images/' . $property->propertyGalleries()->first()->name) }}" alt="">

                <div class="thumbnail--box" style="display: contents;">

                    <span class="trending--tag" style="border-bottom-right-radius: 5px;"
                        data-category="{{ str_replace(' ', '-', strtolower($property->categories()->first()->name)) }} john doe">
                        {{ $property->categories()->first()->name }}
                    </span>
                </div>
            </div>
            <div class="col-7">

                <div class="text--box" style="margin-left: 0px;height:100px">
                    <span class="heading">
                        {{ $property->title }}
                    </span>
                    <span class="subheading" style="font-size:13px">
                        {{ currencyConverter($property->purchase_price) }} . 20% shares available
                        <i class="bi bi-info-circle" type="button" data-bs-toggle="tooltip" data-bs-html="true"
                            title="<em>Tooltip</em> <u>with</u> <b>HTML</b>"></i>
                    </span>
                    <p class="card-text text-justify" style="font-size: 12px;" >
                        {{ $property->description }}
                    </p>
                </div>
            </div>
        </div>
        <!-- <span class="right--arrow">
            <i class="fa-solid fa-chevron-right"></i>
        </span> -->
    </div>
</div>