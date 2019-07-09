<style>

    body {
        background: #222;
        font-style= 'calibri';
    }

    .card {
        position: absolute;
        top: 35%;
        left: 43%;
        width: 520px;
        height: 520px;
        margin: -150px;
        float: left;

    }

    .content {
        position: absolute; 
        width: 100%;
        height: 100%;
        box-shadow: 0 0 15px rgba(0,1,1,0.1);
        transition: transform 1s;
        transform-style: preserve-3d;
    }

    .card:hover .content {
        transform: rotateY(180deg);
        transition: transform 0.5s;
    }

    .back,
    .front {
        position: absolute;
        height: 100%;
        width: 100%;
        background: white;

        border-radius: 5px;
        backface-visibility: hidden;
    }

    .back {
        background: #222;
        color: white;
        transform: rotateY(180deg);
    }
</style>

<div class="single-product-area">

    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>

            <div class="card">
                <div class="content">
                    <div class="front">
                        <center>
                            <h1>Terimakasih</h1>

                            
                            <p>Silakan lakukan pembayaran melalui rekening berikut</p>
                            <p>Dan lakukan konfirmasi pembayaran ke email: <b>admin@herbshop.com</b> 
                            <img
                            src="{{asset('/frontend/img/bank.png')}}"
                            style="margin-top:0; font-style='calibri;'"
                            width="500px"
                            alt="">
                        </div>
                        <div class="back">
                            <a href="{{URL('/index')}}">
                                <center>
                                    <img
                                        src="{{asset('/frontend/img/home.png')}}"
                                        style="margin-top:190px; font-style='calibri;'"
                                        width="50px"
                                        alt=""></a>
                                    <p style="font-style='calibri'; font-size:20px; ">back to home</p>

                                </center>

                            </div>
                        </div>
                    </div>