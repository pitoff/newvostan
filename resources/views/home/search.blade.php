@extends('layouts.app')
@section('pageContent')

<section class="ftco-section goto-here">
    	<div class="container">
    		<div class="row justify-content-center">
          <div class="col-md-12 heading-section text-center ftco-animate mb-5">
          	<span class="subheading">Search Results</span>
          </div>
        </div>
        <div class="row">
            @if($properties->count())
            @foreach($properties as $property)
        	<div class="col-md-4">
        		<div class="property-wrap ftco-animate">
        			<div class="img d-flex align-items-center justify-content-center" style="background-image: url(/images/work-1.jpg);">
        				<a href="properties-single.html" class="icon d-flex align-items-center justify-content-center btn-custom">
        					<span class="ion-ios-link"></span>
        				</a>
        				<div class="list-agent d-flex align-items-center">
        					<a href="#" class="agent-info d-flex align-items-center">
        						<div class="img-2 rounded-circle" style="background-image: url(/images/person_1.jpg);"></div>
        						<h3 class="mb-0 ml-2"></h3>
        					</a>
        					<div class="tooltip-wrap d-flex">
        						<a href="#" class="icon-2 d-flex align-items-center justify-content-center" data-toggle="tooltip" data-placement="top" title="Bookmark">
        							<span class="ion-ios-heart"><i class="sr-only">Bookmark</i></span>
        						</a>
        						<a href="#" class="icon-2 d-flex align-items-center justify-content-center" data-toggle="tooltip" data-placement="top" title="Compare">
        							<span class="ion-ios-eye"><i class="sr-only">Compare</i></span>
        						</a>
        					</div>
        				</div>
        			</div>
        			<div class="text">
        				<p class="price mb-3"><span class="old-price">800,000</span><span class="orig-price">$3,050<small>/mo</small></span></p>
        				<h3 class="mb-0"><a href="properties-single.html">{{$property->state}}</a></h3>
        				<span class="location d-inline-block mb-3"><i class="ion-ios-pin mr-2"></i>2854 Meadow View Drive, Hartford, USA</span>
        				<ul class="property_list">
        					<li><span class="flaticon-bed"></span>3</li>
        					<li><span class="flaticon-bathtub"></span>2</li>
        					<li><span class="flaticon-floor-plan"></span>1,878 sqft</li>
        				</ul>
        			</div>
        		</div>
        	</div>
            @endforeach
            @else

            <div class="container">
                <div class="row justify-content-center mt-4">
                    <div class="col-md-12 heading-section text-center ftco-animate">
                        
                        <span class="subheading" style="font-size: 20px;">No listing was found in {{$state}}</span>

                    </div>
                </div>
            </div>

            @endif
        	
        </div>
    	</div>
    </section>

@endsection