@extends(backpack_view('blank'))

@php
use App\Models\User; 
    $widgets['before_content'][] = [
        'type'        => 'jumbotron',
        'heading'     => /*trans('backpack::base.welcome'),;*/'Welcome',
        'content'     => /*trans('backpack::base.use_sidebar')*/'',
        'button_link' => backpack_url('logout'),
        'button_text' => trans('backpack::base.logout'),
    ];
@endphp

@section('content')
@endsection