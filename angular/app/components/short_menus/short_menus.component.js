class ShortMenusController{
    constructor($location){
        'ngInject';

        this.location = $location;
    }

    goPage(page) {
        this.location.url("/"+page);
    }
}

export const ShortMenusComponent = {
    templateUrl: './views/app/components/short_menus/short_menus.component.html',
    controller: ShortMenusController,
    controllerAs: 'vm',
    bindings: {}
}
