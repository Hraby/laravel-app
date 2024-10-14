
<div class="card mt-5">
    <h2 class="card-header">Show Hotel</h2>
    <div class="card-body">

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary btn-sm" href="{{ route('dashboard.hotel.index') }}"><i class="fa fa-arrow-left"></i> Back</a>

        <div class="row mt-4">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <h3 class="namehotelu">Name:</h3> <br/>
                    {{ $hotel->name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Location:</strong> <br/>
                    {{ $hotel->location }}
                </div>
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

.namehotelu{
    position: relative;
    color: red;
    margin-top: 5%;
}

</style>