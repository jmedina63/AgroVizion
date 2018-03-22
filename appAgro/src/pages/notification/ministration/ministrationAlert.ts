import { Component } from '@angular/core';
import { NavController, Platform } from 'ionic-angular';
import { Storage } from '../../../app/provider/Storage';
import { StatusBar } from '@ionic-native/status-bar';

@Component({
  selector: 'page-ministrationAlert',
  templateUrl: 'ministrationAlert.html'
})
export class MinistrationAlertPage {

  constructor(public navCtrl: NavController, private statusBar: StatusBar, private platform: Platform, private storage: Storage) {
      platform.ready().then(() => {
          statusBar.backgroundColorByHexString("#01487e");
      });
  }

  /**
  * Regresa a la pantalla anterior
  * @param  {pages} page [NotificationPage]
  * @return {void}
  */
  back() {
      this.navCtrl.pop();
  }

}
