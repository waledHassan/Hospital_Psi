@extends('dashboard.layouts.app')
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
                    Edit question                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
                            <a class="btn btn-brand btn-elevate btn-icon-sm" href="">Back</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body">


           <form method="post" action="{{ route('question.store') }}" enctype="multipart/form-data" id="user">
                <div class="m-portlet__body">
                    <div class="m-form__section m-form__section--first">
                        @csrf
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                               level
                            </label>
                            <div class="col-lg-6">
                                <select class="form-control" name="level_id" id="level_id">
                                    <option value="">Select Level</option>
                                    @foreach($levels->get() as $level)
                                    <option value="{{ $level->id }}">{{ $level->name }}</option>

                                @endforeach
                                </select>


                            </div>
                        </div>


                          <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                               Question title
                            </label>
                            <div class="col-lg-6">
                            <input type="text" name="name" class="form-control" required>
                            </div>
                        </div>

                         <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                               Audio
                            </label>
                            <div class="col-lg-6">
                            <input type="file" name="audio" class="form-control" required>
                            </div>
                        </div>

                          <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                               Image
                            </label>
                            <div class="col-lg-6 row">
                            <div class="col-lg-6">
                            <input type="file" name="answer[]" class="form-control" required>
                           </div>
                              <div class="col-lg-2">
                                Answer
                              </div>
                            <div class="col-lg-2">
                                <input type="radio" name="correct" value="1">
                            </div>
                             </div>

                        </div>
                             <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                               Image
                            </label>
                            <div class="col-lg-6 row">
                            <div class="col-lg-6">
                            <input type="file" name="answer[]" class="form-control" required>
                           </div>
                              <div class="col-lg-2">
                                Answer
                              </div>
                            <div class="col-lg-2">
                                <input type="radio" name="correct" value="2">
                            </div>
                             </div>

                        </div>

                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                               Image
                            </label>
                            <div class="col-lg-6 row">
                            <div class="col-lg-6">
                            <input type="file" name="answer[]" class="form-control" required>
                           </div>
                              <div class="col-lg-2">
                                Answer
                              </div>
                            <div class="col-lg-2">
                                <input type="radio" name="correct" value="3">
                            </div>
                             </div>

                        </div>


                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                               Image
                            </label>
                            <div class="col-lg-6 row">
                            <div class="col-lg-6">
                            <input type="file" name="answer[]" class="form-control" required>
                           </div>
                              <div class="col-lg-2">
                                Answer
                              </div>
                            <div class="col-lg-2">
                                <input type="radio" name="correct" value="4">
                            </div>
                             </div>

                        </div>


                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                               Image
                            </label>
                            <div class="col-lg-6 row">
                            <div class="col-lg-6">
                            <input type="file" name="answer[]" class="form-control" required>
                           </div>
                              <div class="col-lg-2">
                                Answer
                              </div>
                            <div class="col-lg-2">
                                <input type="radio" name="correct" value="5">
                            </div>
                             </div>

                        </div>

                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                               Max Time(sec)
                            </label>

                            <div class="col-lg-6">
                            <input type="number" name="timing" class="form-control" required>
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
                                       <button class="btn btn-success"><span>Create</span></button>
                                       <a href="{{ route('question.index') }}" class="btn btn-danger"><span>Cancel</span></a>

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
