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
import { BannerPage } from '../banner/banner';
import { APIService } from '../../app/provider/APIService';
import { AlertService } from '../../app/provider/AlertService';

@Component({
	selector: 'page-menu',
	templateUrl: 'menu.html',
	providers: [APIService, AlertService]
})
export class MenuPage {
    private pages;

	constructor(public navCtrl: NavController, statusBar: StatusBar, platform: Platform,
		private storage: Storage, private http: APIService, private alert: AlertService) {
		//this.alert.showLoading("Cargando..."); // activa el loading screen
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
			notification: NotificationPage,
			banner: BannerPage
        }
		if (this.storage.banners.first.extension == null) {
			this.http.get('banner/1', data => {
				this.storage.banners.first = data
				// this.alert.hideLoading();
				console.log(this.storage.banners.first);
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

	logout() {
		this.navCtrl.setRoot(LoginPage);
	}
}
