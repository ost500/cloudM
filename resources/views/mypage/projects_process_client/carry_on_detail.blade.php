@extends('layouts.carryon_detail_layout')
@section('right_content')
    <div class="tab-pane fade active in" id="project_tab1">
        @include('include.carry_on_detail_tab1')
    </div>
    <div class="tab-pane fade" id="project_tab2">
        @include('include.carry_on_detail_tab2')
    </div>
    <div class="tab-pane fade" id="project_tab3">
        <div id="communication_board"></div>
    </div>
    <div class="tab-pane fade" id="project_tab4">
        @if($loginUser->PorC == "C")
            @include('include.carry_on_detail_tab4_client')
        @else
            @include('include.carry_on_detail_tab4_partner')
        @endif
    </div>
    <script>

        function viewLoad() {
            var display_results = $("#communication_board");
            display_results.html("<img src={{ asset('images/ajax-loader.gif') }}>");

            $.ajax({
                url: '{{ route('communication',['p_id' => $project->id]) }}',

                success: function (result) {

                    display_results.html(result);

                }
            });
        }

        $(function(){
            viewLoad();
        });

    </script>
@endsection