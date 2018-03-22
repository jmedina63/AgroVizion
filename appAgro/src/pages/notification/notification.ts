import { Component } from '@angular/core';
import { NavController, Platform } from 'ionic-angular';
import { Storage } from '../../app/provider/Storage';
import { StatusBar } from '@ionic-native/status-bar';
import { CreditAlertPage } from '../notification/credit/creditAlert';
import { MinistrationAlertPage } from '../notification/ministration/ministrationAlert';
import { MovementAlertPage } from '../notification/movement/movementAlert';

@Component({
	selector: 'page-notification',
	templateUrl: 'notification.html'
})
export class NotificationPage {
    private pages;

	constructor(public navCtrl: NavController, private statusBar: StatusBar, private platform: Platform, private storage: Storage) {
		platform.ready().then(() => {
			statusBar.backgroundColorByHexString("#1e5d24");
		});
        this.pages = {
            creditAlert: CreditAlertPage,
            ministrationAlert: MinistrationAlertPage,
            movementAlert: MovementAlertPage
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

    /**
    * Regresa a la pantalla anterior
    * @param  {pages} page [MenuPage]
    * @return {void}
    */
    back() {
        this.navCtrl.pop();
    }

}
