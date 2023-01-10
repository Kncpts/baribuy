<div class="tab-pane fade {{ $key == 0 ? 'show active' : '' }}" id="v-pills-profile-{{ $property->id }}" role="tabpanel"
    aria-labelledby="v-pills-profile-tab-{{ $property->id }}">
    <div class="d-flex  justify-content-between">
        <h1 class="list--detail--heading">
                    
  {{ $property->title }}

        </h1>
        <a href="#" class="btn--invest--now">Invest Now</a>
    </div>
    <h2 class="list--detail--subHeading">
        <input id="original-price" type="hidden" value="{{ $property->purchase_price }}">
        {{ currencyConverter($property->purchase_price) }} <!-- <strong>.</strong> --> 20% shares available 
        <!-- <i class="bi bi-info-circle" type="button" data-bs-toggle="tooltip" data-bs-html="true"
            title="<em>Tooltip</em> <u>with</u> <b>HTML</b>"></i> -->
    </h2>
    <div class="d-flex  justify-content-between">
        <p class="available--now">
            Available Now
        </p>
        <div class=" d-flex" style="margin: 3px 11px;font-size:12px;gap:10px">
        @if($property->favorites->count()==0)
        <a href="{{ route('setFavourite', $property->id) }}">
                <i class="fa-regular fa-heart" ></i> Favorite
            </a>
        @else
            @foreach ($property->favorites as $favourites)

                    @if($favourites->is_favourite==0 && $favourites->property_id==$property->id )
                    <a href="{{ route('setFavourite', $property->id) }}" ><i class="fa-regular fa-heart"  ></i>Favorite
</a>
                    @else
                        <a href="{{ route('unsetFavourite', $favourites->id) }}" style="color:black;" > <i class="fa-regular fa-heart" style="color:red"  ></i>Favorite
</a>
                    @endif  
                    
            @endforeach
        @endif

      
<div class="fb-share-button" data-href="https://github.com/RECKVISION/bariBuy/pull/1/files" data-layout="button_count" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">                <i class="bi bi-share"></i> Share
</a></div>
            
        </div>
    </div>
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($property->propertyGalleries as $k => $img)
                <div class="carousel-item {{ $k == 0 ? 'active' : '' }}">
                    <img src="{{ asset('images/' . $img->name) }}" class="d-block w-100" alt="...">
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="num">1/{{ $property->propertyGalleries->count() }}</div>
    <div class="after--carousel">
        <div class="row">
            <div class="col-lg-7">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4 class="small--heading">
                            ATTRIBUTES
                        </h4>
                        <span class="no--beds">{{ $property->bed }} Beds</span>
                        <span class="no--baths">{{ $property->bath }} Baths</span>
                        <span class="no--area">{{ $property->sq_ft }} sq ft</span>
                    </div>
                    <div>
                        <h4 class="small--heading">
                            BUILD
                        </h4>
                        <span class="year--build">
                            {{ dateGetYear($property->year_built) }}
                        </span>
                    </div>
                </div>
                <div class="mt-3">
                    <h4 class="small--heading">
                        LOCATION
                    </h4>
                    <!-- Button trigger modal -->
                    <a type="button" class="modal--tag" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        {{ getAddressFromProperty($property) }}
                    </a>

                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">House
                                        Map</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3591.1708489422344!2d-80.13147568502514!3d25.830914983605442!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88d9b311a5db175b%3A0x32bef21eb8e1526d!2s5288%20Alton%20Rd%2C%20Miami%20Beach%2C%20FL%2033140%2C%20USA!5e0!3m2!1sen!2s!4v1665416917905!5m2!1sen!2s"
                                        width="100%" height="450" style="border:0;" allowfullscreen=""
                                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                                <!-- <div class="modal-footer">
                                                                                                                                                                                                                        <button type="button" class="btn btn-secondary"
                                                                                                                                                                                                                            data-bs-dismiss="modal">Close</button>
                                                                                                                                                                                                                        <button type="button"
                                                                                                                                                                                                                            class="btn btn-primary">Understood</button>
                                                                                                                                                                                                                    </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <h4 class="small--heading">
                        ABOUT THIS HOME
                    </h4>
                    <p class="small--para">
                        {{ $property->description }}
                    </p>
                </div>
                <div class="mt-3">
                    <h4 class="small--heading">
                        BARIBUY HOME SCORE
                        <i class="bi bi-info-circle" type="button" data-bs-toggle="tooltip" data-bs-html="true"
                            title="<em>Tooltip</em> <u>with</u> <b>HTML</b>"></i>
                    </h4>
                    <p class="stars--para"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                            class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i>
                    </p>
                </div>
                <div class="mt-3">
                    <h4 class="small--heading">
                        Numbers Breakdown <i class="bi bi-info-circle" type="button" data-bs-toggle="tooltip"
                            data-bs-html="true" title="<em>Tooltip</em> <u>with</u> <b>HTML</b>"></i>
                    </h4>
                    <div class="d-flex justify-content-between custom--lines">
                        <p class="text-muted">Property Purchase Price</p>
                        <p class="text-muted">{{ currencyConverter($property->purchase_price) }}</p>
                    </div>
                    <div class="d-flex justify-content-between custom--lines">
                        <p class="text-muted">Renovations & Repair Reserves</p>
                        <p class="text-muted">{{ currencyConverter($property->property_improvements_cash_reserves) }}
                        </p>
                    </div>
                    <div class="d-flex justify-content-between custom--lines">
                        <p class="text-muted">Offering & Closing Cost</p>
                        <p class="text-muted">
                            {{ currencyConverter($property->closing_costs_offering_costs_holding_costs) }}
                        </p>
                    </div>
                    <div class="d-flex justify-content-between custom--lines">
                        <p class="text-muted">BariBuy Fee</p>
                        <p class="text-muted">
                            {{ currencyConverter($property->baribuy_sourcing_fee) }}
                        </p>
                    </div>
                    <div class="d-flex justify-content-between custom--lines total--payment">
                        <p class="">TOTAL PROPERTY AMOUNT</p>
                        <p class="">{{ totalPropertyAmount($property) }}</p>
                    </div>
                    <div class="d-flex justify-content-between custom--lines mt-4">
                        <p class="text-muted">IPO Price Per Share</p>
                        <p class="text-muted">{{ currencyConverter($property->ipo_price_per_share) }}</p>
                    </div>
                    <div class="d-flex justify-content-between custom--lines">
                        <p class="text-muted">Total Shares</p>
                        <p class="text-muted">{{ number_format($property->total_shares, 2) }}</p>
                    </div>
                    <div class="d-flex justify-content-between custom--lines">
                        <p class="text-muted">Hold Period</p>
                        <p class="text-muted">{{ $property->hold_period }}</p>
                    </div>
                    <div class="light--bg mt-3">
                        <div class="d-flex justify-content-between custom--lines">
                            <p class="">Asset Management Fee <!-- (Quarterly) --></p>
                            <p class="">{{ currencyConverter($property->asset_management_fee_quarterly) }}</p>
                        </div>
                        <p class="text-muted">Deducted from rental income</p>
                    </div>
                    <div class="light--bg mt-3">
                        <div class="d-flex justify-content-between custom--lines">
                            <p class="">Monthly Property Taxes</p>
                            <p class="">{{ currencyConverter($property->monthly_tax) }}</p>
                        </div>
                        <p class="text-muted">Deducted from rental income</p>
                    </div>
                    <div class="light--bg mt-3">
                        <div class="d-flex justify-content-between custom--lines">
                            <p class="">Monthly Home Insurance</p>
                            <p class="">{{ currencyConverter($property->monthly_home_insurance) }}</p>
                        </div>
                        <p class="text-muted">Deducted from rental income</p>
                    </div>
                    <div class="light--bg mt-3">
                        <div class="d-flex justify-content-between custom--lines">
                            <p class="">Monthly Rent</p>
                            <p class="">{{ currencyConverter($property->monthly_rent) }}</p>
                        </div>
                    </div>
                    <div class="light--bg mt-3">
                        <div class="d-flex justify-content-between custom--lines">
                            <p class="">Net Monthly Rent income</p>
                            <!-- in paragraph tag there will be net rent income calculation according to video -->
                            <p class=""> $885</p>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <h4 class="small--heading">
                        Documents
                    </h4>
                    @foreach ($property->propertyDocuments as $document)
                    <div class="document--link d-flex justify-content-between">
                    @if(pathinfo($document->name,PATHINFO_EXTENSION)=="pdf")

                        <a href="{{ route('admin.display_pdf',$document->name) }}">{{$document->document}}<i class="fa-solid fa-share-from-square"></i></a>
                        @else
                                                 <a href="<?= URL::to('/public'); ?>/documents/{{$document->name}}" download>{{$document->document}} <i class="fa-solid fa-share-from-square"></i></a> 

                    @endif
                        <!-- <a href="#">Risk Details <i class="fa-solid fa-share-from-square"></i></a> -->
                    </div>
            @endforeach
<!--                     
                    <div class="document--link d-flex justify-content-between">
                        <a href="#">Offering Overview <i class="fa-solid fa-share-from-square"></i></a>
                        <a href="#">Proceeds Overview <i class="fa-solid fa-share-from-square"></i></a>
                    </div> -->
                </div>
            </div>
            <div class="col-lg-5">
                <div class="calculator--box">
                    <span class="title--span"> ESTIMATE FOR YOUR INVESTMENT</span>

                    <div class="range--slider">
                        <!-- <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                            </div>
                            <input type="number" name="Investmentprice" id="Investmentprice" class="form-control"
                                aria-label="Amount (to the nearest dollar)">
                            <div class="input-group-append">
                                <span class="input-group-text">.00</span>
                            </div>
                        </div> -->
                        <label for="customRange3" class="form-label">
                            Investment Total
                            <i class="bi bi-info-circle" type="button" data-bs-toggle="tooltip" data-bs-html="true"
                                title="<em>Tooltip</em> <u>with</u> <b>HTML</b>"></i>
                        </label>
                        <div class="range-slider">
                            <input class="range-slider__range" type="range" id="totalInvestment" value="1528000"
                                min="100" max="50000">
                            <span class="range-slider__value" id="totalInvestmentShow">50,000</span>
                        </div>

                        <label for="customRange4" class="form-label mt-3 years">Hold Period <i
                                class="bi bi-info-circle" type="button" data-bs-toggle="tooltip"
                                data-bs-html="true" title="<em>Tooltip</em> <u>with</u> <b>HTML</b>"></i></label>
                        <div class="range-slider">
                            <input class="range-slider__range" type="range" id="holdPeriod" value="5"
                                min="1" max="7">
                            <span class="range-slider__value years__value">5</span>
                        </div>

                        <label for="customRange5" class="form-label mt-3">Appreciation % <i class="bi bi-info-circle"
                                type="button" data-bs-toggle="tooltip" data-bs-html="true"
                                title="<em>Tooltip</em> <u>with</u> <b>HTML</b>"></i></label>
                        <div class="range-slider">
                            <input class="range-slider__range" id="appreciation" type="range" value="0"
                                min="0" max="30">
                            <span class="range-slider__value per__value">0</span>
                        </div>

                        <label for="customRange5" class="form-label mt-3">Rental Dividend Rate
                            <i class="bi bi-info-circle" type="button" data-bs-toggle="tooltip" data-bs-html="true"
                                title="<em>Tooltip</em> <u>with</u> <b>HTML</b>"></i></label>
                        <div class="range-slider">
                            <input class="range-slider__range" id="rentalDividend" type="range" value="0"
                                min="0" max="10">
                            <span class="range-slider__value per__value">0</span>
                        </div>
                    </div>
                    <div class="value--display">
                        <div class="d-flex justify-content-between">
                            <p>Total Return <i class="bi bi-info-circle" type="button" data-bs-toggle="tooltip"
                                    data-bs-html="true" title="<em>Tooltip</em> <u>with</u> <b>HTML</b>"></i></p>
                            <p id="totalReturnVal"></p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>Total dividend <i class="bi bi-info-circle" type="button" data-bs-toggle="tooltip"
                                    data-bs-html="true" title="<em>Tooltip</em> <u>with</u> <b>HTML</b>"></i></p>
                            <p id="totalDividendVal"></p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>Annual Return<i class="bi bi-info-circle" type="button" data-bs-toggle="tooltip"
                                    data-bs-html="true" title="<em>Tooltip</em> <u>with</u> <b>HTML</b>"></i></p>
                            <p id="annualReturnVal"></p>
                        </div>
                    </div>
                </div>
                <ul class="link--sidebar">
                    <a href="#">
                        <li>Learn</li>
                    </a>
                    <a href="#">
                        <li>Contact us </li>
                    </a>
                    <a href="#">
                        <li>Help & FAQs</li>
                    </a>
                </ul>
            </div>
        </div>
    </div>
</div>
