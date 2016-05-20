class QuestionFormController{
    constructor(API, ToastService){
        'ngInject';

        //
        this.API = API;
        this.ToastService = ToastService;
    }

    $onInit(){
    }
}

export const QuestionFormComponent = {
    templateUrl: './views/app/components/question_form/question_form.component.html',
    controller: QuestionFormController,
    controllerAs: 'vm',
    bindings: {}
}
