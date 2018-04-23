import { Component } from '@angular/core';
import { NavController, Platform } from 'ionic-angular';
import { StatusBar } from '@ionic-native/status-bar';
import { CreditRequest } from '../credit/request/creditRequest';
import { Storage } from '../../app/provider/Storage';
import { APIService } from '../../app/provider/APIService';
import { AlertService } from '../../app/provider/AlertService';

@Component({
	selector: 'page-credit',
	templateUrl: 'credit.html',
	providers: [APIService, AlertService]
})
export class CreditPage {
    private pages;

	constructor(public navCtrl: NavController, private statusBar: StatusBar, private platform: Platform,
		private storage: Storage, private http: APIService, private alert: AlertService) {
		platform.ready().then(() => {
			statusBar.backgroundColorByHexString("#205d23");
		});
		this.alert.showLoading("Cargando..."); // activa el loading screen
        this.pages = {
            creditRequest: CreditRequest
        }
		this.http.get('credit/' + this.storage.user.id, data => {
			this.storage.credits = data;
			this.alert.hideLoading();
		});
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
	 * List credits
	 * @return {bool}
	 */
	public listCredits(callback) {
		this.http.get('credit/' + this.storage.user.id, data => {
			this.storage.credits = data;
			return callback(true);
		});
	}
}
