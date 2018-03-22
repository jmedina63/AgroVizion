import { Component } from '@angular/core';
import { NavController, Platform } from 'ionic-angular';
import { Storage } from '../../../app/provider/Storage';
import { StatusBar } from '@ionic-native/status-bar';

@Component({
  selector: 'page-movementAlert',
  templateUrl: 'movementAlert.html'
})
export class MovementAlertPage {

  constructor(public navCtrl: NavController, private statusBar: StatusBar, private platform: Platform, private storage: Storage) {
      platform.ready().then(() => {
          statusBar.backgroundColorByHexString("#591484");
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
