<!-- Slider -->
<div class="rev-slider">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="carousel-example-generic" class="carousel slide"
                     data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($slide as $key => $image)
                            @if ($key == 0)
                                <div class="item active">
                                    <img src="{{ asset($image->image_slider) }}" 
                                        class="img-product">
                                    <div class="carousel-caption"></div>
                                </div>
                            @else
                                <div class="item">
                                    <img src="{{ asset($image->image_slider) }}" 
                                        class="img-product">
                                    <div class="carousel-caption"></div>
                                </div>
                            @endif
                        @endforeach
                    </div> <!-- .carousel-inner -->
                    <a class="left carousel-control"
                       href="#"
                       data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span> 
                        </a>
                    <a class="right carousel-control"
                       href="#"
                       data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span> 
                        </a>
                    <ol class="carousel-indicators">
                        @foreach ($slide as $key => $image)
                            @if ($key == 0)
                                <li data-target="#carousel-example-generic" 
                                    data-slide-to="{{ $key }}" class="active">
                                    </li>
                            @else
                                <li data-target="#carousel-example-generic" 
                                    data-slide-to="{{ $key }}"></li>
                            @endif
                        @endforeach
                    </ol>
                </div> <!-- .slide -->
            </div> <!-- .col-md-12 -->
        </div> <!-- .row -->
    </div> <!-- End container -->
</div> <!-- End rev-slider -->
<!-- End Slider -->