       @include('dashboard.include.header')


       {{-- Role Based Sidebar --}}
       @if (session()->has('default_sidebar') && !empty(session('default_sidebar')))
           {
           @include('dashboard.include.sidebar.' . session('default_sidebar'))
           }
           {{-- Default Sidebar --}}
       @else
           @include('dashboard.include.sidebar.sidebar')
       @endif

       <div class="page-wrapper">

           @yield('content')



       </div>


       </div>

       @include('dashboard.include.footer')
       @include('dashboard.include.script')


       @yield('script')

       </body>

       </html>
