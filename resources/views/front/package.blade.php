<!DOCTYPE html>
<html lang="en">
    @include('frontLayouts.header')
        <div class="be-content">
            <div class="main-content container-fluid">
                <div class="row">
                    <div class="col-md-9">
                        <h1>{{ $package->name }}</h1>
                        <p style="font-size: 18px; line-height: 25px; font-weight: 200; color: #a0a0a0">
                            {{ $package->description }}
                        </p>
                        <br />
                    </div>
                    <div class="col-md-3">
                        <br />
                        <br />
                        <br />
                        <br />
                        @if($package->is_pdf == 1)
                        <a target="_blank" href="{{ secure_asset('storage/pdf/'.$package->pdf_file) }}"><button class="btn btn-default">Download Menu In PDF</button></a>
                        @endif
                    </div>
                </div>
                <div class="row">
                    @foreach($sets as $set)
                    <div class="col-md-4">

                        <div class="panel panel-default panel-package wrapper">
                            @if($set->featured == 1)
                                <div class="ribbon-wrapper-green"><div class="ribbon-green">featured</div></div>
                            @endif
                            @if($set->info == null || $set->info == '')

                            @else
                                <span class="top-info">{{ $set->info }}</span>
                            @endif

                            <div class="panel-heading text-center" style="color: white; background-image: url({{ asset('storage/set/'.$set->image) }}); background-size: cover; margin: 0 0px;">
                                <br />
                                <br />
                                <br />
                                <br />
                                <br />
                                <br />
                                <br />
                            </div>
                            <div class="panel-body text-center" style="
                            @if($set->featured == 1)
                                background-color: #BFDC7A;
                            @endif
                            ">
                                <span style="font-size: 20px;">RM {{ $set->price }}</span><sup> / pax</sup>
                                <span style="font-size: 20px; color: #DDD;">&nbsp; | &nbsp;</span>
                                <span style="font-size: 20px;">RM {{ number_format($set->price * 1.06,2) }}</span><sup> / GST</sup>
                                <br />
                                <span style="font-size: 15px;">{{ $set->courses }} Course | min {{ $set->min_pax }} Pax</sup>
                                <br />
                                <span style="font-size: 15px;">{{ $set->name }}</sup>
                                <br /><br />
                                <a href="{{ url('order/'.$package->slug.'/'.$set->slug) }}" class="btn btn-primary">Choose This Package</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    @include('frontLayouts.footer')   
    </body>
</html>