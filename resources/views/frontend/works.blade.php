@extends('layout.front')
@section('content')
    <section class="ico_breadcrumb_area">
        <h1><span>How It Works</span></h1>
    </section>
    <section class="Contact_area padding_140">
        <div class="custom_container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <video width="100%" height="100%" controls>
                        <source src="https://www.youtube.com/embed/Q-J6aRkB-6I" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function() {
    });
</script>
@endsection