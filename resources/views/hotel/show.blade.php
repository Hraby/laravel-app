    <div class="maskovanidiv"></div>
    <div class="vsechnoinside"></div>


<div class="card mt-5">
    <div class="card-body">

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a id="krokzpatky" class="btn btn-primary btn-sm" href="{{ route('dashboard.hotel.index') }}">◀ Zpět</a>
            <text class="searchtext">Search</text>
            <div class="kostkamezitexty"></div>
            <text class="detailstext">Details</text>


        <div class="row mt-4">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <h3 class="namehotelu">The Marlton Hotel Suites</h3> <br/> <!-- ZDE NÁZEV HOTELU -->
                    {{ $hotel->name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <text class="locationmaintext">Phoenix Street, Northern NYC</text> <br/> <!-- ZDE ADRESA HOTELU -->
                    <text class="locationmaintexthodnoceni">⭐ 5</text> <br/>
                    {{ $hotel->location }}
                </div>

            <img class="obrazeknamain" src="https://the-marlton-hotel.hotels-innewyork.com/data/Pictures/700x500w/6824/682448/682448805/picture-new-york-the-marlton-hotel-1.JPEG"></img>


                <div class="form-group">
                    <strong>Descriptions:</strong> <br/>
                    {{ $hotel->description }}
                </div>
                <div class="form-group">
                    <strong>Rating:</strong> <br/>
                    {{ $hotel->rating }}
                </div>
            </div>
        </div>

    </div>
</div>








<style>

@import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

*{
    font-family: "Roboto", sans-serif !important;
}

.maskovanidiv{
        position: fixed;
        width: 100%;
        height: 100vh;
        margin-left: -0.5%;
        margin-top: -0.5%;
        text-align: center;
        z-index: 1 !important;
        background-color: white;
    }
    
    .vsechnoinside{
        border: 4px solid #138d75;
        border-radius: 20px;
        position: fixed;
        width: 90%;
        margin-left: 4.5%;
        height: 80vh;
        margin-top: 7%;
        text-align: center;
        z-index: 1 !important;
        box-shadow: 10px 10px 5px #b2babb;
    }

    .maskovamainside{
        position: fixed;
        width: 100%;
        height: 15vh;
        margin-left: -0.5%;
        margin-top: -0.5%;
        z-index: 998 !important;
        background-color: white;

    }

    .maskovamainsidefooter{
        position: fixed;
        width: 100%;
        height: 4.5vh;
        margin-left: -0.5%;
        top: 95.5%;
        z-index: 998 !important;
        background-color: white;

    }


    #krokzpatky{
        color: black !important;
        z-index: 3 !important;
        position: absolute;
        margin-top: 9%;
        margin-left: 8%;
        font-size: 20px;
        font-weight: bold;
        z-index: 10;
        text-decoration: none;
        width: 5%;
        height: 4%;
        background-color: #eaeaea;
        border: none;
        border-radius: 10px;
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 15px;
    }


    .searchtext{
        color: #bfbfbf;
        z-index: 3 !important;
        position: absolute;
        margin-top: 9.25%;
        margin-left: 14%;
        font-size: 20px;
        font-weight: bold;
        z-index: 10;
        font-size: 20px;
        cursor: pointer;
    }



    .kostkamezitexty{
        background-color: #4c4c4c;
        z-index: 3 !important;
        position: absolute;
        margin-top: 9.7%;
        margin-left: 18.75%;
        z-index: 10;
        cursor: pointer;
        height: 0.8%;
        width: 0.8%;
        border-radius: 2px;
        opacity: 0.75;
    }


    .detailstext{
        color: #4c4c4c;
        z-index: 3 !important;
        position: absolute;
        margin-top: 9.25%;
        margin-left: 21%;
        font-size: 20px;
        font-weight: bold;
        z-index: 10;
        font-size: 20px;
        cursor: pointer;
    }

    .namehotelu{
        color: black !important;
        z-index: 3 !important;
        position: absolute;
        margin-top: 13%;
        margin-left: 8%;
        font-weight: bold;
        z-index: 10;
        font-size: 35px;
    }


    .locationmaintext{
        color: #6d6d6d !important;
        z-index: 3 !important;
        position: absolute;
        margin-top: 14%;
        margin-left: 8%;
        font-size: 20px;
        font-weight: 300;
        z-index: 10;
        font-size: 25px;
    }


    .locationmaintexthodnoceni{
        color: black !important;
        z-index: 3 !important;
        position: absolute;
        margin-top: 12.85%;
        margin-left: 26%;
        font-size: 20px;
        font-weight: bold;
        z-index: 10;
        font-size: 22px;
    }



    .obrazeknamain{
        position: absolute;
        width: 63vh;
        height: 45%;
        margin-left: 8%;
        margin-top: 15%;
        z-index: 1 !important;
        border-radius: 10px;
    }
















































</style>