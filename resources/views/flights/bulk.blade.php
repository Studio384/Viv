@extends('layouts.app')
@section('title') Flights @endsection

@php
    $previous = null;
@endphp

@section('hero')
<div class="jumbotron">
    <div class="container">
        <h2>New flights</h2>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <form method="POST" action="{{ route('bulkStoreFlight') }}" class="row row-p-10">
            {{ csrf_field() }}
            <div class="col-md-5 col-4">
                <div class="form-group">
                    <input type="date" class="form-control" id="release" name="release" aria-describedby="release" placeholder="Date" value="{{ date('Y-m-d') }}">
                </div>
            </div>
            <div class="col-md-4 col-4">
                <div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="tweet" name="tweet" value="1" checked="checked"><label class="custom-control-label" for="tweet"> Tweet this</label></label></div>
            </div>
            <div class="col-md-3 col-4">
                <button type="submit" class="btn btn-primary btn-block"><i class="fal fa-fw fa-plus"></i> Add</button>
            </div>
            @foreach ($milestones as $milestone)
                <div class="col-12"><hr /></div>
                <div class="col-4">
                    <h4 style="color: #{{ $milestone->color }}"><i class="fab fa-fw fa-windows"></i> <span class="font-weight-bold">{{ $milestone->osname }} version {{ $milestone->version }}</span></h4>
                    <div class="form-group">
                        <input type="text" class="form-control" id="string[{{ $milestone->id }}]" name="string[{{ $milestone->id }}]" aria-describedby="build_string" placeholder="Build string" value="10.0.">
                    </div>
                </div>
                <div class="col-8">
                    <table class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col"><img src="{{ asset('img/platform/pc.png') }}" width="32px" class="img-fluid" alt="PC" /></th>
                                <th scope="col"><img src="{{ asset('img/platform/mobile.png') }}" width="32px" class="img-fluid" alt="Mobile" /></th>
                                <th scope="col"><img src="{{ asset('img/platform/xbox.png') }}" width="32px" class="img-fluid" alt="Xbox" /></th>
                                <th scope="col"><img src="{{ asset('img/platform/server.png') }}" width="32px" class="img-fluid" alt="Server" /></th>
                                <th scope="col"><img src="{{ asset('img/platform/holographic.png') }}" width="32px" class="img-fluid" alt="Holographic" /></th>
                                <th scope="col"><img src="{{ asset('img/platform/iot.png') }}" width="32px" class="img-fluid" alt="IoT" /></th>
                                <th scope="col"><img src="{{ asset('img/platform/team.png') }}" width="32px" class="img-fluid" alt="Team" /></th>
                                <th scope="col"><img src="{{ asset('img/platform/iso.png') }}" width="32px" class="img-fluid" alt="ISO" /></th>
                                <th scope="col"><img src="{{ asset('img/platform/sdk.png') }}" width="32px" class="img-fluid" alt="SDK" /></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row" class="text-right"><span class="label skip">Skip Ahead</span></th>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="flight[{{ $milestone->id }}][1][1]" name="flight[{{ $milestone->id }}][1][1]" {{ $milestone->pcSkip == '1' ? 'checked' : '' }} value="1">
                                        <label class="custom-control-label" for="flight[{{ $milestone->id }}][1][1]"></label>
                                    </div>
                                </td>
                                <td></td>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="flight[{{ $milestone->id }}][3][1]" name="flight[{{ $milestone->id }}][3][1]" {{ $milestone->xboxSkip == '1' ? 'checked' : '' }} value="1">
                                        <label class="custom-control-label" for="flight[{{ $milestone->id }}][3][1]"></label>
                                    </div>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-right"><span class="label fast">Fast</span></th>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="flight[{{ $milestone->id }}][1][2]" name="flight[{{ $milestone->id }}][1][2]" {{ $milestone->pcFast == '1' ? 'checked' : '' }} value="1">
                                        <label class="custom-control-label" for="flight[{{ $milestone->id }}][1][2]"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="flight[{{ $milestone->id }}][2][2]" name="flight[{{ $milestone->id }}][2][2]" {{ $milestone->mobileFast == '1' ? 'checked' : '' }} value="1">
                                        <label class="custom-control-label" for="flight[{{ $milestone->id }}][2][2]"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="flight[{{ $milestone->id }}][3][2]" name="flight[{{ $milestone->id }}][3][2]" {{ $milestone->xboxFast == '1' ? 'checked' : '' }} value="1">
                                        <label class="custom-control-label" for="flight[{{ $milestone->id }}][3][2]"></label>
                                    </div>
                                </td>
                                <td></td>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="flight[{{ $milestone->id }}][5][2]" name="flight[{{ $milestone->id }}][5][2]" {{ $milestone->holographicFast == '1' ? 'checked' : '' }} value="1">
                                        <label class="custom-control-label" for="flight[{{ $milestone->id }}][5][2]"></label>
                                    </div>
                                </td>
                                <td></td>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="flight[{{ $milestone->id }}][7][2]" name="flight[{{ $milestone->id }}][7][2]" {{ $milestone->teamFast == '1' ? 'checked' : '' }} value="1">
                                        <label class="custom-control-label" for="flight[{{ $milestone->id }}][7][2]"></label>
                                    </div>
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-right"><span class="label slow">Slow</span></th>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="flight[{{ $milestone->id }}][1][3]" name="flight[{{ $milestone->id }}][1][3]" {{ $milestone->pcSlow == '1' ? 'checked' : '' }} value="1">
                                        <label class="custom-control-label" for="flight[{{ $milestone->id }}][1][3]"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="flight[{{ $milestone->id }}][2][3]" name="flight[{{ $milestone->id }}][2][3]" {{ $milestone->mobileSlow == '1' ? 'checked' : '' }} value="1">
                                        <label class="custom-control-label" for="flight[{{ $milestone->id }}][2][3]"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="flight[{{ $milestone->id }}][3][3]" name="flight[{{ $milestone->id }}][3][3]" {{ $milestone->xboxSlow == '1' ? 'checked' : '' }} value="1">
                                        <label class="custom-control-label" for="flight[{{ $milestone->id }}][3][3]"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="flight[{{ $milestone->id }}][4][3]" name="flight[{{ $milestone->id }}][4][3]" {{ $milestone->serverSlow == '1' ? 'checked' : '' }} value="1">
                                        <label class="custom-control-label" for="flight[{{ $milestone->id }}][4][3]"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="flight[{{ $milestone->id }}][5][3]" name="flight[{{ $milestone->id }}][5][3]" {{ $milestone->holographicSlow == '1' ? 'checked' : '' }} value="1">
                                        <label class="custom-control-label" for="flight[{{ $milestone->id }}][5][3]"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="flight[{{ $milestone->id }}][6][3]" name="flight[{{ $milestone->id }}][6][3]" {{ $milestone->iotSlow == '1' ? 'checked' : '' }} value="1">
                                        <label class="custom-control-label" for="flight[{{ $milestone->id }}][6][3]"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="flight[{{ $milestone->id }}][7][3]" name="flight[{{ $milestone->id }}][7][3]" {{ $milestone->teamSlow == '1' ? 'checked' : '' }} value="1">
                                        <label class="custom-control-label" for="flight[{{ $milestone->id }}][7][3]"></label>
                                    </div>
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-right"><span class="label preview">Preview</span></th>
                                <td></td>
                                <td></td>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="flight[{{ $milestone->id }}][3][4]" name="flight[{{ $milestone->id }}][3][4]" {{ $milestone->xboxPreview == '1' ? 'checked' : '' }} value="1">
                                        <label class="custom-control-label" for="flight[{{ $milestone->id }}][3][4]"></label>
                                    </div>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-right"><span class="label release">Release Preview</span></th>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="flight[{{ $milestone->id }}][1][5]" name="flight[{{ $milestone->id }}][1][5]" {{ $milestone->pcReleasePreview == '1' ? 'checked' : '' }} value="1">
                                        <label class="custom-control-label" for="flight[{{ $milestone->id }}][1][5]"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="flight[{{ $milestone->id }}][2][5]" name="flight[{{ $milestone->id }}][2][5]" {{ $milestone->mobileReleasePreview == '1' ? 'checked' : '' }} value="1">
                                        <label class="custom-control-label" for="flight[{{ $milestone->id }}][2][5]"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="flight[{{ $milestone->id }}][3][5]" name="flight[{{ $milestone->id }}][3][5]" {{ $milestone->xboxReleasePreview == '1' ? 'checked' : '' }} value="1">
                                        <label class="custom-control-label" for="flight[{{ $milestone->id }}][3][5]"></label>
                                    </div>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-right"><span class="label targeted">Targeted</span></th>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="flight[{{ $milestone->id }}][1][6]" name="flight[{{ $milestone->id }}][1][6]" {{ $milestone->pcTargeted == '1' ? 'checked' : '' }} value="1">
                                        <label class="custom-control-label" for="flight[{{ $milestone->id }}][1][6]"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="flight[{{ $milestone->id }}][2][6]" name="flight[{{ $milestone->id }}][2][6]" {{ $milestone->mobileTargeted == '1' ? 'checked' : '' }} value="1">
                                        <label class="custom-control-label" for="flight[{{ $milestone->id }}][2][6]"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="flight[{{ $milestone->id }}][3][6]" name="flight[{{ $milestone->id }}][3][6]" {{ $milestone->xboxTargeted == '1' ? 'checked' : '' }} value="1">
                                        <label class="custom-control-label" for="flight[{{ $milestone->id }}][3][6]"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="flight[{{ $milestone->id }}][4][6]" name="flight[{{ $milestone->id }}][4][6]" {{ $milestone->serverTargeted == '1' ? 'checked' : '' }} value="1">
                                        <label class="custom-control-label" for="flight[{{ $milestone->id }}][4][6]"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="flight[{{ $milestone->id }}][5][6]" name="flight[{{ $milestone->id }}][5][6]" {{ $milestone->holographicTargeted == '1' ? 'checked' : '' }} value="1">
                                        <label class="custom-control-label" for="flight[{{ $milestone->id }}][5][6]"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="flight[{{ $milestone->id }}][6][6]" name="flight[{{ $milestone->id }}][6][6]" {{ $milestone->iotTargeted == '1' ? 'checked' : '' }} value="1">
                                        <label class="custom-control-label" for="flight[{{ $milestone->id }}][6][6]"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="flight[{{ $milestone->id }}][7][6]" name="flight[{{ $milestone->id }}][7][6]" {{ $milestone->teamTargeted == '1' ? 'checked' : '' }} value="1">
                                        <label class="custom-control-label" for="flight[{{ $milestone->id }}][7][6]"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="flight[{{ $milestone->id }}][8]" name="flight[{{ $milestone->id }}][8]" {{ $milestone->iso == '1' ? 'checked' : '' }} value="1">
                                        <label class="custom-control-label" for="flight[{{ $milestone->id }}][8]"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="flight[{{ $milestone->id }}][9]" name="flight[{{ $milestone->id }}][9]" {{ $milestone->sdk == '1' ? 'checked' : '' }} value="1">
                                        <label class="custom-control-label" for="flight[{{ $milestone->id }}][9]"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-right"><span class="label broad">Broad</span></th>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="flight[{{ $milestone->id }}][1][7]" name="flight[{{ $milestone->id }}][1][7]" {{ $milestone->pcBroad == '1' ? 'checked' : '' }} value="1">
                                        <label class="custom-control-label" for="flight[{{ $milestone->id }}][1][7]"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="flight[{{ $milestone->id }}][2][7]" name="flight[{{ $milestone->id }}][2][7]" {{ $milestone->mobileBroad == '1' ? 'checked' : '' }} value="1">
                                        <label class="custom-control-label" for="flight[{{ $milestone->id }}][2][7]"></label>
                                    </div>
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="flight[{{ $milestone->id }}][5][7]" name="flight[{{ $milestone->id }}][5][7]" {{ $milestone->holographicBroad == '1' ? 'checked' : '' }} value="1">
                                        <label class="custom-control-label" for="flight[{{ $milestone->id }}][5][7]"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="flight[{{ $milestone->id }}][6][7]" name="flight[{{ $milestone->id }}][6][7]" {{ $milestone->iotBroad == '1' ? 'checked' : '' }} value="1">
                                        <label class="custom-control-label" for="flight[{{ $milestone->id }}][6][7]"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="flight[{{ $milestone->id }}][7][7]" name="flight[{{ $milestone->id }}][7][7]" {{ $milestone->teamBroad == '1' ? 'checked' : '' }} value="1">
                                        <label class="custom-control-label" for="flight[{{ $milestone->id }}][7][7]"></label>
                                    </div>
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-right"><span class="label ltsc">LTSC</span></th>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="flight[{{ $milestone->id }}][1][8]" name="flight[{{ $milestone->id }}][1][8]" {{ $milestone->pcLTS == '1' ? 'checked' : '' }} value="1">
                                        <label class="custom-control-label" for="flight[{{ $milestone->id }}][1][8]"></label>
                                    </div>
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="flight[{{ $milestone->id }}][4][8]" name="flight[{{ $milestone->id }}][4][8]" {{ $milestone->serverLTS == '1' ? 'checked' : '' }} value="1">
                                        <label class="custom-control-label" for="flight[{{ $milestone->id }}][4][8]"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="flight[{{ $milestone->id }}][5][8]" name="flight[{{ $milestone->id }}][5][8]" {{ $milestone->holographicLTS == '1' ? 'checked' : '' }} value="1">
                                        <label class="custom-control-label" for="flight[{{ $milestone->id }}][5][8]"></label>
                                    </div>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @endforeach
        </form>
    </div>
</div>
@endsection