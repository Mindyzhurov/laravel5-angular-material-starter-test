class ActivityFormController{
    constructor(API, ToastService){
        'ngInject';

        //
        this.API = API;
        this.ToastService = ToastService;
        this.selInd = null;
        this.activities = [];
    }

    $onInit(){
        this.activities = [];

    }

    submit() {
        let data = {
            name: this.activity_name,
            description: this.description
        }

        this.API.all('activity/create').post(data).then((response) => {
            this.activities.push(response.data.activity);
        });
    }

    update() {
        if(this.selInd == null || !this.activities[this.selInd].done) {
            this.ToastService.show("You have to select Activity before update");
            return;
        }

        let item = this.activities[this.selInd];

        let data = {
            id: item.id, 
            name: this.activity_name,
            description: this.description
        }

        this.API.all('activity/update').post(data).then((response) => {                         
            this.activities[this.selInd] = response.data.activity;            
        });   
    }

    delete() {
        let ids = this.activities.filter((item) => {
            return item.done;
        }).map((item) => {
            return item.id;
        });
        
        if(ids.length <= 0) {
            this.ToastService.show("You have to select Activity before delete");
            return;
        }
        
        this.API.all('activity/delete').post({ids: ids}).then((response) => {
            this.activities = this.activities.filter((item) => {
                return response.indexOf(item.id) < 0;
            })
            this.ToastService.show(response);
        });      
    }

    setVal(item) {
        this.selInd = this.activities.indexOf(item);
        this.activity_name = item.name;
        this.description = item.description;
        item.done = !item.done;
    }

    initActivity() {
        this.API.all('activity/').post().then((response) => {
           this.activities = response.map((item) => {
            item.done = false;
            return item;
           });
        });
    }
}

export const ActivityFormComponent = {
    templateUrl: './views/app/components/activity_form/activity_form.component.html',
    controller: ActivityFormController,
    controllerAs: 'vm',
    bindings: {}
}
