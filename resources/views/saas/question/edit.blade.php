@extends('saas.layouts.app')
@section('content')
@inject('levels','\App\Models\Level' )
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon2-line-chart"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                    Edit question </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        <a class="btn btn-brand btn-elevate btn-icon-sm"
                            href="{{ route('saas.question.index') }}">Back</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">


            <form method="post" action="{{ route('saas.question.update',$question) }}" enctype="multipart/form-data"
                id="user">
                <input type="hidden" name="_method" value="PUT">
                @csrf
                <div class="m-portlet__body">
                    <div class="m-form__section m-form__section--first">
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                level
                            </label>
                            <div class="col-lg-6">
                                <select class="form-control" name="level_id" id="level_id">
                                    <option value="">Select Level</option>
                                    @foreach($levels->get() as $level)
                                    <option value="{{ $level->id }}" {{ ($question->level_id == $level->id) ?
                                        'selected': '' }}>{{ $level->name }}</option>

                                    @endforeach
                                </select>


                            </div>
                        </div>


                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Question title
                            </label>
                            <div class="col-lg-6">
                                <input type="text" name="name" value="{{ $question->name }}" class="form-control"
                                    >
                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Audio
                            </label>
                            <div class="col-lg-6">
                                <input type="file" name="audio" class="form-control" >
                            </div>
                            <audio controls>
                                <source src="{{ $question->audio }}" type="audio/mp3">
                            </audio>
                        </div>
                        @php $count = 1; @endphp

                        @foreach ($question->answers as $item)


                        <div class="col-md-2 col-xs-4 pd-0-5">
                            <div class="our-services-box">
                                <div class="img-box">
                                    <img src="{{ $item->answer }}" class="full-width-home" height="100px" width="100px">
                                    @if($item->correct_answer)
                                    <div class="badge badge-success checkmark-center"> <i
                                            class="flaticon2-checkmark"></i></div>
                                    @endif
                                </div>

                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Image
                            </label>
                            <div class="col-lg-6 row">
                                <div class="col-lg-6">
                                    <input type="file" name="answer[]" class="form-control" >
                                </div>
                                <div class="col-lg-2">
                                    Answer
                                </div>
                                <div class="col-lg-2">
                                    <input type="radio" name="correct" value="{{ $count }}" {{ ($item->correct_answer >
                                    0) ? 'checked="checked"' : '' }}>
                                </div>
                            </div>

                        </div>
                        @php $count++; @endphp

                        @endforeach



                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                Max Time(sec)
                            </label>

                            <div class="col-lg-6">
                                <input type="number" name="timing" value="{{ $question->timing }}" class="form-control"
                                    >
                            </div>

                        </div>

                    </div>
                </div>

                <div class="m-portlet__foot m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions">
                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-6">

                                <div class="offset-md-4">
                                    <button class="btn btn-success"><span>update</span></button>
                                    <a href="{{ route('saas.question.index') }}"
                                        class="btn btn-danger"><span>Cancel</span></a>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
        <!--end::Portlet-->
    </div>
</div>
@stop
@section('script')
<script type="text/javascript">
    $("#user").validate();
</script>
@stop