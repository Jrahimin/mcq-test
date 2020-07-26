<div class="container-fluid bg-light" v-if="!is_exam_completed" style="min-height: 725px">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-md-8"><strong><p class="text-info">Left @{{ parseInt(secLeft/60) }}
                                min:@{{secLeft%60}}sec</p></strong></div>
                    <div class="col-md-4"><p>Total Question: <span class="badge badge-primary">@{{ question_count }}</span>
                        </p>
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar"
                         :style="{width: percentOfTimeProgress+'%'}" aria-valuenow="100"
                         aria-valuemin="0" :aria-valuemax="percentOfTimeProgress"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-md-1" style="min-height: 100px;margin-top: 4%;">
                        <span class="label label-warning te" style="vertical-align: middle" id="qid">@{{ index+1 }}</span>
                    </div>
                    <div class="col-md-11">
                        <p v-if="questions[index] && questions[index].question">
                            @{{ questions[index].question}}
                        </p>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <div class="quiz" id="quiz" data-toggle="buttons"
                     v-if="questions[index] && questions[index].options">
                    <label :class="{...getRadioButtonClasses(option.option_id),'active':option.is_active}"
                           @click="answerHandle(option.option_id,i)"
                           v-for="(option,i) in questions[index].options">
                        <span class="btn-label"><i class="glyphicon glyphicon-chevron-right"></i></span>
                        <input type="radio" v-model="answers[index].option_id"
                               :value="option.option_id"
                        >@{{option.option}}
                    </label>
                </div>
            </div>
            <div class="modal-footer text-muted">
                <div class="row">
                    <div class="m-5 text-center">
                        <button class="btn btn-primary" @click="questionProcess(-1)" v-if="index>0"><i
                                class="fa fa-backward"></i> Previous
                        </button>
                        <button class="btn btn-primary" @click="answerSubmit()"
                                v-if="index === questions.length-1">
                            Submit
                        </button>
                        <button class="btn btn-primary" @click="questionProcess(1)"
                                v-else>
                            Next <i class="fa fa-forward"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
