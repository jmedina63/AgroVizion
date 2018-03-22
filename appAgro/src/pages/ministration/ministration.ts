import { Component } from '@angular/core';
import { NavController, Platform } from 'ionic-angular';
import { StatusBar } from '@ionic-native/status-bar';
import { MinistrationMenuPage } from './menu/menu';

@Component({
	selector: 'page-ministration',
	templateUrl: 'ministration.html'
})
export class MinistrationPage {
    private pages;

	constructor(public navCtrl: NavController, statusBar: StatusBar, platform: Platform) {
		platform.ready().then(() => {
			statusBar.backgroundColorByHexString("#00497e");
		});
		this.pages = {
			ministrationMenu: MinistrationMenuPage
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
}
