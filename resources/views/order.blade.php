@extends('layouts.app')

@section('content')
    <div class="content">

        <!-----Tab of main order page ------------------>
        <!-- <div class="main_tabs" style="display: flex;">
            <button id="tab_left_btn" class="divided underlined">
                <h3>Il tuo ordine (8)</h3>
            </button>
            <button id="tab_right_btn"class="divided">
                <h3>Ordine del gruppo (49)</h3>
            </button>
        </div> -->

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
