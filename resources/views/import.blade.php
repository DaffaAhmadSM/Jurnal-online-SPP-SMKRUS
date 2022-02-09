<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}" dir="{{ config('backpack.base.html_direction') }}">

<head>
  @include(backpack_view('inc.head'))

</head>
<body class="{{ config('backpack.base.body_class') }}">
    @include(backpack_view('inc.main_header'))
    <div class="app-body">
        @include(backpack_view('inc.sidebar'))
        <main class="main pt-2">
            
            @yield('before_breadcrumbs_widgets')
            @includeWhen(isset($breadcrumbs), backpack_view('inc.breadcrumbs'))
     
            @yield('after_breadcrumbs_widgets')
     
            @yield('header')
            
     
             <div class="container-fluid animated fadeIn">
                 
     
               @yield('before_content_widgets')
               @yield('content')
               <div class="m-5">
                 <form action="{{route('importexcel')}}" method="POST" enctype="multipart/form-data">
                    <input class="form-control" type="file" accept=".xls,.xlsx" name="file" >
                    @csrf
                    <button type="submit" class="btn btn-primary m-4">Submit</button>
                </form>
                {{--         
                </div>
                
                <div class= "container">
                    <table class="table"> 
                        <tr class= "text-center">
                            <th>
                                Nama
                            </th>
                            <th>
                                NIS
                            </th>
                            <th>
                                kelas
                            </th>
                            <th>#</th>
                    
                        </tr>
                        @foreach ($siswas as $siswa)
                        <tr class="text-center">
                            <td>{{$siswa->nama}}</td>
                            <td>{{$siswa->nis}}</td>
                            <td>{{$siswa->kelas}}</td>
                            <td>
                                <form action="{{url('/delete/'.$siswa->id)}}" method="POST">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger" onclick="return confirm('Apa Anda yakin inging Menghapus Data?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                            
                        @endforeach
                    </table> --}}
                </div>
               @yield('after_content_widgets')
     
             </div>
             
             
         </main>
    </div>

    <footer class="{{ config('backpack.base.footer_class') }}">
        @include(backpack_view('inc.footer'))
      </footer>
    
      @yield('before_scripts')
      @stack('before_scripts')
    
      @include(backpack_view('inc.scripts'))
    
      @yield('after_scripts')
      @stack('after_scripts')
</body >
</html>