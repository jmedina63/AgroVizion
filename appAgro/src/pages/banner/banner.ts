import { Component } from '@angular/core';
import { NavController, Platform } from 'ionic-angular';
import { Storage } from '../../app/provider/Storage';
import { StatusBar } from '@ionic-native/status-bar';
import { APIService } from '../../app/provider/APIService';
import { AlertService } from '../../app/provider/AlertService';

@Component({
	selector: 'page-banner',
	templateUrl: 'banner.html',
	providers: [APIService, AlertService]
})
export class BannerPage {
    private pages;

	constructor(public navCtrl: NavController, statusBar: StatusBar, platform: Platform,
		private storage: Storage, private http: APIService, private alert: AlertService) {
		this.alert.showLoading("Cargando..."); // activa el loading screen
		platform.ready().then(() => {
			statusBar.backgroundColorByHexString("#cf4d06");
		});
		if (this.storage.banners.second.extension == null) {
			this.http.get('banner/2', data => {
				this.storage.banners.second = data
				this.alert.hideLoading();
			});
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

	/**
	 * Opens modal window
	 * @return void
	 */
	sendInfo() {
		this.alert.showLoading("Cargando..."); // activa el loading screen
		let body = { // datos que se enviarán al webservice
			user: this.storage.user.id
		};

		this.http.post('sendinfo', body, data => {
			var dialog = document.querySelector("div.success-dialog");
			dialog.classList.remove("close");
			this.alert.hideLoading();
		});
	}

}
