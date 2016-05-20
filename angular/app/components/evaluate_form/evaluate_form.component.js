class EvaluateFormController{
    constructor(API, ToastService, $location){
        'ngInject';

        this.API = API;
        this.ToastService = ToastService;
        this.$location = $location;

        this.contents = "Thank you for your help!";
        this.title = "This is a first Question";
        this.myValue = 50;
        this.question_id = 0;
    }

    submit() {
        var data = {
            question_id: this.question_id,
            answer: this.myValue
        };

        this.API.all('evaluate/create').post(data).then((response) => {
            this.toastService.show('Successfully Saved');
            
        });        
    }

    $onInit(){
        this.question = ''; 
        /*this.API.all('question/index').post({qindex: 1}).then((response) => {
            this.ToastService.show(response);
        });       */
    }

    getquestion() {

        let data = {
            qindex: 1
        };

        this.API.all('question/index').post(data).then((response) => {
            this.title = "Evaluating";
            
            if(response.success){
                this.contents = response.data.problem;
                this.question_id = response.data.id;

            }else{
                this.ToastService.show(response.data);
                this.$location.url('/');
            }
        });
    }
}

export const EvaluateFormComponent = {
    templateUrl: './views/app/components/evaluate_form/evaluate_form.component.html',
    controller: EvaluateFormController,
    controllerAs: 'vm',
    bindings: {}
}
