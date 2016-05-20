class GroupManagerController{
    constructor(API, ToastService){
        'ngInject';

        //
        this.API = API;
        this.ToastService = ToastService;
    }

    $onInit(){
    }

    submit() {
        var data = {
            name: this.myval
        };

        this.API.all('group/create').post(data).then((response) => {
            this.ToastService.show(response);
        });
    }


}

export const GroupManagerComponent = {
    templateUrl: './views/app/components/group_manager/group_manager.component.html',
    controller: GroupManagerController,
    controllerAs: 'vm',
    bindings: {}
}
