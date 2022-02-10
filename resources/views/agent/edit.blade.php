@extends('layouts.app')
@section('pageContent')


<section class="ftco-section contact-section">
    <h2 class="mb-2 justify-content-center" style="text-align: center;">Update {{$property->p_type}} Listing</h2>
    <div class="container">

        <div class="row block-9 justify-content-center mb-5">
            <div class="col-md-6 align-items-stretch d-flex">

                <form action="{{route('edit', $property)}}" method="POST" enctype="multipart/form-data" class="bg-light p-5 contact-form">
                    @csrf @method('PUT')
                    <div class="property-details">
                        <div class="img rounded" style="background-image: url('/properties/images/{{$property->image}}'); height:300px;">
                        </div>
                    </div>

                    <div class="form-group">Image:</br>
                        <input type="File" name="image">
                        @error('image')
                            <em class="text-danger">{{$message}}</em>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="name" name="title" value="{{old('title', $property->title)}}" class="form-control" placeholder="Property Title">
                        @error('title')
                            <em class="text-danger">{{$message}}</em>
                        @enderror
                    </div>

                    <div class="form-group">Property type:
                        <select name="type" id="" class="form-control">
                            <option value="{{$property->p_type}}">{{$property->p_type}}</option>
                            <option value="commercial">Commercial</option>
                            <option value="office">Office</option>
                            <option value="residential">Residential</option>
                            <option value="villa">Villa</option>
                            <option value="land">Land</option>
                            <option value="apartment">Apartment</option>
                        </select>
                        @error('type')
                            <em class="text-danger">{{$message}}</em>
                        @enderror
                    </div>

                    <div class="form-group">Property For:
                        <select name="for" id="" class="form-control">
                            <option value="{{$property->p_for}}">{{$property->p_for}}</option>
                            <option value="sale">Sale</option>
                            <option value="rent">Rent</option>
                        </select>
                        @error('for')
                            <em class="text-danger">{{$message}}</em>
                        @enderror
                    </div>

                    <div class="form-group">
                        <select name="state" id="state" value="" onchange="toggleLGA(this)" class="form-control">
                            <option value="{{$property->p_state}}" selected="selected">{{$property->state}}</option>
                            <option value="Abia">Abia</option>
                            <option value="Adamawa">Adamawa</option>
                            <option value="AkwaIbom">AkwaIbom</option>
                            <option value="Anambra">Anambra</option>
                            <option value="Bauchi">Bauchi</option>
                            <option value="Bayelsa">Bayelsa</option>
                            <option value="Benue">Benue</option>
                            <option value="Borno">Borno</option>
                            <option value="Cross River">Cross River</option>
                            <option value="Delta">Delta</option>
                            <option value="Ebonyi">Ebonyi</option>
                            <option value="Edo">Edo</option>
                            <option value="Ekiti">Ekiti</option>
                            <option value="Enugu">Enugu</option>
                            <option value="FCT">FCT</option>
                            <option value="Gombe">Gombe</option>
                            <option value="Imo">Imo</option>
                            <option value="Jigawa">Jigawa</option>
                            <option value="Kaduna">Kaduna</option>
                            <option value="Kano">Kano</option>
                            <option value="Katsina">Katsina</option>
                            <option value="Kebbi">Kebbi</option>
                            <option value="Kogi">Kogi</option>
                            <option value="Kwara">Kwara</option>
                            <option value="Lagos">Lagos</option>
                            <option value="Nasarawa">Nasarawa</option>
                            <option value="Niger">Niger</option>
                            <option value="Ogun">Ogun</option>
                            <option value="Ondo">Ondo</option>
                            <option value="Osun">Osun</option>
                            <option value="Oyo">Oyo</option>
                            <option value="Plateau">Plateau</option>
                            <option value="Rivers">Rivers</option>
                            <option value="Sokoto">Sokoto</option>
                            <option value="Taraba">Taraba</option>
                            <option value="Yobe">Yobe</option>
                            <option value="Zamfara">Zamafara</option>
                        </select>
                        @error('state')
                            <em class="text-danger">{{$message}}</em>
                        @enderror
                    </div>
                    <div class="form-group">
                        <select name="lga" id="lga" value="" class="form-control lga-select">

                        </select>
                        @error('lga')
                            <em class="text-danger">{{$message}}</em>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" name="address" value="{{old('address', $property->address)}}" class="form-control" placeholder="Address">
                        @error('address')
                            <em class="text-danger">{{$message}}</em>
                        @enderror
                    </div>
                    <div class="form-group">
                        <textarea name="description" id="" cols="30" rows="5" class="form-control" placeholder="Description">{{old('description', $property->description)}}</textarea>
                        @error('description')
                            <em class="text-danger">{{$message}}</em>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" name="price" value="{{old('price', $property->price)}}" class="form-control" placeholder="Price">
                        @error('price')
                            <em class="text-danger">{{$message}}</em>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="number" name="bedroom" value="{{old('bedroom', $property->bedroom)}}" class="form-control" placeholder="Bedroom">
                        @error('bedroom')
                            <em class="text-danger">{{$message}}</em>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="number" name="toilet" value="{{old('toilet', $property->toilet)}}" class="form-control" placeholder="Toilet">
                        @error('toilet')
                            <em class="text-danger">{{$message}}</em>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="number" name="kitchen" value="{{old('kitchen', $property->kitchen)}}" class="form-control" placeholder="Kitchen">
                        @error('kitchen')
                            <em class="text-danger">{{$message}}</em>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Submit" class="btn btn-primary py-3 px-5">
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>

 @endsection