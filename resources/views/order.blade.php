@extends('layouts.app')
<!-- ORDER-CONTENT -->
@section('content')
    <div class="content">
        <!-----Tab of main order page ------------------>
        
        <!-- Tab Navigation -->
        <ul class="nav nav-tabs justify-content-center" role="tablist">
            <li class="nav-item w-50" role="presentation">
                <button class="nav-link active w-100 position-relative" id="my-order-tab" data-bs-toggle="tab" data-bs-target="#my-order"
                    type="button" role="tab" aria-controls="my-order" aria-selected="true">
                    Il mio ordine
                    <span class="badge text-bg-danger">6</span>
                </button>
            </li>
            <li class="nav-item w-50" role="presentation">
                <button class="nav-link w-100" id="group-order-tab" data-bs-toggle="tab" data-bs-target="#group-order"
                    type="button" role="tab" aria-controls="group-order" aria-selected="false">
                    Ordine del gruppo
                    <span class="badge text-bg-secondary">27</span>
                </button>
            </li>
        </ul>


        <!---------------------------------------------->

        <div class="tab-content p-2">

            @include('partials.left_tab')

            @include('partials.right_tab')

        </div>
        
    </div>
@endsection
@section('footer_btns')
    <button id="btn_ordine_al_gruppo" type="button" class="btn btn-warning btn-lg w-100 mb-2">Invia Ordine al Gruppo</button>
    <button type="button" class="btn btn-secondary btn-lg w-100 mb-2">Indietro</button>
@endsection