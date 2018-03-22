import { Component } from '@angular/core';
import { NavController, Platform } from 'ionic-angular';
import { Storage } from '../../app/provider/Storage';
import { StatusBar } from '@ionic-native/status-bar';
import { LoginPage } from '../login/login';
import { LocationPage } from '../location/location';
import { APIService } from '../../app/provider/APIService';
import { AlertService } from '../../app/provider/AlertService';

@Component({
	selector: 'page-settings',
	templateUrl: 'settings.html',
	providers: [APIService, AlertService]
})
export class SettingsPage {
	private pages;

	constructor(private navCtrl: NavController, private statusBar: StatusBar, private platform: Platform,
				private http: APIService, private alert: AlertService, private storage: Storage) {
		platform.ready().then(() => {
			statusBar.backgroundColorByHexString("#1e5d24");
		});
		this.pages = {
			location: LocationPage
		}
	}

	/**
	* Regresa a la pantalla anterior
	* @param  {pages} page [MenuPage]
	* @return {void}
	*/
	back() {
		this.navCtrl.pop();
	}

    logout() {
        this.navCtrl.setRoot(LoginPage);
    }

	/**
    * Cambia de vista(pantallas)
    * @param  {pages} page [LocationPage]
    * @return {void}
    */
	goTo(page) {
		this.navCtrl.push(page);
	}

	/**
	 * Show the notice of privacy of the app
	 * @return {void}
	 */
	noticePrivacy() {
		this.http.get('privacyadvice', data => {
			if (data.hasOwnProperty("title")) {
			    this.alert.showMessage(data.title, data.description);
			} else {
				this.alert.showMessage("Error", data.error);
			}
		});
	}
}
