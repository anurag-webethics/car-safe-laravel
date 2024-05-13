<!-- profile-home  -->
<div class="profile-home">
    <img src="{{ asset('images/banner/Rectangle 619.png') }}" alt="" height="100%" width="100%">
</div>

<!-- profile-home  -->

<!-- logout buttons -->
<div class="border-bottom">
    <div class="container ">
        <div class="py-4 d-flex logout justify-content-center gap-5">
            <p class="fs-5 text-secondary fw-small">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Molestie ultricies <br> pretium, enim id amet,
                dapibus sit nullam. Vel, facilisi interdum morbi id. </p>
            <div class="profile-btn-group d-flex gap-3" role="group" aria-label="Basic example">
                <button type="button" class="btn btn1 btn-primary border-0 fw-semibold rounded-0 btn-box"
                    onclick="window.location.href = '{{ route('profile') }}'">
                    Profile
                </button>
                <button type="button"
                    class="btn btn1 btn-light text-primary rounded-0 border-2 fw-bold border border-primary btn-box1"
                    onclick="window.location.href = '{{ route('album.gallery') }}'">Album</button>
                <button type="button"
                    class="btn btn-light rounded-0 text-primary fw-bold border-2 border border-primary btn-box1"
                    onclick="window.location.href = '{{ route('logout') }}'">Logout</button>
            </div>
        </div>
    </div>
</div>


<!-- logout buttons -->
