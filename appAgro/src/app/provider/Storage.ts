export class Storage {
    public user;
    public credits;
    public orders;
    public banners;

    constructor() {
        this.banners = { first: {base64: null, extension: null, filename: null}, second: {base64: null, extension: null, filename: null}};
    }
}
