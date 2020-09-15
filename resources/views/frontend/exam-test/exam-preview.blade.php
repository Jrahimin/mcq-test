<div v-if="is_exam_completed" class="container-fluid" style="margin-top: 3%">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h3 class="text-center">Exam Review</h3>
            <ul class="list-group">
                <li class="list-group-item">
                    <span class="badge">@{{ exam_info_response.question_count }}</span>
                    Number of Question
                </li>
                <li class="list-group-item">
                    <span class="badge">@{{ exam_info_response.total_mark }}</span>
                    Total Mark
                </li>
                <li class="list-group-item">
                    <span class="badge badge-info" style="background-color: #12badc">@{{ exam_info_response.user_mark }}</span>
                    Your Mark
                </li>
                <li class="list-group-item">
                    <span class="badge badge-primary" style="background-color: rgba(23,196,49,0.62)">@{{ exam_info_response.correct_answer_count }}</span>
                    Correct Answer
                </li>
                <li class="list-group-item">
                    <span class="badge badge-danger" style="background-color: rgba(255,0,0,0.66)">@{{ exam_info_response.wrong_answer_count }}</span>
                    Wrong Answer
                </li>
            </ul>
        </div>
    </div>

    <div class="col-md-12">
        <h4 class="text-center text-danger">*Exam Preview and Ranking will be available in your profile after exam schedule is expired (at @{{ exam_info_response.expire_at }}). Please, check your profile for update.</h4>
    </div>

    {{--<hr>
    <div class="row">
        <div class="col-md-5 _question_m_p" style="padding: 2%; background-color: rgba(195,205,205,0.2);"
             v-for="question_response of question_list_response">
            <div class="accordion md-accordion accordion-blocks"
                 aria-multiselectable="true">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mt-1 mb-0" style="color: #00b44e; padding-left: 2%"
                            v-if="question_response.is_user_correct">
                            <i class="glyphicon glyphicon-ok"></i>
                            @{{ question_response.question }}
                        </h5>
                        <h5 class="mt-1 mb-0" v-if="!question_response.is_user_correct"
                            style="color: red; padding-left: 2%">
                            <i class="glyphicon glyphicon-remove"></i>
                            @{{ question_response.question }}
                        </h5>
                    </div>
                    <div class="card-body">
                        <ul v-if="question_response.user_option_id == question_response.correct_option_id">
                            <li v-for="option of question_response.options"
                                :style="{'background':question_response.user_option_id == option.option_id?'rgba(0,180,78,0.46)':'',margin:'1%'}">
                                @{{ option.option }}
                                <span v-if="question_response.user_option_id == option.option_id"
                                      class="pull-right" style="padding-right: 1%;color: green"><i
                                        class="glyphicon glyphicon-ok"></i></span>
                            </li>
                        </ul>
                        <ul v-else>
                            <li v-for="option of question_response.options"
                                :style="{'background':question_response.user_option_id == option.option_id?'rgba(239,10,41,0.53)':question_response.correct_option_id == option.option_id?'rgba(0,180,78,0.46)':'',margin:'1%'}">
                                @{{ option.option }}
                                <span v-if="question_response.correct_option_id == option.option_id"
                                      class="pull-right" style="padding-right: 1%; color: #00b44e"><i
                                        class="glyphicon glyphicon-ok"></i></span>
                                <span v-if="question_response.user_option_id == option.option_id"
                                      class="pull-right" style="padding-right: 1%; color: red"><i
                                        class="glyphicon glyphicon-remove"></i></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>--}}
    <div class="section-padding"></div>
</div>
