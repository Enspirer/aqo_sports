@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
    <div class="row">
        <div class="col">
            <div class="card" style="padding: 10px;">
                <table id="myTablePrihlasky" class="table table-hover table-bordered table-condensed ">
                    <thead>
                        <tr>
                            <th rowspan="2" class="titulka" style="width:30px">Final</th>
                            <th rowspan="2" class="titulka" style="width:50px">Place</th>
                            <th rowspan="2" class="titulka" style="width:70px">Country</th>
                            <th rowspan="2" class="titulka">Name/Club</th>
                            <th rowspan="2" class="titulka" style="width:50px; border-right:1px solid gray">Year</th>
                            @foreach($roundSection as $roundSectioenn)
                                <th colspan="{{count($markSection)}}" style="text-align:center; border-right:1px solid gray">
                                    {{$roundSectioenn}}
                                </th>
                            @endforeach

                            <th rowspan="2" class="titulka" style="width:50px ; border-right:1px solid gray">Score</th>
                        </tr>

                        <tr>
                            @foreach($roundSection as $roundSectioenn)
                                @foreach($markSection as $markSectionItem)
                                    <th class="titulka" style="width:50px">{{$markSectionItem}}</th>
                                @endforeach
                            @endforeach
                        </tr>
                    </thead>


                    <tbody id="tBodyFinale">
                        <tr>
                            <tr>
                                <td rowspan="2"></td>
                                <td rowspan="2" style="text-align:center;font-size:15px; ">1.</td>
                                <td rowspan="2"><img onerror="$(this).hide()" style="width:20px" src="flags/USA.png"> USA</td>
                                <td rowspan="2"><a href="gymnast.php?id=128845">Shen Catherine</a><br>Elite Rhythmics</td>
                                <td rowspan="2" style="text-align:center; border-right:1px solid gray;">2013<br>CB</td>

                                <td colspan="{{count($markSection)}}" style="text-align:center;font-size:12px; border-right:1px solid gray; "><b>10.250</b><div style="float:right; font-size:10px">(1)</div></td>
                                <td colspan="{{count($markSection)}}" style="text-align:center;font-size:12px; border-right:1px solid gray; "><b>9.800</b><div style="float:right; font-size:10px">(1)</div>
                                <td colspan="{{count($markSection)}}" style="text-align:center;font-size:12px; border-right:1px solid gray; "><b>9.800</b><div style="float:right; font-size:10px">(1)</div></td>

                            <td rowspan="2" style="text-align:center;font-size:14px; border-right:1px solid gray;"><b>20.050</b></td>
                                <tr>
                                    <td style="text-align:center;font-size:12px;">-</td>
                                    <td style="text-align:center;font-size:12px;">7.700</td>
                                    <td style="text-align:center;font-size:12px;">-</td>

                                    <td style="text-align:center;font-size:12px;">2.400</td>
                                    <td style="text-align:center;font-size:12px;">-</td>
                                    <td style="text-align:center;font-size:12px;">7.400</td>

                                    <td style="text-align:center;font-size:12px;">2.400</td>
                                    <td style="text-align:center;font-size:12px;">-</td>
                                    <td style="text-align:center;font-size:12px;">7.400</td>
                                </tr>
                            </tr>
                        </tr>
                    </tbody>
                </table>
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->
@endsection
