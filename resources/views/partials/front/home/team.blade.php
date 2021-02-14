
<section class="section-team-list team-1" style="background-image: url(images/bg1-team.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center theratio-align-center">
                <div class="ot-heading is-dots">
                    <span>[ our professionals ]</span>
                    <h2 class="main-heading">Meet Our Skilled Team</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="team-slider owl-theme owl-carousel">
                @foreach($teams as $team)
                <div class="team-item">
                    <div class="team-wrap">
                        <div class="team-thumb">
                            <img src="{{ asset('storage/' . $team->image ) }}" alt="{{ $team->name }}" />
                        </div>
                        <div class="team-text-overlay">
                            <div class="team-info dtable">
                                <div class="dcell">
                                    <h4 class="m_name">{{ $team->name }}</h4>
                                    <div class="team-social flex-middle">
                                        <span class="ot-flaticon-add"></span>
                                        <a href="https://twitter.com"><i class="fab fab fa-twitter"></i></a>
                                        <a href="https://linkedin.com"><i class="fab fab fa-linkedin-in"></i></a>
                                        <a href="https://instagram.com"><i class="fab fab fa-instagram"></i></a>
                                    </div>
                                </div>
                                <div class="m_extra">
                                    <span>{{ $team->role }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
