@extends("layouts/app")

@section("content")
    <div style="width: 500px; height: 500px;">
        {!! Mapper::render() !!}

    </div>
    <div>
    	<!-- <div class="form-group">
		    <label for="address_address">Address</label>
		    <input type="text" id="address-input" name="address_address" class="form-control map-input">
		    <input type="text" disabled="disabled" name="address_latitude" id="address-latitude" value="0" />
		    <input type="text" disabled="disabled" name="address_longitude" id="address-longitude" value="0" />
		</div>
		<div id="address-map-container" style="width:100%;height:400px; ">
		    <div style="width: 100%; height: 100%" id="address-map"></div>
		</div> -->

    </div>
@endsection

@section('scripts')
    @parent
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key= AIzaSyAoc-0KyTT_omcbaziRUR_bVODSdqlJ0mg&libraries=places&callback=initialize" async defer></script>
    <script src="{{ asset('js/mapInput.js') }}"></script> -->
@stop