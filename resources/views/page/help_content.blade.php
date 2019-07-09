<style>
       
        .card {
          position: absolute;
          top: 50%;
          left: 50%;
          width: 300px;
          height: 300px;
          margin: -150px;
          float: left;
          perspective: 500px;
        }
    
        .content {
          position: absolute;
          width: 100%;
          height: 100%;
          box-shadow: 0 0 15px rgba(0,0,0,0.1);
          transition: transform 1s;
          transform-style: preserve-3d;
        }
    
        .card:hover .content {
          transform: rotateY( 180deg ) ;
          transition: transform 0.5s;
        }
    
        .front,
        .back {
          position: absolute;
          height: 100%;
          width: 100%;
          background: white;
          color: #F55;
          border-radius: 5px;
          backface-visibility: hidden;
        }
    
        .back {
          background: #F55;
          color: white;
          transform: rotateY( 180deg );
        }

        .rotate {
            animation-name: rotate ;
            animation-duration: 5s;
            animation-play-state: running;
            animation-timing-function: linear;
            animation-iteration-count: infinite;
            opacity: 1.0;filter: alpha(opacity=50);
            }
            img:hover {
            opacity: 1.0;
            filter: alpha(opacity=100);
            }
            @keyframes rotate{
            10% {transform:rotateY(36deg)}
            20% {transform:rotateY(72deg)}
            30% {transform:rotateY(108deg)}
            40% {transform:rotateY(144deg)}
            50% {transform:rotateY(180deg)}
            60% {transform:rotateY(216deg)}
            70% {transform:rotateY(252deg)}
            80% {transform:rotateY(288deg)}
            90% {transform:rotateY(324deg)}
            100% {transform:rotateY(360deg)}
}
    </style>


@extends('/master')
@section('content')


<div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                           
                        <h2> <img class="rotate" width="100px" src="{{asset('/frontend/img/logo.png')}}" />Cara Pemesanan</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container">
            <!-- Content here -->
            <div class="row">
            </div>
    </div>
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>

        <div class="container">
                <div class="row">
                  <div class="col-12">
                        <img width="100%" src="{{asset('/frontend/img/help1.png')}}" />
                  </div>
                  <div class="col">
                        <img width="100%" src="{{asset('/frontend/img/help2.png')}}" />
                  </div>
                </div>
               
              </div>
              <br><br><br> <br><br><br>
       
    </div>
   
    
@endsection