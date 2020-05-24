@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row mb-4">
		<div class="col-12">
			<div class="card text-center">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8 text-left">
                            Sucursal {{$address->branch }} del restaurante: {{ $address->restaurant->name }}
                        </div>

                        <div class="col-4 text-right">
                            <a type="button" class="btn btn-primary btn-sm" href="#">Something</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">

                </div>
            </div>
		</div>
	</div>

    <div class="row mb-4">
        <!-- carousel -->
        <div class="col-12">
            @if($address->getMedia('images')->isNotEmpty())
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach($address->getMedia('images') as $item => $slide)
                        <li data-target="#carouselExampleCaptions" data-slide-to="{{ $item }}" class="{{ $item == 0 ? 'active' : '' }}"></li>
                    @endforeach
                </ol>

                <div class="carousel-inner">
                    @foreach($address->getMedia('images') as $item => $slide)
                        <div class="carousel-item {{$item == 0 ? 'active' : '' }}">
                            <img src="{{ $slide->getUrl() }}">

                            <div class="carousel-caption d-none d-md-block">
                                <h5>Second slide label</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>
                    @endforeach

                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>

                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            @else
            <div class="alert alert-warning" role="alert">
                <h4 class="alert-heading">Aún no hay fotografías</h4>
                <p>Tu sucursal aún no cuenta con fotografías. Añade algunas para mostrar en la app.</p>
            </div>
            @endif
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-12">
            <form class="dropzone" id="my-awesome-dropzone" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="slug" value="{{ $address->slug }}">
            </form>
        </div>
    </div>
</div>
@endsection

@section('customscripts')
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.js"
    integrity="sha256-TxBZEzyejpRiJGwGwlBib+54vrf43qgGfk0pE9EYF1w="
    crossorigin="anonymous">
</script>

<script>
    $("#my-awesome-dropzone").dropzone({

        url: "/restaurant/photos/store",

        success: function(data){
            if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) {
                location.reload();
            }
        },
    });


</script>
@endsection
