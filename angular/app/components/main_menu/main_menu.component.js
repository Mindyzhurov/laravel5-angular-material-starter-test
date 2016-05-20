class MainMenuController{
    constructor(API, $location, ToastService){
        'ngInject';

        //
        this.$location = $location;
        this.API = API;
        this.ToastService = ToastService;
    }

    $onInit(){
        this.loggedUser = 'Admin';
        this.menus = [];
    }

    goPage(page) {
        this.$location.url("/"+page);
    }

    menuInit() {
        this.API.all('menu/getStatus').post({option: 'logged'}).then((response) => {
            //this.ToastService.show(response);
            this.menus = response;
        });
    }
}

export const MainMenuComponent = {
    templateUrl: './views/app/components/main_menu/main_menu.component.html',
    controller: MainMenuController,
    controllerAs: 'vm',
    bindings: {}
}
