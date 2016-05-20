import {QuestionFormComponent} from './app/components/question_form/question_form.component';
import {ActivityFormComponent} from './app/components/activity_form/activity_form.component';
import {MainMenuComponent} from './app/components/main_menu/main_menu.component';
import {EvaluateFormComponent} from './app/components/evaluate_form/evaluate_form.component';
import {ShortMenusComponent} from './app/components/short_menus/short_menus.component';
import {GroupManagerComponent} from './app/components/group_manager/group_manager.component';
import {ResetPasswordComponent} from './app/components/reset-password/reset-password.component';
import {ForgotPasswordComponent} from './app/components/forgot-password/forgot-password.component';
import {LoginFormComponent} from './app/components/login-form/login-form.component';
import {RegisterFormComponent} from './app/components/register-form/register-form.component';

angular.module('app.components')
	.component('questionForm', QuestionFormComponent)
	.component('activityForm', ActivityFormComponent)
	.component('mainMenu', MainMenuComponent)
	.component('evaluateForm', EvaluateFormComponent)
	.component('shortMenus', ShortMenusComponent)
	.component('groupManager', GroupManagerComponent)
	.component('resetPassword', ResetPasswordComponent)
	.component('forgotPassword', ForgotPasswordComponent)
	.component('loginForm', LoginFormComponent)
	.component('registerForm', RegisterFormComponent);

