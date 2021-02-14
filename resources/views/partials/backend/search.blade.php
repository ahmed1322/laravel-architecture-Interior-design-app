<ul class="navbar-nav flex-row ml-auto d-flex list-unstyled topnav-menu float-right mb-3">
    <li class="d-none d-sm-block">
        <div class="app-search">
            <form method="GET" action="{{url()->current()}}">
                <div class="input-group">
                    <input
                        type="text"
                        name="search"
                        value="{{ request()->query('search')  }}"
                        class="form-control form-control-lg"
                        placeholder="Search...">
                    <button class="btn btn btn-success ml-3" id="api_search" type="submit">Search</button>
                </div>
            </form>
        </div>
    </li>
</ul>
