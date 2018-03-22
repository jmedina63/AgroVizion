import { Injectable } from '@angular/core';
import { AlertController, LoadingController, Loading } from 'ionic-angular';


@Injectable()
export class AlertService {
    private loading: Loading;

    constructor(private alertCtrl: AlertController, private loadingCtrl: LoadingController) {

    }

    showLoading(text, dismiss=true) {
        this.loading = this.loadingCtrl.create({
          content: text,
          dismissOnPageChange: dismiss
        });
        this.loading.present();
        return this.loading;
    }

    showError(title, text) {
        this.loading.dismiss();
        let alert = this.alertCtrl.create({
          title: title,
          subTitle: text,
          buttons: ['OK']
        });
        alert.present(prompt);
    }

    showMessage(title, text) {
        let alert = this.alertCtrl.create({
            title: title,
            subTitle: text,
            buttons: ['OK']
        });
        alert.present();
    }

    hideLoading() {
        this.loading.dismiss();
    }
}
