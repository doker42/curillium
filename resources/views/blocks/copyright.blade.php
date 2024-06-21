

<!-- Copyright Section-->
<div class="copyright py-4 text-center text-grey bg-grey1">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-4 mb-5 mb-lg-0 bottom-block">
                <h5 class="text-uppercase mb-4">Location</h5>
                <p class="lead mb-0">
                    <br>
                    {{$links['location']}}
                </p>
            </div>

            <div class="col-lg-4 mb-5 mb-lg-0 bottom-block">
                <h5 class="text-uppercase mb-4">I am in ...</h5>

                <a class="btn btn-social mx-1 grey1" href="{{$links['linkedin']}}">
                    <i class="fab fa-fw fa-linkedin-in"  style='font-size:30px;'></i>
                </a>

                <a class="btn btn-social mx-1 grey1" href="{{$links['git']}}">
                    <i class="fab fa-fw fa-github"  style='font-size:30px;'></i>
                </a>

            </div>

            <div class="col-lg-4 mb-5 mb-lg-0 bottom-block">
                <h5 class="text-uppercase mb-4">Contacts</h5>
                <p class="lead mb-0">
                    Skype: {{$links['skype']}}
                    <br />
                    Phone: {{$links['phone']}}
                </p>
            </div>

        </div>
    </div>
    <div class="container">
        <small>
            <a class="text-grey" href="#">
                {{$links['domain']}}
            </a>
        </small>
    </div>
</div>

