import { Component } from '@angular/core';
import { NavController, Platform } from 'ionic-angular';
import { StatusBar } from '@ionic-native/status-bar';
import { Storage } from '../../app/provider/Storage';
import { MinistrationMenuPage } from './menu/menu';
import { APIService } from '../../app/provider/APIService';
import { AlertService } from '../../app/provider/AlertService';

@Component({
	selector: 'page-ministration',
	templateUrl: 'ministration.html',
	providers: [APIService, AlertService]
})
export class MinistrationPage {
    private pages;

	constructor(public navCtrl: NavController, statusBar: StatusBar, platform: Platform,
		private storage: Storage, private http: APIService, private alert: AlertService) {
		this.alert.showLoading("Cargando..."); // activa el loading screen
		platform.ready().then(() => {
			statusBar.backgroundColorByHexString("#00497e");
		});
		this.pages = {
			ministrationMenu: MinistrationMenuPage
		}
		this.listOrders(() => {
			this.alert.hideLoading();
		})
	}

    /**
    * Cambia de vista(pantallas)
    * @param  {pages} page [SettingsPage]
    * @return {void}
    */
    goTo(page) {
        this.navCtrl.push(page, { "parent": this });
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
	 * Opens item extra information
	 * @return void
	 */
	openInfo(elem) {
		if (elem.nextElementSibling.classList.contains('hide')) {
		    elem.nextElementSibling.classList.remove('hide');
		} else {
			elem.nextElementSibling.classList.add('hide');
		}
	}

	/**
	 * List ministry orders
	 * @return {bool}
	 */
	public listOrders(callback) {
		this.http.get('ministryorders/' + this.storage.user.id, data => {
			this.storage.orders = data;
			return callback(true);
		});
	}
}
