import { Component } from '@angular/core';
import { NavController, Platform } from 'ionic-angular';
import { Storage } from '../../app/provider/Storage';
import { StatusBar } from '@ionic-native/status-bar';
import { SettingsPage } from '../settings/settings';
import { CreditPage } from '../credit/credit'
import { MinistrationPage } from '../ministration/ministration';
import { MovementPage } from '../movement/movement';
import { NoticePage } from '../notice/notice';
import { LoginPage } from '../login/login';
import { NotificationPage } from '../notification/notification';

@Component({
	selector: 'page-menu',
	templateUrl: 'menu.html'
})
export class MenuPage {
    private pages;

	constructor(public navCtrl: NavController, statusBar: StatusBar, platform: Platform, private storage: Storage) {
		platform.ready().then(() => {
			statusBar.backgroundColorByHexString("#205d23");
		});
        this.pages = {
            settings: SettingsPage,
            credit: CreditPage,
            ministration: MinistrationPage,
            movement: MovementPage,
            notice: NoticePage,
			login: LoginPage,
			notification: NotificationPage
        }
	}

    /**
    * Cambia de vista(pantallas)
    * @param  {pages} page [SettingsPage]
    * @return {void}
    */
	goTo(page) {
		this.navCtrl.push(page);
	}

	logout() {
		this.navCtrl.setRoot(LoginPage);
	}

}
