@extends('layouts.AdminLayout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href={{ 'property/add' }} class="btn btn-success btn-sm text-light">Add Property</a>
            </div>
        </div>
        <div class="row table-responsive">
            <table class="table text-center">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">IPO Price per share</th>

                        {{-- <th scope="col">User</th>
                        <th scope="col">Bed</th>
                        <th scope="col">Bath</th>
                        <th scope="col">SQFT</th>
                        <th scope="col">Year Built</th>
                        <th scope="col">Monthly Rent</th>
                        <th scope="col">Address</th>
                        <th scope="col">Street</th>
                        <th scope="col">Zip Code</th>
                        <th scope="col">City</th>
                        <th scope="col">Country</th>
                        <th scope="col">Rental Status</th>
                        <th scope="col">First Dividend Yield</th>
                        <th scope="col">First Dividend</th>
                        <th scope="col">Timeline To Rent Descrition</th>
                        <th scope="col">Purchase Price</th>
                        <th scope="col">Property Improvements Cash Reserves</th>
                        <th scope="col">Closing Costs Offering Costs Holding Costs</th>
                        <th scope="col">Arrived Sourcing Fee</th>
                        <th scope="col">Property Loan Amount</th>
                        <th scope="col">Equity Raised From Investors</th>
                        <th scope="col">Financing</th>
                        <th scope="col">Total Shares</th>
                        <th scope="col">Hold Period</th>
                        <th scope="col">Available Price</th>
                        <th scope="col">Asset Management Fee (Quarterly)</th>
                        <th scope="col">Interest Rate</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th> --}}
                        <th scope="col">Controls</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($properties as $property)
                        <tr style="backgroundColor:#fff">
                            <td>{{ $property->title }}</td>
                            <td>{{ $property->description }}</td>
                            <td>{{ $property->ipo_price_per_share }}</td>

                            {{-- <td>{{ $property->user_id }}</td>
                            <td>{{ $property->bed }}</td>
                            <td>{{ $property->bath }}</td>
                            <td>{{ $property->sq_ft }}</td>
                            <td>{{ $property->year_built }}</td>
                            <td>{{ $property->monthly_rent }}</td>
                            <td>{{ $property->address }}</td>
                            <td>{{ $property->street }}</td>
                            <td>{{ $property->zip_code }}</td>
                            <td>{{ $property->city_id }}</td>
                            <td>{{ $property->country_id }}</td>
                            <td>{{ $property->rental_status_id }}</td>
                            <td>{{ $property->first_dividend_yield }}</td>
                            <td>{{ $property->first_dividend }}</td>
                            <td>{{ $property->timeline_to_rent_descrition }}</td>
                            <td>{{ $property->purchase_price }}</td>
                            <td>{{ $property->property_improvements_cash_reserves }}</td>
                            <td>{{ $property->closing_costs_offering_costs_holding_costs }}</td>
                            <td>{{ $property->baribuy_sourcing_fee }}</td>
                            <td>{{ $property->property_loan_amount }}</td>
                            <td>{{ $property->equity_raised_from_investors }}</td>
                            <td>{{ $property->financing }}</td>
                            <td>{{ $property->total_shares }}</td>
                            <td>{{ $property->hold_period }}</td>
                            <td>{{ $property->available_price }}</td>
                            <td>{{ $property->asset_management_fee_quarterly }}</td>
                            <td>{{ $property->interest_rate }}</td>
                            <td>{{ $property->title }}</td>
                            <td>{{ $property->description }}</td>
                            <td>{{ $property->created_at }}</td>
                            <td>{{ $property->updated_at }}</td> --}}
                            <td class="justify-content-center">
                                <a href="{{ route('admin.property.edit', $property->id) }}"
                                    class="btn btn-info btn-sm text-light">View</a>
                                <a href="{{ route('admin.property.edit', $property->id) }}"
                                    class="btn btn-success btn-sm text-light">Edit</a>
                                <form action="{{ route('admin.property.delete', $property->id) }}" method="POST"
                                    style="display:inline-block">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="submit" onclick="return confirm('Are you sure?')"
                                        class="btn btn-danger btn-sm text-light" value="Delete">
                                </form>
                            </td>
                        </tr>
                    @empty
                        <div class="display-3 text-center">No Properties Available</div>
                    @endforelse
                </tbody>
            </table>

        </div>
        {{ $properties->links() }}
    </div>
@endsection
