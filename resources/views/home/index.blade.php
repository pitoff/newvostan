@extends('layouts.app')
@section('pageContent')

<div class="hero-wrap" style="background-image: url('/images/bg_2.jpg');" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="overlay-2"></div>
	<div class="container">
		<div class="row no-gutters slider-text justify-content-center align-items-center">
			<div class="col-lg-8 col-md-6 ftco-animate d-flex align-items-end">
				<div class="text text-center w-100">
					<h1 class="mb-4">Find Properties <br>That Make You Money</h1>
					<p><a href="#" class="btn btn-primary py-3 px-4">Search Properties</a></p>
				</div>
			</div>
		</div>
	</div>
	<div class="mouse">
		<a href="#" class="mouse-icon">
			<div class="mouse-wheel"><span class="ion-ios-arrow-round-down"></span></div>
		</a>
	</div>
</div>

<section class="ftco-section ftco-no-pb">
	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="search-wrap-1 ftco-animate">
					<form action="{{route('search')}}" method="GET" class="search-property-1">
						@csrf
						<div class="row">
							<div class="col-lg align-items-end">
								<div class="form-group">
									<label for="#">Location</label>
									<div class="form-field">
										<div class="icon"><span class="ion-ios-search"></span></div>
										<input type="text" name="state" class="form-control" placeholder="City/Locality Name">
									</div>
								</div>
							</div>

							<div class="col-lg align-self-end">
								<div class="form-group">
									<div class="form-field">
										<input type="submit" value="Search Property" class="form-control btn btn-primary">
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>
</section>
<section class="ftco-section goto-here">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12 heading-section text-center ftco-animate mb-5">
				<span class="subheading">What we offer</span>
				<h2 class="mb-2">Latest Offer For You</h2>
			</div>
		</div>
		<div class="row">

			@foreach ($properties as $property)
			<div class="col-md-4">
                <div class="property-wrap ftco-animate">
                    <a href="{{route('show', $property)}}">
                    <div class="img d-flex align-items-center justify-content-center" style="background-image: url('/properties/images/{{$property->image}}');">
                        <a href="{{route('show', $property)}}" class="icon d-flex align-items-center justify-content-center btn-custom">
                            <span class="ion-ios-eye"></span>
                        </a>
                        <div class="list-agent d-flex align-items-center">
                            <div class="tooltip-wrap d-flex">
                                <a href="" class="agent-info d-flex align-items-center">
                                    <h3 class="mb-0 ml-2">{{$property->user->email}}</h3>
                                </a>

                                @guest
                                    <a href="{{route('property.request', $property->title)}}" class="btn btn-primary icon-2 d-flex align-items-center justify-content-center" data-toggle="tooltip" data-placement="top" title="Request Property">
                                        <span class="ion-ios-mail"><i class="sr-only">Request</i></span>
                                    </a>

                                    <button type="submit" class="button btn btn-primary icon-2 d-flex align-items-center justify-content-center mx-2" data-toggle="tooltip" data-placement="top" title="Request by call">
                                        <span class="ion-ios-call" style="font-size: 18px;"><i class="sr-only">Call agent</i></span>
                                    </button>
                                @endguest

                            </div>
                        </div>
                    </div>
                    </a>
                    <div class="text">
                        <p class="price mb-3"><span class="orig-price">#@php echo number_format($property->price, 2) @endphp</span></p>
                        <h3 class="mb-0"><a href="">{{$property->title}}</a></h3>
                        <span class="location d-inline-block mb-3"><i class="ion-ios-pin mr-2"></i>{{$property->state}}, {{$property->address}}</span>
                        <ul class="property_list">
                            <li><span class="flaticon-bed"></span>{{$property->bedroom}}</li>
                            <li><span class="flaticon-bathtub"></span>{{$property->toilet}}</li>
                            <li><span class="flaticon-floor-plan"></span>{{$property->kitchen}}</li>
                        </ul>
                    </div>
                </div>
            </div>
			@endforeach

		</div>
	</div>
</section>

@endsection