@extends('layouts.AdminLayout')

@section('css')
<link rel="stylesheet" href="{{ asset('plugins/dropzone/min/dropzone.min.css') }}">
@endsection
@section('content')
<div class="container">
    @if (isset($property) && !empty($property))
    <form method="POST" action="{{ route('admin.property.update', $property->id) }}" enctype="multipart/form-data">
        @else
        <form method="POST" action="{{ route('admin.property.store') }}" enctype="multipart/form-data">
            @endif
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" value="{{ old('title') ?? ($property->title ?? 'default') }}" name="title"
                            class="form-control @error('title') is-invalid @enderror" id="title">
                        @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea type="text" name="description"
                            class="form-control @error('description') is-invalid @enderror"
                            id="description">{{ old('description') ?? ($property->description ?? 'default') }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="bed">Bed</label>
                                <input type="text" value="{{ old('bed') ?? ($property->bed ?? 'default') }}" name="bed"
                                    class="form-control @error('bed') is-invalid @enderror" id="bed">
                                @error('bed')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="bath">Bath</label>
                                <input type="number" value="{{ old('bath') ?? ($property->bath ?? 'default') }}"
                                    name="bath" class="form-control @error('bath') is-invalid @enderror" id="bath">
                                @error('bath')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="sq_ft">SQFT</label>
                                <input type="number" value="{{ old('sq_ft') ?? ($property->sq_ft ?? 'default') }}"
                                    name="sq_ft" class="form-control @error('sq_ft') is-invalid @enderror" id="sq_ft">
                                @error('sq_ft')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="year_built">Year Built</label>
                                <input type="date" name="year_built"
                                    value="{{ old('year_built') ?? ($property->year_built ?? 'default') }}"
                                    class="form-control  @error('year_built') is-invalid @enderror" id="year_built">
                                @error('year_built')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="monthly_rent">monthly rent</label>
                        <input type="number" value="{{ old('monthly_rent') ?? ($property->monthly_rent ?? 'default') }}"
                            name="monthly_rent" class="form-control @error('monthly_rent') is-invalid @enderror"
                            id="monthly_rent">
                        @error('monthly_rent')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">address</label>
                                <input type="text" name="address"
                                    value="{{ old('address') ?? ($property->address ?? 'default') }}"
                                    class="form-control @error('address') is-invalid @enderror" id="address">
                                @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="street">street</label>
                                <input type="text" value="{{ old('street') ?? ($property->street ?? 'default') }}"
                                    name="street" class="form-control @error('bed') is-invalid @enderror" id="street">
                                @error('bed')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="zip_code">Zip Code</label>
                                <input type="text" name="zip_code"
                                    value="{{ old('zip_code') ?? ($property->zip_code ?? 'default') }}"
                                    class="form-control @error('zip_code') is-invalid @enderror" id="zip_code">
                                @error('zip_code')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="city_id">city</label>
                                <select type="text" name="city_id"
                                    class="form-control @error('city_id') is-invalid @enderror" id="city_id">
                                    @foreach ($cities as $city)
                                    <option
                                        {{ old('city_id') == $city->id || (!empty($property) && $property->city_id == $city->id) ? 'selected' : '' }}
                                        value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                                @error('city_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="state">State</label>
                                <select type="text" name="state_id"
                                    class="form-control @error('state_id') is-invalid @enderror" id="state_id">
                                    @foreach ($states as $state)
                                    <option
                                        {{ old('state_id') == $state->id || (!empty($property) && $property->state_id == $state->id) ? 'selected' : '' }}
                                        value="{{ $state->id }}">{{ $state->name }}</option>
                                    @endforeach
                                </select>
                                @error('state_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="country_id">Country</label>
                                <select type="text" name="country_id"
                                    class="form-control @error('country_id') is-invalid @enderror" id="country_id">
                                    @foreach ($countries as $country)
                                    <option
                                        {{ old('country_id') == $country->id || (!empty($property) && $property->country_id == $country->id) ? 'selected' : '' }}
                                        value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                                @error('country_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rental_status_id">Rental Status</label>
                        <select type="text" name="rental_status_id"
                            class="form-control @error('rental_status_id') is-invalid @enderror" id="rental_status_id">
                            @foreach ($rentalStatus as $status)
                            <option
                                {{ old('rental_status_id') == $status->id || (!empty($property) && $property->rental_status_id == $status->id) ? 'selected' : '' }}
                                value="{{ $status->id }}">{{ $status->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select multiple type="text" name="category_id[]"
                            class="form-control @error('category_id') is-invalid @enderror" id="category_id">
                            @if (isset($property->categories) && !empty($property->categories))
                            @foreach ($categories as $category)
                            <option @foreach ($property->categories as
                                $cate){{ $cate->id == $category->id ? 'selected' : '' }} @endforeach
                                value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                            @else
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                            @endif


                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="first_dividend_yield">First Dividend Yield (in percent)</label>
                                <input
                                    value="{{ old('first_dividend_yield') ?? ($property->first_dividend_yield ?? 'default') }}"
                                    type="text" name="first_dividend_yield"
                                    class="form-control @error('first_dividend_yield') is-invalid @enderror"
                                    id="first_dividend_yield">
                                @error('first_dividend_yield')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="first_dividend_date">First Dividend Date</label>
                                <input type="date" name="first_dividend_date"
                                    value="{{ old('first_dividend_date') ?? ($property->first_dividend_date ?? 'default') }}"
                                    class="form-control @error('first_dividend_date') is-invalid @enderror"
                                    id="first_dividend_date">
                                @error('first_dividend_date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="timeline_to_rent_descrition">Timeline To Rent Descrition</label>
                        <textarea type="date" name="timeline_to_rent_descrition"
                            class="form-control @error('timeline_to_rent_descrition') is-invalid @enderror"
                            id="timeline_to_rent_descrition">{{ old('timeline_to_rent_descrition') ?? ($property->timeline_to_rent_descrition ?? 'default') }}</textarea>
                        @error('timeline_to_rent_descrition')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="purchase_price">Purchase Price</label>
                                <input type="number" name="purchase_price"
                                    value="{{ old('purchase_price') ?? ($property->purchase_price ?? 'default') }}"
                                    class="form-control @error('purchase_price') is-invalid @enderror"
                                    id="purchase_price">
                                @error('purchase_price')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="property_improvements_cash_reserves">Property Improvements & Cash
                                    Reserves</label>
                                <input type="number" name="property_improvements_cash_reserves"
                                    value="{{ old('property_improvements_cash_reserves') ?? ($property->property_improvements_cash_reserves ?? 'default') }}"
                                    class="form-control @error('property_improvements_cash_reserves') is-invalid @enderror"
                                    id="property_improvements_cash_reserves">
                                @error('property_improvements_cash_reserves')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="closing_costs_offering_costs_holding_costs">Closing Costs, Offering Costs & Holding
                            Costs
                        </label>
                        <input type="number" name="closing_costs_offering_costs_holding_costs"
                            value="{{ old('closing_costs_offering_costs_holding_costs') ?? ($property->closing_costs_offering_costs_holding_costs ?? 'default') }}"
                            class="form-control @error('closing_costs_offering_costs_holding_costs') is-invalid @enderror"
                            id="closing_costs_offering_costs_holding_costs">
                        @error('closing_costs_offering_costs_holding_costs')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="baribuy_sourcing_fee">Arrived Sourcing Fee (One-time)</label>
                                <input type="number" name="baribuy_sourcing_fee"
                                    value="{{ old('baribuy_sourcing_fee') ?? ($property->baribuy_sourcing_fee ?? 'default') }}"
                                    class="form-control @error('baribuy_sourcing_fee') is-invalid @enderror"
                                    id="baribuy_sourcing_fee">
                                @error('baribuy_sourcing_fee')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="property_loan_amount">Property Loan Amount</label>
                                <input type="number" name="property_loan_amount"
                                    value="{{ old('property_loan_amount') ?? ($property->property_loan_amount ?? 'default') }}"
                                    class="form-control @error('property_loan_amount') is-invalid @enderror"
                                    id="property_loan_amount">
                                @error('property_loan_amount')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="equity_raised_from_investors">Equity Raised From Investors</label>
                                <input type="number" name="equity_raised_from_investors"
                                    value="{{ old('equity_raised_from_investors') ?? ($property->equity_raised_from_investors ?? 'default') }}"
                                    class="form-control @error('equity_raised_from_investors') is-invalid @enderror"
                                    id="equity_raised_from_investors">
                                @error('equity_raised_from_investors')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="financing">Financing</label>
                                <input type="number" name="financing"
                                    value="{{ old('financing') ?? ($property->financing ?? 'default') }}"
                                    class="form-control @error('financing') is-invalid @enderror" id="financing">
                                @error('financing')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="interest_rate">Interest Rate</label>
                                <input type="number" name="interest_rate"
                                    value="{{ old('interest_rate') ?? ($property->interest_rate ?? 'default') }}"
                                    class="form-control @error('interest_rate') is-invalid @enderror"
                                    id="interest_rate">
                                @error('interest_rate')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="ipo_price_per_share">IPO Price Per Share</label>
                                <input type="number" name="ipo_price_per_share"
                                    value="{{ old('ipo_price_per_share') ?? ($property->ipo_price_per_share ?? 'default') }}"
                                    class="form-control @error('ipo_price_per_share') is-invalid @enderror"
                                    id="ipo_price_per_share">
                                @error('ipo_price_per_share')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="total_shares">Total Shares</label>
                                <input type="number" name="total_shares"
                                    value="{{ old('total_shares') ?? ($property->total_shares ?? 'default') }}"
                                    class="form-control @error('total_shares') is-invalid @enderror" id="total_shares">
                                @error('total_shares')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="hold_period">Hold Period</label>
                                <input type="text" name="hold_period"
                                    value="{{ old('hold_period') ?? ($property->hold_period ?? 'default') }}"
                                    class="form-control @error('hold_period') is-invalid @enderror" id="hold_period">
                                @error('hold_period')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="available_price">Available Price</label>
                                <input type="number" name="available_price"
                                    value="{{ old('available_price') ?? ($property->available_price ?? 'default') }}"
                                    class="form-control @error('available_price') is-invalid @enderror"
                                    id="available_price">
                                @error('available_price')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="asset_management_fee_quarterly">Asset Management Fee Quarterly</label>
                                <input type="number" name="asset_management_fee_quarterly"
                                    value="{{ old('asset_management_fee_quarterly') ?? ($property->asset_management_fee_quarterly ?? 'default') }}"
                                    class="form-control @error('asset_management_fee_quarterly') is-invalid @enderror"
                                    id="asset_management_fee_quarterly">
                                @error('asset_management_fee_quarterly')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">
                {{ isset($property) ? 'Update' : 'Create' }}
            </button>
        </form>
        <div class="row" style="display: {{ isset($property) ? 'block' : 'none' }}">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Property <small>Gallery</small></h3>
                    </div>
                    <div class="card-body">
                        <div id="actions" class="row">
                            <div class="col-lg-6">
                                <div class="btn-group w-100">
                                    <span class="btn btn-success col fileinput-button">
                                        <i class="fas fa-plus"></i>
                                        <span>Add files</span>
                                    </span>
                                    <button type="button" class="btn btn-primary col start">
                                        <i class="fas fa-upload"></i>
                                        <span>Start upload</span>
                                    </button>
                                    <button type="reset" class="btn btn-warning col cancel">
                                        <i class="fas fa-times-circle"></i>
                                        <span>Cancel upload</span>
                                    </button>
                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center">
                                <div class="fileupload-process w-100">
                                    <div id="total-progress" class="progress progress-striped active" role="progressbar"
                                        aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                        <div class="progress-bar progress-bar-success" style="width:0%;"
                                            data-dz-uploadprogress></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table table-striped files" id="previews">
                            <div id="template" class="row mt-2">
                                <div class="col-auto">
                                    <span class="preview"><img src="data:," alt="" data-dz-thumbnail /></span>
                                </div>
                                <div class="col d-flex align-items-center">
                                    <p class="mb-0">
                                        <span class="lead" data-dz-name></span>
                                        (<span data-dz-size></span>)
                                    </p>
                                    <strong class="error text-danger" data-dz-errormessage></strong>
                                </div>
                                <div class="col-4 d-flex align-items-center">
                                    <div class="progress progress-striped active w-100" role="progressbar"
                                        aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                        <div class="progress-bar progress-bar-success" style="width:0%;"
                                            data-dz-uploadprogress></div>
                                    </div>
                                </div>
                                <div class="col-auto d-flex align-items-center">
                                    <div class="btn-group">
                                        <button class="btn btn-primary start">
                                            <i class="fas fa-upload"></i>
                                            <span>Start</span>
                                        </button>
                                        <button data-dz-remove class="btn btn-warning cancel">
                                            <i class="fas fa-times-circle"></i>
                                            <span>Cancel</span>
                                        </button>
                                        <button data-dz-remove class="btn btn-danger delete">
                                            <i class="fas fa-trash"></i>
                                            <span>Delete</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            {{-- start --}}
                            @if (isset($property) && isset($property->propertyGalleries))
                            @foreach ($property->propertyGalleries as $image)
                            <div class="row mt-2 dz-image-preview">
                                <div class="col-auto">
                                    <span class="preview"><img width="10%" src="{{ asset('images/' . $image->name) }}"
                                            alt="" data-dz-thumbnail /></span>
                                </div>
                                <div class="col d-flex align-items-center">
                                    <p class="mb-0">
                                        <span class="lead" data-dz-name></span>
                                        (<span data-dz-size></span>)
                                    </p>
                                    <strong class="error text-danger" data-dz-errormessage></strong>
                                </div>
                                <div class="col-4 d-flex align-items-center">
                                    <div class="progress progress-striped active w-100" role="progressbar"
                                        aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                        <div class="progress-bar progress-bar-success" style="width:0%;"
                                            data-dz-uploadprogress></div>
                                    </div>
                                </div>
                                <div class="col-auto d-flex align-items-center">
                                    <div class="btn-group">
                                        <button class="btn btn-primary start">
                                            <i class="fas fa-upload"></i>
                                            <span>Start</span>
                                        </button>
                                        <button data-dz-remove class="btn btn-warning cancel">
                                            <i class="fas fa-times-circle"></i>
                                            <span>Cancel</span>
                                        </button>
                                        <button data-dz-remove class="btn btn-danger delete">
                                            <i class="fas fa-trash"></i>
                                            <span>Delete</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                            {{-- end --}}
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">

                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>

        <!-- ------------------------Property Documents Secton------------------ -->
        <div id="DocumentUpload" class=" row" style="display: {{ isset($property) ? 'block' : 'none' }}">



            <!-- The Modal -->
            <div class="modal" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Upload Documents</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <link rel="stylesheet"
                                href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
                            <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
                            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js">
                            </script>
                            </head>

                            <body>

                                <div class="container mt-3">
                                    <form action="{{ route('admin.property.docfile') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" class="custom-file-input" id="property_id"
                                            value="{{$property->id}}" name="property_id">

                                        <div class="custom-file mb-3">

                                            <input type="file" class="custom-file-input" id="customFile" name="file">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" class="form-control" id="filename"
                                                    placeholder="Enter File Name" name="filename">

                                            </div>

                                        </div>


                                        <div class="mt-3">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>

                                <script>
                                // Add the following code if you want the name of the file appear on select
                                $(".custom-file-input").on("change", function() {
                                    var fileName = $(this).val().split("\\").pop();
                                    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                                });
                                </script>

                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Property <small>Documents</small></h3>
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                            data-target="#myModal">
                            <i class="fa fa-plus"></i>Add Documents
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="card-items">
                            <div class="row">

                                @foreach ($property->propertyDocuments as $document)
                                <div class="col">
                                    @if(pathinfo($document->name,PATHINFO_EXTENSION)=="pdf")
                                    <img src="<?= URL::to('/public'); ?>/img/pdf-icon.png" alt="" height="30px"
                                        width="30px" />
                                    <a href="{{ route('admin.display_pdf',$document->name) }}">
                                        {{ $document->document}}</a>
                                       @else
                                       <img src="<?= URL::to('/public'); ?>/img/file-icon.png" alt="" height="30px"
                                        width="30px" />
                                        <a download href="<?= URL::to('/public'); ?>/documents/{{ $document->name}}">
                                        {{ $document->document}}</a>

  
                                    @endif
                                </div>




                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">

                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
</div>
@endsection
@section('js')
<script src="{{ asset('plugins/dropzone/min/dropzone.min.js') }}"></script>
@endsection
@section('script')
@isset($property)
<script>
var previewNode = document.querySelector("#template")
previewNode.id = ""
var propertyId = "{{ $property->id }}"
var previewTemplate = previewNode.parentNode.innerHTML
previewNode.parentNode.removeChild(previewNode)
var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "{{ route('admin.property.file') }}", // Set the url
    method:"post",

    params: {
        property_id: propertyId
    },
    thumbnailWidth: 80,
    acceptedFiles: ".jpeg,.jpg,.png,.gif",
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
});

myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() {
        myDropzone.enqueueFile(file)
    }
})
// Update the total progress bar
myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
})

myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
})

// Hide the total progress bar when nothing's uploading anymore
myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
})

// Setup the buttons for all transfers
// The "add files" button doesn't need to be setup because the config
// `clickable` has already been specified.
document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
}
document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
}
</script>
@endisset
@endsection